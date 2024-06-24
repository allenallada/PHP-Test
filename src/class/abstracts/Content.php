<?php


namespace App\Class\Abstracts;

/**
 * Abstract class for Content related Classes
 */
abstract class Content
{
	protected int $id;

	protected string $body;

	protected string $createdAt;

	/**
	 * set Content ID
	 */
	public function setId(int $id): self
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * get Content ID
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * set Content Body
	 */
	public function setBody(string $body): self
	{
		$this->body = $body;

		return $this;
	}

	/**
	 * get Content Body
	 */
	public function getBody(): string
	{
		return $this->body;
	}

	/**
	 * set Created at of Content
	 */
	public function setCreatedAt($createdAt): self
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * get Created at of Content
	 */
	public function getCreatedAt(): string
	{
		return $this->createdAt;
	}
}
