<?php

namespace HrphpTwitter;

use HrphpTwitter\Twitter\TwitterClientAdapter;
use Zend\Mvc\MvcEvent;
use \TwitterAPIExchange;

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
                'HrphpTwitter\Twitter\TwitterClient' => function ($sm) {
                    $clientAdapter = new TwitterClientAdapter();
                    $settings = array(
                           'oauth_access_token' => $sm->get('config')['twitter']['oauth_access_token'],
                           'oauth_access_token_secret' => $sm->get('config')['twitter']['oauth_access_token_secret'],
                           'consumer_key' => $sm->get('config')['twitter']['consumer_key'],
                           'consumer_secret' => $sm->get('config')['twitter']['consumer_secret']
                    );
                    $twitterClient = new TwitterAPIExchange($settings);
                    $clientAdapter->setTwitterClient($twitterClient);
                    return $clientAdapter;
                }
        ));
    }
}
