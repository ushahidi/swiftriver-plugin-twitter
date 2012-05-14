<?php defined('SYSPATH') OR die('No direct script access');

/**
 * Init for the Swiftcore plugin
 *
 * @package   SwiftRiver
 * @author    Ushahidi Team
 * @category  Plugins
 * @copyright (c) 2008-2011 Ushahidi Inc <htto://www.ushahidi.com>
 */
class Twitter_Init {

	public function __construct()
	{
	    // Register as a crawler
	    Swiftriver_Crawlers::register('twitter', array(new Swiftriver_Crawler_Twitter(), 'crawl'));
	    	    
		// Validate Channel Filter Settings Input
		Swiftriver_Event::add('swiftriver.channel.option.pre_save', array($this, 'validate'));
		
		// Hook into welcome page new river creation
		Swiftriver_Event::add('swiftriver.welcome.create_river', array($this, 'add_chanel_options'));
	}
	
	/**
	 * Add channel options to a river created via the welcome page
	 * 
	 * @return	void
	 */
	public function add_chanel_options()
	{
		list($river, $user, $keywords) = Swiftriver_Event::$data;
		
		// Add a twitter channel
		$channel_filter = $river->create_channel_filter('twitter', $user->id, TRUE);
		$channel_filter->add_option('keyword', array(
			'label' => 'Keyword',
			'type' => 'text',
			'value' => trim($keywords)
		));
	}

	/**
	 * Call back method for swiftriver.river.pre_save to validate channel settings
	 */
	public function validate()
	{
		// Get the event data
		$option_data =  & Swiftriver_Event::$data;
		
		// Apply validation rules to the options
		if (isset($option_data['channel']) AND $option_data['channel'] == 'twitter')
		{
			
		}
	}

}

// Initialize the plugin
new Twitter_Init;

?>
