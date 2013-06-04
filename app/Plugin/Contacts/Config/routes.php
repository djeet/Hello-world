<?php

// Contact
CroogoRouter::connect('/contact', array(
	'plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'view', 'contact'
));

CroogoRouter::connect('/form', array(
	'plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'form'
));

CroogoRouter::connect('/success', array(
	'plugin' => 'contacts', 'controller' => 'contacts', 'action' => 'success'
));
