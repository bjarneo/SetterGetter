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
            $this->setter[$this->nameGen(substr($name, 3, mb_strlen($name)))] = $argument;
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
            $this->setter[$this->nameGen($name)][0] = $arg;
        }
    }

    /**
     * @param string $name method name
     * @return string
     */
    protected function nameGen($name)
    {
        $names = null;
        if (strpos($name, '_') !== false) {
            $names = explode('_', $name);
            $names = array_map('ucfirst', $names);

            return implode('', $names);
        } else {
            return ucfirst($name);
        }
    }

    /**
     * Debug purpose
     */
    public function debug()
    {
        if (empty($this->setter)) {
            Throw new \Exception('No getter available!');
        }
        foreach($this->setter as $method => $arg) {
            echo nl2br("get{$method}()\r\n");
        }
    }
}