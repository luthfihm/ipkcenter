<h1>Settings <small>Change Your Username & Password</small></h1>
<ol class="breadcrumb">
    <li><a href="<?php echo base_url('admin/main'); ?>"><i class="icon-dashboard"></i> Dashboard</a></li>
    <li class="active"><i class="fa fa-cog"></i> Settings</li>
</ol>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<form class="form-horizontal" role="form" id="change_form">
			<div class="form-group">
				<label for="username" class="col-sm-3 control-label">Username</label>
    		    <div class="col-sm-8">
    		    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo $this->session->userdata('username_admin'); ?>">
                </div>
			</div>
			<div class="form-group" id="group-old-pass">
				<label for="old_pass" class="col-sm-3 control-label">Old Password</label>
				<div class="col-sm-8">
					<input type="password" name="old_pass" class="form-control" id="old_pass" placeholder="Old Password">
      				<span class="fa fa-warning-sign form-control-feedback" id="pass_wrong" style="display:none"></span>
    			</div>
			</div>
			<div class="form-group" id="group-new-pass">
				<label for="password" class="col-sm-3 control-label">New Password</label>
    			<div class="col-sm-8">
      				<input type="password" name="password" class="form-control" id="password" placeholder="New Password">
      				<span class="fa fa-warning-sign form-control-feedback" id="new_wrong" style="display:none"></span>
    			</div>
			</div>
			<div class="form-group" id="group-pass1">
				<label for="password1" class="col-sm-3 control-label">Re-type Password</label>
    			<div class="col-sm-8">
      			    <input type="password" name="password1" class="form-control" id="password1" placeholder="Re-type Password">
      				<span class="fa fa-warning-sign form-control-feedback" id="pass1_wrong" style="display:none"></span>
    			</div>
			</div>
			<div class="form-group">
    			<div class="col-sm-offset-3 col-sm-2">
      				<button type="submit" class="btn btn-default btn-lg">Change</button>
    			</div>
    		    <div class="col-sm-6" id="CallBack">
    						
    			</div>
  			</div>

		</form>

	</div>
	<div class="col-md-3"></div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var class_error = "has-error has-feedback";
		$("#change_form").submit(function(){
			$("#new_wrong").css("display","none");
			$("#group-new-pass").removeClass(class_error);
			$("#pass1_wrong").css("display","none");
			$("#group-pass1").removeClass(class_error);
			$("#pass_wrong").css("display","none");
			$("#group-old-pass").removeClass(class_error);
			$.ajax({
				type	: "POST",
				url 	: "<?php echo base_url('ajax/cek_pass'); ?>",
				data	: {
					username : "<?php echo $this->session->userdata('username_admin'); ?>",
					password : $("#old_pass").val()
				},
				success	: function(html){
					if (html == 'true'){
						var pass = $("#password").val();
						var pass1 = $("#password1").val();
						if (pass == ""){
							$("#new_wrong").css("display","block");
							$("#group-new-pass").addClass(class_error);
							$("#password").focus();
						}else if (pass != pass1){
							$("#pass1_wrong").css("display","block");
							$("#group-pass1").addClass(class_error);
							$("#password1").focus();	
						}else{
							var user = $("#username").val();
							$.ajax({
								type	: "POST",
								url 	: "<?php echo base_url('ajax/change_pass'); ?>",
								data	: {
									username : user,
									password : pass
								},
								success : function(html){
									if (html == "true"){
										$("#CallBack").html("<div class='alert alert-success'>Success! Please login again!</div>");
										window.location = "<?php echo base_url('admin/logout'); ?>";
									}else{
										$("#CallBack").html("<div class='alert alert-danger'>Gagal!</div>");
									}
								}
							});
						}
					}else{
						$("#pass_wrong").css("display","block");
						$("#group-old-pass").addClass(class_error);
						$("#old_pass").focus();
					}
				}
			});
			return false;
		});
	});
</script>