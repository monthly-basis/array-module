<?php
namespace LeoGalleguillos\ArrayModuleTest\Service;

use LeoGalleguillos\ArrayModule\Service as ArrayModuleService;
use PHPUnit\Framework\TestCase;

class PathExistsTest extends TestCase
{
    protected function setUp()
    {
        $this->pathExistsService = new ArrayModuleService\PathExists();
    }

    public function testInitialize()
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
            $this->pathExistsService->doesPathExist(
                ['a'],
                $array
            )
        );
        $this->assertFalse(
            $this->pathExistsService->doesPathExist(
                [0],
                $array
            )
        );
        $this->assertFalse(
            $this->pathExistsService->doesPathExist(
                ['b'],
                $array
            )
        );
        $this->assertTrue(
            $this->pathExistsService->doesPathExist(
                ['c', 'd'],
                $array
            )
        );
        $this->assertFalse(
            $this->pathExistsService->doesPathExist(
                ['c', 0],
                $array
            )
        );
        $this->assertTrue(
            $this->pathExistsService->doesPathExist(
                ['f', 2, 'i'],
                $array
            )
        );
        $this->assertTrue(
            $this->pathExistsService->doesPathExist(
                ['f', '2', 'i'],
                $array
            )
        );
        $this->assertFalse(
            $this->pathExistsService->doesPathExist(
                ['f', '2', 'j'],
                $array
            )
        );
        $this->assertFalse(
            $this->pathExistsService->doesPathExist(
                ['f', '2', 'i', 'j'],
                $array
            )
        );
    }
}
