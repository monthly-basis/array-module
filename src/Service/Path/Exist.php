<?php
namespace MonthlyBasis\ArrayModule\Service\Path;

class Exist
{
    public function doesExist(
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

            return $this->doesExist(
                $path,
                $array[$key]
            );
        }

        return false;
    }
}
