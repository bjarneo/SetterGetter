SetterGetter
======

Auto generate setter and getters as you wish.

SetterGetter class is simply built with the magic method __call that automatically creates methods. This is also called PHP Overloading.
More information about overloading: http://www.php.net/manual/en/language.oop5.overloading.php

Installation
------------

### Old school ###

require `src/SetterGetter.php` in your project.

### Composer ###

Add this to your composer.json

```json
{
    "require": {
        "bjarneo/settergetter": "dev-master"
    }
}
```

Usage
-----

```php
require_once 'src/SetterGetter.php';

$sg = new SetterGetter;

$sg->setTest('Mama-san');
printf("%s \r\n", $sg->getTest());
// Output: Mama-san

// Set new value to "Test"
$sg->setTest('Old lady');
printf("%s \r\n", $sg->getTest());
// Output: Old lady

// You can add whatever you want to the setter
$sg->setTester(array(
    0 => 'test',
    1 => 'test2',
    2 => 'test3'
));

foreach($sg->getTester() as $key => $val) {
    printf("Key: %s :: Value: %s \r\n", $key, $val);
}
// Output:
// Key: 0 :: Value: test
// Key: 1 :: Value: test2
// Key: 2 :: Value: test3

```

License
-------

SetterGetter is licensed under the MIT License
