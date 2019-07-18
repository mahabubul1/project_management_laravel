<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $permissions)
    {
            if( empty($permissions) ) {
                $roles = ['admin'];
            }else {
                $separetors = [',','|','.'];
                if(is_array( $permissions )) {
                    $roles = [];
                    foreach ($permissions as $permission) {
                        foreach ( $separetors as $separetor ) {
                            if(strpos( $permission, $separetor ) !== false) {
                                $explode = explode($separetor, $permission);
                                $roles = array_merge($roles, $explode);
                                break 2;
                            }
                        }

                        $roles[] = $permission;
                    }
                }
            }

            foreach($roles as $role) {
                 if(\Auth::user()->hasRole($role)) {
                    return $next($request);
                 } 
            }

        return abort(404);;

    }
}
