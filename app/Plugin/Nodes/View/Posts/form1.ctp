
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" language="javascript" type="text/javascript"></script>
<script>
$(document).ready(function() {
    $("div.desc").css({"display":"none"});
    $("input[name$='budget']").click(function() {
        var test = $(this).val();
        $("div.desc").hide();
        $("#" + test).show();
    });
});
</script>

<!--date picker -->
<script type="text/javascript" src="js/tcal.js"></script>
<!--date picker end -->



<div class="fullWidth grey-color"> <!-- Page Content Full Width(Contact)-->
  <div class="wrapper">

<div class="ContentForm">

<div class="ReqVenueForm left">
<div class="VenueFormheadings">
<div class="Heading1">Tell us about your event!</div>
<div class="SubHeading">This information helps us match you with the most suitable venues.</div>
<div class="clear"></div>
</div>

<div class="FormName">Your Event    </div>
<div class="clear"></div>
<!--
<div class="VenueForm">

<div class="VenueFormRow">
<label class="left"> Type of Event<span> * </span></label>
<div class="FormField right">
<input type="text" name=""/></div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="VenueFormRow">
<label class="left"> Max. # of Guests<span> * </span></label>
<div class="FormField right">
<input type="text" name=""/>
<div class="clear"></div>
<label class="paddingfont11">Enter a number between <span>1</span> and <span>1000</span>. </label>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="VenueFormRow">
<label class="left"> Date of Event<span> * </span></label>
<div class="FormField right">
<input type="text" name="" class="date-a tcal" value="Search By Date"/>

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
<input type="checkbox" class="allChks left" name=""/> Fast Track My Enquiry </label>
<div class="clear"></div>
<label class="">
<input type="checkbox" class="allChks left" name=""/>  I'm flexible with the date
 </label></div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="VenueFormRow">
<label class="left"> Approx Start Time </label>
<div class="FormField right">
<input type="text" name=""/></div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="VenueFormRow">
<label class="left">  Budget Type<span> * </span></label>
<div class="FormField right">
<label class="choice" ><input type="radio" name="budget"  value="PerHeadBudget" class="allRadios"/> Per Head Budget</label>
<div class="clear"></div>
<label class="choice" ><input type="radio" name="budget" value="TotalEventBudget" class="allRadios" /> Total Event Budget </label>
<div class="clear"></div>
 </div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="VenueFormRow">
                        <div id="PerHeadBudget" class="desc">
<label class="left" > Per Head Budget ($) <span> * </span> </label>
<div class="FormField right">
<input type="text" name=""/></div>
<div class="clear"></div>
</div>

                        <div id="TotalEventBudget" class="desc">
<label class="left" > Total Event Budget ($)  <span> * </span> </label>
<div class="FormField right">
<input type="text" name=""/></div>
<div class="clear"></div>
</div>



</div>
<div class="clear"></div>


</div> -->

<!--<div class="FormName">Your Preferences   </div>
<div class="clear"></div>-->
<!--
<div class="VenueForm">
<div class="VenueFormRow">
<label class="left"> Location Preference <span> * </span></label>
<div class="FormField right">
<input type="text" name=""/></div>
<div class="clear"></div>
</div>
<div class="clear"></div>


<div class="VenueFormRow">
<label class="left"> Food Preference</label>
<div class="FormField right">
<select name="">
<option>Food Not Required </option>
<option> Breakfast </option>
<option>Lunch </option>
<option>Dinner </option>
<option>Canapes </option>
</select>


</div>
<div class="clear"></div>
</div>

<div class="VenueFormRow">
<label class="left">  Drink Preference</label>
<div class="FormField right">
<label class="">
<input type="checkbox" class="allChks left" name=""/> Drinks Not Required </label>
<div class="clear"></div>
<label><input type="checkbox" class="allChks left" name=""/> Alcoholic </label>
<div class="clear"></div>
<label><input type="checkbox" class="allChks left" name=""/> Non-Alcoholic </label>


</div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="VenueFormRow">
<label class="left">   Type of Space(s)  <span> * </span> </label>
<div class="FormField right">
<label class="">
<input type="checkbox" class="allChks left" name=""/> Bar </label>
<div class="clear"></div>
<label><input type="checkbox" class="allChks left" name=""/> Restaurant </label>
<div class="clear"></div>
<label><input type="checkbox" class="allChks left" name=""/> Pub </label>
<div class="clear"></div>
<label><input type="checkbox" class="allChks left" name=""/> Outdoor </label>
<div class="clear"></div>
<label><input type="checkbox" class="allChks left" name=""/> Reception Centre </label>
<div class="clear"></div>
<label><input type="checkbox" class="allChks left" name=""/> Activities </label>
<div class="clear"></div>
<label><input type="checkbox" class="allChks left" name=""/>  Conference Centre </label>
<div class="clear"></div>
<label><input type="checkbox" class="allChks left" name=""/> Other </label>

</div>
<div class="clear"></div>
</div>

<div class="VenueFormRow">
<label class="left">  Exclusive Space/Room required? </label>
<div class="FormField right">
<label class="">
<input type="checkbox" class="allChks left" name=""/> Yes </label>
<div class="clear"></div>


</div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="VenueFormRow">
<label class="left">Any other special requirements or considerations?</label>
<div class="FormField right">
<textarea rows="" cols="" ></textarea></div>
<div class="clear"></div>
</div>
<div class="clear"></div>
<div class="VenueFormRow">
<label class="left"> Have you already contacted some venues or have some specific venues in mind? If so, which ones?
</label>
<div class="FormField right">
<textarea rows="" cols="" ></textarea></div>
<div class="clear"></div>
</div>
<div class="clear"></div>


</div>-->

<div class="FormName">Your Details    </div>
<div class="clear"></div>

<div class="VenueForm" style="border-bottom:none;">

<div class="VenueFormRow">
<label class="left"> Name <span> * </span></label>
<div class="FormField right">
<div class="firstN left">
<input type="text" name="" style=" display: inline-block; margin-right:0;" class=""/>
<div class="clear"></div> <label> First </label>
</div>
<div class="lastN right">
<input type="text" name="" style="display: inline-block; margin-right:0; margin-left:5px;" class=""/>
<div class="clear"></div>
<label> Last </label>
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
<input type="text" name=""/></div>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="VenueFormRow">
<label class="left"> What is your best contact number? <span> * </span></label>
<div class="FormField right">
<input type="text" name=""/></div>
<div class="clear"></div>
</div>
<div class="clear"></div>
<div class="VenueFormRow " style="margin-bottom:5px;">
<label class="left"> Best time to call you?</label>
<div class="FormField right">
<input type="text" name=""/></div>
<div class="clear"></div>
</div>



<div class="clear"></div>

<div class="VenueFormRow">
<label class="left"> &nbsp;</label>
<div class="FormField right">
<input type="submit" name="" value="" class="sbmtEvent"/>

<?php echo $this->Html->image('venue/images/submit.PNG', array('width' => '161', 'height' => '44')) ?>


<div class="contact-form">
	<?php
		echo $this->Form->create('Post', array(
			'url' => array(
				'plugin' => 'contacts',
				'controller' => 'contacts',
				'action' => 'form',
				//$contact['Contact']['alias'],
			),
		));
		echo $this->Form->input('name', array('label' => __('Your name')));
		echo $this->Form->input('email', array('label' => __('Your email')));
		echo $this->Form->input('title', array('label' => __('Subject')));
		echo $this->Form->input('body', array('label' => __('Message')));
		//if ($contact['Contact']['message_captcha']):
			//echo $this->Recaptcha->display_form();
		//endif;
		echo $this->Form->end(__('Send'));
	?>
	</div>
<!--<img src="images/submit.PNG" width="161" height="44" alt="" title=""/></div>-->
<div class="clear"></div>
</div>





<div class="clear"></div>
</div>























<div class="clear"></div>
</div> <!-- req form ends here -->
<div class="ConciergeTable right">




<div class="ConciergeTableDet right" style="min-height:648px;"> 
			<div class="InnerTable" style="min-height:544px;">
			<div class="tableRow1 greyborderBottom2 "><!-- row starts here -->
			<div class="Ques font16 blue">What is Venuemob Concierge?    </div>
			<div class="Ans">
			<ul>
			<li>Venuemob Concierge is a free service that taps into our team of venue specialists who find the best venues for your event.</li>
			<li>Submit your event details, and our venue specialists begin.</li>
			<li>It's a free service and there's no obligation to book any venues that you're recommended.</li>
			</ul>
			<div class="clear"></div>
			</div>
			<div class="clear"></div>
			</div><!-- row ends here -->
			<div class="clear"></div>
			
						<div class="tableRow1 greyborderBottom2 "><!-- row starts here -->
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
			</div><!-- row ends here -->
			<div class="clear"></div>

			<div class="tableRow1 "><!-- row starts here -->
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
			</div><!-- row ends here -->
			<div class="clear"></div>
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
    	
<div class="clear"></div>


