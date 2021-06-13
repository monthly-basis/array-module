<?php
namespace MonthlyBasis\ArrayModule;

use MonthlyBasis\ArrayModule\Service as ArrayModuleService;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                ArrayModuleService\Path\Exist::class => function ($sm) {
                    return new ArrayModuleService\Path\Exist();
                },
                ArrayModuleService\Path\StringOrNull::class => function ($sm) {
                    return new ArrayModuleService\Path\StringOrNull(
                        $sm->get(ArrayModuleService\Path\Exist::class),
                        $sm->get(ArrayModuleService\Path\Value::class)
                    );
                },
                ArrayModuleService\Path\Value::class => function ($sm) {
                    return new ArrayModuleService\Path\Value();
                },
            ],
        ];
    }
}
