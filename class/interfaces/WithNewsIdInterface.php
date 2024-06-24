<?php

/**
 * Class with News ID contract
 */
interface WithNewsIdInterface
{
	public function setNewsId(string $newsId);
	
	public function getNewsId();
}