<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Jan Jagaran</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/ionicons.min.css');?>">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
		<style>
		.box
		{
			border-top:0px !important;
			
		}
		.content
		{
			padding-left:0px !important;
			padding-right:0px !important;
		}
		</style>
    </head>
    
    <body class="hold-transition skin-blue" style="max-width:500px;">
        <div class="wrapper">
              <header class="main-header">
                <!-- Logo -->
                <a href="" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">Jan Jagaran</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">Jan Jagaran</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="display:none">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu isCheckedIn">
                        <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo site_url('resources/img/Jan-Jagaran-App-Icon.png');?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Welcome !!! </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo site_url('resources/img/Jan-Jagaran-App-Icon.png');?>" class="img-circle" alt="User Image">

                                    <p >
                                       <span class="checked_in_name_cls"> </span>
                                        <small class="checked_in_datetime_cls"></small>
                                    </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left" style="display:none">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div style="text-align:center">
                                            <a href="#" onclick="return destroylocalstorage()" class="btn btn-default btn-flat isCheckedIn-CheckOutBtn">Check Out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
         <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="margin-left:0px">
                <!-- Main content -->
                <section class="content" style="padding-top:0px">
                    <?php                    
                    if(isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>                    
                </section>
                <!-- /.content -->
            </div>
       

 
      
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>
        <!-- FastClick -->
        <script src="<?php echo site_url('resources/js/fastclick.js');?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo site_url('resources/js/app.min.js');?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo site_url('resources/js/demo.js');?>"></script>
        <!-- DatePicker -->
        <script src="<?php echo site_url('resources/js/moment.js');?>"></script>
        <script src="<?php echo site_url('resources/js/bootstrap-datetimepicker.min.js');?>"></script>
        <script src="<?php echo site_url('resources/js/global.js');?>"></script>

		<script>
		function destroylocalstorage(){
			localStorage.clear();
			window.location.reload();
		}
		// Check browser support
		if (typeof(Storage) !== "undefined") {
	
		//const is_volunteer_just_checkedin=  <?php echo $this->session->has_userdata('is_volunteer_just_checkedin')?>;
			//if(is_volunteer_just_checkedin==="" ||is_volunteer_just_checkedin===" " || is_volunteer_just_checkedin===null)
			if("<?php echo $this->session->has_userdata('is_volunteer_just_checkedin')?>"!=="")			
			{	

			// Store
			localStorage.setItem("is_checked_in", true);
			var currentdate = new Date(); 		
			const checked_in_datetime=((currentdate.getDate() < 10)?"0":"") + currentdate.getDate() +"/"+(((currentdate.getMonth()+1) < 10)?"0":"") + (currentdate.getMonth()+1) +"/"+ currentdate.getFullYear() +"@"+
			((currentdate.getHours() < 10)?"0":"") + currentdate.getHours() +":"+ ((currentdate.getMinutes() < 10)?"0":"") + currentdate.getMinutes() +":"+ ((currentdate.getSeconds() < 10)?"0":"") + currentdate.getSeconds();
			
			localStorage.setItem("checked_in_datetime", checked_in_datetime	);			
			localStorage.setItem("checked_in_name", "<?php echo $this->session->userdata('checked_in_name')?>");
			localStorage.setItem("added_by", "<?php echo $this->session->userdata('added_by')?>");
			localStorage.setItem("zilla_id", "<?php echo $this->session->userdata('zilla_id')?>");
			
				$('.checked_in_name_cls').text("<?php echo $this->session->userdata('checked_in_name')?>");
				$('.checked_in_datetime_cls').text(checked_in_datetime);
				$('.isCheckedIn').show();
			<?php $this->session->unset_userdata('is_volunteer_just_checkedin');?>				
			}			
			else if( "zilla_id" in localStorage && "added_by" in localStorage  )
			{
				console.log("before checked in and exist");
				$('.checked_in_name_cls').text(localStorage.getItem("checked_in_name"));
				$('.checked_in_datetime_cls').text(localStorage.getItem("checked_in_datetime"));
				$('#added_by').text(localStorage.getItem("added_by"));
				
				$('.isCheckedIn').show();
				//var zilla = localStorage.getItem("zilla_id");
				//window.location.href = "<?php echo site_url('web/contact/"+zilla+"'); ?>";
			}
			else
			{
				console.log("not checkedin");
				if(window.location.href!=="<?php echo site_url('web'); ?>")
				window.location.href = "<?php echo site_url('web'); ?>";
			}
		} else {
		document.getElementById("isCheckedIn-Name").innerHTML = "Sorry, your browser does not support Web Storage...";
		}
		
		var seconds = 5;
        setTimeout(function () {
            document.getElementById("message").style.display = "none";
        }, seconds * 1000);
	</script>

    </body>
</html>
