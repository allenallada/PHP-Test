<?php

namespace App\Utils\Managers;

use App\Utils\Singleton\ManagerSingleton;
use App\Utils\CommentManager;
use App\Utils\QueryBuilder;
use App\Class\News;

class NewsManager extends ManagerSingleton
{
	/**
	 * table name "news"
	 */
	protected string $table = 'news';

	/**
	 * list all news
	 */
	public function listNews()
	{
		$query = QueryBuilder::newQuery();

		$rows = $query
			->table($this->table)
			->selectAll()
			->get();

		$news = [];

		foreach ($rows as $row) {
			$n = new News();
			$news[] = $n->setId($row['id'])
				->setTitle($row['title'])
				->setBody($row['body'])
				->setCreatedAt($row['created_at']);
		}

		return $news;
	}

	/**
	 * add a record in news table
	 */
	public function addNews($title, $body)
	{
		$query = QueryBuilder::newQuery();

		return $query
			->table($this->table)
			->addInsert(
				[
					'title'      => $title,
					'body'       => $body,
					'created_at' => date('Y-m-d'),
				]
			)
			->insert();
	}

	/**
	 * deletes a news, and also linked comments
	 */
	public function deleteNews($id)
	{
		$comments = CommentManager::getInstance()->listComments();
		$idsToDelete = [];

		foreach ($comments as $comment) {
			if ($comment->getNewsId() == $id) {
				$idsToDelete[] = $comment->getId();
			}
		}

		CommentManager::getInstance()->deleteComment($idsToDelete);

		return QueryBuilder::newQuery()->delete($id);
	}
}
