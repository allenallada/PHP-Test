<?php

namespace App\Utils\Managers;

use App\Utils\Singleton\ManagerSingleton;
use App\Utils\QueryBuilder;
use App\Class\Comment;

class CommentManager extends ManagerSingleton
{
	/**
	 * table name "comment"
	 */
	protected string $table = 'comment';

	/**
	 * list all comments
	 */
	public function listComments()
	{
		$query = QueryBuilder::newQuery();

		$rows = $query
			->table($this->table)
			->selectAll()
			->get();

		$comments = [];
		foreach ($rows as $row) {
			$n = new Comment();
			$comments[] = $n->setId($row['id'])
				->setBody($row['body'])
				->setCreatedAt($row['created_at'])
				->setNewsId($row['news_id']);
		}

		return $comments;
	}

	/**
	 * add News comment
	 */
	public function addCommentForNews($body, $newsId)
	{
		$query = QueryBuilder::newQuery();

		return $query
			->table($this->table)
			->addInsert(
				[
					'body'       => $body,
					'news_id'    => $newsId,
					'created_at' => date('Y-m-d'),
				]
			)
			->insert();
	}

	/**
	 * delete a news comment
	 */
	public function deleteComment($id)
	{
		return QueryBuilder::newQuery()->delete($id);
	}
}
