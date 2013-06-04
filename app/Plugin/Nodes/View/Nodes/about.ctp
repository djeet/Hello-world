<?php //include 'header.php'; ?>
<div class="fullWidth" style="border-bottom: 3px solid #F86800; "> <!-- Heading Full Width(About)-->
	<div class="wrapper">
		<div class="body-content page-heading darkblue-color"> About
			<div class="clear"></div>
		</div>
	</div>
</div>
<div class="fullWidth grey-color"> <!-- Page Content Full Width(About)-->
	<div class="wrapper">
		<div class="body-content page-content ">
                    <?php echo $nodes['Node']['body']; ?>
<!--			<div class="content-heading text-color"> Find the Perfect Venue </div>
			<div class="content-text text-color">
				<p>The Venuemob team is making it easier for people to discover great venues around Australia for their events. We are a young team that loves to hunt down all manner of hip, elegant, professional, or unique venues. We are building a product that showcases the amazing locations we come across and at the same time, we aim to help event organisers save time and effort when looking for venues. Connecting the right people with the right spaces, that's the key. After all, everybody and every event is nothing if not individual! </p>
			</div>
			<div class="content-heading text-color"> The Company </div>
			<div class="content-text text-color">
				<p> Founded in 2012, Venuemob is an Australian internet company backed (and funded) by the University of Melbourne and the Optus Singtel Group. </p>
			</div>
			<div class="image-strip"> <img src="images/optusmelbuniinvestors.jpg" alt="" title=""  /> </div>
			<div class="content-heading text-color"> Who Exactly is Venuemob? </div>
			<div class="content-text text-color">
				<p>Venuemob is a charismatic posse, led forward by our three equally fearless founders. As with any great team though, Venuemob is also the sum of its well-oiled, hard-working, hard-playing parts. We're young, we're endlessly driven, we've probably got some sort of caffeine dependency, and by gosh do we know about hunting down the coolest venues around. </p>
			</div>-->
			<div class="image-all">
				<div class="image-row">
					<div class="left image-and-text">
						<div class="single-image"><img src="<?php echo strip_tags($nodes['Meta'][0]['value_x']); ?>" alt="" width="" height="" /></div>
						<div class="content-under-image">
							<div class="left name-designation">
								<div class="image-name darkblue-color"><?php echo $nodes['Meta'][0]['key'] ?></div>
								<div class="image-designation text-color"><?php echo $nodes['Meta'][0]['value'] ?></div>
							</div>
							<div class="right social-link">
								<div class="left social-icon"> <a href="www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="" title="" /> </a></div>
								<div class="left social-icon"> <a href="www.facebook.com/" target="_blank"><img src="images/in.png" alt="" title="" /> </a></div>
							</div>
							<div class="clear"></div>
						</div>
						
					</div>
					<div class="left image-and-text">
						<div class="single-image"><img src="<?php echo strip_tags($nodes['Meta'][3]['value_x']); ?>" alt="" width="" height="" /></div>
						<div class="content-under-image">
							<div class="left name-designation">
								<div class="image-name darkblue-color"><?php echo $nodes['Meta'][3]['key'] ?></div>
								<div class="image-designation text-color"><?php echo $nodes['Meta'][3]['value'] ?></div>
							</div>
							<div class="right social-link">
								<div class="left social-icon"> <a href="www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="" title="" /> </a></div>
								<div class="left social-icon"> <a href="www.facebook.com/" target="_blank"><img src="images/in.png" alt="" title="" /> </a></div>
							</div>
							<div class="clear"></div>
						</div>
						
					</div>
					<div class="left image-and-text">
						<div class="single-image"><img src="<?php echo strip_tags($nodes['Meta'][6]['value_x']); ?>" alt="" width="" height="" /></div>
						<div class="content-under-image">
							<div class="left name-designation">
								<div class="image-name darkblue-color"><?php echo $nodes['Meta'][6]['key'] ?></div>
								<div class="image-designation text-color"><?php echo $nodes['Meta'][6]['value'] ?></div>
							</div>
							<div class="right social-link">
								<div class="left social-icon"> <a href="www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="" title="" /> </a></div>
								<div class="left social-icon"> <a href="www.facebook.com/" target="_blank"><img src="images/in.png" alt="" title="" /> </a></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="image-row">
					<div class="left image-and-text">
						<div class="single-image"><img src="<?php echo strip_tags($nodes['Meta'][0]['value_x']); ?>" alt="" width="" height="" /></div>
						<div class="content-under-image">
							<div class="left name-designation">
								<div class="image-name darkblue-color"><?php echo $nodes['Meta'][0]['key'] ?></div>
								<div class="image-designation text-color"><?php echo $nodes['Meta'][0]['value'] ?></div>
							</div>
							<div class="right social-link">
								<div class="left social-icon"> <a href="www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="" title="" /> </a></div>
								<div class="left social-icon"> <a href="www.facebook.com/" target="_blank"><img src="images/in.png" alt="" title="" /> </a></div>
							</div>
							<div class="clear"></div>
						</div>
						
					</div>
					<div class="left image-and-text">
						<div class="single-image"><img src="<?php echo strip_tags($nodes['Meta'][3]['value_x']); ?>" alt="" width="" height="" /></div>
						<div class="content-under-image">
							<div class="left name-designation">
								<div class="image-name darkblue-color"><?php echo $nodes['Meta'][3]['key'] ?></div>
								<div class="image-designation text-color"><?php echo $nodes['Meta'][3]['value'] ?></div>
							</div>
							<div class="right social-link">
								<div class="left social-icon"> <a href="www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="" title="" /> </a></div>
								<div class="left social-icon"> <a href="www.facebook.com/" target="_blank"><img src="images/in.png" alt="" title="" /> </a></div>
							</div>
							<div class="clear"></div>
						</div>
						
					</div>
					<div class="left image-and-text">
						<div class="single-image"><img src="<?php echo strip_tags($nodes['Meta'][6]['value_x']); ?>" alt="" width="" height="" /></div>
						<div class="content-under-image">
							<div class="left name-designation">
								<div class="image-name darkblue-color"><?php echo $nodes['Meta'][6]['key'] ?></div>
								<div class="image-designation text-color"><?php echo $nodes['Meta'][6]['value'] ?></div>
							</div>
							<div class="right social-link">
								<div class="left social-icon"> <a href="www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="" title="" /> </a></div>
								<div class="left social-icon"> <a href="www.facebook.com/" target="_blank"><img src="images/in.png" alt="" title="" /> </a></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="image-row">
					<div class="left image-and-text">
						<div class="single-image"><img src="<?php echo strip_tags($nodes['Meta'][0]['value_x']); ?>" alt="" width="" height="" /></div>
						<div class="content-under-image">
							<div class="left name-designation">
								<div class="image-name darkblue-color"><?php echo $nodes['Meta'][0]['key'] ?></div>
								<div class="image-designation text-color"><?php echo $nodes['Meta'][0]['value'] ?></div>
							</div>
							<div class="right social-link">
								<div class="left social-icon"> <a href="www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="" title="" /> </a></div>
								<div class="left social-icon"> <a href="www.facebook.com/" target="_blank"><img src="images/in.png" alt="" title="" /> </a></div>
							</div>
							<div class="clear"></div>
						</div>
						
					</div>
					<div class="left image-and-text">
						<div class="single-image"><img src="<?php echo strip_tags($nodes['Meta'][3]['value_x']); ?>" alt="" width="" height="" /></div>
						<div class="content-under-image">
							<div class="left name-designation">
								<div class="image-name darkblue-color"><?php echo $nodes['Meta'][3]['key'] ?></div>
								<div class="image-designation text-color"><?php echo $nodes['Meta'][3]['value'] ?></div>
							</div>
							<div class="right social-link">
								<div class="left social-icon"> <a href="www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="" title="" /> </a></div>
								<div class="left social-icon"> <a href="www.facebook.com/" target="_blank"><img src="images/in.png" alt="" title="" /> </a></div>
							</div>
							<div class="clear"></div>
						</div>
						
					</div>
					<div class="left image-and-text">
						<div class="single-image"><img src="<?php echo strip_tags($nodes['Meta'][6]['value_x']); ?>" alt="" width="" height="" /></div>
						<div class="content-under-image">
							<div class="left name-designation">
								<div class="image-name darkblue-color"><?php echo $nodes['Meta'][6]['key'] ?></div>
								<div class="image-designation text-color"><?php echo $nodes['Meta'][6]['value'] ?></div>
							</div>
							<div class="right social-link">
								<div class="left social-icon"> <a href="www.twitter.com/" target="_blank"><img src="images/twitter.png" alt="" title="" /> </a></div>
								<div class="left social-icon"> <a href="www.facebook.com/" target="_blank"><img src="images/in.png" alt="" title="" /> </a></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>

<div class="clear"></div>
</div>
<div class="footerSep"></div>
<?php //include 'footer.php'; ?>
</body>
</html>
