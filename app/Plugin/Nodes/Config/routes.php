


<?php

// Basic
CroogoRouter::connect('/', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'promoted'
));

CroogoRouter::connect('/promoted/*', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'promoted'
));

CroogoRouter::connect('/search/*', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'search'
));
 //CroogoRouter::connect('/browse', array('controller' => 'nodes', 'action' => 'browse'));
CroogoRouter::connect('/browse', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'browse'
));

CroogoRouter::connect('/concierge', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'concierge'
));

CroogoRouter::connect('/about', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'about'
));

CroogoRouter::connect('/jobs', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'jobs'
));

CroogoRouter::connect('/press', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'press'
));

CroogoRouter::connect('/contacts', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'contacts'
));

CroogoRouter::connect('/list_your_venues', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'list_your_venues'
));
CroogoRouter::connect('/blog', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'blog'
));
//CroogoRouter::connect('/admin', array(
	//'plugin' => 'users', 'controller' => 'users', 'action' => 'login'
//));

//CroogoRouter::connect('/:slug', array('plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'view', 'type' => 'node', 'slug!=' => 'admin'));


//CroogoRouter::connect('nodes/nodes/:slug', array('plugin' => 'nodes','controller' => 'nodes', 'action' => 'jobs', 'type' => 'page'));

//CroogoRouter::connect('/:slug', array('plugin' => 'nodes','controller' => 'nodes', 'action' => 'press', 'type' => 'page'));

//CroogoRouter::connect('/node/slug', array(
//	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'view'
//));

// Content types
CroogoRouter::contentType('blog');
//CroogoRouter::contentType('page');
CroogoRouter::contentType('node');
if (Configure::read('Install.installed')) {
	CroogoRouter::routableContentTypes();
}

// Page
//CroogoRouter::connect('/about', array(
//	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'view',
//	'type' => 'page', 'slug' => 'about'
//));
CroogoRouter::connect('/page/:slug', array(
	'plugin' => 'nodes', 'controller' => 'nodes', 'action' => 'view',
	'type' => 'page'
));
