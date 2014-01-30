<?php

require __DIR__.'/../src/SetterGetter.php';

class SetterGetterTest extends \PHPUnit_Framework_TestCase
{

    public function testSetterAndGetter()
    {
        $sg = new SetterGetter;
        $sg->setTester('string');
        $this->assertContains('string', $sg->getTester());
    }

}