<?php

namespace App\DTO\Context;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class Context extends DataTransferObject
{
	public array $arguments = [];
	public array $env = [];
	public array $request = [];
	public Git $git;
    public array $user = [];
    public array $job = [];

	/** @var \App\DTO\Context\Logs[] $logs */
    #[CastWith(ArrayCaster::class, itemType: Logs::class)]
	public array $logs = [];

	/** @var \App\DTO\Context\Queries[] $queries */
    #[CastWith(ArrayCaster::class, itemType: Queries::class)]
	public array $queries = [];
}
