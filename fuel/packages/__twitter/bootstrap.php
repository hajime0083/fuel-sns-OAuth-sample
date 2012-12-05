<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

Autoloader::add_core_namespace('Twitter');

Autoloader::add_classes(array(
	'Twitter\\TwitterOAuth'             => __DIR__.'/classes/TwitterOAuth.php',
	'Twitter\\OAuthException'        => __DIR__.'/classes/view/OAuthException.php',
));


/* End of file bootstrap.php */
