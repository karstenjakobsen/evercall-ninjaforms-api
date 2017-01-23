<?php
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ):
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
endif;

define( 'EVERCALL_NINJAFORMS_API_VERSION', '0.9' );
define( 'EVERCALL_NINJAFORMS_MINIMUM_WP_VERSION', '3.7' );
define( 'EVERCALL_NINJAFORMS_PLUGIN_DIR', __DIR__ );

require_once 'src/Actions.php';
require_once 'src/SettingsPage.php';
require_once 'src/ActionTelemeetingInvitationSMS.php';

/**
 * Plugin Name: evercall Ninja Forms API
 * Plugin URI: http://www.evercall.dk
 * Description: Uses ninja forms v3 to connect to evercal public API
 * Version: 0.9
 * Author: Karsten Jakobsen
 * Author URI: http://www.karstenjakobsen.dk
 * License: GPL2
 */

$actions = new Actions();

if( is_admin() === true )
	$my_settings_page = new SettingsPage();