<?php

/**
 * News Class
 */
class News extends Content implements WithTitleInterface
{
	protected $title;

	/**
	 * set the title of the News
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * get the title of the News
	 */
	public function getTitle()
	{
		return $this->title;
	}
}