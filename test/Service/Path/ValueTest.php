<?php
namespace MonthlyBasis\ArrayModuleTest\Service\Path;

use MonthlyBasis\ArrayModule\Service as ArrayModuleService;
use PHPUnit\Framework\TestCase;

class ValueTest extends TestCase
{
    protected function setUp(): void
    {
        $this->valueService = new ArrayModuleService\Path\Value();
    }

    public function testGetValue()
    {
        $int       = 123;
        $string    = 'Hello World!';
        $stdObject = new \stdClass();

        $array = [
            'a' => $int,
            'c' => [
                'd' => null
            ],
            'e' => 12345,
            'f' => [
                'g' => $string,
                2 => [
                    'i' => $stdObject,
                ],
            ],
        ];

        $this->assertSame(
            $int,
            $this->valueService->getValue(
                ['a'],
                $array
            )
        );
        $this->assertSame(
            $string,
            $this->valueService->getValue(
                ['f', 'g'],
                $array
            )
        );
        $this->assertSame(
            $stdObject,
            $this->valueService->getValue(
                ['f', '2', 'i'],
                $array
            )
        );
    }
}
