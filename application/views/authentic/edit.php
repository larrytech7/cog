
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
                <li class="collection-item"><div>Gallery<a href="<?php echo site_url('home/gallery'); ?>" class="secondary-content "><i class="material-icons">perm_media</i></a></div></li>
              </ul>
        </div>
        <div class="col s8 m8 l8">
                <h3><i class="material-icons prefix small">account_circle</i> Edit Profile. </h3>
                <div class="card-panel teal darken-3 responsive">
                    <div class="row ">
                              
                          <!-- Edit Profile -->
                          <div id="editprofile">
                                <?php echo validation_errors(); ?>
                              <div class="row">
                                <?php echo form_open('home/edit', array('class'=>'col s12')); ?>
                                  <div class="row">
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">account_circle</i>
                                      <input id="icon_prefix" type="text" class="validate" name="username" required="" min="4"/>
                                      <label for="icon_prefix">Username</label>
                                    </div>
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">email</i>
                                      <input id="icon_email" type="email" class="validate" name="useremail" required="" />
                                      <label for="icon_email">Email</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s6">
                                      <select required name="industry">
                                        <option value="" selected>Choose your sector</option>
                                        <option value="telecommunications">Telecommunications</option>
                                        <option value="it">IT and Computing</option>
                                        <option value="agriculture">Agriculture</option>
                                        <option value="culture">Culture</option>
                                        <option value="entertainment">Entertainment</option>
                                        <option value="education">Education</option>                
                                        <option value="other">Other</option>
                                      </select>
                                      <label>Industry</label>
                                    </div>
                                    <div class="input-field col s6">
                                      <select required="required" name="role">
                                        <option value="" selected >Select your role</option>
                                        <option value="admin">Admin</option>
                                        <option value="assistant">Assistant</option>
                                        <option value="employee">Employee</option>
                                        <option value="other">Other</option>
                                      </select>
                                      <label for="icon_telephone">Role</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">phone</i>
                                        <input id="input_phone" type="tel" length="15" min="9" name="phone" max="15"/>
                                        <label for="input_phone">Phone (Don't use +)</label>
                                    </div>
                                  </div>
                                  <button class="btn waves-effect waves-light teal btn-flat" type="submit" name="update">Update
                                    <i class="material-icons right">send</i>
                                    </button>
                                    <a href="<?php echo site_url('home'); ?>" class=" waves-effect waves-green btn-flat">Cancel</a>
                                 </form>
                              </div>
                          </div>
                          <!-- End Edit -->
                    </div>
                </div>
        </div>
    </div>
</div>
  

