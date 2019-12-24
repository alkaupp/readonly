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
