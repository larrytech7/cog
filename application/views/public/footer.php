    <!-- Login -->
  <div id="login" class="modal">
    <div class="modal-content">
      <h4>Login to your dashboard</h4>
      <div class="row">
        <?php echo form_open('welcome/login', array('class'=>'col s12')); ?>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" name="userid" class="validate" required min="4"/>
              <label for="icon_prefix">Username</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">lock</i>
              <input id="icon_pass" name="userpass" type="password" class="validate" required min="4"/>
              <label for="icon_pass">Password</label>
            </div>
          </div>
      </div>
    </div>
    <div class="modal-footer">
        Powered by <a href="http://iceteck.com">Iceteck</a>
        <button class="btn waves-effect waves-light btn-flat" type="submit" name="login">Login
            <i class="material-icons right">send</i>
        </button>
    </div>
    </form>
  </div>
  <!-- End login modal -->
  <!-- Gallery modal -->
  <div id="gallery" class="modal">
    <div class="modal-content">
        <h4>Photo Gallery</h4>
        <div class="row">
            <div id="DivDockGalleryFX"></div>
        </div>
    </div>
  </div>
<footer id="footer">
  <div class="container_12">
    <div class="grid_12"> 
      <h1 class="logo">
        <a href="<?php echo site_url(); ?>">
          LIGHT
        </a>
      </h1>
      <div class="socials">
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-google-plus"></a>
        <a href="#" class="fa fa-youtube"></a>
      </div>
      <div class="sub-copy">&copy; <span id="copyright-year"></span>| <a href="#">Privacy Policy</a> <br> Website designed by <a href="http://www.iceteck.com/" rel="nofollow" target="_blank">Iceteck.com</a></div>
    </div>
    <div class="clear"></div>
  </div>  
</footer>
<a href="#" id="toTop" class="fa fa-angle-up"></a>


  <!--  Scripts -->
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-migrate-1.1.1.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.easing.1.3.js'); ?>"></script>
    <script src="<?php echo base_url('assets/materialize/js/materialize.js'); ?>"></script>
    <script src="<?php echo base_url('assets/materialize/js/init.js'); ?>"></script>
    
    <script src="<?php echo base_url('assets/js/script.js'); ?>"></script> 
    <script src="<?php echo base_url('assets/js/superfish.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.equalheights.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.mobilemenu.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/tmStickUp.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.ui.totop.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/camera.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/owl.carousel.js'); ?>"></script>
    <!-- Audio Player Plugin for the podcasts --> 
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.jplayer.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/ttw-music-player-min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/myplaylist.js'); ?>"></script>
    <!-- music player imports end -->
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="<?php echo base_url('assets/js/jquery.mobile.customized.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
    <!--<![endif]-->
    <script>
     $(window).load(function(){
      $().UItoTop({ easingType: 'easeOutQuart' });
      $('#stuck_container').tmStickUp({});  
    
      $('#camera_wrap').camera({
        loader: false,
        pagination: false ,
        minHeight: '400',
        thumbnails: false,
        height: '38.07291666666667%',
        caption: false,
        navigation: true,
        fx: 'mosaic'
      });
    
      $("#owl").owlCarousel({
        items : 3, //10 items above 1000px browser width
        itemsDesktop : [995,1], //5 items between 1000px and 901px
        itemsDesktopSmall : [767, 1], // betweem 900px and 601px
        itemsTablet: [700, 1], //2 items between 600 and 0
        itemsMobile : [479, 1], // itemsMobile disabled - inherit from itemsTablet option
        navigation : true,
        pagination :  false
      }); 
     }); 
    </script>
    <script>
    $(document).ready(function(){
        $('.modal-trigger').leanModal();
        $('select').material_select();
        $('.slider').slider({
            interval: 8000,
            height : 600
            
        });
        $('.materialboxed').materialbox();
        $('#ttable').dataTable();
    });
    </script>
    <script type="text/javascript">
   
    <?php if(isset($subscriptioninfo))
            echo 'Materialize.toast("'.$subscriptioninfo.'", 4000, "green-text");';
            
            if(isset($message))
            echo 'Materialize.toast("'.$message.'", 6000, "green-text");';
            
            if(isset($error))
            echo 'Materialize.toast("'.$error.'", 6000, "red-text");';
            
            $errs = strip_tags(validation_errors(),'br');
            if(!empty($errs))
                echo "$('#signup').openModal();";
                
            if(strlen($this->session->flashdata('success')) > 0)
                echo 'Materialize.toast("'.$this->session->flashdata('success').'", 6000, "green-text")';
            
            if(strlen($this->session->flashdata('error')) > 0)
                echo 'Materialize.toast("'.$this->session->flashdata('error').'", 6000, "red-text")';
  ?>

  </script>
  <script type="text/javascript">
        $(document).ready(function(){
            var description = 'Christ\'s sacrifice on the cross of calvary at Golgotha to liberate mankind of all Sin.';
            myPlayList = [{
                		mp3:'<?php echo base_url("assets/audio/aboveallpowers.mp3"); ?>',
                		oga:'',
                        rating:5,
                        title:'Above All Powers',
                        duration:'4:45',
                        artist:'Unknown',
                        cover:'<?php echo base_url('assets/images/page3_img1.jpg'); ?>'
                	}]
            $('div.podcastplayer').ttwMusicPlayer(myPlayList, {
                autoPlay:false, 
                description:description,
                jPlayer:{
                    swfPath:"<?php echo base_url('assets/js/Jplayer'); ?>jquery-jplayer" //You need to override the default swf path any time the directory structure changes
                }
            });
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/swfobject.js'); ?>"></script>
    <script type="text/javascript">
     var flashvars = {};
     var params = {};
     params.base = "";
     params.scale = "noscale";
     params.salign = "tl";
     params.wmode = "transparent";
     params.allowFullScreen = "true";
     params.allowScriptAccess = "always";
     swfobject.embedSWF("<?php echo base_url('assets/js/DockGalleryFX.swf'); ?>", "DivDockGalleryFX", "600", "400", "9.0.0", false, flashvars, params);
    </script>
  </body>
</html>