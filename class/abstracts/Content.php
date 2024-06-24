<?php

/**
 * Abstract class for Content related Classes
 */
abstract class Content
{
	protected $id;

	protected $body;

	protected $createdAt;

	protected $newsId;

	/**
	 * set Content ID
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * get Content ID
	 */
	public function getId()
	{
		return $this->id;
	}
    
	/**
	 * set Content Body
	 */
	public function setBody($body)
	{
		$this->body = $body;

		return $this;
	}

	/**
	 * get Content Body
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * set Created at of Content
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * get Created at of Content
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}
}