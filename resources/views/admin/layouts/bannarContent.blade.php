<div class="tab-pane fade show active" id="home-banner" role="tabpanel" aria-labelledby="home-banner-tab">
                               <ul class="nav nav-pills mt-4 mb-4">
                                    <li class=" nav-item">  <a class="nav-link active" id="bannar-title-tab" data-toggle="pill" href="#bannar-title" role="tab" aria-controls="bannar-title" aria-selected="true">Bannar Title</a></li>
                                    <li class=" nav-item">  <a class="nav-link" id="bannar-text-tab" data-toggle="pill" href="#bannar-text" role="tab" aria-controls="bannar-text" aria-selected="false">Bannar text</a> </li>
                                    <li class=" nav-item">  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Bannar Image</a> </li>                                                                  
                                    <li class=" nav-item">  <a class="nav-link" id="bannar-button-tab" data-toggle="pill" href="#bannar-button" role="tab" aria-controls="bannar-button" aria-selected="false">Bannar Button</a></li>
                                    <li class=" nav-item">  <a class="nav-link" id="bannar-action-tab" data-toggle="pill" href="#bannar-action" role="tab" aria-controls="bannar-action" aria-selected="false">Button Action</a></li>
                                </ul>
                                <div class="row">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="tab-content p-4 menu-tap" id="v-pills-tabContent" >
                                            <div class="tab-pane fade show active" id="bannar-title" role="tabpanel" aria-labelledby="bannar-title-tab">
                                            	 <div class="errors"></div>
                                            	<form  action="" class="add_setting" method="post">
                                            		@csrf
				                                    <div class="form-group">
				                                    	 <label for="bannar_title">Bannar Title</label>
				                                        <input type="text" data-key="bannar_title" name="bannar_title" class="form-control setting_key"  value="{{getSetting('bannar_title') ? getSetting('bannar_title'):''}} " id="title-bannar" aria-describedby="name" placeholder="title">
				                                    </div>
                                                   
				                                    @if(getSetting('bannar_title'))
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else 
                                                        <button type="submit" onclick="tinyMCE.triggerSave(true,true);"  class="btn btn-primary">Save</button>
                                                    @endif
                                                   
				                                </form>

                                            </div>
                                            <div class="tab-pane fade" id="bannar-text" role="tabpanel" aria-labelledby="bannar-text-tab">
                                               <div class="errors"></div>
                                            	<form  action="" class="add_setting"  method ="post">
                                            		@csrf
				                                    <div class="form-group">
					                                    <label for>Text area</label>
					                                    <textarea name="bannar_text" data-key="bannar_text" class="form-control setting_key" id="text_bannar" rows="5">
                                                          {{ getSetting('bannar_text') ? getSetting('bannar_text') : '' }}
                                                                       
                                                        </textarea>
					                                </div>
                                                
                                                    @if(getSetting('bannar_text'))
                                                      <button type="submit" class="btn btn-primary">Update</button>
                                                    @else 
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    @endif
                                                 
                                                  
				                                    
				                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                
                                             <div class="errors"></div>
                                            	<form  action="{{url('add-bannar-image')}}" class="add_setting" id="addImage" method="post" enctype="multipart/form-data">
                                            		@csrf
				                                    <div class="form-group">
					                                    <div class="custom-file">
			                                            <input type="file" name="bannar_image" data-key="bannar_image"  class="custom-file-input setting_key" id="image-bannar inputGroupFile01">
			                                            <label  class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                          @if(getSetting('bannar_image'))
                                                            <a href="#"><img src="{{asset(getSetting('bannar_image'))}}" style="width:100px;height:100px;"></a>
                                                      
                                                         @endif
                                                       
			                                            </div>
					                                </div>
				                                   
                                                    @if(getSetting('bannar_image'))
                                                      <button style="margin-top:32px" type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>
                                                    @else 
                                                        <button style="margin-top:32px" stype="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                  
				                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="bannar-button" role="tabpanel" aria-labelledby="bannar-button-tab">
                                          
                                             <div class="errors"></div>
                                                <form  action="{{url('add-bannar-button')}}" class="add_setting" id="addButton" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="bannar_button">Bannar Button</label>
                                                        <input type="text" name="bannar_button" data-key="bannar_button" class="form-control setting_key" id="button-bannar"  value="{{getSetting('bannar_button') ? getSetting('bannar_button'):''}}" aria-describedby="name" placeholder="Button name">
                                                    </div>
                                                  
                                                   @if(getSetting('bannar_button'))
                                                      <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Update</button>

                                                    @else
                                                    <button type="submit" onclick="tinyMCE.triggerSave(true,true);" class="btn btn-primary">Save</button>
                                                    @endif
                                                    
                                                    
                                                </form>
                                            </div>
                                             <div class="tab-pane fade" id="bannar-action" role="tabpanel" aria-labelledby="bannar-action-tab">
                                                
                                             <div class="errors"></div>
                                                <form  action="{{url('add-bannar-action')}}" class="add_setting" id="addAction" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                         <label for="bannar_action">Bannar Action</label>
                                                        <input type="text" name="bannar_action" data-key="bannar_action" class="form-control setting_key" value="{{getSetting('bannar_action') ? getSetting('bannar_action'):''}}" id="action_bannar" value="" aria-describedby="name" placeholder="button action">
                                                    </div>
                                                     
                                                     @if(getSetting('bannar_action'))
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