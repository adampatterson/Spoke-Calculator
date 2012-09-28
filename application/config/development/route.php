<?php if(!defined('DINGO')){die('External Access to File Denied');}

// Actoins
	route::set('action',array(
	    'controller'=>'action',
	    'function'=>'index'
	));

	route::set('action/([-_a-zA-Z0-9]+)',array(
	    'controller'=>'action',
	    'function'=>'$1'
	));

	route::set('action/([-_a-zA-Z0-9]+)/([-_a-zA-Z0-9]+)',array(
	    'controller'=>'action',
	    'function'=>'$1',
		'arguments'=>array('$2')
	));
	
	route::set('action/([-_a-zA-Z0-9]+)/([-_a-zA-Z0-9]+)/([-_a-zA-Z0-9]+)',array(
	    'controller'=>'action',
	    'function'=>'$1',
		'arguments'=>array('$2','$3')
	));
	

		route::set('api/([a-zA-Z0-9]+)', array(
	  'controller'=>'api',
	  'function'=>'$1'
	));


	  route::set('api/([a-zA-Z0-9]+)/([a-zA-Z0-9]+)', array(
	  'controller'=>'api',
	  'function'=>'$1',
	  'arguments'=>array('$2')
	));


// Default Route
route::set('default_route','page/home');

