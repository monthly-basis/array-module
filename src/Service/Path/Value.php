<?php
namespace LeoGalleguillos\ArrayModule\Service\Path;

class Value
{
    public function getValue(
        array $path,
        array $array
    ) {
        if (count($path) == 1) {
            return $array[$path[0]];
        }

        $key = array_shift($path);
        return $this->getValue(
            $path,
            $array[$key]
        );
    }
}
