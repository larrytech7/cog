<section class="slider_wrapper">
  <div id="camera_wrap" class="">
    <div data-src="<?php echo base_url('assets/images/slide.jpg'); ?>"></div>
    <div data-src="<?php echo base_url('assets/images/slide1.jpg'); ?>"></div>
    <div data-src="<?php echo base_url('assets/images/slide2.jpg'); ?>"></div>  
  </div>  
</section> 
<!--=====================
          Content
======================-->
<section id="content"><div class="ic">Powered by <a href="https://iceteck.com" target="_blank" >Iceteck</a></div>
  <div class="container_12">
    <div class="grid_12">
      <div class="banner">
        <a href="#!" class="banner_title">Ministry<br />
Testimonies</a>
        <div class="maxheight" style="padding: 10px;">
            <table id="ttable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Testimony</th>
                                    <th>Media</th>
                                    <th>Verified</th>
                                </tr>
                            </thead>
                                <?php
                                if(isset($testimonies)):
                                 foreach($testimonies as $testimony):
                                    $icon = '<span><i class="material-icons blue-text">verified_user</i></span>';
                                    echo '<tr>
                                        <td>'.$testimony['name'].'</td>
                                        <td>'.$testimony['message'].'</td>
                                        <td>'.$testimony['media'].'<img src="'.base_url('assets/images/b_icon3.png').'" alt="" /></td>
                                        <td>'.$icon.'</td>
                                    </tr>';
                                ?>
                                <?php
                                    endforeach;
                                    endif;
                                ?>
                        </table>
        </div>
      </div>
    </div>
    
    <div class="clear"></div>
  </div>
  <div class="clear sep-1"></div>
</section>
<!--==============================