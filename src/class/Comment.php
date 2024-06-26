<?php

namespace App\Class;

use App\Class\Interfaces\WithNewsIdInterface;
use App\Class\Abstracts\Content;

/**
 * Comment class
 */
class Comment extends Content implements WithNewsIdInterface
{
	protected int $newsId;

	/**
	 * set the News ID of the Comment
	 */
	public function setNewsId(int $newsId): self
	{
		$this->newsId = $newsId;

		return $this;
	}

	/**
	 * get the News ID of the Comment
	 */
	public function getNewsId(): int
	{
		return $this->newsId;
	}
}
