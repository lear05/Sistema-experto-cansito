<?php /**@author : Israel A. Flores García <Isxflogar> <isflogar0103@gmail.com>**/ ?>
<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title><?php echo $title ?></title>
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	  <!-- Bootstrap core CSS     -->
	   <link href="<?php echo base_url()?>public/lib/assets/css/bootstrap.min.css" rel="stylesheet" />
	    <!--  Light Bootstrap Dashboard core CSS    -->
	   <link href="<?php echo base_url()?>public/lib/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
	    <!--  CSS for Demo Purpose, don't include it in your project     -->
	   <link href="<?php echo base_url()?>public/lib/assets/css/demo.css" rel="stylesheet" />
	   <!--     Fonts and icons     -->
	   <link href="<?php echo base_url()?>public/lib/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	   <link href="<?php echo base_url()?>public/lib/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	   <link href="<?php echo base_url()?>public/lib/select2/css/select2.min.css" rel="stylesheet" />

	  <?php foreach($lib_css as $value){ ?>
	  <link rel="stylesheet" href="<?php echo $value ?>">
	  <?php } ?>

	  <style>
		.input-group-addon {
		    background: #E7EBEF !important;
		}
		/*.
		button{
			border-radius:0px !important;
		}

		table.dataTable>tbody>tr.child ul{
			width:100%;
		}*/

		.jqte_tool_text {
			height:25px;
		}
      .datepicker{z-index:1151 !important;}
      .sweet-alert{
         box-shadow: 0px 0px 2px #000 !important;
      }

	  </style>
	</head>

<body>
	<div class="wrapper">
		<div class="sidebar" data-color="black" data-image="">
        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->

	      <div class="logo">
	         <a href="javascript:void(0)" class="logo-text">
	              Cansito
	         </a>
	      </div>
			<div class="logo logo-mini">
				<a href="javascript:void(0)" class="logo-text">
					CAN
				</a>
			</div>

	    	<div class="sidebar-wrapper">

	            <div class="user">
	                <div class="photo">
	                    <img src="<?php echo base_url(); ?>public/img/user.jpg" />
	                </div>
	                <div class="info">
	                		<a href="javascript">
	                    <!--<a data-toggle="collapse" href="#collapseExample" class="collapsed">-->
	                        <?php echo $fullname_usu; ?>
	                        <!--<b class="caret"></b>-->
	                    </a>
	                    <div class="collapse" id="collapseExample" style="display:none">
	                        <ul class="nav">
	                            <li><a href="#">My Profile</a></li>
	                            <li><a href="#">Edit Profile</a></li>
	                            <li><a href="#">Settings</a></li>
	                        </ul>
	                    </div>
	                </div>
	            </div>

	            <ul class="nav">
	            	<?php if(count($menu)>0){
		            foreach($menu as $option_padre){
		            	if($option_padre->id_padre == 0 && $option_padre->alone == 0){
		            ?>
		            <li>
		              	<a data-toggle="collapse" href="#option<?php echo $option_padre->id_mod?>">
			              	<i class="<?php echo $option_padre->icon; ?>"></i>
			              	<p>
			              		<?php echo $option_padre->name_mod; ?>
			              		<b class="caret"></b>
			              	</p>
		              	</a>
		              	<div class="collapse" id="option<?php echo $option_padre->id_mod?>">
		              	<ul class="nav">
		             <?php
		             	foreach($menu as $option_hijo){
		             	 	if($option_hijo->id_padre == $option_padre->id_mod){
		             ?>
		                <li>
		                	<a href="<?php echo base_url().$option_hijo->url; ?>">
		                		<?php echo $option_hijo->name_mod; ?>
		                	</a>
		                </li>
		             <?php
		             		}
		             	}
		             ?>
		              	</ul>
		              	</div>
		            </li>
		            <?php
		            	}elseif($option_padre->id_padre == 0 && $option_padre->alone == 1){
		            ?>
						<li>
							<a href="<?php echo base_url().$option_padre->url;?>">
								<i class="<?php echo $option_padre->icon?>"></i>
								<p>
								<?php echo $option_padre->name_mod;?>
								</p>
							</a>
						</li>
		            <?php
		            	}
		              }
		            } ?>
	            </ul>
	    	</div>
    	</div>

		<div class="main-panel">
			<nav class="navbar navbar-default">
            <div class="container-fluid">
				<div class="navbar-minimize">
					<button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon">
						<i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
						<i class="fa fa-navicon visible-on-sidebar-mini"></i>
					</button>
				</div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="javascript:void(0)"><?php echo $nombre_modulo ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--<form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="" class="form-control" placeholder="Search...">
                        </div>
                    </form>-->

                    <ul class="nav navbar-nav navbar-right">
                    		<li>
                              <a href="<?php echo base_url(); ?>admin/salir" class="text-danger">
                                 <i class="pe-7s-close-circle"></i>
                                 Cerrar Sesión
                              </a>
                        </li>
                        <!--<li>
                            <a href="../charts.html">
                                <i class="fa fa-line-chart"></i>
                                <p>Stats</p>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-gavel"></i>
                                <p class="hidden-md hidden-lg">
                                    Actions
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Create New Post</a></li>
                                <li><a href="#">Manage Something</a></li>
                                <li><a href="#">Do Nothing</a></li>
                                <li><a href="#">Submit to live</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Another Action</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="notification">5</span>
                                <p class="hidden-md hidden-lg">
    								Notifications
    								<b class="caret"></b>
    							</p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-with-icons">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-list"></i>
                                	<p class="hidden-md hidden-lg">
			    								More
			    								<b class="caret"></b>
			    							</p>
                            </a>
                            <ul class="dropdown-menu dropdown-with-icons">
                                <li>
                                    <a href="#">
                                        <i class="pe-7s-mail"></i> Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="pe-7s-help1"></i> Help Center
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="pe-7s-tools"></i> Settings
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="#">
                                        <i class="pe-7s-lock"></i> Lock Screen
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="text-danger">
                                        <i class="pe-7s-close-circle"></i>
                                        Log out
                                    </a>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                </div>
            </div>
        	</nav>

			<div class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <div class="card" id="main-container">
                  <!--fin wrapper-->