<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="Spreading the Good News of God"/>
    <meta name="author" content="Iceteck" />
    <meta name = "format-detection" content = "telephone=no" />
    
    <title>City Of Grace - Spreading the Good News of with practice</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="http://localhost/cog/assets/materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="http://localhost/cog/assets/materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    
    <link rel="icon" href="http://localhost/cog/assets/images/favicon.ico"/>
    <link rel="shortcut icon" href="http://localhost/cog/assets/images/favicon.ico" />
    <link rel="stylesheet" href="http://localhost/cog/assets/css/owl.carousel.css"/>
    <link rel="stylesheet" href="http://localhost/cog/assets/css/camera.css"/>
    <link rel="stylesheet" href="http://localhost/cog/assets/css/style.css"/>
    <style>
        h4{
            font-weight: 30px;
        }
        ul.sf-menu a{
            font-size: 30px;
        }
    </style>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #6B7494;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
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
            <a href="http://localhost/cog">
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
                   <li class="<?php echo 'current'; ?>"><a href="<?php echo "http://localhost/cog/index.php"; ?>">Home</a></li>
                   <li class=""><a href="<?php echo "http://localhost/cog/index.php/welcome/about"; ?>">About</a></li>
                   <li class=""><a href="<?php echo 'http://localhost/cog/index.php/welcome/mission'; ?>">Mission</a></li>
                   <li class=""><a href="<?php echo 'http://localhost/cog/index.php/welcome/testimony'; ?>">Testimony</a></li>
                   <li class=""><a href="<?php echo 'http://localhost/cog/index.php/welcome/contacts'; ?>">Contacts</a></li>
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
	<div id="container" class="black-text">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div>
    <footer id="footer">
      <div class="container_12">
        <div class="grid_12"> 
          <h1 class="logo">
            <a href="http://localhost/cog/">
              LIGHT
            </a>
          </h1>
          <div class="socials">
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-google-plus"></a>
            <a href="#" class="fa fa-youtube"></a>
          </div>
          <div class="sub-copy">&copy; <span id="copyright-year"></span>| <a href="#">Privacy Policy</a> <br/> Website designed by <a href="http://www.iceteck.com/" rel="nofollow" target="_blank">Iceteck.com</a></div>
        </div>
        <div class="clear"></div>
      </div>  
    </footer>
      <!--  Scripts -->
    <script src="<?php echo 'http://localhost/cog/assets/js/jquery.js'; ?>"></script>
    <script src="<?php echo 'http://localhost/cog/assets/js/jquery-migrate-1.1.1.js'; ?>"></script>
    <script src="<?php echo 'http://localhost/cog/assets/js/jquery.easing.1.3.js'; ?>"></script>
    <script src="<?php echo 'http://localhost/cog/assets/materialize/js/materialize.js'; ?>"></script>
    <script src="<?php echo 'http://localhost/cog/assets/materialize/js/init.js'; ?>"></script>
    
    <script src="<?php echo 'http://localhost/cog/assets/js/script.js'; ?>"></script> 
    <script src="<?php echo 'http://localhost/cog/assets/js/superfish.js'; ?>"></script>
    <script src="<?php echo 'http://localhost/cog/assets/js/jquery.equalheights.js'; ?>"></script>
    <script src="<?php echo 'http://localhost/cog/assets/js/jquery.mobilemenu.js'; ?>"></script>
    <script src="<?php echo 'http://localhost/cog/assets/js/tmStickUp.js'; ?>"></script>
    <script src="<?php echo 'http://localhost/cog/assets/js/jquery.ui.totop.js'; ?>"></script>
    <script src="<?php echo 'http://localhost/cog/assets/js/camera.js'; ?>"></script>
</body>
</html>