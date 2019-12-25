<?php
declare(strict_types=1);

namespace Tests\Alkaupp\Readonly;

use DateTime;
use Error;
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
        $this->expectException(Error::class);
        $this->example->firstName = 'Hugo';
    }

    public function testWarningWithReadingUnknownProperty(): void
    {
        $this->expectNotice();
        $this->expectNoticeMessage('Undefined property: Tests\Alkaupp\Readonly\Example::$unknown');
        $this->example->unknown;
    }
}
