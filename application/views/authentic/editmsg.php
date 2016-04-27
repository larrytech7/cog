<div class="container">
    <div class="section">

      <!-- Icon Section   -->
      <div class="row" ><a href="#getstarted"></a>
        
      </div>

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
                <li class="collection-item"><div>Users<a href="<?php echo site_url('home/members'); ?>" class="secondary-content"><i class="material-icons">supervisor_account</i></a></div></li>
                <li class="collection-item"><div>Testimonies<a href="<?php echo site_url('home/testimonies'); ?>" class="secondary-content"><i class="material-icons">record_voice_over</i></a></div></li>
              </ul>
              Account Credits available =&gt; 5000
        </div>
        <div class="col s8 m8 l8">
                <h3><i class="material-icons prefix small">mode_edit</i> Edit Message. </h3>
                <div class="card-panel teal darken-3 responsive">
                    <div class="row">
                    <?php echo form_open('home/edit', array('class'=>'col s12')); ?>
                        <input type="hidden" value="<?php echo $message[0]['id']?>" name="id" id="id"/>
                      <div class="row">
                        <div class="input-field col s8 m8 l8">
                            <i class="material-icons prefix">info</i>
                            <input type="text" name="title" id="title" value="<?php echo $message[0]['title']?>" required/>
                            <label for="title">Sermon title</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s8 m8 l8">
                          <i class="material-icons prefix">textsms</i>
                          <textarea id="icon_prefix" cols="50" rows="6" class="materialize-textarea"  name="message" value="<?php echo $message[0]['message']?>"required></textarea>
                          <label for="icon_prefix">Your message</label>
                        </div>
                      </div>
                      <button class="btn waves-effect waves-light teal btn-flat" type="submit" name="update">Update
                        <i class="material-icons right">publish</i>
                      </button>
                      <a href="<?php echo site_url('home'); ?>" class=" waves-effect waves-green btn-flat">Cancel</a>
                      </form>
                  </div>
                </div>
        </div>
    </div>
</div>
  

