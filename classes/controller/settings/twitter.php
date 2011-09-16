<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Twitter Settings Controller
 *
 * PHP version 5
 * LICENSE: This source file is subject to GPLv3 license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/gpl.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.swiftly.org
 * @subpackage Controllers
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU General Public License v3 (GPLv3) 
 */
class Controller_Settings_Twitter extends Controller_Settings_Main {
	
	/**
	 * @return	void
	 */
	public function before()
	{
		// Execute parent::before first
		parent::before();
		$this->template->header->tab_menu->active = 'twitter';
	}
	
	/**
	 * List all the available settings
	 *
	 * @param   string $page - page uri
	 * @return  void
	 */
	public function action_index()
	{
		$this->template->content = View::factory('twitter/settings')
			->bind('post', $post)
			->bind('errors', $errors);
		
		// save the data
		if ($_POST)
		{
			$settings = ORM::factory('twitter_setting');
			$post = $settings->validate($_POST);
			if ($post->check())
			{
				$settings = ORM::factory('twitter_setting')
					->where('key', '=', 'consumer_key')
					->find();
				$settings->key = 'consumer_key';
				$settings->value = $post['consumer_key'];
				$settings->save();
				
				$settings = ORM::factory('twitter_setting')
					->where('key', '=', 'consumer_secret')
					->find();
				$settings->key = 'consumer_secret';
				$settings->value = $post['consumer_secret'];
				$settings->save();
				
				// Always redirect after a successful POST to prevent refresh warnings
				$this->request->redirect('settings/twitter');
			}
			else
			{
				//validation failed, get errors
				$errors = $post->errors('projects');
			}
		}
		else
		{
			$settings = ORM::factory('twitter_setting')->find_all();
			foreach ($settings as $setting)
			{
				$post[$setting->key] = $setting->value;
			}
		}
	}
}