<?php

/**
 * Comment class
 */
class Comment extends Content implements WithNewsIdInterface
{
	protected $newsId;

	/**
	 * set the News ID of the Comment
	 */
	public function setNewsId($newsId)
	{
		$this->newsId = $newsId;

		return $this;
	}

	/**
	 * get the News ID of the Comment
	 */
	public function getNewsId()
	{
		return $this->newsId;
	}
}