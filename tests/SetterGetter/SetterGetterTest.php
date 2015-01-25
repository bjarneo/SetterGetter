<?php

namespace SetterGetter\Tests;

use SetterGetter\SetterGetter;

class SetterGetterTest extends \PHPUnit_Framework_TestCase
{

    public function testSetterAndGetter()
    {
        $sg = new SetterGetter;
        $sg->setTester('string');
        $sg->settest_with_underscore('string');
        $this->assertContains('string', $sg->getTester());
        $this->assertContains('string', $sg->getTestWithUnderscore());
    }

    public function testSet()
    {
        $a = array(
            'method' => 'argument',
            'name_with_underscore' => 'arguments',
        );

        $sg = new SetterGetter;
        $sg->set($a);
        $this->assertContains('argument', $sg->getMethod());
        $this->assertContains('arguments', $sg->getNameWithUnderscore());
    }
}
