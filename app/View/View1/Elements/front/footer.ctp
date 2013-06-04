<div class="fullWidth"><!--footer portion starts here -->
<div class="wrapper">

<div class="footerUp">
<div class="footerBox2 left">
<div class="Fheading font16">Sign up to our newsletter</div>
<p>   Receive updates, specials and invites to our exclusive events  </p>

<div class="FooterField "><input type="text" name=""  placeholder="Name"/></div>
<div class="clear"></div>
<div class="FooterField "><input type="text" name=""  placeholder="Email"/></div>
<div class="clear"></div>
<input  class="button font16" type="submit" value="Submit"/>

</div>

<div class="footerBox2 left">
<div class="Fheading font16">Get Connected</div>

<ul>
<li class="left "><a href="#"><?php echo $this->Html->image('venue/images/fb.jpg', array('alt' => '', 'width' =>'40', 'height' => '37')) ?></a></li>
<li class="left"><a href="#"><?php echo $this->Html->image('venue/images/tw.png', array('alt' => '', 'width' =>'40', 'height' => '37')) ?></a></li>
<li class="left"><a href="#"><?php echo $this->Html->image('venue/images/unknown.png', array('alt' => '', 'width' =>'40', 'height' => '37')) ?></a></li>
<li class="left"><a href="#"><?php echo $this->Html->image('venue/images/g+.png', array('alt' => '', 'width' =>'40', 'height' => '37')) ?></a></li>




</ul>
<div class="clear-20"></div>
<div class="Fheading font16">Like us on Facebook</div>
<?php //echo $this->Html->image('venue/images/likebox.jpg', array('alt' => '', 'width' =>'40', 'height' => '37')) ?>


</div>



<div class="footerBox2 left">
<div class="Fheading font16">Support</div>
<p>Need some help? Feel free to have a chat with one of our friendly venue specialists.</p>
<a class=" button font16"  style="width: auto;" href="#">(03) 9005 7507</a>
</div>


<div class="footerBox2 right">
<p>Venuemob makes it super simple to find, compare and book function venues for your next event. Whether if you are looking for 21st venues, wedding venues, event venues or conference venues - we've got your venue hire needs covered with a hand-picked selection of Australia's best bars, restaurants, reception centres and function rooms.</p>
</div>


</div>


<div class="clear"></div>
</div>
<div class="clear"></div>
</div>

<div class="fullWidth">
	<div class="hr"></div>
	<div class="wrapper">
		<div class="footerLow">
			<div class="footerBoxA left">
				<div class="Fheading blue">About Venuemob</div>
				<ul>
					

                                        <li><?php echo $this->Html->link('Browse Function Venues', array('action' => 'browse')) ?></li>
					<li><?php echo $this->Html->link('About Us', array('action' => 'about'));?></li>
					<li><?php echo $this->Html->link('Jobs', array('action' => 'jobs'));?></li>
					<li><?php echo $this->Html->link('Press', array('action' => 'press'));?></li>
					<li><?php echo $this->Html->link('Contact', array('action' => 'contact'));?></li>
				</ul>
			</div>
			<div class="footerBoxA left">
				<div class="Fheading blue">Venue Owners</div>
				<ul>
					<li><?php echo $this->Html->link('List Your Venues', array('action' => 'list_your_venues'));?></li>
				</ul>
			</div>
			<div class="footerBox1 left">
				<div class="Fheading blue">Browse Venues by Popular Locations</div>
				<ul>
					<li><a href="popular-location.php">Melbourne CBD</a></li>
					<li><a href="popular-location.php">Richmond</a></li>
					<li class="clear"><a href="popular-location.php">Fitzroy</a></li>
					<li><a href="popular-location.php">Collingwood</a></li>
					<li class="clear"><a href="popular-location.php">St Kilda</a></li>
					<li><a href="popular-location.php">Docklands</a></li>
					<li class="clear"><a href="popular-location.php">South Yarra</a></li>
					<li><a href="popular-location.php">Southbank</a></li>
					<li class="clear"><a href="popular-location.php">Carlton</a></li>
					<li><a href="popular-location.php">South Melbourne</a></li>
					<li class="clear"><a href="popular-location.php">Prahran</a></li>
					<li><a href="popular-location.php">Windsor</a></li>
				</ul>
			</div>
			<div class="footerBox left">
				<div class="Fheading blue">Browse Venues by Collections</div>
				<ul>
					<li><a href="#">Wedding Venues</a></li>
					<li><a href="#">Party Venues</a></li>
					<li><a href="#">Melbourne Bars</a></li>
					<li><a href="#">Unique Function Venues in Melbourne</a></li>
					<li><a href="#">Corporate Function Venues in Melbourne</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
		<div class="copyright" >
			<p class="copyright"> Â© 2013 Munchmob Ltd Pty | <?php echo $this->Html->link('Terms', array('action' => 'terms'));?> | <?php echo $this->Html->link('Privacy', array('action' => 'privacy'));?> </p>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>

<?php
echo $this->Html->script(array(
            'front_js/jquery',
            'front_js/search-options',
            'front_js/modernizr',
            'front_js/select2',
            'front_js/app',
           
			
        ));
?>

 


<!--footer portion endss here --> 



