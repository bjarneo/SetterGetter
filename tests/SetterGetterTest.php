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

    public function testSet()
    {
        $a = array(
            'method' => 'argument',
            'methods' => 'arguments'
        );

        $sg = new SetterGetter;
        $sg->set($a);
        $this->assertContains('argument', $sg->getMethod());
    }
}