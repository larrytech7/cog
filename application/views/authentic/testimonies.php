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
                <li class="collection-item"><div>Devotional Quotes<a href="<?php echo site_url('home/quotes'); ?>" class="secondary-content"><i class="material-icons">voicemail</i></a></div></li>
                <li class="collection-item"><div>Prayer Requests<a href="<?php echo site_url('home/notifications'); ?>" class="secondary-content"><i class="material-icons">person_pin_circle</i></a></div></li>
                <li class="collection-item"><div>New Sermon<a href="#announcement" class="secondary-content waves-effect waves-light modal-trigger" ><i class="material-icons">add_circle</i></a></div></li>
                <li class="collection-item"><div>Profile<a href="<?php echo site_url('home/me'); ?>" class="secondary-content"><i class="material-icons">account_circle</i></a></div></li>
                <li class="collection-item"><div>General announcements<a href="#announce" class="secondary-content modal-trigger"><i class="material-icons">announcement</i></a></div></li>
                <li class="collection-item"><div>Events<a href="<?php echo site_url('home/events'); ?>" class="secondary-content"><i class="material-icons">event</i></a></div></li>
                <li class="collection-item"><div>Counselling<a href="<?php echo site_url('home/counsel'); ?>" class="secondary-content"><i class="material-icons">wc</i></a></div></li>
                <li class="collection-item"><div>Users<a href="<?php echo site_url('home/members'); ?>" class="secondary-content"><i class="material-icons">supervisor_account</i></a></div></li>
                <li class="collection-item"><div>Testimonies<a href="<?php echo site_url('home/testimonies'); ?>" class="secondary-content"><i class="material-icons">record_voice_over</i></a></div></li>
              </ul>
        </div>
        <div class="col s8 m8 l8">
                <h3><i class="material-icons prefix">announcement</i> Testimonies. </h3>
                <div class="card-panel teal darken-3 responsive">
                    <div class="row ">
                        <table id="ttable">
                            <thead>
                                <tr>
                                    <th>Phone</th>
                                    <th>Name</th>
                                    <th>Message</th>
                                    <th>status</th>
                                    <th>Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <?php
                                if(isset($testimonies)):
                                 foreach($testimonies as $testimony):
                                    $icon = $testimony['status'] == 0?'<span><i class="material-icons red-text">error</i></span>':'<span><i class="material-icons blue-text">verified_user</i></span>';
                                    echo '<tr>
                                        <td>'.$testimony['phone'].'</td>
                                        <td>'.$testimony['name'].'</td>
                                        <td>'.word_wrap($testimony['message']).'</td>
                                        <td>'.$icon.'</td>
                                        <td>'.$testimony['dateadd'].'</td>
                                        <td><a href="'.site_url('home/actiontestimony/confirm/'.$testimony['id']).'" title="confirm and publish testimony"><i class="material-icons blue-text">done_all</i></a>
                                        <a href="'.site_url('home/actiontestimony/refute/'.$testimony['id']).'" title="Refuse and delete testimony"><i class="material-icons red-text">delete_forever</i></a>
                                        </td>
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
    </div>
</div>
  

