<?php

namespace HrphpTwitter;

use Zend\Mvc\MvcEvent;
use HrphpTwitter\Twitter\TwitterClient;

class Module
{

	public function getConfig()
	{
		return include __DIR__.'/config/module.config.php';
	}
	
    public function onBootstrap(MvcEvent $mvcEvent)
    {
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
    	return array(
    		'invokables' => array(
    				'HrphpTwitter\Twitter\TwitterFeedWrapper' => 'HrphpTwitter\Twitter\TwitterFeedWrapper',
   			),
    		'factories' => array(
    			'HrphpTwitter\Twitter\TwitterClient' => function($sm) {
    			$client = new TwitterClient();
   				$settings = array('oauth_access_token' => $sm->get('config')['twitter']['oauth_access_token'],
								   'oauth_access_token_secret' => $sm->get('config')['twitter']['oauth_access_token_secret'],
								   'consumer_key' => $sm->get('config')['twitter']['consumer_key'],
								   'consumer_secret' => $sm->get('config')['twitter']['consumer_secret']);
   				$client->setSettings($settings);
   				return $client;
   			}
  		));
    }
}

