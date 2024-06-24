<?php

class CommentManager extends ManagerSingleton
{
	/**
	 * table name "comment"
	 */
	protected string $table = 'comment';

	protected function __construct()
	{
		parent::__construct();
		require_once(ROOT . '/class/Comment.php');
	}

	/**
	 * list all comments
	 */
	public function listComments()
	{
		$db = DB::getInstance();
		$rows = $db->select("SELECT * FROM $this->table");

		$comments = [];
		foreach($rows as $row) {
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
		$db = DB::getInstance();
		$sql = "INSERT INTO $this->table (`body`, `created_at`, `news_id`) VALUES('" . $body . "','" . date('Y-m-d') . "','" . $newsId . "')";
		$db->exec($sql);
		return $db->lastInsertId($sql);
	}

	/**
	 * delete a news comment
	 */
	public function deleteComment($id)
	{
		$db = DB::getInstance();
		$sql = "DELETE FROM $this->table WHERE `id`=" . $id;
		return $db->exec($sql);
	}
}