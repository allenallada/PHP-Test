<?php

namespace App\Class\Interfaces;

/**
 * Class with Title contract
 */
interface WithTitleInterface
{
	public function setTitle(string $title): self;

	public function getTitle(): string;
}
