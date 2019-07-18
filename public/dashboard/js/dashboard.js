jQuery(document).ready(function($){
	/*
	 * User
	 */
	$('#create_user').on("submit", function(e){
		e.preventDefault();
		$(".errors").html("");
	    var form 		= $(this)[0];
	    var formData 	= new FormData(form);
	    var action 		= $(this).attr('action');

		$.ajax({
            url: action,
	        type: 'POST',
	        dataType: 'json',              
	        data: formData,
	        contentType: false,
	        cache: false,
	        processData: false,
            success: function (data) {
            	console.log(data);
                if(data.success == true){
                	$(".errors").html("");
                	$(".errors").append('<p class="alert alert-success">User Created Successfully</p>');
                	form.reset();

					var id 				= (data.user.id) ? data.user.id : "";
					var fullName 		= (data.user.full_name) ? data.user.full_name : "";
					var email 			= (data.user.email) ? data.user.email : "";
					var image 			= (data.user.image) ? data.user.image : "avatar.png";
					var phone 			= (data.user.phone) ? data.user.phone : "";
					var role 			= (data.role.name) ? data.role.name : "";
					var company 		= (data.user.company_name) ? data.user.company_name : "";
					var joining_date 	= (data.user.created_at) ? data.user.created_at : "";

					var name;

					if( data.user.image ) {
						name 		= '<a href="/profile/'+id+'"><img src="'+data.image_path+data.user.username+'/'+image+'" alt="user" class="rounded-circle" width="30" />'+ fullName +'</a>';
					}else {
						name 		= '<a href="/profile/'+id+'"><img src="'+data.image_path+'avatar.png'+'" alt="user" class="rounded-circle" width="30" />'+ fullName +'</a>';
					}

					var checkBtn 	= '<div class="custom-control custom-checkbox">'+
                            	    	'<input type="checkbox" class="custom-control-input" id="customControlValidation2" required>'+
                             	    	'<label class="custom-control-label" for="customControlValidation2"></label>'+
                             		'</div>';

					var viewBtn 	= '<button class="btn btn-md btn-success view_user" data-toggle="modal" data-target="#viewUserModal" data-id="'+ id +'"><i class="fas fa-eye" aria-hidden="true"></i></button> ';					
					var editBtn 	= '<button class="btn btn-md btn-success edit_user" data-toggle="modal" data-target="#updateUserModel" data-id="'+ id +'"><i class="fas fa-edit" aria-hidden="true"></i></button> ';
					var deleteBtn 	= '<button class="btn btn-md btn-danger delete_user" data-id="'+id+'"><i class="fas fa-trash"></i></button> ';
                    var action 		= viewBtn+editBtn+deleteBtn;

					$('.user_table').DataTable().row.add([
					  checkBtn, name, email, phone, role, company, joining_date, action
					]).draw();

                }else {

                	$(".errors").html("");
                	$.each(data.errors, function(key, error){
                		$(".errors").append('<p class="alert alert-danger">'+error+'</p>');
                	});
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
	});

	$(document).on("click",".view_user", function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var url = '/getProfile';
		$.ajax({
            url: url,
            type: "POST",
            dataType: 'json',
            data: {
                'id' : id,
                '_token': $('input[name="_token"]').val()
            },
            success: function (result) {
            	console.log(result);
                if(result.success == true){
                	$(".errors").html("");

                	$('.viewUserContent').html(result.view);

					
                }else if(result.errors){
                	$.each(result.errors, function(key, error){
                		alert(error);
                	});
                }
            },
            error: function (result) {
                console.log(result);
            }
        });
	});

	$(document).on("click",".delete_user", function(e){
		e.preventDefault();
		swal({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#DD6B55',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			console.log(result);
		  if (result.value) {

  			var parent 	= $(this).closest('td').parent();
  			var id 		= $(this).data('id');
  			var url 	= '/deleteUser';

  			$.ajax({
  	            url: url,
  	            type: "POST",
  	            dataType: 'json',
  	            data: {
  	                'id' : id,
  	                '_token': $('input[name="_token"]').val()
  	            },
  	            success: function (data) {
  	            	console.log(data);
  	                if(data.success == true){
  	                	parent.remove();
  	                	swal(
  	                	  'Deleted!',
  	                	  'The User has been deleted.',
  	                	  'success'
  	                	);
  	                }
  	            },
  	            error: function (data) {
  	                console.log(data);
  	            }
  	        });
		  }
		});
	});

	$("#update_profile").on("click", function(e){
		e.preventDefault();
		var id 				= $('#profile_id').val();
		var full_name 		=  $('#profile_update_form').find('#full_name').val();
		var email 			=  $('#profile_update_form').find('#email').val();
		var phone 			=  $('#profile_update_form').find('#phone').val();
		var role_id 		=  $('#profile_update_form').find('#role').val();
		var company_name 	=  $('#profile_update_form').find('#company_name').val();

		var url 			= '/updateUser';

		$.ajax({
            url: url,
            type: "POST",
            dataType: 'json',
            data: {
            	"id"			: id,
                "full_name"		: full_name,
                "email"			: email,
                "role_id"		: role_id,
                "phone"			: phone,
                "company_name"	: company_name,
                '_token'		: $('input[name="_token"]').val()
            },
            success: function (data) {
            	console.log(data);
            	if(data.success == true) {
            		$(".errors").html("");
            		$(".errors").append('<p class="alert alert-success">User Created Successfully</p>');
            		$('#user_name,#profile_name').text(data.user.full_name);
            		$('#user_email,profile_email').text(data.user.email);
            		$('#user_phone,profile_phone').text(data.user.phone);
            	}else if(data.errors) {
                	$(".errors").html("");
                	$.each(data.errors, function(key, error){
                		$(".errors").append('<p class="alert alert-danger">'+error+'</p>');
                	});
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
	});

	// Show the Task Edit Modal
	$(document).on("click",".edit_user", function(e){
		e.preventDefault();
		var id 	= $(this).data('id');
		var url = '/getUser';
		$.ajax({
            url: url,
            type: "POST",
            dataType: 'json',
            data: {
                'id' 	: 	id,
                '_token': 	$('input[name="_token"]').val()
            },
            success: function (result) {
            	console.log(result);
                if(result.success == true){
                	$(".errors").html("");

                	var id = (result.user.id) ? result.user.id : "";
					var full_name = (result.user.full_name) ? result.user.full_name  : "";
					var username = (result.user.username) ? result.user.username : "";
					var email = (result.user.email) ? result.user.email : "";
					var role = (result.current_roles[0].id) ? result.current_roles[0].id : "";
					var phone = (result.user.phone) ? result.user.phone : "";
					var company_name = (result.user.company_name) ? result.user.company_name : "";

					$('#update_user').find('#user_id').val(id);
					$('#update_user').find('#row_id').val(id);
					$('#update_user').find('#update_full_name').val(full_name);
					$('#update_user').find('#update_username').val(username);
					$('#update_user').find('#update_email').val(email);
					$('#update_user').find('#update_role').val(role);
					$('#update_user').find('#update_phone').val(phone);
					$('#update_user').find('#update_company_name').val(company_name);

					
                }else if(result.errors){
                	$.each(result.errors, function(key, error){
                		alert(error);
                	});
                }
            },
            error: function (result) {
                console.log(result);
            }
        });
	});

	$(document).on("submit","#update_user", function(){
		event.preventDefault();
		console.log("submitted");
		var form 		= $(this);
	    var formData 	= new FormData(form[0]);
	    var action 		= $(this).attr('action');
	    $.ajax({
	        url: action,
	        type: 'POST',
	        dataType: 'json',              
	        data: formData,
	        contentType: false,
	        cache: false,
	        processData: false,
	        success: function(data)
	        {
	        	console.log(data);

	            if(data.success == true) {
            		$(".errors").html("");
            		$(".errors").append('<p class="alert alert-success">User Updated Successfully</p>');			
					
					var id 				= (data.user.id) ? data.user.id : "";
					var fullName 		= (data.user.full_name) ? data.user.full_name : "";
					var email 			= (data.user.email) ? data.user.email : "";
					var image 			= (data.user.image) ? data.user.image : "avatar.png";
					var phone 			= (data.user.phone) ? data.user.phone : "";
					var role 			= (data.role.name) ? data.role.name : "";
					var company 		= (data.user.company_name) ? data.user.company_name : "";
					var joining_date	= (data.user.created_at) ? data.user.created_at : "";

					var name;

					if( data.user.image != 'avatar.png' ) {
						name 		= '<a href="/profile/'+id+'"><img src="'+data.image_path+data.user.username+'/'+image+'" alt="user" class="rounded-circle" width="30" />'+ fullName +'</a>';
					}else {
						name 		= '<a href="/profile/'+id+'"><img src="'+data.image_path+'avatar.png'+'" alt="user" class="rounded-circle" width="30" />'+ fullName +'</a>';
					}

					var checkBtn 	= '<div class="custom-control custom-checkbox">'+
                            	    	'<input type="checkbox" class="custom-control-input" id="customControlValidation2" required>'+
                             	    	'<label class="custom-control-label" for="customControlValidation2"></label>'+
                             		'</div>';

					var viewBtn 	= '<button class="btn btn-md btn-success view_user" data-toggle="modal" data-target="#viewUserModal" data-id="'+ id +'"><i class="fas fa-eye" aria-hidden="true"></i></button> ';					
					var editBtn 	= '<button class="btn btn-md btn-success edit_user" data-toggle="modal" data-target="#updateUserModel" data-id="'+ id +'"><i class="fas fa-edit" aria-hidden="true"></i></button> ';
					var deleteBtn 	= '<button class="btn btn-md btn-danger delete_user" data-id="'+id+'"><i class="fas fa-trash"></i></button> ';
                    var action 		= viewBtn+editBtn+deleteBtn;

                    var row 		= $('#row_'+id);

                    $('.user_table').DataTable().row(row).remove().draw();

					var newRow = $('.user_table').DataTable().row.add([
					  checkBtn, name, email, phone, role, company, joining_date, action
					]).draw(false).node();

					newRow.attr('id', 'row_'+id);
					// console.log(lastAddedRow);
					// console.log(lastAddedRow.node());
					// console.log(newIndex);

					$('#update_user_submit').click();

            	}else if(data.errors) {
                	$(".errors").html("");
                	$.each(data.errors, function(key, error){
                		$(".errors").append('<p class="alert alert-danger">'+error+'</p>');
                	});
                }
	        },
	        error: function(data)
	        {
	            console.log(data);
	        }
	    });
	});

	/*
	 * Order
	 */
	$('#create_task').on("submit", function(event) {
	    event.preventDefault();
	    var form 		= $(this)[0];
	    var formData 	= new FormData(form);
	    var action 		= $(this).attr('action');
	    $.ajax({
	        url: action,
	        type: 'POST',
	        dataType: 'json',              
	        data: formData,
	        contentType: false,
	        cache: false,
	        processData: false,
	        success: function(result)
	        {
	        	console.log(result);
	            // location.reload();

	            if(result.success == true) {
            		$(".errors").html("");
            		$(".errors").append('<p class="alert alert-success">Task Created Successfully</p>');
					form.reset();

					var id 				= (result.task.id) ? result.task.id : "";
					var type 			= (result.type.name) ? '<a href="/task/'+id+'">'+ result.type.name +'</a>' : "";
					var client 			= (result.client.full_name) ? result.client.full_name : "";
					var writer 			= (result.writer) ? result.writer.full_name : "";
					var manager 		= (result.manager) ? result.manager.full_name : "";
					var instructions 	= (result.task.instructions) ? result.task.instructions : "";
					var deadline 		= (result.task.deadline) ? result.task.deadline : "";
					var status 			= (result.status.name) ? result.status.name : "";
					var created_at 		= (result.task.created_at) ? result.task.created_at : "";

					var checkBtn 		= '<div class="custom-control custom-checkbox">'+
                            	    			'<input type="checkbox" class="custom-control-input" id="customControlValidation2" required>'+
                             	    			'<label class="custom-control-label" for="customControlValidation2"></label>'+
                             				'</div>';

					var deleteBtn 		= '<button class="btn btn-md btn-danger delete_task" data-id="'+id+'"><i class="fas fa-trash"></i></button> ';
					var editBtn 		= '<button class="btn btn-md btn-success edit_task" data-toggle="modal" data-target="#updateTaskModal" data-id="'+ id +'"><i class="fas fa-edit" aria-hidden="true"></i></button>';
					var viewBtn 		= '<button class="btn btn-md btn-success view_task" data-toggle="modal" data-target="#viewTaskModal" data-id="'+ id +'"><i class="fas fa-eye" aria-hidden="true"></i></button>';
                            		
					var action 			= "";

					if(result.role.slug == 'client'){
						action = action + viewBtn;

						if(result.status.slug != 'approved' ) {
							action = action + editBtn;
						}

						if (result.status.slug == 'pending') {
							action = action + deleteBtn;
						}
					}else if (result.role.slug == 'admin') {
						action = viewBtn + editBtn + deleteBtn;
					}
					$('.task_table').DataTable().row.add([
					  checkBtn, type, instructions, client, writer, manager, deadline, status, created_at, action
					]).draw();

            	}else if(result.errors) {
                	$(".errors").html("");
                	$.each(result.errors, function(key, error){
                		$(".errors").append('<p class="alert alert-danger">'+error+'</p>');
                	});
                }
	        },
	        error: function(data)
	        {
	            console.log(data);
	        }
	    });
	});

	$(document).on("click",".view_task", function(e){
		e.preventDefault();
		var id 	= $(this).data('id');
		// console.log(id);
		var url = '/getAjaxTask';
		$.ajax({
            url: url,
            type: "POST",
            dataType: 'json',
            data: {
                'id' : id,
                '_token': $('input[name="_token"]').val()
            },
            success: function (result) {
            	console.log(result);
                if(result.success == true){
                	$(".errors").html("");

                	$('.viewTaskContent').html(result.view);

					
                }else if(result.errors){
                	$.each(result.errors, function(key, error){
                		alert(error);
                	});
                }
            },
            error: function (result) {
                console.log(result);
            }
        });
	});

	// Show Edit Option
	$(document).on("click",".edit_task", function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var url = '/getTask';
		$.ajax({
            url: url,
            type: "POST",
            dataType: 'json',
            data: {
                'id' : id,
                '_token': $('input[name="_token"]').val()
            },
            success: function (result) {
            	console.log(result);
                if(result.success == true){
                	$(".errors").html("");

                	var id = (result.task.id) ? result.task.id : "";
					var type = (result.type.id) ? result.type.id  : "";
					var client = (result.client.id) ? result.client.id : "";
					var writer = (result.writer) ? result.writer.id : "";
					var manager = (result.manager) ? result.manager.id : "";
					var instructions = (result.task.instructions) ? result.task.instructions : "";
					var deadline = (result.task.deadline) ? result.task.deadline : "";
					var status = (result.status.id) ? result.status.id : "";
					var created_at = (result.task.created_at) ? result.task.created_at : "";
					var samples = (result.task.samples) ? result.task.samples : "";

					$('#update_task').find('#task_id').val(id);
					$('#update_task').find('#type').val(type);
					$('#update_task').find('#client').val(client);
					$('#update_task').find('#writer').val(writer);
					$('#update_task').find('#manager').val(manager);
					$('#update_task').find('#update_instructions').val(instructions);
					$('#update_task').find('#deadline').val(deadline);
					$('#update_task').find('#status').val(status);
					$('#update_task').find('#update_samples').val(samples);

					tinymce.get('update_instructions').setContent(instructions);
					tinymce.get('update_samples').setContent(samples);

					
                }else if(result.errors){
                	$.each(result.errors, function(key, error){
                		alert(error);
                	});
                }
            },
            error: function (result) {
                console.log(result);
            }
        });
	});

	// Update Task
	$('#update_task').on("submit", function(event) {
	    event.preventDefault();
	    var form = $(this)[0];
	    var formData = new FormData(form);
	    var action = $(this).attr('action');
	    $.ajax({
	        url: action,
	        type: 'POST',
	        dataType: 'json',              
	        data: formData,
	        contentType: false,
	        cache: false,
	        processData: false,
	        success: function(result)
	        {
	        	console.log(result);
	            // location.reload();

	            if(result.success == true) {
            		$(".errors").html("");
            		$(".errors").append('<p class="alert alert-success">Task Updated Successfully</p>');
					form.reset();

					var id = (result.task.id) ? result.task.id : "";
					var type = (result.type.id) ? result.type.id  : "";
					var client = (result.client.id) ? result.client.id : "";
					var writer = (result.writer) ? result.writer.id : "";
					var manager = (result.manager) ? result.manager.id : "";
					var instructions = (result.task.instructions) ? result.task.instructions : "";
					var deadline = (result.task.deadline) ? result.task.deadline : "";
					var status = (result.status.id) ? result.status.id : "";
					var created_at = (result.task.created_at) ? result.task.created_at : "";
					var samples = (result.task.samples) ? result.task.samples : "";

					$('#update_task').find('#task_id').val(id);
					$('#update_task').find('#type').val(type);
					$('#update_task').find('#client').val(client);
					$('#update_task').find('#writer').val(writer);
					$('#update_task').find('#manager').val(manager);
					$('#update_task').find('#update_instructions').val(instructions);
					$('#update_task').find('#deadline').val(deadline);
					$('#update_task').find('#status').val(status);
					$('#update_task').find('#update_samples').val(samples);

					tinymce.get('update_instructions').setContent(instructions);
					tinymce.get('update_samples').setContent(samples);

            	}else if(result.errors) {
                	$(".errors").html("");
                	$.each(result.errors, function(key, error){
                		$(".errors").append('<p class="alert alert-danger">'+error+'</p>');
                	});
                }
	        },
	        error: function(data)
	        {
	            console.log(data);
	        }
	    });
	});

	// Delete Task
	$(document).on("click", ".delete_task", function(event){
		event.preventDefault();
	    swal({
	      title: 'Are you sure?',
	      text: "You won't be able to revert this!",
	      type: 'warning',
	      showCancelButton: true,
	      confirmButtonColor: '#DD6B55',
	      confirmButtonText: 'Yes, delete it!'
	    }).then((result) => {
	      if (result.value) {
	      	var parent = $(this).closest('td').parent();
			var id = $(this).data('id');
			var url = '/deleteTask';

			$.ajax({
	            url: url,
	            type: "POST",
	            dataType: 'json',
	            data: {
	                'id' : id,
	                '_token': $('input[name="_token"]').val()
	            },
	            success: function (data) {
	            	console.log(data);
	                if(data.success == true){
	                	parent.remove();
	                	swal(
	                	  'Deleted!',
	                	  'The task has been deleted.',
	                	  'success'
	                	);
	                }else if(data.errors){
	                	$.each(data.errors, function(key, error){
	                		alert(error);
	                	});
	                }
	            },
	            error: function (data) {
	                console.log(data);
	            }
	        });
	      }
	    });
	});
	// End

	$(document).on("submit",'.add_setting', function(e){
		e.preventDefault();
		var form = $(this);
		var formData = new FormData(form[0]);

		var inputType = form.find('.setting_key').attr('type');

		var setting_key = form.find('.setting_key').data('key');
		var setting_value = form.find('.setting_key').val();

		formData.append("key", setting_key);
		formData.append("value", setting_value);

		console.log(setting_value);

		var action = '/addSetting';
		if( inputType == 'file' ) {

			$.ajax({
	            url: action,
	            type: 'POST',
	            dataType:"json",
	            data: formData,
	            contentType: false,
	        	cache: false,
	        	processData: false,
	            success:function(data){
	                if(data.success == true){
	                	console.log(data);
	                  	$(".errors").html("");
	                  	$(".errors").append('<p class="alert alert-success">'+data.message+'</p>').fadeIn().delay(3000).fadeOut("slow");
	                  	form.find('.setting_key').val(data.setting.value);
	                }else if(data.errors){
	                    $(".errors").html("");
	                  $.each(data.errors, function(key, error){
	                        $(".errors").append('<p class="alert alert-danger">'+error+'</p>');
	                    });
	                }
	            }

	        });
		}else {
			$.ajax({
	            url: action,
	            type: 'POST',
	            dataType:"json",
	            data:{
	            	"key" : setting_key,
	                "value": setting_value,
	                '_token': $('input[name="_token"]').val()
	            },
	            success:function(data){
	                if(data.success == true){
	                	console.log(data);
	                  	$(".errors").html("");
	                  	$(".errors").append('<p class="alert alert-success">'+data.message+'</p>').fadeIn().delay(3000).fadeOut("slow");
	                  	form.find('.setting_key').val(data.setting.value);
	                }else if(data.errors){
	                    $(".errors").html("");
	                  $.each(data.errors, function(key, error){
	                        $(".errors").append('<p class="alert alert-danger">'+error+'</p>');
	                    });
	                }
	            }

	         });
		}
		
	});


//service section


  $("#addService").on("submit", function(e){
        e.preventDefault();
        var service_name   =   $("#service_name").val();
        var service_icon   =   $('#service_icon').val();
        var service_text   =   $("#service_text").val();
        var service_button =   $("#service_button").val();
        var service_action =   $("#service_action").val();
        var publication_status = $("#publication_status").val();

       // console.log(publication_status);
         var url = $(this).attr("action");
         var method = $(this).attr("method");
       $.ajax({
            url :url,
            type:method,
            dataType:"json",
            data:{
               "service_name":service_name,
               "service_icon":service_icon,
               "service_text":service_text,
               "service_button":service_button,
               "service_action":service_action,
               "publication_status":publication_status,
               '_token': $('input[name="_token"]').val()
            },
            success:function(data){
                 console.log(data);

                if(data.success==true){
                    $(".errors").html("");
                    $(".errors").append('<p class="alert alert-success">Save Successfully</p>');
                    $("#service_name").val("");
                    $('#service_icon').val("");
                    $("#service_text").val("");
                    $("#service_button").val("");
                    $("#service_action").val("");
                    $("#publication_status").val("");

                }else if(data.errors==false){
                      $(".errors").html("");
                      $.each(data.errors, function(key, error){
                        $(".errors").append('<p class="alert alert-danger">'+error+'</p>');

                      })

                }

            }


       });



  })

   


 


   

    

 







//project section

// $("#addProject").on('submit',function(e){
//     e.preventDefault();
//       var project_name = $("#project_name").val();
//       var project_description = $("#project_description").val();
//       var project_image = $("#project_image").val();
//       var project_button = $("#project_button").val();
//       var project_action = $("#project_action").val();
//       var publication_status = $("#publication_status").val();

//       var url = $(this).attr("action");
//       var method= $(this).attr("method");
//        $.ajax({
//             url :url,
//             type:method,
//             dataType:"json",
//             data:{
//                "project_name":project_name,
//                "project_description":project_description,
//                "project_image":project_image,
//                "project_button":project_button,
//                "project_action":project_action,
//                "publication_status":publication_status,
//                '_token': $('input[name="_token"]').val()
//             },
//             success:function(data){
//                  console.log(data);

//                 if(data.success==true){
//                    $(".errors").html("");
//                    $(".errors").append('<p class="alert alert-success">Upload Successfully</p>');
//                    $("#project_name").val("");
//                    $("#project_description").val("")
//                    $("#project_image").val("");
//                    $("#project_button").val("");
//                    $("#project_action").val("");
//                    $("#publication_status").val("");


//                 }else if(data.errors==false){
//                       $(".errors").html("");
//                       $.each(data.errors, function(key, error){
//                         $(".errors").append('<p class="alert alert-danger">'+error+'</p>');

//                       })

//                 }

//             }


//        });



//    });


  
   



 


  $("#addPackAgeFaq").on("submit",function(e){
    e.preventDefault();
      
       var faq_question = $("#faq_question").val();
       var faq_answer = $("#faq_answer").val();
       var publication_status = $("#publication-status").val();
        var url = $(this).attr("action");
        var method = $(this).attr("method");
        //console.log(publication_status);

       $.ajax({
            url :url,
            type:method,
            dataType:"json",
            data:{
               "faq_question":faq_question,
               "faq_answer":faq_answer,
               "publication_status":publication_status,
               '_token': $('input[name="_token"]').val()
            },
            success:function(data){
                 console.log(data);

                if(data.success==true){
                    $(".errors").html("");
                    $(".errors").append('<p class="alert alert-success">Save Successfully</p>');
                    $("#faq_question").val("")
                    $("#faq_answer").val("");
                    $("#publication_status").val("");

                }else if(data.errors==false){
                      $(".errors").html("");
                      $.each(data.errors, function(key, error){
                        $(".errors").append('<p class="alert alert-danger">'+error+'</p>');

                      })

                }

            }


       });

  })

  //End
});