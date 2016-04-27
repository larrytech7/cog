<section class="slider_wrapper">
  <div id="camera_wrap" class="">
    <div data-src="<?php echo base_url('assets/images/slide.jpg'); ?>"></div>
    <div data-src="<?php echo base_url('assets/images/slide1.jpg'); ?>"></div>
    <div data-src="<?php echo base_url('assets/images/prophetmain.jpg'); ?>"></div>  
  </div>  
</section> 
<!--=====================
          Content
======================-->
<section id="content"><div class="ic">Powered by <a href="https://iceteck.com" target="_blank" >Iceteck</a></div>
  <div class="container_12">
    <div class="grid_4">
      <div class="banner">
        <a href="#events" class="banner_title">Current <br>
Events</a>
        <div class="maxheight"><img src="<?php echo base_url('assets/images/icon1.png'); ?>" alt=""></div>
      </div>
    </div>
    <div class="grid_4">
      <div class="banner">
        <a href="#counselling" class="banner_title modal-trigger">Biblical <br/>
Counseling</a>
        <div class="maxheight"><img src="<?php echo base_url('assets/images/icon2.png'); ?>" alt=""></div>
      </div>
    </div>
    <div class="grid_4">
      <div class="banner">
        <a href="#prayer" class="banner_title modal-trigger">Prayer <br/>
Requests</a>
        <div class="maxheight"><img src="<?php echo base_url('assets/images/prayer.jpg'); ?>" alt="" /></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="container_12">
    <div class="grid_6" style="max-height: 430px; overflow-y:auto">
        <p>Recent sermons</p>
        <a href="#!" class="btn btn-primary">Receive Jesus Today</a>
        
          <?php 
            foreach($sermons as $sermon):
                echo '<div class="card small">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="'.base_url('assets/images/page4_img3.jpg').'"/>
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">'.$sermon['title'].'<i class="material-icons right">more_vert</i></span>
                            <p>'.$sermon['watch_word'].'</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">'.$sermon['title'].'<i class="material-icons right">close</i></span>
                            <p>'.$sermon['message'].'</p>
                        </div>
                      </div>';
          ?>
          <?php
            endforeach;
          ?>
    </div>
    <div class="grid_3">
        <p>We are on Facebook</p>
        <iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Ficetecc&width=300&colorscheme=light&show_faces=true&border_color&stream=true&header=true&height=435" scrolling="yes" frameborder="1" style="border: none; overflow: hidden; width: 300px; height: 430px; float: left; background: white;" allowtransparency="true"></iframe>

    </div>
    <div class="grid_3">
        <p>We are on Twitter</p>
        <a class="twitter-timeline" href="https://twitter.com/icep603" data-widget-id="688927829434732544">Tweets by @icep603</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
  
  </div>
  <div class="container_12">
    <div class="grid_6">
      <div class="block-2">
        <img src="<?php echo base_url('assets/images/b_icon1.png'); ?>" alt=""/>
        <div class="text1"><a href="#signup" class="modal-trigger">I'm New Here</a></div>
        Welcome, if you want to become a member of the community of saints, register here and get connected 
      </div>
    </div>
    <div class="grid_6">
      <div class="block-2">
        <img src="<?php echo base_url('assets/images/b_icon2.png'); ?>" alt=""/>
        <div class="text1"><a href="#!">Donations and Partnership</a></div>
        Do you wish to support the ministry or become an affiliate partner? Manifest your interest <a href="#!">HERE</a>. 
        Stay blessed as you join us in making the world a better place 
      </div>
    </div>
    <div class="grid_6">
      <div class="block-2">
        <img src="<?php echo base_url('assets/images/b_icon3.png'); ?>" alt=""/>
        <div class="text1"><a href="#testimony" class="modal-trigger">Your testimony</a></div>
        Do you have a testimony you would like to share? Submit now and let the world know that Jesus is Lord. 
      </div>
    </div>
    <div class="grid_6">
      <div class="block-2">
        <img src="<?php echo base_url('assets/images/b_icon4.png'); ?>" alt=""/>
        <div class="text1"><a href="#podcast" class="modal-trigger">Audio Podcasts</a></div>
        Listen to meditations of the word from our finest prophet. Be inspired as these words of wisdom sink into your soul 
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear sep-1"></div>
  <article class="carousel_wrapper" id="events">
    <div class="container_12">
      <div class="grid_12">
        <div id="owl">
            <?php
                if(isset($events)){
                 foreach($events as $ev){
                    $datetitle = $ev['date'];
                    $content = $ev['message'];
                    echo 
                    '<div class="item">
                        <div class="banner">
                            <div class="banner_title">'.$datetitle.'</div>
                            <p>'.$content.'</p>
                        </div>
                    </div>';
                 }   
                }
            ?>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </article>
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
            <textarea class="materialize-textarea" id="message" name="message" cols="50" rows="10" required></textarea>
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
            <textarea class="materialize-textarea" id="message" name="message" cols="50" rows="10" required></textarea>
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
<!-- Podcasts section -->
<div id="podcast" class="modal">
    <div class="modal-content">
      <h4>Listen to wise for they speak words of wisdom</h4>
      <div class="row podcastplayer">
          <span>My podcasts</span>
      </div>
    </div>
    <div class="modal-footer">
        Powered by <a href="http://iceteck.com">Iceteck</a>
        <button class="btn waves-effect waves-light btn-flat modal-close" type="button" name="pd">Close
            <i class="material-icons right">close</i>
        </button>
    </div>
    </form>
  </div>  
<!-- End Podcasts section -->
<!-- Signup section -->
<div id="signup" class="modal">
    <div class="modal-content">
      <h4>Remote Member registration <i class="material_icons">account_circle</i></h4>
      <div class="row">
      <?php echo form_open('welcome/register', array('class'=>'col s12')); ?>
        <div class="col s12 m6 offset-m2 center-align">
            <div class="input-field">
                <i class="material-icons prefix">person</i>
                <input class="material-input" type="text" name="username" id="username" required="required"/>
                <label for="username">Your name</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input class="material-input" type="tel" name="phone" id="phone" required="required"/>
                <label for="phone">Phone (use country code without leading '+')</label>
            </div>
            <div class="input-field">
                <i class="material-icons prefix">email</i>
                <input class="material-input" type="text" name="email" id="email"/>
                <label for="email">Your Email (Optional)</label>
            </div>
            <div class="input-field">
                <select class="" id="country" name="country" required>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Åland Islands">Åland Islands</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antarctica">Antarctica</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Bouvet Island">Bouvet Island</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote D'ivoire">Cote D'ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Territories">French Southern Territories</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guernsey">Guernsey</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-bissau">Guinea-bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jersey">Jersey</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                    <option value="Korea, Republic of">Korea, Republic of</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macao">Macao</option>
                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Pitcairn">Pitcairn</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russian Federation">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Helena">Saint Helena</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                    <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Timor-leste">Timor-leste</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Viet Nam">Viet Nam</option>
                    <option value="Virgin Islands, British">Virgin Islands, British</option>
                    <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                    <option value="Western Sahara">Western Sahara</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>
                <label for="country">Country of residence</label>
            </div>
        </div>
          
      </div>
    </div>
    <div class="modal-footer">
        Powered by <a href="http://iceteck.com">Iceteck</a>
        <button class="btn waves-effect waves-light btn-flat " type="submit" name="pd">Register
            <i class="material-icons right">done</i>
        </button>
        </form>
    </div>
    </form>
  </div>  
<!-- End Podcasts section -->