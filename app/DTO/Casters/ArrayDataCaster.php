<?php

namespace App\DTO\Casters;

use App\DTO\Context\ArrayData;
use App\DTO\Context\KeyValuePair;
use Spatie\DataTransferObject\Caster;

class ArrayDataCaster implements Caster
{
    /**
     * @throws \Exception
     */
    public function cast(mixed $value): mixed
    {
        if (! is_array($value)) {
            throw new \Exception('Can only cast an array');
        }

        $eigenvalues = [];
        foreach ($value as $key => $v) {
            $eigenvalues[] = new KeyValuePair((string) $key, $v);
        }

        return new ArrayData($eigenvalues);
    }
}
