<?php

namespace App\Class;

use App\Class\Interfaces\WithTitleInterface;
use App\Class\Abstracts\Content;

/**
 * News Class
 */
class News extends Content implements WithTitleInterface
{
	protected string $title;

	/**
	 * set the title of the News
	 */
	public function setTitle(string $title): self
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * get the title of the News
	 */
	public function getTitle(): string
	{
		return $this->title;
	}
}
