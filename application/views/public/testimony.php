<section class="slider_wrapper">
</section> <br /><br /><br /><br /><br /><br />
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
                                    <th><strong>Name</strong></th>
                                    <th><strong>Testimony</strong></th>
                                    <th><strong>Media</strong></th>
                                    <th><strong>Verified</strong></th>
                                </tr>
                            </thead>
                                <?php
                                if(isset($testimonies)):
                                 foreach($testimonies as $testimony):
                                    $icon = '<span><i class="material-icons blue-text">verified_user</i></span>';
                                    echo '<tr>
                                        <td>'.$testimony['name'].'</td>
                                        <td>'.$testimony['message'].'</td>
                                        <td>'.$testimony['media'].'<img src="'.base_url('assets/images/b_icon3.png').'" alt="media testimony" class="img img-responsive" height="80"/></td>
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