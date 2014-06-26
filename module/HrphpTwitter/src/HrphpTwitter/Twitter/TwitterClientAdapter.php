<?php
 
namespace HrphpTwitter\Twitter;

use \TwitterAPIExchange;
use Zend\Json\Json;

class TwitterClientAdapter
{
    private $settings;
    /**@var TwitterAPIExchange */
    private $twitterClient;

    public function setSettings($settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param $twitterClient
     */
    public function setTwitterClient(TwitterAPIExchange $twitterClient)
    {
        $this->twitterClient = $twitterClient;
    }

    public function getUserFeed()
    {
        //twitter api documentation https://dev.twitter.com/docs/api/1.1
        //library documentation https://github.com/J7mbo/twitter-api-php

        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=hrphpmeetup';
        $requestMethod = 'GET';

        $tweets = $this->twitterClient->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        $phpFeed = Json::decode($tweets, Json::TYPE_OBJECT);
        return $phpFeed;

    }
}
