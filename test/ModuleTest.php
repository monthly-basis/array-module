<?php
namespace MonthlyBasis\ArrayModuleTest;

use MonthlyBasis\ArrayModule\Module;
use LeoGalleguillos\Test\ModuleTestCase;

class ModuleTest extends ModuleTestCase
{
    protected function setUp(): void
    {
        $this->module = new Module();
    }
}
