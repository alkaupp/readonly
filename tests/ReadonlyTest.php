<?php
declare(strict_types=1);

namespace Tests\Alkaupp\Readonly;

use Alkaupp\Readonly\ReassignmentError;
use DateTime;
use PHPUnit\Framework\TestCase;

class ReadonlyTest extends TestCase
{
    /** @var Example */
    private $example;

    protected function setUp(): void
    {
        $this->example = new Example('Frank', 'Riverdance', new DateTime('1980-01-01'));
    }

    public function testCanReadAttributes(): void
    {
        $this->assertSame('Frank', $this->example->firstName);
        $this->assertSame('Riverdance', $this->example->lastName);
        $this->assertInstanceOf(DateTime::class, $this->example->birthday);
    }

    public function testThrowsExceptionOnAssignment(): void
    {
        $this->expectException(ReassignmentError::class);
        $this->example->firstName = 'Hugo';
    }
}
