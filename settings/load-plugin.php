<?php
/**
 * Configuration and loading.
 * @author Laura Dobkins <lauradobkins@paintedcloud.us>
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $pcs_settings_config;

$pcs_settings_config = array();

/**
* Base Directory Setting
*/
$pcs_settings_config['base_dir'] = __DIR__ . '/';

/**
* Base URI Settings
* Use Wordpress' plugins_url to set this if not a theme.
*/
$pcs_settings_config['base_uri'] = plugins_url( 'settings' , dirname(__FILE__) ) . '/';

/**
* Requred Classes and Libraries
*/
require_once($pcs_settings_config['base_dir'] . 'containers.php');
require_once($pcs_settings_config['base_dir'] . 'fields.php');
require_once($pcs_settings_config['base_dir'] . 'factories.php');
require_once($pcs_settings_config['base_dir'] . 'page-builders.php');