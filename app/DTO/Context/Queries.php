<?php

namespace App\DTO\Context;

use Spatie\DataTransferObject\DataTransferObject;

class Queries extends DataTransferObject
{
	public string $sql;
	public float $time;
	public string $connection_name;
	public array $bindings;
	public float $microtime;
}
