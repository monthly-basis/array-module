<?php
namespace MonthlyBasis\ArrayModuleTest\Service\Path;

use MonthlyBasis\ArrayModule\Service as ArrayModuleService;
use PHPUnit\Framework\TestCase;

class StringOrNullTest extends TestCase
{
    protected function setUp(): void
    {
        $this->existService = new ArrayModuleService\Path\Exist();
        $this->valueService = new ArrayModuleService\Path\Value();

        $this->stringOrNullService = new ArrayModuleService\Path\StringOrNull(
            $this->existService,
            $this->valueService
        );
    }

    public function testGetStringOrNull()
    {
        $array = [
            'a' => 123,
            'c' => [
                'd' => null
            ],
            'e' => 12345,
            'f' => [
                'g' => 'hello world',
            ],
        ];

        $this->assertSame(
            '123',
            $this->stringOrNullService->getStringOrNull(['a'], $array, 3)
        );
        $this->assertSame(
            null,
            $this->stringOrNullService->getStringOrNull(['a'], $array, 2)
        );
        $this->assertSame(
            'hello world',
            $this->stringOrNullService->getStringOrNull(['f', 'g'], $array, 100)
        );
        $this->assertSame(
            'hello world',
            $this->stringOrNullService->getStringOrNull(['f', 'g'], $array, 11)
        );
        $this->assertSame(
            null,
            $this->stringOrNullService->getStringOrNull(['f', 'g'], $array, 10)
        );
        $this->assertSame(
            null,
            $this->stringOrNullService->getStringOrNull(['f', 'g', 'h'], $array, 10)
        );
        $this->assertSame(
            null,
            $this->stringOrNullService->getStringOrNull([0], $array, 10)
        );
        $this->assertSame(
            null,
            $this->stringOrNullService->getStringOrNull([0, 1, 2, 3, 4, 5], $array, 10)
        );
        $this->assertSame(
            null,
            $this->stringOrNullService->getStringOrNull(['a', 'c'], $array, 10)
        );
    }
}
