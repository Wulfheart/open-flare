<?php

namespace App\DTO\Context;

use Spatie\DataTransferObject\DataTransferObject;

class Git extends DataTransferObject
{
	public ?string $hash;
	public ?string $message;
	public ?string $tag;
	public ?string $remote;
	public bool $isDirty;
}
