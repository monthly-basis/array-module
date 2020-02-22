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
        $this->assertInstanceOf(
            ArrayModuleService\PathExists::class,
            $this->pathExistsService
        );
    }
}
