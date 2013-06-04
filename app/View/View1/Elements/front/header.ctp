

<!-- header starts here -->
<div class="fullWidth headerHgt">
	<div class="wrapper">
		<div class="header">
			<div class="logo left"><a title="Venuemob" href="/venuemob"><?php echo $this->Html->image('venue/images/logo.png', array('alt' => 'CakePHP'))?></a></div>
			<div class="searching right"> <a class="button right login" href="list-your-venue.php">List your venue</a>
				<div class="search right">
					<select tabindex="-1" class="top-search select2-offscreen" data-placeholder="Search for a venue..." style="border-right:0;float:left;margin:0;">
						<option selected="selected"></option>
						<optgroup label="Venues">
						<option value="http://unlimitedpractice.com/171-dorcas-st">171 Dorcas St</option>
						<option value="http://unlimitedpractice.com/1806">1806</option>
						<option value="http://unlimitedpractice.com/29th-apartment">29th Apartment</option>
						<option value="http://unlimitedpractice.com/99-problems">99 Problems</option>
						<option value="http://unlimitedpractice.com/a-la-bouffe">A La Bouffe</option>
						<option value="http://unlimitedpractice.com/acoustic-cafe">Acoustic Cafe</option>
						<option value="http://unlimitedpractice.com/albert-park-hotel">Albert Park Hotel</option>
						<option value="http://unlimitedpractice.com/alumbra">Alumbra</option>
						<option value="http://unlimitedpractice.com/amber-lounge">Amber Lounge</option>
						<option value="http://unlimitedpractice.com/amelia-shaw">Amelia Shaw</option>
						<option value="http://unlimitedpractice.com/amici-bakery-cafe">Amici Bakery Cafe</option>
						</optgroup>
					</select>
				</div>
				<div class="supportNo right">Support: (03) 9005 7507</div>
			</div>
		</div>
		<!--header ends here --> 
	</div>
	<!-- wrapper ends here -->
	<div class="clear"></div>
</div>
<!-- full width ends here -->
<div class="fullWidth headBg">
	<div class="wrapper">
		<div class="headerLow">
			<div class="Location left"><a href="#">Melbourne</a></div>
			<!--location ends -->
			<div class="headerMenu right">
				<ul><?php //echo $this->Html->link('Home', array('action' => 'view', $node['Node']['id']));?>
					<li><?php echo $this->Html->link('Home', array('action' => 'promoted'));?></li>
					<li><?php echo $this->Html->link('Browse', array('action' => 'browse'));?></li>
					<li><?php echo $this->Html->link('Concierge', array('action' => 'concierge'));?></li>
				</ul>
			</div>
			<!--header menu ends here -->
			<div class="clear"></div>
		</div>
		
		<!--header Low ends here --> 
		
	</div>
	<!-- wrapper ends here -->
	
	<div class="clear"></div>
</div>
<!-- full width ends here --> 

<!--header portion ends here -->