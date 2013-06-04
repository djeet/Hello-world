<div id="contact-<?php echo $contact['Contact']['id']; ?>" class="">
   <h2><?php //echo $contact['Contact']['title'];                                                          ?></h2>
   <div class="contact-body">
      <?php echo $contact['Contact']['body']; ?>
   </div>

   <?php if ($contact['Contact']['message_status']): ?>
      <div class="contact-form">

         <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" language="javascript" type="text/javascript"></script>
         <script>
                                                         
                                                      
                                                         
            $(document).ready(function() {
               $("div.desc").css({"display":"none"});
               
               $("input[name$='data[Message][budget_type]']").click(function() {
                  var test = $(this).val();
                  $("div.desc").hide();
                  $("#" + test).show();
               });
               $(".drinkchk,.tpechk").click(function(){
                                     
                  if($(this).attr('class')=='drinkchk allChks left'){
                     var  idcheck = "Drinkpreference" ;
                     var  len = $('.drinkchk').length ;
                  }else{
                     var  idcheck = "Typesofspaces" ;
                     var  len = $('.tpechk').length ;
                  }
                     
                  if($(this).is(':checked')){  
                     var abc = new Array;
                     for(var i=0;i< len;i++) {
                        if($("#"+idcheck+[i+1]).is(':checked')){ 
                           abc[i]=$("#"+idcheck+[i+1]).val(); 
                        }
                     }
                     abc = abc.filter(function(){return true});     
                     $("#Message"+idcheck).val(abc.join(', '));                 
                  }else{
                     var abcd = new Array;
                     for(var i=0;i< len ;i++) {     
                        if($("#"+idcheck+[i+1]).is(':checked')){
                           abcd[i]=$("#"+idcheck+[i+1]).val(); 
                        }
                     }    
                     abcd = abcd.filter(function(){return true});
                     $("#Message"+idcheck).val(abcd.join(', '));         
                  }
               })
            });
         </script>

         <!--date picker -->
         <style>
            .error-message{clear: right;
                           color: red;
                           float: right;
                           width: 207px;}

         </style>
         <!--date picker end -->

         <!--date picker -->
         <script type="text/javascript" src="js/tcal.js"></script>
         <!--date picker end -->



         <div class="fullWidth grey-color"> <!-- Page Content Full Width(Contact)-->
            <div class="wrapper">
               <?php //echo $this->Form->create('Contact',array('controller'=> 'contacts', 'action' => 'send_email'));?>
               <div class="ContentForm">

                  <div class="ReqVenueForm left">
                     <div class="VenueFormheadings">
                        <div class="Heading1">Tell us about your event!</div>
                        <div class="SubHeading">This information helps us match you with the most suitable venues.</div>
                        <div class="clear"></div>
                     </div>

                     <div class="FormName">Your Event    </div>
                     <div class="clear"></div>

                     <div class="VenueForm">
                        <?php
                        echo $this->Form->create('Message', array(
                            'url' => array(
                                'plugin' => 'contacts',
                                'controller' => 'contacts',
                                'action' => 'view',
                                $contact['Contact']['alias'],
                            ),
                        ));
                        ?>
                         <?php echo $this->Form->input('Message.contact_id', array('type' => 'hidden', 'label' => '', 'value' => '1')); ?>
                        <div class="VenueFormRow">
                           <label class="left"> Type of Event<span> * </span></label>
                           <div class="FormField right">
                              <?php echo $this->Form->input('Message.type_of_event', array('type' => 'text', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="VenueFormRow">
                           <label class="left"> Max. # of Guests<span> * </span></label>
                           <div class="FormField right">
                              <?php echo $this->Form->input('Message.max_of_guest', array('type' => 'text', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
                              <div class="clear"></div>
                              <label class="paddingfont11">Enter a number between <span>1</span> and <span>1000</span>. </label>
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="VenueFormRow">
                           <label class="left"> Date of Event<span> * </span></label>

                           <div class="FormField right">
                              <?php echo $this->Form->input('Message.date_of_event', array('type' => 'text', 'label' => '', 'class' => 'date-a tcal', 'placeholder' => 'Select By Date', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
                              <!--<input type="text" name="" class="date-a tcal" value="Search By Date"/>-->
                              <div class="clear"></div>
                              <label class="paddingfont11">MM/DD/YYYY  </label>
                           </div>

                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="VenueFormRow">
                           <label class="left"> Want to fast track your enquiry?<br/>
                              We research and only ask the most suitable venues to contact you directly. 
                           </label>
                           <div class="FormField right">
                              <label class="">
                                 <input type="checkbox" id="fast_track_enquiry" class="allChks left" name="data[Message][fast_track_enquiry]"/> Fast Track My Enquiry </label>
                              <div class="clear"></div>
                              <label class="">
                                 <input type="checkbox" id="flexible_date" class="allChks left" name="data[Message][flexible_date]"/>
                                 I'm flexible with the date
                              </label></div>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="VenueFormRow">
                           <label class="left"> Approx Start Time </label>
                           <div class="FormField right">
                              <?php echo $this->Form->input('Message.approx_start_time', array('type' => 'text', 'style' => 'display: inline-block; margin-right:0;')); ?>
                               
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="VenueFormRow">
                           <label class="left">  Budget Type<span> * </span></label>
                           <div class="FormField right">
                              <label class="choice">
                                 <?php //echo $this->Form->input('Message.budget_type', array('type' => 'text','label' => '','class'=>'','div'=>'','value'=>'','style'=>'display: inline-block; margin-right:0;')); ?>
                                 <input name="data[Message][budget_type]" type="radio" class="allRadios" value="per_head_budget" id="budget_type1" />
                                 Per Head Budget
                              </label>
                              <div class="clear"></div>
                              <label class="choice">
                                 <input name="data[Message][budget_type]" type="radio" class="allRadios" value="total_event_budget" id="budget_type2" />
                                 Total Event Budget 
                              </label>
                              <div class="clear"></div>
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="VenueFormRow">
                           <div id="per_head_budget" class="desc">
                              <label class="left" > Per Head Budget ($) <span> * </span> </label>
                              <div class="FormField right">
                                 <?php echo $this->Form->input('Message.per_head_budget', array('type' => 'text', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
                              </div>
                              <div class="clear"></div>
                           </div>

                           <div id="total_event_budget" class="desc">
                              <label class="left" > Total Event Budget ($)  <span> * </span> </label>
                              <div class="FormField right">
                                 <?php echo $this->Form->input('Message.total_event_budget', array('type' => 'text', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
                              </div>
                              <div class="clear"></div>
                           </div>

                        </div>
                        <div class="clear"></div>


                     </div> 

                     <div class="FormName">Your Preferences</div>
                     <div class="clear"></div>

                     <div class="VenueForm">
                        <div class="VenueFormRow">
                           <label class="left">Location Preference<span> * </span></label>
                           <div class="FormField right">
                              <?php echo $this->Form->input('Message.location_pref', array('type' => 'text', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>


                        <div class="VenueFormRow">
                           <label class="left"> Food Preference</label>
                           <div class="FormField right">


                              <?php
                              echo $this->Form->input('Message.food_preference', array(
                                  'options' => array('Food Not Required' => 'Food Not Required', 'Breakfast' => 'Breakfast', 'Lunch' => 'Lunch', 'Dinner' => 'Dinner', 'Canapes' => 'Canapes'),
                                  'empty' => '(choose one)',
                                  'label' => '',
                                  'style' => 'width:auto;padding:0;'
                              ));
// echo $this->Form->input('Message.food_preference', array('option' => array('Food Not Required', 'Breakfast', 'Lunch', 'Dinner', 'Canapes'))); 
                              ?>
                           </div>
                           <div class="clear"></div>
                        </div>

                        <div class="VenueFormRow input select">
                           <label class="left">  Drink Preference</label>
                           <div class="FormField right">
                              <?php echo $this->Form->input('Message.drinkpreference', array('type' => 'hidden', 'label' => '', 'value' => '')); ?>
                              <?
//                              echo $this->Form->select('Message.drinkpreference', array('Drinks Not Required' => 'Drinks Not Required', 'Alcoholic' => 'Alcoholic', 'Non-Alcoholic' => 'Non-Alcoholic'), array('label' => '',
//                                  'style' => 'width:auto;padding:0;',
//                                  'multiple' => 'checkbox'
//                              ));
                              ?>
                              <div class="checkbox">
                                 <input type="checkbox" id="Drinkpreference1" value="Drinks Not Required" class="drinkchk allChks left" name="drinkpreference[]"/>
                                 <label for="Drinkpreference1" >Drinks Not Required</label>  
                              </div>
                              <div class="clear"></div>
                              <div class="checkbox">
                                 <input type="checkbox" id="Drinkpreference2" value="Alcoholic" class="drinkchk allChks left" name="drinkpreference[]"/>
                                 <label for="Drinkpreference2" >Alcoholic</label>  
                              </div>
                              <div class="clear"></div>
                              <div class="checkbox">
                                 <input type="checkbox" id="Drinkpreference3" value="Non-Alcoholic" class="drinkchk allChks left" name="drinkpreference[]"/>
                                 <label for="DrinkpPreference3" >Non-Alcoholic</label>
                              </div>
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="VenueFormRow">
                           <label class="left">   Type of Space(s)  <span> * </span> </label>
                           <?php echo $this->Form->input('Message.typesofspaces', array('type' => 'hidden', 'label' => '', 'value' => '')); ?>
                           <div class="FormField right">
                              <label>
                                 <input type="checkbox" id="Typesofspaces1" value="Bar" class="tpechk allChks left" name="typesofspaces[]"/>
                                 Bar </label>
                              <div class="clear"></div>
                              <label> <input type="checkbox" id="Typesofspaces2" value="Restaurant" class="tpechk allChks left" name="typesofspaces[]"/>Restaurant</label>
                              <div class="clear"></div>
                              <label><input type="checkbox" id="Typesofspaces3" value="Pub" class="tpechk allChks left" name="typesofspaces[]"/>
                                 Pub </label>
                              <div class="clear"></div>
                              <label><input type="checkbox" id="Typesofspaces4" value="Outdoor" class="tpechk allChks left" name="typesofspaces[]"/> 
                                 Outdoor </label>
                              <div class="clear"></div>
                              <label><input type="checkbox" id="Typesofspaces5" value="Reception Centre" class="tpechk allChks left" name="typesofspaces[]"/> 
                                 Reception Center </label>
                              <div class="clear"></div>
                              <label><input type="checkbox" id="Typesofspaces6" value="Activities" class="tpechk allChks left" name="typesofspaces[]"/> 
                                 Activities </label>
                              <div class="clear"></div>
                              <label><input type="checkbox" id="Typesofspaces7" value="Conference Centre" class="tpechk allChks left" name="typesofspaces[]"/> 
                                 Conference Center </label>
                              <div class="clear"></div>
                              <label><input type="checkbox" id="Typesofspaces8" value="Other" class="tpechk allChks left" name="typesofspaces[]"/> 
                                 Other </label>

                           </div>
                           <div class="clear"></div>
                        </div>

                        <div class="VenueFormRow">
                           <label class="left">  Exclusive Space/Room required? </label>
                           <div class="FormField right">
                              <?php echo $this->Form->input('Message.execlusive_space', array('type' => 'checkbox', 'label' => 'Yes', 'class' => 'allChks left', 'value' => 'Yes', 'style' => 'display: inline-block; margin-right:0;')); ?>
                              <div class="clear"></div>
                           </div>

                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>

                        <div class="VenueFormRow">
                           <label class="left">Any other special requirements or considerations?</label>
                           <div class="FormField right">
                              <?php echo $this->Form->input('Message.any_other_requirement', array('type' => 'textarea', 'style' => 'display: inline-block; margin-right:0;')); ?>
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        <div class="VenueFormRow">
                           <label class="left"> Have you already contacted some venues or have some specific venues in mind? If so, which ones?
                           </label>
                           <div class="FormField right">
                           <!--<textarea rows="" cols="" ></textarea>-->
                              <?php echo $this->Form->input('Message.have_you_already', array('type' => 'textarea', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                     </div>

                     <div class="FormName">Your Details    </div>
                     <div class="clear"></div>

                     <div class="VenueForm" style="border-bottom:none;">
                        <div class="VenueFormRow">
                           <div class="VenueFormRow">
                              <label class="left"> Name <span> * </span></label>
                              <div class="FormField right">
                                 <div class="firstN left">
                                    <?php echo $this->Form->input('Message.name', array('type' => 'text', 'label' => '', 'class' => 'left', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
                                    <div class="clear"></div> 
                                 </div>
                                 <div class="lastN right">
                                    <?php echo $this->Form->input('Message.lname', array('type' => 'text', 'label' => '', 'class' => 'left', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:-30px; margin-left:5px;')); ?>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="clear"></div>

                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="clear"></div>

                           <div class="VenueFormRow">

                              <label class="left"> Email <span> * </span></label>
                              <div class="FormField right">
                                 <?php echo $this->Form->input('Message.email', array('type' => 'text', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => '')); ?>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="clear"></div>

                           <div class="VenueFormRow">
                              <label class="left"> What is your best contact number? <span> * </span></label>
                              <div class="FormField right">
                                 <?php echo $this->Form->input('Message.mobile_number', array('type' => 'text', 'label' => '')); ?>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="clear"></div>
                           <div class="VenueFormRow " style="margin-bottom:5px;">
                              <label class="left"> Best time to call you?</label>
                              <div class="FormField right">
                                 <?php echo $this->Form->input('Message.calling_time', array('type' => 'text', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => '')); ?>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="clear"></div>

                           <div class="VenueFormRow">
                              <label class="left"> &nbsp;</label>
                              <div class="FormField right">
                                 <div class="submit">
                                    <input type="image" src="<?php echo DOMAIN_NAME ?>img/venue/images/submit.PNG">
                                 </div>
                                 <div class="clear"></div>
                              </div>
                           </div>
                        <?php endif; ?>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
               </div> <!-- req form ends here -->
               <div class="ConciergeTable right">

                  <div class="ConciergeTableDet right" style="min-height:648px;"> 
                     <div class="InnerTable" style="min-height:544px;">
                         <?php foreach($nodes['Meta'] AS  $abc) { ?>
                        <div class="tableRow1 greyborderBottom2 "><!-- row starts here -->
                            
                            
                           <div class="Ques font16 blue"><?php echo $abc['value']; ?></div>
                           <div class="Ans">
                              <ul>
                                 <?php echo $abc['value_x']; ?>
                              </ul>
                              <div class="clear"></div>
                           </div>
                           <div class="clear"></div>
                        </div><!-- row ends here -->

                      
                        
                        
                        
                        <div class="clear"></div>

<!--                        <div class="tableRow1 greyborderBottom2 "> row starts here 
                           <div class="Ques font16 blue">Why use Venuemob Concierge?</div>
                           <div class="Ans">
                              <ul>
                                 <li>Our venue specialists know which places are available and which can cater for your requirements.</li>
                                 <li>Get great ideas for the best venues around - it's like having your own team of event-planners.</li>
                                 <li>There's no obligation to choose the venues that you're recommended so there's nothing to lose and only great venue ideas to gain.</li>
                              </ul>
                              <div class="clear"></div>
                           </div>
                           <div class="clear"></div>
                        </div> row ends here -->
                        <div class="clear"></div>

<!--                        <div class="tableRow1 "> row starts here 
                           <div class="Ques font16 blue">How it works?</div>
                           <div class="Ans">
                              <ul>
                                 <li>You submit your event details.</li>
                                 <li>Our venue specialists start finding you the most suitable venues.</li>
                                 <li>You'll get a call or email with recommendations tailored for your event.</li>
                                 <li>You tell us which venues you like.</li>
                                 <li>We'll get the respective venue managers to contact you directly.</li>
                                 <li>You'll get a call or email with recommendations tailored for your event.You can book directly with the venue you like best.</li>
                                 <li>Enjoy your event!</li>

                              </ul>
                              <div class="clear"></div>
                           </div>
                           <div class="clear"></div>
                        </div> row ends here -->
                        <div class="clear"></div>
                          <?php } ?>
                     </div>
                  </div>
                  <div class="clear"></div>

               </div><!--content form ends here -->

               <div class="clear"></div>
            </div>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>
      <div class="footerSep"></div>
      <div class="clear"></div>

      <?php
//		echo $this->Form->create('Message', array(
//			'url' => array(
//				'plugin' => 'contacts',
//				'controller' => 'contacts',
//				'action' => 'view',
//				$contact['Contact']['alias'],
//			),
//		));
//		echo $this->Form->input('Message.name', array('label' => __('Your name')));
//		echo $this->Form->input('Message.email', array('label' => __('Your email')));
//		echo $this->Form->input('Message.title', array('label' => __('Subject')));
//		echo $this->Form->input('Message.body', array('label' => __('Message')));
//		//if ($contact['Contact']['message_captcha']):
//			//echo $this->Recaptcha->display_form();
//		//endif;
//		echo $this->Form->end(__('Send'));
//	
      ?>
   </div>