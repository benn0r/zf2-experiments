<?php

namespace ApplicationTest\View;

use Application\View\ActionButton;
use Application\View\ActionButtons;

use PHPUnit_Framework_TestCase;

/**
 * @backupGlobals disabled
 */
class ActionButtonsTest extends \PHPUnit_Framework_TestCase
{
    public function testAddActionButton()
    {
        $actionButtons = new ActionButtons();
        $actionButtons->addActionButton(new ActionButton('Button'));

        $buttons = $actionButtons->toArray();
        $this->assertEquals(1, count($buttons));
        $this->assertEquals('Button', $buttons[0]->getName());
    }

    public function testAddActionButtons()
    {
        $actionButtons = new ActionButtons();
        $actionButtons->addActionButtons([
            new ActionButton('Button 1'),
            new ActionButton('Button 2'),
        ]);

        $buttons = $actionButtons->toArray();
        $this->assertEquals(2, count($buttons));
        $this->assertEquals('Button 1', $buttons[0]->getName());
        $this->assertEquals('Button 2', $buttons[1]->getName());
    }

    public function testSetActionButtons()
    {
        $actionButtons = new ActionButtons();
        $actionButtons->addActionButton(new ActionButton('Button 1'));
        $actionButtons->setActionButtons([
            new ActionButton('Button 2'),
            new ActionButton('Button 3'),
        ]);

        $buttons = $actionButtons->toArray();
        $this->assertEquals(2, count($buttons));
        $this->assertEquals('Button 2', $buttons[0]->getName());
        $this->assertEquals('Button 3', $buttons[1]->getName());

        // remove previous actionbuttons
        $actionButtons->setActionButtons([]);
        $buttons = $actionButtons->toArray();
        $this->assertEquals(0, count($buttons));
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testAddActionButtonException()
    {
        $actionButtons = new ActionButtons();
        $actionButtons->addActionButton('Button');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testAddActionButtonsException()
    {
        $actionButtons = new ActionButtons();
        $actionButtons->addActionButtons(['Button']);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testSetActionButtonsException()
    {
        $actionButtons = new ActionButtons();
        $actionButtons->setActionButtons(['Button']);
    }
}