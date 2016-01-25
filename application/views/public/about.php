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
  <article class="block-1">
    <div class="container_12">
      <div class="grid_12">
        <h2>Meet Our Pastors Who Share God's Love</h2>
      </div>
      <div class="grid_4">
        <img src="<?php echo base_url('assets/images/page1_img1.jpg'); ?>" alt="" />
        <div class="extra_wrapper">
          <div class="block-1_title"><a href="#">Mark Johnson</a></div>
          Lorem ipsum dolor sit tetur dipiscing elit. In mollis erat mattis neque facilisis, sit... 
        </div>
      </div>
      <div class="grid_4">
        <img src="<?php echo base_url('assets/images/page1_img2.jpg'); ?>" alt=""/>
        <div class="extra_wrapper">
          <div class="block-1_title"><a href="#">Sam Rock</a></div>
          Korem ipsum dolor sit tetur dipiscing elit. In mollis erat mattis neque facilisis, sito... 
        </div>

      </div>
      <div class="grid_4">
        <img src="<?php echo base_url('assets/images/page1_img3.jpg'); ?>" alt=""/>
        <div class="extra_wrapper">
          <div class="block-1_title"><a href="#">Patrick Pool</a></div>
          Forem ipsum dolor sit tetur dipiscing elit. In mollis erat mattis neque facilisu... 
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </article>
  <div class="clear sep-1"></div>
</section>
<!--==============================
<!-- Counsel request section -->
<div id="counselling" class="modal">
    <div class="modal-content">
      <h4>Request for counselling from the ministry</h4>
      <div class="row">
        <?php echo form_open('welcome/counsel', array('class'=>'col s12')); ?>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" name="name" class="validate" required />
              <label for="icon_prefix">Your Name</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>
              <input id="icon_pass" name="phone" type="number" class="validate" required min="9"/>
              <label for="icon_pass">Number</label>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m12">
            <i class="material-icons prefix">message</i>
            <textarea class="materialize-textarea" id="message" name="message" cols="50" rows="10"></textarea>
            <label for="message">Enter your request here</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
        Powered by <a href="http://iceteck.com">Iceteck</a>
        <button class="btn waves-effect waves-light btn-flat" type="submit" name="counsel">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
    </form>
  </div>  
<!-- End counselling request section -->
<!-- Prayer request section -->
<div id="prayer" class="modal">
    <div class="modal-content">
      <h4>We can handle your prayer Requests</h4>
      <div class="row">
        <?php echo form_open('welcome/prayerrequest', array('class'=>'col s12')); ?>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" name="name" class="validate" required />
              <label for="icon_prefix">Your Name</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>
              <input id="icon_pass" name="phone" type="number" class="validate" required min="9"/>
              <label for="icon_pass">Number</label>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m12">
            <i class="material-icons prefix">message</i>
            <textarea class="materialize-textarea" id="message" name="message" cols="50" rows="10"></textarea>
            <label for="message">Enter your request here</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
        Powered by <a href="http://iceteck.com">Iceteck</a>
        <button class="btn waves-effect waves-light btn-flat" type="submit" name="prayer">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
    </form>
  </div>  
<!-- End Prayer request section -->
<!-- Testinomy section -->
<div id="testimony" class="modal">
    <div class="modal-content">
      <h4>We welcome all testimonies to the glory of the most High</h4>
      <div class="row">
        <?php echo form_open('welcome/testimony', array('class'=>'col s12')); ?>
          <div class="row">
            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" name="name" class="validate" required />
              <label for="icon_prefix">Your Name</label>
            </div>
            <div class="input-field col s6">
              <i class="material-icons prefix">phone</i>
              <input id="icon_pass" name="phone" type="number" class="validate" required min="9"/>
              <label for="icon_pass">Phone number (important)</label>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m12">
            <i class="material-icons prefix">message</i>
            <textarea class="materialize-textarea" id="message" name="message" cols="50" rows="10"></textarea>
            <label for="message">Enter your testimony</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
        Powered by <a href="http://iceteck.com">Iceteck</a>
        <button class="btn waves-effect waves-light btn-flat" type="submit" name="testimony">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
    </form>
  </div>
  
<!-- End Testimony section -->