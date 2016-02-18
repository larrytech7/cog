<div class="container">
    <div id="loader-wrapper">
        <div id="loader"></div>
        
        <div class="loader-section section-left"></div>
        
        <div class="loader-section section-right"></div>
 
    </div>
    
</div>
<div class="container">
    <div class="row">
        <div class="col s4 m4 l4">
            <ul class="collection with-header">
                <li class="collection-header"><h4><a href="<?php echo site_url('home'); ?>"><i class="material-icons small">home</i></a>Dashboard</h4></li>
                <li class="collection-item"><div>Prayer Requests<a href="<?php echo site_url('home/notifications'); ?>" class="secondary-content"><i class="material-icons">person_pin_circle</i></a></div></li>
                <li class="collection-item"><div>New Sermon<a href="#announcement" class="secondary-content waves-effect waves-light modal-trigger" ><i class="material-icons">add_circle</i></a></div></li>
                <li class="collection-item"><div>Profile<a href="<?php echo site_url('home/me'); ?>" class="secondary-content"><i class="material-icons">account_circle</i></a></div></li>
                <li class="collection-item"><div>General announcements<a href="<?php echo site_url('home/announce'); ?>" class="secondary-content"><i class="material-icons">announcement</i></a></div></li>
                <li class="collection-item"><div>Events<a href="<?php echo site_url('home/events'); ?>" class="secondary-content"><i class="material-icons">event</i></a></div></li>
                <li class="collection-item"><div>Counselling<a href="<?php echo site_url('home/counsel'); ?>" class="secondary-content"><i class="material-icons">wc</i></a></div></li>
              </ul>
        </div>
        <div class="col s8 m8 l8">
                <h3><i class="material-icons prefix">announcement</i> Sermons. </h3>
                <div class="card-panel teal darken-3 responsive">
                    <div class="row ">
                            <ul class="collection">
                                <?php
                                if(isset($mymessages)):
                                 foreach($mymessages as $mymessage):
                                    $statcolor = 'teal';
                                    $statfigure = 'check_circle';
                                     
                                    echo '<li class="collection-item avatar">
                                            <i class="material-icons circle '.$statcolor.'">'.$statfigure.'</i>
                                            <span class="title">Date Published => '.$mymessage['date'].' </span>
                                            <p><b>'.$mymessage['title'].'</b> <br/>
                                            '.$mymessage['message'].'
                                            </p>';
                                    echo '<p class="secondary-content">
                                            <a href="'.site_url('home/edit/'.$mymessage['id']).'"  class="tooltipped" data-position="bottom" data-delay="30" data-tooltip="Edit this message"><i class="material-icons">create</i></a>
                                            <a href="'.site_url('home/delete_sermon/'.$mymessage['id']).'" onclick="deletemsg(this)" class="tooltipped" data-position="top" data-delay="30" data-tooltip="Delete "><i class="material-icons red-text lighten-3">delete</i></a>
                                        </p>
                                        </li>';
                                ?>
                                <?php
                                    endforeach;
                                    endif;
                                ?>
                                
                              </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
  

