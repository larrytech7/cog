<!--=====================
          Content
======================-->
<section id="content"><div class="ic">Powered by <a href="https://iceteck.com" target="_blank" >Iceteck</a></div>
    <div class="container_12">
    <div class="grid_12">
      <h2 class="ta__center">
        How to Find Us
      </h2>
      <div class="map">
        <figure class="">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13308.766675166546!2d10.170787107271927!3d5.972370553697706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105f1611c9ca28a3%3A0xf2a0e6db2ca773f9!2sBamenda!5e0!3m2!1sen!2scm!4v1453406802844" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </figure>
        Telephone: +237 676 275 801 <br/>
        E-mail: <a href="#">cog@cityofgraceministries.org</a>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <article class="block-1 contacts ">
    <div class="container_12">
      <div class="grid_12">
        <h3 class="black ta__center">Contact Form</h3>
      </div>
      <br />
          <div class="contact-form-loader"></div>
          <div class="grid_6">
            <?php echo form_open('welcome/contacts', array('class'=>'col s12')); ?>
                <div class="input-field col s12">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" name="name" class="validate" required />
                  <label for="icon_prefix">Your Name</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">phone</i>
                  <input id="icon_pass" name="phone" type="number" class="validate" required min="9"/>
                  <label for="icon_pass">Phone number (important)</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="icon_prefix" type="email" name="email" class="validate" required />
                  <label for="icon_prefix">Your email</label>
                </div>
           </div>
           <div class="grid_6">
                <div class="input-field col s12 m12">
                    <i class="material-icons prefix">message</i>
                    <textarea class="materialize-textarea" id="message" name="message" cols="50" rows="20" required></textarea>
                    <label for="message">Enter your message</label>
                </div>
            <div>
              <div class="ta__right">
          <button class="btn btn-flat waves-light waves-effect red lighten-2" type="reset">Clear</button>
          <button class="btn waves-effect waves-light btn-flat green lighten-2" type="submit" name="testimony">Submit
            <i class="material-icons right">send</i>
        </button>
            </div>
          </div> 

          <div class="modal fade response-message">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                  You message has been sent! We will be in touch soon.
                </div>      
              </div>
            </div>
          </div>
          <div class="clear"></div>
      </form>   
      <div class="clear"></div>
    </div>
    </div>
  </article>
</section>
<!--==============================