<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use HrphpTwitter\Twitter\TwitterClient;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $sl = $this->getServiceLocator();

        $twitterClient = $sl->get('HrphpTwitter\Twitter\TwitterClient');
        $tweets = $twitterClient->getUserFeed();
        return new ViewModel(array(
            'twitterFeed' => $tweets,
        ));
    }
}
