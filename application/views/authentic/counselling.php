
<div class="container">
    <div class="row">
        <div class="col s4 m4 l4">
            <ul class="collection with-header">
                <li class="collection-header"><h4><a href="<?php echo site_url('home'); ?>"><i class="material-icons small">home</i></a>Dashboard</h4></li>
                <li class="collection-item"><div>Devotional Quotes<a href="<?php echo site_url('home/quotes'); ?>" class="secondary-content"><i class="material-icons">voicemail</i></a></div></li>
                <li class="collection-item"><div>Prayer Requests<a href="<?php echo site_url('home/notifications'); ?>" class="secondary-content"><i class="material-icons">person_pin_circle</i></a></div></li>
                <li class="collection-item"><div>New Sermon<a href="#announcement" class="secondary-content waves-effect waves-light modal-trigger" ><i class="material-icons">add_circle</i></a></div></li>
                <li class="collection-item"><div>Profile<a href="<?php echo site_url('home/me'); ?>" class="secondary-content"><i class="material-icons">account_circle</i></a></div></li>
                <li class="collection-item"><div>General announcements<a href="#announce" class="secondary-content modal-trigger"><i class="material-icons">announcement</i></a></div></li>
                <li class="collection-item"><div>Events<a href="<?php echo site_url('home/events'); ?>" class="secondary-content"><i class="material-icons">event</i></a></div></li>
                <li class="collection-item"><div>Counselling<a href="<?php echo site_url('home/counsel'); ?>" class="secondary-content"><i class="material-icons">wc</i></a></div></li>
                <li class="collection-item"><div>Users<a href="<?php echo site_url('home/members'); ?>" class="secondary-content"><i class="material-icons">supervisor_account</i></a></div></li>
                <li class="collection-item"><div>Testimonies<a href="<?php echo site_url('home/testimonies'); ?>" class="secondary-content"><i class="material-icons">record_voice_over</i></a></div></li>
                <li class="collection-item"><div>Slideshow Images<a href="<?php echo site_url('home/banner'); ?>" class="secondary-content"><i class="material-icons">perm_media</i></a></div></li>
              </ul>
              
        </div>
        <div class="col s8 m8 l8">
                <h3><i class="material-icons prefix small">notifications</i> Counselling requests. </h3>
                <div class="card-panel teal darken-3 responsive">
                    <div class="row ">
                        <div class="col s12">
                          <ul class="tabs">
                            <li class="tab col s4"><a href="#test1"><i class="material-icons small">done_all</i>Read</a></li>
                            <li class="tab col s4"><a href="#test2" class="active"><i class="material-icons small">done</i>Unread</a></li>
                          </ul>
                        </div>
                        <div id="test1" class="col s12">Read content</div>
                        <div id="test2" class="col s12">
                                            <?php
                                            if(isset($counselrequests)):
                                            echo '<ul class="collection">';
                                             foreach($counselrequests as $request):
                                                $statcolor = 'teal';
                                                $statfigure = 'check_circle';
                                                 
                                                echo '<li class="collection-item avatar">
                                                        <i class="material-icons circle '.$statcolor.'">'.$statfigure.'</i>
                                                        <span class="title">Date Sent => '.$request['dateadd'].' </span>
                                                        <p>From: <b>'.$request['name'].'</b> Phone: '.$request['phone'].'<br/>
                                                        '.$request['message'].'
                                                        </p>';
                                                echo '<p class="secondary-content">
                                                        <a href="#creply"  onmouseenter="setcemail(\''.$request['email'].'\')" class="tooltipped modal-trigger" data-position="bottom" data-delay="30" data-tooltip="Reply this request"><i class="material-icons">reply_all</i></a>
                                                        <a href="'.site_url('home/deletecounsel_request/'.$request['id']).'" onclick="deletemsg(this)" class="tooltipped" data-position="top" data-delay="30" data-tooltip="Delete Request"><i class="material-icons red-text lighten-3">delete</i></a>
                                                    </p>
                                                    </li>';
                                            ?>
                                            <?php
                                                endforeach;
                                            echo '</ul>';
                                                endif;
                                            ?>
                        </div>
                  </div>
                    </div>
                </div>
        </div>
    </div>
</div>
  

