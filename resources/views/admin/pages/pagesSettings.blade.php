@extends('admin.layouts.master')
@section('style')
<!-- This page plugin CSS -->
<link href="{{ asset('dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection

@section('content')

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="page-content container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <!-- Tabs -->
                   <div class="row">
				    <div class="col-lg-3 col-xl-2">
				        <!-- Nav tabs -->
				        <div class="nav  flex-column nav-pills  section-tap" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="home-banner-tab" data-toggle="pill" href="#home-banner" role="tab" aria-controls="home-banner" aria-selected="true">Banner</a>
                            <a class="nav-link" id="about-us-tab" data-toggle="pill" href="#about-us" role="tab" aria-controls="about-us" aria-selected="false">About us</a>
                            <a class="nav-link" id="services-tab" data-toggle="pill" href="#services" role="tab" aria-controls="services" aria-selected="false">Services</a>
                            <a class="nav-link" id="feature-work-tab" data-toggle="pill" href="#feature-work" role="tab" aria-controls="feature-work" aria-selected="false">Steps work</a>
                            <a class="nav-link" id="project-tab" data-toggle="pill" href="#project" role="tab" aria-controls="project" aria-selected="false">Project</a>
                            <a class="nav-link" id="contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="contact" aria-selected="false"> Contact </a>
                            <a class="nav-link" id="contact-tab" data-toggle="pill" href="#project-list" role="tab" aria-controls="project-list" aria-selected="false"> Project Complete </a>
                            <a class="nav-link" id="sing-up-tab" data-toggle="pill" href="#sing-up" role="tab" aria-controls="sing-up" aria-selected="false"> Sing up </a>
                            <a class="nav-link" id="blog-tab" data-toggle="pill" href="#blog" role="tab" aria-controls="blog" aria-selected="false">Blog</a>
                            <a class="nav-link" id="samples-tab" data-toggle="pill" href="#samples" role="tab" aria-controls="samples" aria-selected="false">Samples</a>
                            <a class="nav-link" id="pricing-tab" data-toggle="pill" href="#pricing" role="tab" aria-controls="pricing" aria-selected="false">Pricing</a>
				        </div>
				    </div>
				    <div class="col-lg-9 col-xl-10">
				        <div class="tab-content" id="v-pills-tabContent">
                            @include("admin.layouts.bannarContent")



				            
				            <div class="tab-pane fade" id="about-us" role="tabpanel" aria-labelledby="about-us-tab">
                                <div class="row">
                                    <div class="col-lg-3 col-xl-2">
                                        <!-- Nav tabs -->
                                        <div class="nav section-menu-tap"  id="pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="about-title-tab" data-toggle="pill" href="#about-title" role="tab" aria-controls="about-title" aria-selected="true">About Title</a>
                                            <a class="nav-link" id="about-text-tab" data-toggle="pill" href="#about-text" role="tab" aria-controls="bannar-text" aria-selected="false">About text</a>
                                            <a class="nav-link" id="about-image-tab" data-toggle="pill" href="#about-image" role="tab" aria-controls="about-image" aria-selected="false">About Image</a>
                                            <a class="nav-link" id="about-button-tab" data-toggle="pill" href="#about-button" role="tab" aria-controls="about-button" aria-selected="false">About Button</a>
                                            <a class="nav-link" id="about-action-tab" data-toggle="pill" href="#about-action" role="tab" aria-controls="about-action" aria-selected="false">About Action</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-xl-10">
                                        <div class="tab-content p-4 menu-tap" id="v-pills-tabContent" >
                                            <div class="tab-pane fade show active" id="about-title" role="tabpanel" aria-labelledby="about-title-tab">
                                                 <div class="errors"></div>
                                                <form  action="" class="add_setting" id="addAboutTitle" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="about_title">About Title</label>
                                                        <input type="text" name="about_title" data-key="about_title" value="{{getSetting('about_title') ? getSetting('about_title'):''}}"  class="form-control setting_key" id="title-about"  aria-describedby="name" placeholder="title">
                                                    </div>

                                                    
                                                   @if(getSetting('about_title'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else 
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>

                                                    @endif

                                                    
                                                </form>
                                             


                                           </form>
                                            </div>
                                            <div class="tab-pane fade" id="about-text" role="tabpanel" aria-labelledby="about-text-tab">
                                               <div class="errors"></div>
                                                <form  action="" class="add_setting"  method ="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for>Text area</label>
                                                        <textarea name="about_text" data-key="about_text" class="form-control setting_key" id="text_about" rows="5">
                                                              {{getSetting('about_text') ? getSetting('about_text'):''}}
                                                        </textarea>
                                                    </div>
                                                     @if(getSetting('about_text'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else 
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>

                                                    @endif
                                                   
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="about-image" role="tabpanel" aria-labelledby="about-image-tab">
                                                
                                             <div class="errors"></div>
                                                <form  action="{{url('add-about-image')}}" class="add_setting" id="addAboutImage" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">

                                                        <input type="file" name="about_image" data-key="about_image" id="image_about" class="setting_key">
                                                         @if(getSetting('about_image'))
                                                            <a href="#"><img src="{{asset(getSetting('about_image'))}}" style="width:100px;height:100px;"></a>
                                                      
                                                         @endif
                                                      
                                                    </div>
                                                 
                                                    @if(getSetting('about_image'))
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif

                                                  
                                                 
                                                  
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="about-button" role="tabpanel" aria-labelledby="about-button-tab">
                                          
                                             <div class="errors"></div>
                                                <form  action="" class="add_setting"  method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="about_button">About Button</label>
                                                        <input type="text" name="about_button" data-key="about_button" class="form-control setting_key" value="{{getSetting('about_button')? getSetting('about_button'):''}}"  id="about_button" aria-describedby="name" placeholder="Button name">
                                                    </div>
                                                     
                                                    @if(getSetting('about_button'))
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                   
                                                    
                                                </form>
                                            </div>
                                             <div class="tab-pane fade" id="about-action" role="tabpanel" aria-labelledby="about-action-tab">
                                                
                                             <div class="errors"></div>
                                                <form  action="{{url('add-about-action')}}" class="add_setting" id="addAboutAction" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="about_action">About Action</label>
                                                        <input type="text" name="about_action" data-key="about_action" class="form-control setting_key" value="{{getSetting('about_action')? getSetting('about_action'):''}}" id="about_action" value="" aria-describedby="name" placeholder="button action">
                                                    </div>
                                                    
                                                   @if(getSetting('about_action'))
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                 
                                                 
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
				            </div>
				            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
				               <div class="row">

                                    <ul class="nav nav-pills mt-4 mb-4">
                                        <li class=" nav-item">   <a class="nav-link active" id="service-title-tab" data-toggle="pill" href="#service-title" role="tab" aria-controls="service-title" aria-selected="true">Service Title</a></li>
                                        <li class=" nav-item">   <a class="nav-link" id="service-add-tab" data-toggle="pill" href="#service-add" role="tab" aria-controls="service-name" aria-selected="false">Service Add</a></li>
                                    </ul>

                                    <div class="col-lg-12 col-xl-13">
                                        <div class="tab-content p-4 menu-tap" id="v-pills-tabContent" >
                                            <div class="tab-pane fade show active" id="service-title" role="tabpanel" aria-labelledby="service-title-tab">
                                                 <div class="errors"></div>
                                                <form  action="{{url('add-service-title')}}" class="add_setting" id="addServiceTitle" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="service_title">Service Title</label>
                                                        <input type="text" name="service_title" data-key="service_title" class="form-control setting_key" value="{{getSetting('service_title')?getSetting('service_title'):'' }}" id="title-service"  value="" aria-describedby="name" placeholder="title">
                                                    </div>
                                                   
                                                    @if(getSetting("service_title"))
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else
                                                     <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>

                                                    @endif

                                                
                                                   
                                                </form>
                                            </div>



                                            <div class="tab-pane fade" id="service-add" role="tabpanel" aria-labelledby="service-add-tab">
                                             <div class="errors"></div>
                                                <form  action="{{url('service/store')}}" class="add_setting" id="addService" method="post">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="service_name" class="col-sm-2 text-right control-label col-form-label">Service Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="service_name" data-key="service_name" class="form-control setting_key" id="service_name"  aria-describedby="name" placeholder="service name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="service_name" class="col-sm-2 text-right control-label col-form-label">Service Icon </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="service_icon" class="form-control"   id="service_icon" aria-describedby="name" placeholder="icon name ">
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group row">
                                                        <label for="service_name" class="col-sm-2 text-right control-label col-form-label">Service Text </label>
                                                        <div class="col-sm-10">
                                                            <textarea name="service_text" class="form-control"  id="service_text" rows="5">
                                                           
                                                            </textarea>
                                                        </div>

                                                    </div>
                                                     <div class="form-group row">
                                                        <label for="service_action" class="col-sm-2 text-right control-label col-form-label">Service Button</label>
                                                          <div class="col-sm-10">
                                                            <input type="text" name="service_button" class="form-control"  id="service_button" aria-describedby="name" placeholder="Button name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="service_action" class="col-sm-2 text-right control-label col-form-label">Service Action</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="service_action" class="form-control"  id="service_action" aria-describedby="name" placeholder="button action">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="publication_status" class="col-sm-2 text-right control-label col-form-label">Publication Status</label>
                                                        <div class="col-sm-10">
                                                            <select class="custom-select " name="publication_status" id="publication_status" >
                                                                <option  selected="">Select...</option>
                                                                <option id="publication_status" value="1"> Published</option>
                                                                <option id="publication_status" value="0"> Unpublished</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0 text-right">
                                                        <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-info waves-effect waves-light">Save</button>
                                                        <button type="reset" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                                    </div>
                                                </form>

                                                <div class="table-responsive" style="margin-top: 20px ; color:#000">
                                                    <table id="file_export" class="table table-bordered nowrap display">
                                                        <thead style="color: #000">
                                                            <tr>
                                                                <th>Service Name </th>
                                                                <th>Service Icon</th>
                                                                <th>Service Action</th>
                                                                <th>Publication Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="color: #000" class="home_body">
                                                            @foreach($services as $service )
                                                            <tr>
                                                                <td>{{$service->service_name}}</td>
                                                                <td>{!! $service->service_icon !!}</td>
                                                                <td>{{$service->service_action}} </td>
                                                                 <td>{{($service->publication_status ==1)?"published":"unpublished" }}</td>
                                                                <td>

                                                                @if($service->publication_status ==1) 
                                                                   <a href='{{url("services/unpublished/$service->id")}}' class='btn btn-success' title="Unpublished"><i class="fas fa-long-arrow-alt-up"></i></a>
                                                                @else
                                                                <a href='{{url("services/published/$service->id")}}' class='btn btn-danger' title="published"><i class="fas fa-long-arrow-alt-down"></i></a>
                                                                @endif

                                                                   <a href='{{url("services/unpublished/$service->id")}}' class='btn btn-info' title="edit"><i class="fas fa-edit"></i></a>

                                                                   <a href='{{url("services/delete/$service->id")}}' onclick=" return confirm('Are you want  delete to data') " class='btn btn-danger' title="delete"><i class="far fa-trash-alt"></i></a>
                                                                </td>
                                                            </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
				            </div>

                          <!--  feature-work start -->
                              <div class="tab-pane fade" id="feature-work" role="tabpanel" aria-labelledby="feature-work-tab">
                               <div class="row">
                                    <div class="col-lg-3 col-xl-2">
                                        <!-- Nav tabs -->
                                        <div class="nav section-menu-tap"  id="pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="feature-work-title-tab" data-toggle="pill" href="#feature-work-title" role="tab" aria-controls="feature-work-title" aria-selected="true">Feature Title</a>
                                            <a class="nav-link" id="feature-work-name-tab" data-toggle="pill" href="#feature-work-name" role="tab" aria-controls="feature-work-name" aria-selected="false">Feature Name</a>
                                            <a class="nav-link" id="feature-work-text-tab" data-toggle="pill" href="#feature-work-text" role="tab" aria-controls="feature-work-text" aria-selected="false">Feature text</a>
                                            <a class="nav-link" id="feature-work-image-tab" data-toggle="pill" href="#feature-work-image" role="tab" aria-controls="feature-work-image" aria-selected="false">Feature Image</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-xl-10">
                                        <div class="tab-content p-4 menu-tap" id="v-pills-tabContent" >
                                            <div class="tab-pane fade show active" id="feature-work-title" role="tabpanel" aria-labelledby="feature-work-title-tab">
                                                 <div class="errors"></div>
                                                <form  action="{{url('add-feature-title')}}" class="add_setting" id="addFeatureTitle" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for=feature_title">Feature Title</label>
                                                        <input type="text" name="feature_title" data-key="feature_title" class="form-control setting_key" value="{{getSetting('feature_title') ? getSetting('feature_title'):''}}" id="feature_title" aria-describedby="name" placeholder="title">
                                                    </div>
                                                  
                                                   
                                                    @if(getSetting('feature_title'))
                                                   
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else
                                                           <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button> 
                                                    @endif
                                                   
                                                    
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="feature-work-name" role="tabpanel" aria-labelledby="feature-work-name-tab">
                                                
                                             <div class="errors"></div>
                                                <form action="{{url('add-feature-name')}}" class="add_setting" id="addFeatureName" method="post">
                                                    @csrf
                                                     <div class="form-group">
                                                        <label for>Feature Name</label>
                                                        <input type="text" name="feature_name" data-key="feature_name" class="form-control setting_key" value="{{getSetting('feature_name')? getSetting('feature_name'):'' }}"  id="feature_name" aria-describedby="name" placeholder="feature name ">
                                                    </div>

                                               
                                                    @if(getSetting('feature_name'))
                                                   
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else
                                                           <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button> 
                                                    @endif
                                                     
                                                 
                                                     

                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="feature-work-text" role="tabpanel" aria-labelledby="feature-work-text-tab">
                                               <div class="errors"></div>
                                                <form action="{{url('add-feature-text')}}" class="add_setting" id="addFeatureText" method ="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for>Text area</label>
                                                        <textarea name="feature_text" data-key="feature_text" class="form-control setting_key" id="feature_text" rows="5" >
                                                          {{getSetting("feature_text")?getSetting("feature_text"):""}}
                                                          
                                                        </textarea>
                                                    </div>

                                                    @if(getSetting('feature_text'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else 
                                                          <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                    
                                                  
                                                </form>
                                            </div> 
                                            <div class="tab-pane fade" id="feature-work-image" role="tabpanel" aria-labelledby="feature-work-image-tab">
                                                @if(Session::has("message"))
                                                  <div class="text-success"> <p style="font-size: 16px; padding: 5px 15px">{{Session::get("message")}}</p>  </div>

                                               @endif
                                             <div class="errors"></div>
                                                <form  action="{{url('add-feature-image')}}" class="add_setting" id="addFeatureImage" method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="form-group">

                                                        <input type="file" name="feature_image" data-key="feature_image" class="setting_key" id="feature_image">
                                                         @if(getSetting('feature_image'))
                                                            <a href="#"><img src="{{asset(getSetting('feature_image'))}}" style="width:100px;height:100px;"></a>
                                                      
                                                         @endif
                                                      
                                                      
                                                    </div>
                                                    @if(getSetting('feature_image'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else 
                                                          <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Upload</button>
                                                    @endif
                                                 
                                                   
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <!--  feature-work end -->

                            <!--  project-work end -->


                            <div class="tab-pane fade" id="project" role="tabpanel" aria-labelledby="project-tab">
                               <div class="row">
                                    
                                        <!-- Nav tabs -->
                                       <ul class="nav nav-pills mt-4 mb-4">
                                            <li class=" nav-item">  <a class="nav-link active" id="project-title-tab" data-toggle="pill" href="#project-title" role="tab" aria-controls="project-title" aria-selected="true">Projct Title</a></li>
                                            <li class=" nav-item"> <a class="nav-link" id="project-button-tab" data-toggle="pill" href="#project-button" role="tab" aria-controls="project-button" aria-selected="false">Project Button</a></li>
                                            <li class=" nav-item"> <a class="nav-link" id="project-action-tab" data-toggle="pill" href="#project-action" role="tab" aria-controls="project-action" aria-selected="false">Project Action</a></li>
                                            <li class=" nav-item"> <a class="nav-link" id="project-add-tab" data-toggle="pill" href="#project-add" role="tab" aria-controls="project-add" aria-selected="false">Project Add</a></li>
                                        </ul>
                                    
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="tab-content p-4 menu-tap" id="v-pills-tabContent" >
                                            <div class="tab-pane fade show active" id="project-title" role="tabpanel" aria-labelledby="project-title-tab">
                                                 <div class="errors"></div>
                                                <form  action="{{url('add-project-title')}}" class="add_setting" id="addProjectTitle" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="project_title">Project Title</label>
                                                        <input type="text" name="project_title" data-key="project_title" class="form-control setting_key" value="{{getSetting('project_title')?getSetting('project_title'):'' }}" id="project_title" aria-describedby="name" placeholder="title">
                                                    </div>
                                                   
                                                   @if(getSetting('project_title'))
                                                     <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else
                                                   <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>

                                                    @endif

                                                  
                                                    
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="project-add" role="tabpanel" aria-labelledby="project-add-tab">
                                               <div class="errors"></div>
                                                <form  action="{{url('project/store')}}" class="add_setting" id="addProject" method ="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="project_name" class="col-sm-2 text-right control-label col-form-label">Project Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="project_name" data-key="project_name" class="form-control setting_key" id="project_name"  aria-describedby="name" placeholder="Project name">
                                                        </div>
                                                    </div>
                                                    
                        
                                                    <div class="form-group row">
                                                        <label for="proejct_description" class="col-sm-2 text-right control-label col-form-label">Prject Description </label>
                                                        <div class="col-sm-10">
                                                            <textarea name="project_description" class="form-control"  id="project_description" rows="5">
                                                           
                                                            </textarea>
                                                        </div>

                                                    </div>
                                                     <div class="form-group row">
                                                        <label for="proejct_image" class="col-sm-2 text-right control-label col-form-label">Project Image </label>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="project_image" id="project_image">
                                                        </div>

                                                    </div>
                                                     <div class="form-group row">
                                                        <label for="project_button" class="col-sm-2 text-right control-label col-form-label">Proejct Button</label>
                                                          <div class="col-sm-10">
                                                            <input type="text" name="project_button" class="form-control"  id="project_button" aria-describedby="name" placeholder="Button name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="proejct_action" class="col-sm-2 text-right control-label col-form-label">Project Action</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="project_action" class="form-control"  id="project_action" aria-describedby="name" placeholder="button action">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="publication_status" class="col-sm-2 text-right control-label col-form-label">Publication Status</label>
                                                        <div class="col-sm-10">
                                                            <select class="custom-select " name="publication_status" id="publication_status" >
                                                                <option  selected="">Select...</option>
                                                                <option  id="publication_status" value="1"> Published</option>
                                                                <option  id="publication_status" value="0"> Unpublished</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0 text-right">
                                                        <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-info waves-effect waves-light">Save</button>
                                                        <button type="reset" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                                    </div>
                                                </form>
                                                <div class="table-responsive" style="margin-top: 20px ; color:#000">
                                                    <table id="file_export" class="table table-bordered nowrap display">
                                                        <thead style="color: #000">
                                                            <tr>
                                                                <th>Project Name </th>
                                                                <th>Project Image</th>
                                                                <th>Publication Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="color: #000" class="home_body">
                                                            @foreach($projects as $project )
                                                            <tr>
                                                                <td>{{$project->project_name}}</td>
                                                                <td> <img style="width: 100px; height: 100px" src="{{asset($project->project_image)}}"> </td>
                                                                 <td>{{($project->publication_status ==1)?"published":"unpublished" }}</td>
                                                                <td>

                                                                @if($project->publication_status ==1) 
                                                                   <a href='{{url("project/unpublished/$project->id")}}' class='btn btn-success' title="Unpublished"><i class="fas fa-long-arrow-alt-up"></i></a>
                                                                @else
                                                                <a href='{{url("project/published/$project->id")}}' class='btn btn-danger' title="published"><i class="fas fa-long-arrow-alt-down"></i></a>
                                                                @endif

                                                                   <a href="{{url('')}}" class='btn btn-info' title="edit"><i class="fas fa-edit"></i></a>

                                                                   <a href='{{url("project/delete/$project->id")}}'  onclick=" return confirm('Are you want  delete to data') " class='btn btn-danger' title="delete"><i class="far fa-trash-alt"></i></a>
                                                                </td>
                                                            </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="project-button" role="tabpanel" aria-labelledby="project-button-tab">
                                          
                                             <div class="errors"></div>
                                                <form  action="{{url('add-project-button')}}" class="add_setting" id="addProjectButton" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="project_button">Project Button</label>
                                                        <input type="text" name="project_button" data-key="project_button" class="form-control setting_key" id="projectTopbutton" value="{{getSetting('project_button')?getSetting('project_button'):''}}"  aria-describedby="name" placeholder="Button name">
                                                    </div>
                                               
                                                    @if(getSetting('project_button'))
                                                     <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>

                                                    @endif

                                                </form>
                                            </div>
                                             <div class="tab-pane fade" id="project-action" role="tabpanel" aria-labelledby="project-action-tab">
                                                
                                             <div class="errors"></div>
                                                <form  action="{{url('add-project-action')}}" class="add_setting" id="addProjectAction" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="service_action">Project Action</label>
                                                        <input type="text" name="project_action" data-key="project_action" class="form-control setting_key" value="{{getSetting('project_action')?getSetting('project_action'):''}}" id="project_action" aria-describedby="name" placeholder="button action">
                                                    </div>
                                                  
                                                   @if(getSetting('project_action'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else
                                                     <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                           <!-- contact start -->

                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                               <div class="row">
                                    <div class="col-lg-3 col-xl-2">
                                        <!-- Nav tabs -->
                                        <div class="nav section-menu-tap"  id="pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="contact-title-tab" data-toggle="pill" href="#contact-title" role="tab" aria-controls="project-title" aria-selected="true">Contact Title</a>
                                            <a class="nav-link" id="contact-text-tab" data-toggle="pill" href="#contact-text" role="tab" aria-controls="contact-text" aria-selected="false">Contact text</a>
                                            <a class="nav-link" id="contact-image-tab" data-toggle="pill" href="#contact-image" role="tab" aria-controls="contact-image" aria-selected="false">Contact Image</a>
                                            <a class="nav-link" id="contact-button-tab" data-toggle="pill" href="#contact-button" role="tab" aria-controls="contact-button" aria-selected="false">Button</a>
                                            <a class="nav-link" id="contact-action-tab" data-toggle="pill" href="#contact-action" role="tab" aria-controls="contact-action" aria-selected="false">Action</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-xl-10">
                                        <div class="tab-content p-4 menu-tap" id="v-pills-tabContent" >
                                            <div class="tab-pane fade show active" id="contact-title" role="tabpanel" aria-labelledby="contact-title-tab">
                                                 <div class="errors"></div>
                                                <form  action="{{url('add-contact-title')}}"
                                                class="add_setting" id="addContactTitle" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="contact_title">Contact Title</label>
                                                        <input type="text" name="contact_title" data-key="contact_title" class="form-control setting_key" id="contact_title" value="{{getSetting('contact_title')?getSetting('contact_title'):'' }}" aria-describedby="name" placeholder="title">
                                                    </div>
            
                                                 
                                                   @if(getSetting('contact_title'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                    
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="contact-text" role="tabpanel" aria-labelledby="contact-text-tab">
                                               <div class="errors"></div>
                                                <form  action="{{url('add-contact-text')}}" class="add_setting" id="addContactText" method ="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for>Text area</label>
                                                        <textarea name="contact_text" data-key="contact_text" class="form-control setting_key" id="contact_text" rows="5">
                                                          {{getSetting("contact_text")? getSetting("contact_text"):""}}
                                                        </textarea>
                                                    </div>
                                                 
                                                   @if(getSetting('contact_text'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                    
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="contact-image" role="tabpanel" aria-labelledby="contact-image-tab">
                                                @if(Session::has("message"))
                                                  <div class="text-success"> <p style="font-size: 16px; padding: 5px 15px">{{Session::get("message")}}</p>  </div>

                                               @endif
                                             <div class="errors"></div>
                                                <form  action="{{url('add-contact-image')}}" class="add_setting" id="addContactImage" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">

                                                        <input type="file" name="contact_image" data-key="contact_image" class="setting_key" id="contact_image">
                                                        @if(getSetting('contact_image'))
                                                            <a href="#"><img src="{{asset(getSetting('contact_image'))}}" style="width:100px;height:100px;"></a>
                                                      
                                                         @endif
                                                      
                                                    </div>
                                               
                                                    @if(getSetting('contact_image'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Upload</button>
                                                    @endif
                                                    
                                                    
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="contact-button" role="tabpanel" aria-labelledby="contact-button-tab">
                                          
                                             <div class="errors"></div>
                                                <form  action="{{url('add-contact-button')}}" class="add_setting" id="addContactButton" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="contact_button">Contact Button</label>
                                                        <input type="text" name="contact_button" data-key="contact_button" class="form-control setting_key" id="contact_button" value="{{getSetting('contact_button')?getSetting('contact_button'):'' }}" aria-describedby="name" placeholder="Button name">
                                                    </div>
                                                    @if(getSetting('contact_button'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                   
                                                   
                                                </form>
                                            </div>
                                             <div class="tab-pane fade" id="contact-action" role="tabpanel" aria-labelledby="contact-action-tab">
                                                
                                             <div class="errors"></div>
                                                <form  action="{{url('add-contact-action')}}" class="add_setting" id="addContactAction" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="contact_action">Contact Action</label>
                                                        <input type="text" name="contact_action" data-key="contact_action" class="form-control setting_key" value="{{getSetting('contact_action')?getSetting('contact_action'):'' }}" id="contact_action" aria-describedby="name" placeholder="button action">
                                                    </div>
                                                    
                                                     @if(getSetting('contact_action'))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                   
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                         <!-- sing up start -->

                            <div class="tab-pane fade" id="sing-up" role="tabpanel" aria-labelledby="sing-up-tab">
                               <div class="row">
                                    <div class="col-lg-3 col-xl-2">
                                        <!-- Nav tabs -->
                                        <div class="nav section-menu-tap"  id="pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link" id="sing-title-tab" data-toggle="pill" href="#sing-title" role="tab" aria-controls="sing-title" aria-selected="false"> Sing Title</a>
                                            <a class="nav-link" id="sing-image-tab" data-toggle="pill" href="#sing-image" role="tab" aria-controls="sing-image" aria-selected="false"> Bg Image</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-xl-10">
                                        <div class="tab-content p-4 menu-tap" id="v-pills-tabContent" >

                                             <div class="tab-pane fade show active" id="sing-title" role="tabpanel" aria-labelledby="sing-title-tab">
                                                 <div class="errors"></div>
                                                <form  action="{{url('add-sing-title')}}" class="add_setting" id="addSingTitle" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="sing_title">Sing Title</label>
                                                        <input type="text" name="sing_title" data-key="sing_title" class="form-control setting_key" value="{{getSetting('sing_title')? getSetting('sing_title'):''}}" id="sing_title" aria-describedby="name" placeholder="title">
                                                    </div>

                                                    @if(getSetting("sing_title"))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else
                                                     <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>

                                                    @endif

                                                 


                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="sing-image" role="tabpanel" aria-labelledby="sing-image-tab">
                                                @if(Session::has("message"))
                                                  <div class="text-success"> <p style="font-size: 16px; padding: 5px 15px">{{Session::get("message")}}</p>  </div>

                                               @endif
                                             <div class="errors"></div>
                                                <form  action="{{url('add-sing-image')}}" class="add_setting" id="addSingUpImage" method="post" enctype="multipart/form-data">
                                                   @csrf
                                                    <div class="form-group">

                                                        <input type="file" name="sing_up_image" class="setting_key" data-key="sing_up_image" id="sing_up_image">
                                                         @if(getSetting('sing_up_image'))
                                                            <a href="#"><img src="{{asset(getSetting('sing_up_image'))}}" style="width:100px;height:100px;"></a>
                                                      
                                                         @endif
                                                      
                                                    </div>
                                                    
                                                    @if(getSetting("sing_up_image"))
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else
                                                     <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>

                                                    @endif

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>





				            <div class="tab-pane fade" id="pricing" role="tabpanel" aria-labelledby="pricing-tab">
				                 
                                <div class="row">
                                    
                                        <!-- Nav tabs -->
                                       <ul class="nav nav-pills mt-4 mb-4">
                                            <li class=" nav-item">  <a class="nav-link active" id="price-bannar-title-tab" data-toggle="pill" href="#price-bannar-title" role="tab" aria-controls="price-bannar-title" aria-selected="true">Price Bananr Title</a></li>
                                            <li class=" nav-item"> <a class="nav-link" id="bannar-text-price-tab" data-toggle="pill" href="#bannar-text-price" role="tab" aria-controls="bannar-text-price" aria-selected="false">Price Bananr Text</a></li>
                                            <li class=" nav-item"> <a class="nav-link" id="price-bg-image-tab" data-toggle="pill" href="#price-bg-image" role="tab" aria-controls="price-bg-image" aria-selected="false">Price  Bannar Image</a></li>
                                            <li class=" nav-item"> <a class="nav-link" id="price-package-add-tab" data-toggle="pill" href="#price-package-add" role="tab" aria-controls="price-package-add" aria-selected="false">Price Package Add</a></li>
                                            <li class=" nav-item"> <a class="nav-link" id="price-faq-add-tab" data-toggle="pill" href="#price-faq-add" role="tab" aria-controls="price-faq-add" aria-selected="false">Price Faq </a></li>
                                        </ul>
                                    
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="tab-content p-4 menu-tap" id="v-pills-tabContent" >
                                            <div class="tab-pane fade show active" id="price-bannar-title" role="tabpanel" aria-labelledby="price-bannar-title-tab">
                                                 <div class="errors"></div>
                                                <form  action="{{url('add-price-bannar-title')}}" class="add_setting" id="addPriceBanarrTitle" method="post">
                                                   @csrf
                                                    <div class="form-group">
                                                         <label for="price_bannar_title">Price Bannar Title</label>
                                                        <input type="text" name="price_bannar_title" data-key="price_bannar_title" class="form-control setting_key" value="{{getSetting('price_bannar_title')}}" id="price_bannar_title" aria-describedby="name" placeholder="title">
                                                    </div>
                                                 @if(getSetting("price_bannar_title"))
                                                   <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                @else
                                                 <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                   @endif
                                                 
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="bannar-text-price" role="tabpanel" aria-labelledby="bannar-text-price-tab">
                                                @if(Session::has("message"))
                                                  <div class="text-success"> <p style="font-size: 16px; padding: 5px 15px">{{Session::get("message")}}</p>  </div>

                                                @endif
                                          
                                             <div class="errors"></div>
                                                <form  action="{{url('add-price-bg-text')}}" class="add_setting" id="addPriceBgText"  method="post">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="price_bg_text" class="col-sm-2 text-right control-label col-form-label"> Price Bannar text </label>
                                                        <div class="col-sm-10">
                                                            <textarea name="price_bg_text" data-key="price_bg_text" class="form-control setting_key"  id="price_bg_text" rows="5">
                                                                {{getSetting('price_bg_text')?getSetting('price_bg_text'):""}}
                                                           
                                                            </textarea>
                                                        </div>

                                                    </div>
                                                    <div class="form-group mb-0 text-right">
                                                        @if(getSetting('price_bg_text'))
                                                        <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-info waves-effect waves-light">Update</button>

                                                        @else
                                                        <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-info waves-effect waves-light">Save</button>
                                                        <button type="reset" class="btn btn-dark waves-effect waves-light">Cancel</button>

                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="price-bg-image" role="tabpanel" aria-labelledby="price-bg-image-tab">
                                                @if(Session::has("message"))
                                                  <div class="text-success"> <p style="font-size: 16px; padding: 5px 15px">{{Session::get("message")}}</p>  </div>

                                                @endif
                                          
                                             <div class="errors"></div>
                                                <form  action="{{url('add-price-bg-image')}}" class="add_setting" id="addPriceBgImage" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                    <div class="form-group row">
                                                        
                                                         <label for="price_bg_image" class="col-sm-2 text-right control-label col-form-label">Price Bannar Image</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="price_bg_image" id="price_bg_image">
                                                            @if(getSetting('price_bg_image'))
                                                              <img style="width: 200px ; height: 200px" src="{{asset(getSetting('price_bg_image'))}}">

                                                            @endif

                                                        </div>

                                                    </div>
                                                    <div class="form-group mb-0 text-right">
                                                         @if(getSetting('price_bg_image'))
                                                         <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-info waves-effect waves-light">Update</button>

                                                          @else
                                                        <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-info waves-effect waves-light">Save</button>
                                                        <button type="reset" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                                        @endif


                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="price-faq-add" role="tabpanel" aria-labelledby="price-faq-add-tab">
                                               <div class="errors"></div>
                                                <form  action="{{url('package/faq/store')}}" class="add_setting" id="addPackAgeFaq" method="post" >
                                                    @csrf
                                                    <div class="form-group row">
                                                        <label for="faq_question" class="col-sm-2 text-right control-label col-form-label">Faq Question</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="faq_question" class="form-control" id="faq_question"  aria-describedby="name" placeholder="Faq Question">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="faq_answer" class="col-sm-2 text-right control-label col-form-label"> Faq Answer</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="faq_answer" class="form-control" id="faq_answer"  aria-describedby="name" placeholder="Faq Answer ">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="publication_status" class="col-sm-2 text-right control-label col-form-label">Publication Status</label>
                                                        <div class="col-sm-10">
                                                            <select class="custom-select" name="publication_status"  id="publication-status">
                                                                <option  selected="" >Select...</option>
                                                                <option  id="publication-status" value="1"> Published</option>
                                                                <option  id="publication-status" value="0"> Unpublished</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0 text-right">
                                                        <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-info waves-effect waves-light">Save</button>
                                                        <button type="reset" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
				            </div>
				        </div>
				    </div>
				</div>

                <!-- Tabs -->
                    
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->


    <!-- home modal -->

 <div class="modal fade" id="homemodel" tabindex="-1" role="dialog" aria-labelledby="homeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" id="create_home">
            	
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Create Home post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="errors"></div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <label for="">Title</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name Here" aria-label="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-success"><i class="ti-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <!-- about modal -->

 <div class="modal fade" id="aboutmodel" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" id="create_about">
            	
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Create Home post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="errors"></div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <label for="">Title</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name Here" aria-label="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-success"><i class="ti-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>





@endsection

@section('script')

<!--This page plugins -->
<script src="{{ asset('dashboard/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('dashboard/dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>
<script src="{{ asset('dashboard/assets/libs/tinymce/tinymce.min.js') }}"></script>
<script>
    $(document).ready(function() {

        tinymce.init({
            selector: "textarea",
            theme: "modern",
            height: 300,
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            },
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

        });
    });
</script>
@endsection