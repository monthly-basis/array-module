<?php
namespace LeoGalleguillos\ArrayModule;

use LeoGalleguillos\ArrayModule\Service as ArrayModuleService;

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
                ArrayModuleService\PathExists::class => function ($sm) {
                    return new ArrayModuleService\PathExists();
                },
            ],
        ];
    }
}
