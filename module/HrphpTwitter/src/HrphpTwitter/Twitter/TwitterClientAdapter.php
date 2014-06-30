<?php
 
namespace HrphpTwitter\Twitter;

use \TwitterAPIExchange;
use Zend\Json\Json;

class TwitterClientAdapter
{
    /**@var TwitterAPIExchange */
    private $twitterClient;

    /**
     * @param TwitterAPIExchange $twitterClient
     */
    public function setTwitterClient(TwitterAPIExchange $twitterClient)
    {
        $this->twitterClient = $twitterClient;
    }

    /**
     * @return TwitterAPIExchange
     */
    public function getTwitterClient()
    {
        return $this->twitterClient;
    }

    public function getUserFeed()
    {
        //twitter api documentation https://dev.twitter.com/docs/api/1.1
        //library documentation https://github.com/J7mbo/twitter-api-php

        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=hrphpmeetup';
        $requestMethod = 'GET';

        $this->twitterClient->setGetfield($getfield);
        $this->twitterClient->buildOauth($url, $requestMethod);
        $tweets = $this->twitterClient->performRequest();
        $phpFeed = Json::decode($tweets, Json::TYPE_OBJECT);
        return $phpFeed;
    }
}
