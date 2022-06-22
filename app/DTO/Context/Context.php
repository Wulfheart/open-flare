<?php

namespace App\DTO\Context;

use App\DTO\Casters\ArrayDataCaster;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\DataTransferObject;

class Context extends DataTransferObject
{
    #[CastWith(ArrayDataCaster::class)]
	public ?ArrayData $arguments;
    #[CastWith(ArrayDataCaster::class)]
	public ?ArrayData $env;
    #[CastWith(ArrayDataCaster::class)]
	public ?ArrayData $request;
    #[CastWith(ArrayDataCaster::class)]
	public ?ArrayData $request_data;
    #[CastWith(ArrayDataCaster::class)]
	public ?ArrayData $headers;
    #[CastWith(ArrayDataCaster::class)]
	public ?ArrayData $cookies;
    #[CastWith(ArrayDataCaster::class)]
	public ?ArrayData $session;
    #[CastWith(ArrayDataCaster::class)]
	public ?ArrayData $route;
	public Git $git;
    #[CastWith(ArrayDataCaster::class)]
    public ?ArrayData $user;
    #[CastWith(ArrayDataCaster::class)]
    public ?ArrayData $job;

	/** @var \App\DTO\Context\Logs[] $logs */
    #[CastWith(ArrayCaster::class, itemType: Logs::class)]
	public array $logs = [];

	/** @var \App\DTO\Context\Queries[] $queries */
    #[CastWith(ArrayCaster::class, itemType: Queries::class)]
	public array $queries = [];
}
