<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Role;
use App\Status;
use App\Task;
use App\TaskType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Auth::user()->roles;
        foreach ( $roles as $role ) {
            switch ($role->slug) {
                case 'admin': case 'manager':
                    $tasks = Task::orderBy('updated_at', 'desc')->get();
                    break;
                
                case 'client':
                    $tasks = Auth::user()->orders;
                    break;
                case 'writer':
                    $tasks = Auth::user()->tasks;
                    break;
            }
        }
        
        $taskTypes = TaskType::all();
        $statuses = Status::all();
        $writers = Role::where('slug','writer')->first()->users;
        $managers = Role::where('slug','manager')->first()->users;
        $clients = Role::where('slug','client')->first()->users;
    	return view('admin.pages.orders', compact('tasks','taskTypes','statuses','writers','managers','clients'));
    }

    public function createTask(Request $request)
    {
        if($request->ajax()){
            $clientValidation = (hasRole('admin|manager')) ? 'required' : '';
            $validator = Validator::make($request->all(), [
                'type'          => 'required',
                'client'        => $clientValidation,
                'instructions'  => 'required',
                'deadline'      => 'required',
                'files'         => 'mimes:doc,pdf,docx,zip',
            ]);
            
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }

            $clientId = isset($request->client) ? $request->client : Auth::user()->id;
            $writerId = isset($request->writer) ? $request->writer : null;
            $managerId = isset($request->manager) ? $request->manager : null;

            $userOrders = User::findOrFail($clientId)->orders;

            foreach( $userOrders as $userOrder ) {
                if($userOrder->status->slug != 'approved') {
                    return response()->json(['errors'=>[0=>'You have already one active task. You can create one active task at a time']]);
                }
            }

            $task = new Task;
            $status = Status::where('slug','pending')->first();

            $task->type_id = $request->type;
            $task->instructions = $request->instructions;
            $task->deadline = $request->deadline;
            $task->status_id = $status->id;
            $task->samples = $request->samples;

            if($request->hasFile('files')) {
               $file = $request->file('files');

               //you also need to keep file extension as well
               $fileName = rand().'.'.$file->getClientOriginalExtension();

               //using the array instead of object
               $image['filePath'] = $fileName;
               $file->move(public_path().'/uploads/tasks/', $fileName);
               $task->files = $fileName;
            }
            $task->created_at = now();
            $task->updated_at = now();
            $task->save();

            if( $task ) {
                $role = User::findOrFail($clientId)->roles->first();
                 $task->client()->attach($clientId,[
                    'manager_id'    => $managerId,
                    'writer_id'     => $writerId,
                    'created_at'    =>now(),
                    'updated_at'    =>now()
                ]);

                return response()->json([
                    'success'   => true,
                    'task'      => $task,
                    'client'    => $task->client->first(),
                    'manager'   => $task->manager->first(),
                    'writer'    => $task->writer->first(),
                    'status'    => $task->status,
                    'type'      => $task->type,
                    'role'      => $role
                ]);
            }

            return response()->json(['success'=> false]);
            
        }

    }

    public function viewTask($id)
    {
        $task = Task::findOrFail($id);

        if( !hasRole('admin') ) {
            $userTasks = Auth::user()->tasks;
            foreach ($userTasks as $userTask ) {
                if($userTask->id == $id) {
                     return view('admin.pages.order', compact('task'));
                }
            }
        }else {
             return view('admin.pages.order', compact('task'));
        }
        
       return abort(404);
        
    }

    public function getTask(Request $request)
    {
        if($request->ajax()){

            $id = $request->id;
            $task = Task::findOrFail($id);

            if($task){
                return response()->json([
                    'success'   => true,
                    'task'      => $task,
                    'client'    => $task->client->first(),
                    'manager'   => $task->manager->first(),
                    'writer'    => $task->writer->first(),
                    'status'    => $task->status,
                    'type'      => $task->type
                ]);
                
            }
            
            return response()->json(['success'=> false]);
        }
    }

    public function getAjaxTask( Request $request )
    {

        if($request->ajax()){

            $id = $request->id;

            $task = Task::findOrFail($id);

            if( !hasRole('admin') ) {
                $userTasks = Auth::user()->tasks;
                foreach ($userTasks as $userTask ) {
                    if($userTask->id == $id) {
                        $view = view('admin.pages.orderView', compact('task'))->render();
                        return response()->json([
                            'success'   => true,
                            'view'      => $view
                        ]);
                    }
                }
            }else {
                 $view = view('admin.pages.orderView', compact('task'))->render();
                return response()->json([
                    'success'   => true,
                    'view'      => $view
                ]);
            }
            
           return response()->json(['success'=> false],404);
        }
    }

    public function updateTask(Request $request)
    {
        if($request->ajax()){
            $validator = \Validator::make($request->all(), [
                'type' => 'required',
                'instructions' => 'required',
                'deadline' => 'required',
                'files' => 'mimes:doc,pdf,docx,zip',
            ]);
            
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }

            $task               = Task::findOrFail($request->task_id);
            $status             = Status::where('slug','pending')->first();

            $taskWriter         = ($task->writer->first()) ? $task->writer->first()->id : null;
            $taskManager        = ($task->manager->first()) ? $task->manager->first()->id : null;

            $clientId           = isset($request->client) ? $request->client : Auth::user()->id;
            $writerId           = isset($request->writer) ? $request->writer : $taskWriter;
            $managerId          = isset($request->manager) ? $request->manager : $taskManager;

            $task->type_id      = $request->type;
            $task->instructions = $request->instructions;
            $task->deadline     = $request->deadline;
            $task->status_id    = $request->status;
            $task->samples      = $request->samples;

            if($request->hasFile('files')) {
               $file = $request->file('files');

               //you also need to keep file extension as well
               $fileName = rand().'.'.$file->getClientOriginalExtension();

               //using the array instead of object
               $image['filePath'] = $fileName;
               $file->move(public_path().'/uploads/tasks/', $fileName);
               $task->files = $fileName;
            }
            $task->updated_at = now();
            $task->update();

            if( $task ) {
                 $task->client()->updateExistingPivot($clientId,[
                    'manager_id'    => $managerId,
                    'writer_id'     => $writerId,
                    'updated_at'    =>now()
                ]);

                return response()->json([
                    'success'   => true,
                    'task'      => $task,
                    'client'    => $task->client->first(),
                    'manager'   => $task->manager->first(),
                    'writer'    => $task->writer->first(),
                    'status'    => $task->status,
                    'type'      => $task->type
                ]);
            }

            return response()->json(['success'=> false]);
        }
    }

    public function deleteTask(Request $request)
    {
        if($request->ajax()){

            $id = $request->id;

            $task = Task::findOrFail($id);
           if( !hasRole('admin') ) {
                if($task->status->slug == 'progress' ) {
                        return response()->json(['errors'=>[0=>'You Can not remove your task because it is progressing ']]);
                   }else if ($task->status->slug == 'approved') {
                        return response()->json(['errors'=>[0=>'You Can not remove your task has been completed']]);
                   }
           }

            $task->client()->detach();
            $task->delete();

            if($task){
                 return response()->json(['success'=> true]);
            }
            
            return response()->json(['success'=> false]);
        }
    }
}
