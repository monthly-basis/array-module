<?php
namespace MonthlyBasis\ArrayModuleTest;

use MonthlyBasis\ArrayModule\Module;
use MonthlyBasis\LaminasTest\ModuleTestCase;

class ModuleTest extends ModuleTestCase
{
    protected function setUp(): void
    {
        $this->module = new Module();
    }
}
