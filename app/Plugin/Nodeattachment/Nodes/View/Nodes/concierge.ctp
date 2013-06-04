
<div class="fullWidth grey-color"> <!-- Heading Full Width(About)-->
  <div class="wrapper">
    <div class="body-content page-heading darkblue-color">
    <div class="concierge-main-heading darkblue-color" style="text-align: center; ">Let experts show you the best venues for your event.</div>
    <div class="concierge-sub-main-heading text-color text-center"><p>Join hundreds of people who have used Venuemob to find awesome venues</p> </div>
            <div class="concierge-BackSearchBtn"> <a class="button bkBtn-concierge" href="form.php"> Get Started</a> </div>
            <div class="concierge-image-strip">
            <div class="left concierge-single-image"><?php echo $this->Html->image('venue/images/concierge-intro-1.jpg', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' =>'322', 'height' => '195')) ?></div>
            <div class="left concierge-single-image"><?php echo $this->Html->image('venue/images/concierge-intro-2.jpg', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' =>'322', 'height' => '195')) ?></div>
            <div class="left concierge-single-image"><?php echo $this->Html->image('venue/images/concierge-intro-3.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' =>'322', 'height' => '195')) ?></div>

            <div class="concierge-as-seen-in">
			<p class="darkblue-color">As seen in</p>
            <div class="clear"></div>
			<ul>
                            <li><?php echo $this->Html->image('venue/images/media_afr.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' =>'307', 'height' => '58')) ?></li>
				<li><?php echo $this->Html->image('venue/images/media_age.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' =>'165', 'height' => '35')) ?></li>
				<li><?php echo $this->Html->image('venue/images/media_itwire.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' =>'165', 'height' => '35')) ?></li>
				<li><?php echo $this->Html->image('venue/images/media_itwire.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' =>'165', 'height' => '35')) ?></li>
				<li><?php echo $this->Html->image('venue/images/media_upstart.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' =>'165', 'height' => '35')) ?></li>
                            
                            
                            
<!--				<li><img src="images/media_afr.png" width="307" height="58" alt="" title=""/></li>
				<li><img src="images/media_age.png" width="165" height="35" alt="" title=""/></li>
				<li><img src="images/media_itwire.png" width="165" height="35" alt="" title=""/></li>
				<li><img src="images/media_itwire.png" width="165" height="35" alt="" title=""/></li>
				<li><img src="images/media_upstart.png" width="165" height="35" alt="" title=""/></li>-->
			</ul>
			<div class="clear"></div>
		</div>
        
        <div class="row">
    <div class="col twelve last">
      <div class="page-header concierge-jquery-heading">
        <h2>How it works</h2>
        <div class="clear"></div>
      </div>
      <div id="steps">
        <div class="step active" rel="step-one">
          <div class="step-des"> <span>Enter Details</span> </div>
          <div class="step-num"> <span>1</span> </div>
        </div>
        <div class="step" rel="step-two">
          <div class="step-des"> <span>Sit Back</span> </div>
          <div class="step-num"> <span>2</span> </div>
        </div>
        <div class="step" rel="step-three">
          <div class="step-des"> <span>Receive<br />Recommendations</span> </div>
          <div class="step-num"> <span>3</span> </div>
        </div>
        <div class="step" rel="step-four">
          <div class="step-des"> <span>Be Picky</span> </div>
          <div class="step-num"> <span>4</span> </div>
        </div>
        <div class="step" rel="step-five">
          <div class="step-des"> <span>Venues Contact You</span> </div>
          <div class="step-num"> <span>5</span> </div>
        </div>
        <div class="step" rel="step-six">
          <div class="step-des"> <span>Book Venue</span> </div>
          <div class="step-num"> <span>6</span> </div>
        </div>
        <div class="step" rel="step-seven">
          <div class="step-des"> <span>Have a blast!</span> </div>
          <div class="step-num"> <span>7</span> </div>
        </div>
      </div>
      <div id="steps-content">
        <div class="step-one show">
          <div class="row">
            <div class="left col six ">
              <h3>1. Enter your details</h3>
              <p class="text-color"> Start by providing us some basic info about your event such as date, expected number of guests and budget. <br/>
                <br/>
                Then, answer a few questions about your venue preferences. </p>
            </div>
            <div class="left col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-one.png'); ?></div>
          </div>
        </div>
        <div class="step-two hide">
          <div class="row">
            <div class="col six">
              <h3>2. Sit back, we're onto it!</h3>
              <p class="text-color"> Our team of venue specialists get going and start finding you the most suitable venues for your event. <br/>
                <br/>
                Our venue specialists know hundreds of venues in your 
                city that can cater for all sorts of events - from birthdays and 
                corporate functions to engagement parties, and anything in between. </p>
            </div>
            <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-two.png'); ?></div>
          </div>
        </div>
        <div class="step-three hide">
          <div class="row">
            <div class="col six">
              <h3>3. Receive recommendations</h3>
              <p class="text-color"> You'll get a call or email with recommendations tailored for your event. <br/>
                <br/>
                These recommendations will be provided with all your 
                preferences in mind including budget, location and other special 
                requests. </p>
            </div>
            <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-three.png'); ?></div>
          </div>
        </div>
        <div class="step-four hide">
          <div class="row">
            <div class="col six">
              <h3>4. Be picky</h3>
              <p class="text-color"> Tell us which of the recommended venues you like. <br/>
                <br/>
                Want more recommendations? Be sure to let our venue 
                specialists know and they'll work harder to find you some additional 
                choices. </p>
            </div>
            <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-four.png'); ?></div>
          </div>
        </div>
        <div class="step-five hide">
          <div class="row">
            <div class="col six">
              <h3>5. Venues contact you</h3>
              <p class="text-color"> For the venues you like, we'll get the respective venue managers to contact you directly. <br/>
                <br/>
                They'll give you more details about their venue and you can ask them some specific questions. <br/>
                <br/>
                You can also arrange with them to check-out the venue in person. </p>
            </div>
            <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-five.png'); ?></div>
          </div>
        </div>
        <div class="step-six hide">
          <div class="row">
            <div class="col six">
              <h3>6. Book venue</h3>
              <p class="text-color"> If you really like a particular venue - go ahead and book in your event directly with them. </p>
            </div>
            <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-six.png'); ?></div>
          </div>
        </div>
        <div class="step-seven hide">
          <div class="row">
            <div class="col six">
              <h3>7. Have a blast!</h3>
              <p class="text-color"> Searching for a venue can be stressful but remember events are meant to be fun. <br/>
                <br/>
                So have a blast and know that our venue specialists are 
                always ready to help you find the best venues, every time. </p>
            </div>
            <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-seven.png'); ?></div>
          </div>
        </div>
      </div>
            <div class="concierge-BackSearchBtn"> <a class="button bkBtn-concierge" href="form.php"> Get Started</a> </div>
    </div>
  </div>
        
        
      <div class="clear"></div>
            </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
          <div class="footerSep"></div>
