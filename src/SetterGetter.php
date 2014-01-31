<?php

/**
 *
 * Class SetterGetter
 *
 * @author Bjarne Øverli
 * @package SetterGetter
 *
 */
class SetterGetter
{
    /**
     *
     * Add our setters to an array
     *
     * @var array $setter
     */
    protected $setter = array();

    /**
     *
     * Dynamically create setter and getter methods
     *
     * @param $name method name
     * @param $argument method arguments
     * @return string|array our setter values
     * @throws \Exception
     */
    public function __call($name, $argument)
    {
        // if is set method, add argument to setter array
        if (substr($name, 0, 3) === 'set') {
            $this->setter[substr($name, 3, mb_strlen($name))] = $argument;
        }

        // if is get method, return get value
        if (substr($name, 0, 3) === 'get') {
            $method = substr($name, 3, mb_strlen($name));
            if (array_key_exists($method, $this->setter)) {
                return $this->setter[$method][0];
            } else {
                Throw new \Exception('Couldn\'t find getter method. Did you forget to create a setter?');
            }
        }
    }

    /**
     *
     * Add an array with method name and arguments
     *
     * @param array $setters
     */
    public function set(array $setters = array())
    {
        foreach($setters as $name => $arg) {
            $this->setter[ucfirst($name)][0] = $arg;
        }
    }

    /**
     * Debug purpose
     */
    public function debug()
    {
        var_dump($this->setter);
    }
}