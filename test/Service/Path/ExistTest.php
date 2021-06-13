<?php
namespace LeoGalleguillos\ArrayModuleTest\Service\Path;

use LeoGalleguillos\ArrayModule\Service as ArrayModuleService;
use PHPUnit\Framework\TestCase;

class ExistTest extends TestCase
{
    protected function setUp(): void
    {
        $this->existService = new ArrayModuleService\Path\Exist();
    }

    public function testDoesExist()
    {
        $array = [
            'a' => 1,
            'c' => [
                'd' => null
            ],
            'e' => 12345,
            'f' => [
                'g' => null,
                2 => [
                    'i' => new \stdClass(),
                ],
            ],
        ];

        $this->assertTrue(
            $this->existService->doesExist(
                ['a'],
                $array
            )
        );
        $this->assertFalse(
            $this->existService->doesExist(
                [0],
                $array
            )
        );
        $this->assertFalse(
            $this->existService->doesExist(
                ['b'],
                $array
            )
        );
        $this->assertTrue(
            $this->existService->doesExist(
                ['c', 'd'],
                $array
            )
        );
        $this->assertFalse(
            $this->existService->doesExist(
                ['c', 0],
                $array
            )
        );
        $this->assertTrue(
            $this->existService->doesExist(
                ['f', 2, 'i'],
                $array
            )
        );
        $this->assertTrue(
            $this->existService->doesExist(
                ['f', '2', 'i'],
                $array
            )
        );
        $this->assertFalse(
            $this->existService->doesExist(
                ['f', '2', 'j'],
                $array
            )
        );
        $this->assertFalse(
            $this->existService->doesExist(
                ['f', '2', 'i', 'j'],
                $array
            )
        );
    }
}
