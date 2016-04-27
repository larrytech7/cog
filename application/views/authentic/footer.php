    
  <!-- create new sermon message -->
  <div id="announcement" class="modal">
    <div class="modal-content">
      <h4>Create and Publish a Sermon</h4>
      <div class="row">
        <?php echo form_open('home/createmessage', array('class'=>'col s12')); ?>
          <div class="row">
            <div class="input-field col s8 m8 l8">
                <i class="material-icons prefix">info</i>
                <input type="text" name="title" id="title" required/>
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