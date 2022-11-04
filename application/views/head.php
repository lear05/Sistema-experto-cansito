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
	  	<?php foreach($lib_css as $value){ ?>
	  	<link rel="stylesheet" href="<?php echo $value ?>">
	  	<?php } ?>

	  <style>
		/*.input-group-addon {
		    background: #E7EBEF !important;
		}

		button{
			border-radius:0px !important;
		}*/

		table.dataTable>tbody>tr.child ul{
			width:100%;
		}

		.jqte_tool_text {
			height:25px;
		}
	  </style>
	</head>
<body>
