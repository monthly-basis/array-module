<?php
namespace MonthlyBasis\ArrayModule\Service\Path;

use MonthlyBasis\ArrayModule\Service as ArrayModuleService;

class StringOrNull
{
    public function __construct(
        ArrayModuleService\Path\Exist $existService,
        ArrayModuleService\Path\Value $valueService
    ) {
        $this->existService = $existService;
        $this->valueService = $valueService;
    }

    /**
     * @return string|null
     */
    public function getStringOrNull(
        $path,
        $array,
        int $maxLength
    ) {
        if (!$this->existService->doesExist($path, $array)) {
            return null;
        }

        $string = (string) $this->valueService->getValue(
            $path,
            $array
        );

        return (strlen($string) > $maxLength) ? null : $string;
    }
}
