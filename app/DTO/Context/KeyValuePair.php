<?php

namespace App\DTO\Context;

use App\Enums\ValueTypeEnum;

class KeyValuePair
{
    public ValueTypeEnum $valueType;
    public function __construct(
        public string $key,
        public mixed $value,
    ){
        if(is_bool($this->value)){
            $this->valueType = ValueTypeEnum::BOOL;
        } else {
            $this->valueType = ValueTypeEnum::JSON;
        }
    }


}