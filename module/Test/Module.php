<?php

namespace Test;

use Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\Exception\ServiceNotFoundException;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();

        try {
            $actionButtons = $e->getApplication()->getServiceManager()->get('ApplicationActionButtons');
            $actionButtons->addActionButton(new Application\View\ActionButton('Button from Test Module'));
        } catch (ServiceNotFoundException $ex) {
            // application module seems inexistent
        }

        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        // listen to an event from application module
        $eventManager->getSharedManager()->attach('Application', 'indexAction', function($e) {
            $this->foo();
        });
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function foo()
    {
        //die('foo called');
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
}
