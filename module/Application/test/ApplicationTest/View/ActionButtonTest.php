<?php

namespace ApplicationTest\View;

use Application\View\ActionButton;
use PHPUnit_Framework_TestCase;

/**
 * @backupGlobals disabled
 */
class ActionButtonTest extends \PHPUnit_Framework_TestCase
{
    public function testActionButton()
    {
        $actionButton = new ActionButton('Button');
        $this->assertEquals('Button', $actionButton->getName());

        $actionButton->setName('Button2');
        $this->assertEquals('Button2', $actionButton->getName());
    }
}