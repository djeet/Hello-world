

<div class="fullWidth">
	<div class="listVenueBanner orange-border-bottom" style="min-height: 340px;">
		<div class="wrapper">
			<div class="SectionHeading whiteC "><?php echo $nodes['Node']['title']; ?></div>
			<div class="BannerCont">
				<div class="BannerContentL left">
                                        <p><?php echo $nodes['Node']['body']; ?></p>
					
				</div>
				<div class="BannerContentR right"><a class="button registerBtn"  href="#register">Register Interest</a></div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="fullWidth "><!--logos starts here -->
	<div class="wrapper">
		<div class="seenOn">
			<p>As Seen On</p>
			<ul>
				<li><?php echo $this->Html->image('venue/images/seenOn1.jpg', array('width' =>'165', 'height' => '35')) ?></li>
				<li><?php echo $this->Html->image('venue/images/seenOn2.jpg', array('width' =>'165', 'height' => '35')) ?></li>
				<li><?php echo $this->Html->image('venue/images/seenOn3.jpg', array('width' =>'165', 'height' => '35')) ?></li>
				<li><?php echo $this->Html->image('venue/images/seenOn4.jpg', array('width' =>'165', 'height' => '35')) ?></li>
				<li><?php echo $this->Html->image('venue/images/seenOn5.jpg', array('width' =>'165', 'height' => '35')) ?></li>



			</ul>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<!--logos ends here -->

<div class="clear"></div>
<div class="fullWidth grey-color">
	<div class="footerSep"></div>
	<div class="wrapper">
		<div class="Feature">
			<div class="ContentHeading  ">Why Venuemob?</div>
			<div class="FeatureRow">
				<div class="FeatureL left">
					<div class="FeatureHeading blue"><?php echo $nodes['Meta'][0]['value']; ?></div>
					<p><?php echo $nodes['Meta'][0]['value_x']; ?></p>
				</div>
				<div class="FeatureR right">
					<div class="FeatureHeading blue"><?php echo $nodes['Meta'][1]['value']; ?></div>
					<p ><?php echo $nodes['Meta'][1]['value_x']; ?></p>
				</div>
			</div>
			<!--feature row ends here -->
			
			<div class="clear"></div>
			<div class="FeatureRow">
				<div class="FeatureL left">
					<div class="FeatureHeading blue"><?php echo $nodes['Meta'][2]['value']; ?></div>
					<p><?php echo $nodes['Meta'][2]['value_x']; ?></p>
				</div>
				<div class="FeatureR right">
					<div class="FeatureHeading blue"><?php echo $nodes['Meta'][3]['value']; ?></div>
					<p ><?php echo $nodes['Meta'][3]['value_x']; ?></p>
				</div>
				<div class="clear"></div>
			</div>
			<!--feature row ends here -->
			<div class="clear"></div>
			<div class="FeatureRow">
				<div class="FeatureL left">
					<div class="FeatureHeading blue"><?php echo $nodes['Meta'][4]['value']; ?></div>
					<p><?php echo $nodes['Meta'][4]['value_x']; ?></p>
				</div>
				<div class="FeatureR right">
					<div class="FeatureHeading blue"><?php echo $nodes['Meta'][5]['value']; ?></div>
					<p ><?php echo $nodes['Meta'][5]['value_x']; ?></p>
				</div>
				<div class="clear"></div>
			</div>
			<!--feature row ends here -->
			
			<div  align="center" > <a class="button centBtn"  href="#">Register Interest</a>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="fullWidth blueBg">
	<div class="wrapper">
		<div class="FormSection">
			<div class="BlueBgHeading whiteC">Sound good?</div>
			<div class="font22 whiteC formSubhead">Register your interest to find out if your venue is suitable.</div>
			<div class="FormLeft left" > <?php
                        echo $this->Form->create('Message', array(
                            'url' => array(
                                'plugin' => 'contacts',
                                'controller' => 'contacts',
                                'action' => 'view1',
                                //$contact['Contact']['alias'],
                            ),
                        ));
                        ?><?php echo $this->Form->input('Message.contact_id', array('type' => 'hidden',  'value' => '2')); ?>
                          <?php echo $this->Form->input('Message.status', array('type' => 'hidden',  'value' => '1')); ?>
                         <?php echo $this->Form->input('Message.body', array('type' => 'hidden',  'value' => $this->Html->url( null, true ))); ?>
				<div class="formRow">
					<label >Your name:</label>
                                        <?php echo $this->Form->input('Message.name', array('type' => 'text', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<input  type="text" name=""  />-->
				</div>
				<div class="clear"></div>
				<div class="formRow">
					<label>Venue name:</label>
                                        <?php echo $this->Form->input('Message.lname', array('type' => 'text', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<input  type="text" name=""  />-->
				</div>
				<div class="clear"></div>
				<div class="formRow">
					<label>Email address:</label>
                                        <?php echo $this->Form->input('Message.email', array('type' => 'text', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<input  type="text" name=""  />-->
				</div>
				<div class="clear"></div>
				<div class="formRow">
					<label>Phone:</label>
                                        <?php echo $this->Form->input('Message.phone', array('type' => 'text', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<input  type="text" name=""  />-->
				</div>
				<div class="clear"></div>
                            <?php        //echo $this->Form->end(__('Send')); ?>
			</div>
			<div class="FormR left">
				<div class="formRow">
					<label>State:</label>
                                        
                                        <?php
                              echo $this->Form->input('Message.enquiry_form_state', array(
                                  'options' => array('VIC' => 'VIC', 'NSW' => 'NSW', 'QLD' => 'QLD', 'SA' => 'SA', 'WA' => 'WA', 'NT' => 'NT', 'ACT' => 'ACT', 'TAS' => 'TAS'),
                                  'empty' => '(choose one)',
                                  'label' => '',
                                  'style' => 'padding-top:25;'
                              ));
// echo $this->Form->input('Message.food_preference', array('option' => array('Food Not Required', 'Breakfast', 'Lunch', 'Dinner', 'Canapes'))); 
                              ?>
<!--					<select>
						<option></option>
						<option val="vic">VIC</option>
						<option val="nsw">NSW</option>
						<option val="qld">QLD</option>
						<option val="sa">SA</option>
						<option val="wa">WA</option>
						<option val="nt">NT</option>
						<option val="act">ACT</option>
						<option val="tas">TAS</option>
					</select>-->
				</div>
				<div class="clear"></div>
				<div class="formRow">
					<label>Additional Comments (optional):</label>
                                         <?php echo $this->Form->input('Message.enquiry_form_comment', array('type' => 'textarea', 'label' => '', 'class' => '', 'div' => '', 'value' => '', 'style' => 'display: inline-block; margin-right:0;')); ?>
<!--					<textarea name=""  rows="" cols="" ></textarea>-->
				</div>
				<div class="clear"></div>
				</div>
			<div class="clear"></div>
		<div class="formRowBtn">
				<div align="center">
                                  <div class="submit">
                                    <input type="submit" class="button formBtn" value="Register Interest">
                                   
<!--	<input  class="button formBtn" type="submit" value="Register Interest" /></div>--></div>
			</div>
			<div class="clear"></div></div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<div class="clear-20"></div>