<?php

define('ROOT', __DIR__);
require_once(ROOT . '/utils/singleton/ManagerSingleton.php');
require_once(ROOT . '/utils/QueryBuilder.php');
require_once(ROOT . '/utils/NewsManager.php');
require_once(ROOT . '/utils/CommentManager.php');
require_once(ROOT . '/class/abstracts/Content.php');
require_once(ROOT . '/class/interfaces/WithTitleInterface.php');
require_once(ROOT . '/class/interfaces/WithNewsIdInterface.php');

foreach (NewsManager::getInstance()->listNews() as $news) {
	echo("############ NEWS " . $news->getTitle() . " ############\n");
	echo($news->getBody() . "\n");
	foreach (CommentManager::getInstance()->listComments() as $comment) {
		if ($comment->getNewsId() == $news->getId()) {
			echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
		}
	}
}

$commentManager = CommentManager::getInstance();
$c = $commentManager->listComments();