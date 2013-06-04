<?php
	$url = Router::url(array(
		'controller' => 'contacts',
		'action' => 'view',
		$contact['Contact']['alias'],
	), true);
	echo __('You have received a new message at: %s', $url) . "\n \n";
	echo __('Name: %s', $message['Message']['fname']) . "\n";
	echo __('Email: %s', $message['Message']['email']) . "\n";
	echo __('Subject: %s', $message['Message']['title']) . "\n";
	//echo __('IP Address: %s', $_SERVER['REMOTE_ADDR']) . "\n";
	echo __('Message: %s', $message['Message']['body']) . "\n";
?>



<?php echo 'Hi '.$message['Message']['fname'].', 

Thank you for using our concierge service. Venuemob is a free service, and we are here to help you find the best venue for your event.

So do not stress...we have got this (we have helped hundreds of people just like you book a suitable venue within days, often hours!

Here is what we are going to do now:

•	One of our super-friendly Venue Coordinators will contact you shortly either by phone or email to confirm some of your event details and answer any questions you may have.

•	We will then quickly send you a few venue recommendations suitable for your requirements. You can check out their venue details, photos and even view a 360 tour of the space.

•	Then you just let us know which ones you fancy and we will get the function managers/owners to get in touch with you.

It is that easy! And it is free. 

If you would like to contact us in the mean time, you can email us on team@venuemob.com.au or give our office a call on (03) 9005 7507

Thanks!
Venuemob

Like our service? Like us on Facebook
Our website: Venuemob
'; ?>
