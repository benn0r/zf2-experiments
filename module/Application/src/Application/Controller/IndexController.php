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
use Application\View\ActionButtons;
use Application\Entity\Contact;

/**
 * Class IndexController
 *
 * @package Application\Controller
 */
class IndexController extends AbstractActionController
{

    /**
     * @var ActionButtons
     */
    protected $actionButtons;

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
    	$this->getEventManager()->trigger('indexAction');

        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $user = new Contact();
        $user->setFullName('Marco Pivetta');

        $objectManager->persist($user);
        $objectManager->flush();

        return new ViewModel([
            'actionButtons' => $this->actionButtons->toArray()
        ]);
    }

    /**
     * @param ActionButtons $actionButtons
     */
    public function setActionButtons(ActionButtons $actionButtons)
    {
        $this->actionButtons = $actionButtons;
    }

}
