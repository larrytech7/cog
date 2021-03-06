<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="Spreading the Good News of God"/>
    <meta name="author" content="Iceteck Inc" />
    <meta name = "format-detection" content = "telephone=no" />
    
    <title>City Of Grace - Spreading the Good News of with practice</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="<?php echo base_url('assets/materialize/css/materialize.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php echo base_url('assets/materialize/css/style.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    
    <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>"/>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/camera.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
    <style>
        h4{
            font-weight: 30px;
        }
        ul.sf-menu a{
            font-size: 30px;
        }
    </style>
</head>

<body class="page1" id="top">
    
    <header>
      <div class="container_12">
        <div style="float:right">
            <span><figcaption>
                <?php
                 if(isset($quotes) && array_key_exists(0, $quotes)){
                    try{
                        echo $quotes[0]['message'];
                    }catch(Exception $e){
///                        Logger->log_exception();
                    }
                 }
                ?>
            </figcaption>
             </span>
        </div>
        <div class="grid_12">
            
          <h1 class="logo">
            <a href="<?php echo site_url(); ?>">
              LIGHT
              <span>City of Grace</span>
            </a>
          </h1>
            
        </div>
        <div class="clear"></div>
      </div>
      <section id="stuck_container">
      <!--==============================
                  Stuck menu
      =================================-->
        <div class="container_12">
            <div class="grid_12">          
              <div class="navigation">
                <nav>
                  <ul class="sf-menu">
                   <li class="<?php echo $current == 'home'?'current':''; ?>"><a href="<?php echo site_url(); ?>">Home</a></li>
                   <li class="<?php echo $current == 'about'?'current':''; ?>"><a href="<?php echo site_url('welcome/about'); ?>">About</a></li>
                   <li class="<?php echo $current == 'mission'?'current':''; ?>"><a href="<?php echo site_url('welcome/mission'); ?>">Mission</a></li>
                   <li class="<?php echo $current == 'testimony'?'current':''; ?>"><a href="<?php echo site_url('welcome/testimony'); ?>">Testimony</a></li>
                   <li class="<?php echo $current == 'contact'?'current':''; ?>"><a href="<?php echo site_url('welcome/contacts'); ?>">Contacts</a></li>
                   <li><a href="#login" class="modal-trigger">Admin Login</a></li>
                 </ul>
                </nav>
                <div class="clear"></div>
              </div>       
             <div class="clear"></div>  
         </div> 
         <div class="clear"></div>
        </div> 
      </section>
    </header>
   