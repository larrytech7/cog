
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
                <h3><i class="material-icons prefix small">edit</i> Create a new event. </h3>
                <div class="card-panel teal darken-3 responsive">
                    <div class="row ">
                              
                          <!-- Edit Profile -->
                          <div id="editprofile">
                                <?php echo validation_errors(); ?>
                              <div class="row">
                                <?php echo form_open('home/events', array('class'=>'col s12')); ?>
                                  <div class="row">
                                    <div class="input-field col s12">
                                      <i class="material-icons prefix">date</i>
                                      <input id="icon_prefix" type="date" class="datepicker" name="date" required="required"/>
                                      <label for="icon_prefix">When is the event?</label>
                                    </div>
                                  </div>
                                
                                  <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">edit</i>
                                        <textarea id="input_message" cols="100" rows="10" class="materialize-textarea" name="message" required></textarea>
                                        <label for="input_message">Event Details</label>
                                    </div>
                                  </div>
                                  <a href="<?php echo site_url('home'); ?>" class=" waves-effect waves-green btn-flat">Cancel</a>
                                  <button class="btn waves-effect waves-light teal btn-flat" type="submit" name="update">Save
                                    <i class="material-icons right">send</i>
                                    </button>
                                 </form>
                              </div>
                          </div>
                          <!-- End Edit -->
                    </div>
                </div>
        </div>
    </div>
</div>
  

