
<div class="fullWidth grey-color"> <!-- Heading Full Width(About)-->
   <div class="wrapper">
      <div class="body-content page-heading darkblue-color">
          <div class="concierge-main-heading darkblue-color" style="text-align: center; "><?php echo strip_tags($nodes['Node']['body']); ?></div>
         <div class="concierge-sub-main-heading text-color text-center"><p><?php echo $nodes['Node']['excerpt']; ?></p> </div>
         <div class="concierge-BackSearchBtn">
             
             <?php echo $this->Html->link('Get Started', '/contact', array('class' => 'button bkBtn-concierge', 'target' => '_blank')); ?>
<!--             <a class="button bkBtn-concierge" href="form.php">
                 Get Started</a>--> </div>
         <div class="concierge-image-strip">
            <div class="left concierge-single-image"><?php echo $this->Html->image('venue/images/concierge-intro-1.jpg', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' => '322', 'height' => '195')) ?></div>
            <div class="left concierge-single-image"><?php echo $this->Html->image('venue/images/concierge-intro-2.jpg', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' => '322', 'height' => '195')) ?></div>
            <div class="left concierge-single-image"><?php echo $this->Html->image('venue/images/concierge-intro-3.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' => '322', 'height' => '195')) ?></div>

            <div class="concierge-as-seen-in">
               <p class="darkblue-color">As seen in</p>
               <div class="clear"></div>
               <ul>
                  <li><?php echo $this->Html->image('venue/images/media_afr.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' => '307', 'height' => '58')) ?></li>
                  <li><?php echo $this->Html->image('venue/images/media_age.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' => '165', 'height' => '35')) ?></li>
                  <li><?php echo $this->Html->image('venue/images/media_itwire.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' => '165', 'height' => '35')) ?></li>
                  <li><?php echo $this->Html->image('venue/images/media_itwire.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' => '165', 'height' => '35')) ?></li>
                  <li><?php echo $this->Html->image('venue/images/media_upstart.png', array('alt' => 'Opium Den function venue at Golden Monkey', 'width' => '165', 'height' => '35')) ?></li>



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
                              <h3>1. <?php echo $nodes['Meta'][0]['value']; ?>s</h3>
                              <p class="text-color"> <?php echo $nodes['Meta'][0]['value_x']; ?></p>
                           </div>
                           <div class="left col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-one.png'); ?></div>
                        </div>
                     </div>
                     <div class="step-two hide">
                        <div class="row">
                           <div class="col six" class="conceirge_p">
                              <h3>2. <?php echo $nodes['Meta'][1]['value']; ?></h3>
                              <p class="text-color"> <?php echo $nodes['Meta'][1]['value_x']; ?></p>
                           </div>
                           <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-two.png'); ?></div>
                        </div>
                     </div>
                     <div class="step-three hide">
                        <div class="row">
                           <div class="col six">
                              <h3>3. <?php echo $nodes['Meta'][2]['value']; ?></h3>
                              <p class="text-color"><?php echo $nodes['Meta'][2]['value_x']; ?></p>
                           </div>
                           <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-three.png'); ?></div>
                        </div>
                     </div>
                     <div class="step-four hide">
                        <div class="row">
                           <div class="col six">
                              <h3>4. <?php echo $nodes['Meta'][3]['value']; ?></h3>
                              <p class="text-color"><?php echo $nodes['Meta'][3]['value_x']; ?></p>
                           </div>
                           <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-four.png'); ?></div>
                        </div>
                     </div>
                     <div class="step-five hide">
                        <div class="row">
                           <div class="col six">
                              <h3>5. <?php echo $nodes['Meta'][4]['value']; ?></h3>
                              <p class="text-color"><?php echo $nodes['Meta'][4]['value_x']; ?></p>
                           </div>
                           <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-five.png'); ?></div>
                        </div>
                     </div>
                     <div class="step-six hide">
                        <div class="row">
                           <div class="col six">
                              <h3>6. <?php echo $nodes['Meta'][5]['value']; ?></h3>
                              <p class="text-color"><?php echo $nodes['Meta'][5]['value_x']; ?></p>
                           </div>
                           <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-six.png'); ?></div>
                        </div>
                     </div>
                     <div class="step-seven hide">
                        <div class="row">
                           <div class="col six">
                              <h3>7. <?php echo $nodes['Meta'][6]['value']; ?></h3>
                              <p class="text-color"><?php echo $nodes['Meta'][6]['value_x']; ?></p>
                           </div>
                           <div class="col six text-center last"><?php echo $this->Html->image('venue/images/concierge-step-seven.png'); ?></div>
                        </div>
                     </div>
                  </div>
                  <div class="concierge-BackSearchBtn">
<?php echo $this->Html->link('Get Started', '/contact', array('class' => 'button bkBtn-concierge', 'target' => '_blank')); ?>
 
 </div>
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
