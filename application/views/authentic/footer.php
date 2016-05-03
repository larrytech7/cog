    
  <!-- create new sermon message -->
  <div id="announcement" class="modal">
    <div class="modal-content">
      <h4>Create and Publish a Sermon</h4>
      <div class="row">
        <?php echo form_open('home/createmessage', array('class'=>'col s12')); ?>
          <div class="row">
            <div class="input-field col s8 m8 l8">
                <i class="material-icons prefix">info</i>
                <input type="text" name="title" id="title" required />
                <label for="title">Sermon title</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s8 m8 l8">
                <i class="material-icons prefix">info</i>
                <input type="text" name="watchword" id="watchword" />
                <label for="watchword">Watch word</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s8 m8 l8">
              <i class="material-icons prefix">textsms</i>
              <textarea id="icon_prefix" cols="50" rows="6" class="materialize-textarea"  name="message" required></textarea>
              <label for="icon_prefix">Your message</label>
            </div>
          </div>
          
      </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light teal btn-flat" type="submit" name="save">Create and publish
            <i class="material-icons right">send</i>
        </button>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
    </form>
  </div>
  <!-- End sermon-->
    <!-- create new quote message -->
  <div id="bquote" class="modal">
    <div class="modal-content">
      <h4>Add an Inspirational Quote</h4>
      <div class="row">
        <?php echo form_open('home/quotes', array('class'=>'col s12')); ?>
          
          <div class="row">
            <div class="input-field col s8 m8 l8">
              <i class="material-icons prefix">textsms</i>
              <textarea id="icon_prefix" cols="50" rows="6" class="materialize-textarea"  name="message" required></textarea>
              <label for="icon_prefix">Enter Quote here (Include Bible Verse)</label>
            </div>
          </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light teal btn-flat" type="submit" name="save">Add
            <i class="material-icons right">send</i>
        </button>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
    </form>
  </div>
  </div>
  <!-- add a new banner image for slideshow -->
  <div id="banner" class="modal">
    <div class="modal-content">
      <h4>Add a new Slide Image</h4>
      <div class="row">
        <?php echo form_open_multipart('home/addbanner', array('class'=>'col s12')); ?>
        
          <div class="row">
            <div class="input-field col s8 m8 l8">
              <i class="material-icons prefix">offline_pin</i>
              <input type="file" id="icon_prefix" class=""  name="userfile" required />
            </div>
          </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light teal btn-flat" type="submit" name="bannersave">Add
            <i class="material-icons right">send</i>
        </button>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
    </form>
  </div>
  </div>
    <!-- create new announcement message -->
  <div id="announce" class="modal">
    <div class="modal-content">
      <h4>Send out a general announcement</h4>
      <div class="row">
        <?php echo form_open('home/announce', array('class'=>'col s12')); ?>
          
          <div class="row">
            <div class="input-field col s8 m8 l8">
              <i class="material-icons prefix">textsms</i>
              <textarea id="icon_prefix" cols="50" rows="10" class="materialize-textarea"  name="message" required></textarea>
              <label for="icon_prefix">Enter whole message here</label>
            </div>
          </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light teal btn-flat" type="submit" name="save">Add
            <i class="material-icons right">send</i>
        </button>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
    </form>
  </div>
  </div>
  
  <!-- Reply to counselling -->
  <div id="creply" class="modal">
    <div class="modal-content">
      <h4>Reply this request</h4>
      <div class="row">
        <?php echo form_open('home/reply_crequest', array('class'=>'col s12')); ?>
          
          <div class="row">
            <div class="input-field col m12">
              <i class="material-icons prefix">textsms</i>
              <textarea id="icon_prefix" cols="50" rows="10" class="materialize-textarea"  name="message" required></textarea>
              <label for="icon_prefix">Type in your reply here.</label>
              <input type="hidden" class="cemail" value="" name="email"/>
            </div>
          </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light teal btn-flat" type="submit" name="save"
         onsubmit="javascript:function(){return true;}">Reply
            <i class="material-icons right">send</i>
        </button>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
    </form>
  </div>
  </div>
  
  <!-- Reply to prayer requests -->
  <div id="preply" class="modal">
    <div class="modal-content">
      <h4>Reply this request</h4>
      <div class="row">
        <?php echo form_open('home/reply_prequest', array('class'=>'col s12')); ?>
          
          <div class="row">
            <div class="input-field col s8 m8 l8">
              <i class="material-icons prefix">textsms</i>
              <textarea id="icon_prefix" cols="50" rows="10" class="materialize-textarea"  name="message" required></textarea>
              <label for="icon_prefix">Type in your reply here.</label>
            </div>
            <input type="hidden" class="pemail" value="" name="email"/>
          </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light teal btn-flat" type="submit" name="save">Reply
            <i class="material-icons right">send</i>
        </button>
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
    </form>
  </div>
  </div>
  
<footer class="page-footer teal">
    <div class="footer-copyright">
      <div class="container">
      Powered by <a class="brown-text text-lighten-3" href="http://iceteck.com">Iceteck</a> &nbsp;&nbsp;&nbsp;&nbsp;
      
      <p class="right"> Copyright &copy; City Of Grace Ministries intl <?php echo date('Y'); ?></p>
      </div>
    </div>
  </footer>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="<?php echo base_url('assets/materialize/js/materialize.js'); ?>"></script>
  <script src="<?php echo base_url('assets/materialize/js/init.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.dataTables.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/picker.time.js'); ?>"></script>
    <script>
    
    $(document).ready(function(){
        $('.modal-trigger').leanModal();
        $('select').material_select();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year
            startingDate: new Date()
          });
        $('.timepicker').pickatime({
          formatLabel: function(time) {
            var hours = ( time.pick - this.get('now').pick ) / 60,
              label = hours < 0 ? ' !hours to now' : hours > 0 ? ' !hours from now' : 'now'
            return  'h:i a <sm!all>' + ( hours ? Math.abs(hours) : '' ) + label +'</sm!all>'
          }
        });
        //pagination via datatables
        $('#usertable').dataTable();
        $('#ttable').dataTable();
    });
    
    </script>
    <script>
        function deletemsg(me){
        event.preventDefault();
        if(confirm('Are you sure you want to delete this?')){
            window.location = $(me).attr('href');
            //alert($(me).attr('href'));   
        }
    }
    function setpemail(em){
        $('input.pemail').val(em);
    }
    function setcemail(em){
        $('input.cemail').val(em);
        
    }
    function  load(){
   	    setTimeout(function(){
		$('body').addClass('loaded');
	}, 3000);
    }
    </script>
    <script>
    <?php if(isset($subscriptioninfo))
            echo 'Materialize.toast("'.$subscriptioninfo.'", 4000, "red-text")';
            
            if(isset($success))
            echo 'Materialize.toast("'.$success.'", 6000, "green-text")';
            
            if(isset($errors))
            echo 'Materialize.toast("'.$errors.'", 6000, "red-text")';
            
            if(strlen($this->session->flashdata('success')) > 0)
            echo 'Materialize.toast("'.$this->session->flashdata('success').'", 6000, "green-text")';
            
            if(strlen($this->session->flashdata('error')) > 0)
            echo 'Materialize.toast("'.$this->session->flashdata('error').'", 6000, "red-text")';
            
  ?>
  </script>
  </body>
</html>