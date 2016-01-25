<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>COG Admin Panel</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/loader.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php echo base_url('assets/materialize/css/materialize.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php echo base_url('assets/materialize/css/style.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
  
</head>

<body>
    <div class="navbar-fixed">
       <nav class="white" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="<?php echo site_url('home'); ?>" class="brand-logo">Administration Panel</a>
          <ul class="right hide-on-med-and-down">
            <li class="teal"><i class="material-icons small">verified_user</i></li>
            <li class="teal"><?php echo 'Welcome, '.base64_decode($this->session->userdata('user_name')); ?></li>
            <li><a href="<?php echo site_url('home/logout'); ?>"><i class="material-icons prefix">input</i></a></li>
          </ul>
          <ul id="nav-mobile" class="side-nav">
            <li><a class="waves-effect waves-light modal-trigger" href="#">Profile</a> </a></li>
            <li><a class="waves-effect waves-light modal-trigger" href="<?php echo site_url('home/logout'); ?>" >Logout </a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
      </nav>
    </div>
     