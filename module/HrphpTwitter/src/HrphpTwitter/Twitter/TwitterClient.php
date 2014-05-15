<?php
 
namespace HrphpTwitter\Twitter;



class TwitterClient {
	private $settings;
	
	public function setSettings($settings)
	{
		$this->settings = $settings;
	}
	
	public function getUserFeed() {
		//twitter api documentation https://dev.twitter.com/docs/api/1.1
		//library documentation https://github.com/J7mbo/twitter-api-php
		$twitter = new \TwitterAPIExchange($this->settings);						
	}
}           	