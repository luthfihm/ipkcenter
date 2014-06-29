<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>IPKCenter - Administrator</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('assets/sb-admin/css/bootstrap.css'); ?>" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="<?php echo base_url('assets/sb-admin/css/sb-admin.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/sb-admin/font-awesome/css/font-awesome.min.css'); ?>">

        
        <!-- JavaScript -->
        <script src="<?php echo base_url('assets/sb-admin/js/jquery-1.10.2.js'); ?>"></script>
        <script src="<?php echo base_url('assets/sb-admin/js/bootstrap.js'); ?>"></script>
        <!-- TinyMCE -->
        <script src="<?php echo base_url('tinymce/jquery.tinymce.min.js'); ?>"></script>
	    <script src="<?php echo base_url('tinymce/tinymce.min.js'); ?>"></script>
	    <script type="text/javascript">
	        $(document).ready(function(){
	            $('.tinymce').tinymce({
	                theme : "modern",
	                menubar : false,
				    plugins: [
			            "code advlist autolink link image lists charmap preview hr anchor pagebreak",
			            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking fullscreen",
			            "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
			   	    ],

    			    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    			    relative_urls : false,
    			    image_advtab: true,
    			    browser_spellcheck : true ,
    			    external_filemanager_path:"<?php echo base_url('filemanager') ?>/", 
				    filemanager_title:"Filemanager" , 
				    external_plugins: { "filemanager" : "<?php echo base_url('tinymce/plugins/responsivefilemanager/plugin.min.js') ?>"},
	            });
            });
	    </script>
    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>" target="_blank">IPKCenter</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="<?php if ($content == 'admin/main') echo 'active'; ?>"><a href="<?php echo base_url('admin/main'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="<?php if ($content == 'admin/new') echo 'active'; ?>"><a href="<?php echo base_url('admin/new_event'); ?>"><i class="fa fa-edit"></i> New Event</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
            
            
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            $this->load->view($content);
                        ?>
                    </div>
                </div><!-- /.row -->

            </div><!-- /#page-wrapper -->

        </div><!-- /#wrapper -->
    </body>
</html>