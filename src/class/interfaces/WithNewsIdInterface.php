<?php

namespace App\Class\Interfaces;

/**
 * Class with News ID contract
 */
interface WithNewsIdInterface
{
	public function setNewsId(int $newsId): self;

	public function getNewsId(): int;
}
