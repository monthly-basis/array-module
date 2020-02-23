<?php
namespace LeoGalleguillos\ArrayModule\Service;

class PathExists
{
    public function doesPathExist(
        array $path,
        array $array
    ): bool {
        if (count($path) == 1) {
            return array_key_exists($path[0], $array);
        }

        if (array_key_exists($path[0], $array)) {
            $key = array_shift($path);

            if (!is_array($array[$key])) {
                return false;
            }

            return $this->doesPathExist(
                $path,
                $array[$key]
            );
        }

        return false;
    }
}
