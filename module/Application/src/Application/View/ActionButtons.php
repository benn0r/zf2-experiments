<?php

namespace Application\View;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use InvalidArgumentException;

/**
 * Class ActionButtons
 *
 * @package Application\View
 */
class ActionButtons implements ServiceLocatorAwareInterface
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator = null;

    /**
     * @var array
     */
    protected $actionButtons = array();

    /**
     * @param ActionButton $actionButton
     */
    public function addActionButton(ActionButton $actionButton)
    {
        array_push($this->actionButtons, $actionButton);
    }

    /**
     * @param array $actionButtons
     * @throws \InvalidArgumentException
     */
    public function addActionButtons(array $actionButtons)
    {
        foreach ($actionButtons as $actionButton) {
            if (!$actionButton instanceof ActionButton) {
                throw new InvalidArgumentException('Array must contain objects of type ActionButton');
            }
        }
        $this->actionButtons = array_merge($this->actionButtons, $actionButtons);
    }

    /**
     * @param array $actionButtons
     * @throws \InvalidArgumentException
     */
    public function setActionButtons(array $actionButtons)
    {
        $this->actionButtons = [];
        $this->addActionButtons($actionButtons);
    }

    /**
     * @return array
     */
    public function getActionButtons()
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->actionButtons;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}