<?php
namespace LeoGalleguillos\ArrayModuleTest;

use LeoGalleguillos\ArrayModule\Module;
use LeoGalleguillos\Test\ModuleTestCase;

class ModuleTest extends ModuleTestCase
{
    protected function setUp(): void
    {
        $this->module = new Module();
    }
}
