<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Config for Twitter Plugin
 *
 * PHP version 5
 * LICENSE: This source file is subject to the AGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/licenses/agpl.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package	   SwiftRiver - http://github.com/ushahidi/Swiftriver_v2
 * @subpackage Plugin Configs
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/licenses/agpl.html GNU Affero General Public License (AGPL) 
 */

return array(
	'twitter' => array(
		'name'			=> 'Twitter',
		'description'	=> 'Adds a Twitter channel to SwiftRiver.',
		'author'		=> 'Ushahidi Team',
		'email'			=> 'team@ushahidi.com',
		'version'		=> '0.1.0',
		'channel'       => TRUE,
		'channel_options' => array(
			'track' => array(
				'label' => __('Twitter Track'),	
				'type' => 'group',
				'default_quota' => 5,
				'options' => array(
					'keyword' => array(
						'label' => __('Keyword'),
						'type' => 'text',
						'placeholder' => 'Enter keywords separated by commas',
					),
					'user' => array(
						'label' => __('User'),
						'type' => 'text',
						'placeholder' => 'Enter twitter usernames separated by commas',
					)
				)
			)
		),
		'dependencies'	=> array(
			'core' => array(
				'min' => '0.2.0',
				'max' => '10.0.0',
			),
			'plugins' => array()	// unique plugin names
		)
	),
);