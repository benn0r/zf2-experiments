<?php
/**
 * Created by JetBrains PhpStorm.
 * User: bc
 * Date: 03.07.13
 * Time: 08:54
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class IndexControllerFactory
 *
 * @package Application\Controller
 */
class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return IndexController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $controller = new IndexController();
        $controller->setActionButtons($serviceLocator->getServiceLocator()->get('ApplicationActionButtons'));

        return $controller;
    }
}