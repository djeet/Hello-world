<?php

CroogoNav::add('contacts', array(
	'icon' => array('comments', 'large'),
	'title' => __('Leads'),
	'url' => array(
		'admin' => true,
		'plugin' => 'contacts',
		'controller' => 'contacts',
		'action' => 'index',
	),
	'weight' => 50,
	'children' => array(
		'attachments' => array(
			'title' => __('All Leads'),
			'url' => array(
				'admin' => true,
				'plugin' => 'contacts',
				'controller' => 'contacts',
				'action' => 'index',
			),
		),
		'file_manager' => array(
			'title' => __('Concierge'),
			'url' => array(
				'admin' => true,
				'plugin' => 'contacts',
				'controller' => 'messages',
				'action' => 'index',
                                'status' => '0'
			),
	),
            
            'file_managers' => array(
			'title' => __('List your Venues'),
			'url' => array(
				'admin' => true,
				'plugin' => 'contacts',
				'controller' => 'messages',
				'action' => 'index',
                                'status' => '1'
			),
	),
            'file_managerss' => array(
			'title' => __('Book an Enquiry'),
			'url' => array(
				'admin' => true,
				'plugin' => 'contacts',
				'controller' => 'messages',
				'action' => 'index',
                                'status' => '2'
			),
	),
            'file_managersss' => array(
			'title' => __('News Letter'),
			'url' => array(
				'admin' => true,
				'plugin' => 'contacts',
				'controller' => 'messages',
				'action' => 'index',
                                'status' => '3'
			),
	),
	),
));

