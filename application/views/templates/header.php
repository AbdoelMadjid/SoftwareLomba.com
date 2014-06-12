<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url();?>public/image/favicon.ico">

    <title>Software Nominasi Kicau Mania</title>
     <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
      <link rel="stylesheet" href="<?php base_url(); ?>ckfinder/ckfinder.js">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>/public/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>/public/css/carousel.css" rel="stylesheet">
  </head>
  

  <body>
  
    <!-- Logo
================================================== -->
	
  <!-- NAVBAR
================================================== -->
    <div class="navbar-wrapper">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url();?>event">Event Lomba</a></li>
                <li><a href="<?php echo base_url();?>pages/maintenance">Laporan Lomba</a></li>
                <li><a href="<?php echo base_url();?>pages/maintenance">Pendaftaran Lomba Online</a></li>
              </ul>
			        <ul class="nav navbar-nav navbar-right">
        				<li><a href="http://www.kicaumania.or.id" target="_blank">Kicaumania</a></li>
                <li><a href="<?php echo base_url();?>blog" target="_blank">Berita</a></li>
                        
        			  	<?php  $ci =& get_instance(); $user=$ci->session->userdata('logged_in'); $username = $user['username'];
        				if(!empty($username)){?>
        					<li class="dropdown">
                    <a  href="#" class="dropdown-toggle" data-toggle="dropdown">Profile <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#addNews">Tambah Berita</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#addTeam">Tambah Team</a></li>
                        <li><a href="<?php echo base_url() . "login/logout";?>">Logout</a></li>
                    </ul>
                  </li>
        				<?php }else{?>
        				<li><a href="<?php echo base_url();?>login">Login</a></li>
        				<?php }?>
        				<li><a href="<?php echo current_url();?>">Refresh</a></li>
				      </ul>
            </div>
          </div>
        </div>

      </div>
    </div>