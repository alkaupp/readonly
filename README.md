Installation
------------

```bash
composer require alkaupp/readonly
```

Introduction
------------

Do you wish to create data objects but don't want to maintain getter methods in your code?
It may be reasonable to create those classes with public properties but also restrict write
operations to those properties.

This library tries to tackle that problem by offering a Readonly trait that allows you to
write your data classes with private properties and still allow you to access them.

The trait prevents reassignments to your private properties. To gain full immutability you'll
have to use immutable objects.

```php
<?php
declare(strict_types=1);

namespace Tests\Alkaupp\Readonly;

use Alkaupp\Readonly\Readonly;
use DateTime;

/**
 * @property string $firstName
 * @property string $lastName
 * @property DateTime $birthday
 */
final class Example
{
    use Readonly;

    private $firstName;
    private $lastName;
    private $birthday;

    public function __construct(string $firstName, string $lastName, DateTime $birthday)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;
    }
}
```

