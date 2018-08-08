<?php 
class Topic{
	//init DB Vapriable
	private $db;

	/**
	 * Constructor
	 */
	public function __construct(){
		$this->db = new Database();
	}
	/**
	 * Get All Topics 
	 */
	public function getAllTopics(){
		$this->db->query("SELECT topics.*, users.username, users.avatar, categories.name FROM topics
						INNER JOIN users 
						ON topics.user_id = users.id 
						INNER JOIN categories 
						ON topics.category_id = categories.id 
						ORDER BY create_date DESC
						");
		$this->db->execute();
		//Assign Result Set 
		$results = $this->db->resultset();

		return $results;
	}
	/**
	 * Get Topics by Category
	 */
	public function getByCategory($category_id) {
		$this->db->query("SELECT topics.*, categories.*, users.username, users.avatar FROM topics
			INNER JOIN  categories 
			ON topics.category_id = categories.id 
			INNER JOIN users 
			ON topics.user_id = users.id 
			WHERE topics.category_id = :category_id ");

		$this->db->bind(':category_id', $category_id);

		//Assign Results
		$results = $this->db->resultset();
		return $results;
	}

	/**
	 * Get Topics by User
	 */
	public function getByUser($user_id) {
		$this->db->query("SELECT topics.*, categories.*, users.username, users.avatar FROM topics
			INNER JOIN  categories 
			ON topics.category_id = categories.id 
			INNER JOIN users 
			ON topics.user_id = users.id 
			WHERE topics.user_id = :user_id ");

		$this->db->bind(':user_id', $user_id);

		//Assign Results
		$results = $this->db->resultset();
		return $results;
	}

	/**
	 * Get Category By ID
	 */
	public function getCategory($category_id){
		$this->db->query("SELECT * FROM categories WHERE id = :category_id");
		$this->db->bind(':category_id', $category_id);

		//Assign Row
		$row = $this->db->single();
		return $row;
	}

	/**
	 * Get User By ID
	 */
	public function getUser($user_id){
		$this->db->query("SELECT * FROM users WHERE id = :user_id");
		$this->db->bind(':user_id', $user_id);

		//Assign Row
		$row = $this->db->single();
		return $row;
	}

	/**
	 * Get total # of Users
	 */
	public function getTotalUsers(){
		$this->db->query('SELECT * FROM users');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}

	/**-
	 * Get total # of Topics
	 */
	public function getTotalTopics(){
		$this->db->query('SELECT * FROM topics');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
	/**
	 * Get total # of Categories
	 */
	public function getTotalCategories(){
		$this->db->query('SELECT * FROM categories');
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}

	/**
	 * Get total number of Replies 
	 */
	public function getTotalReplies($topic_id){
		$this->db->query('SELECT * FROM replies WHERE topic_id = '.$topic_id);
		$rows = $this->db->resultset();
		return $this->db->rowCount();
	}
	
	/**
	 * Get Topic By ID
	 */
	public function getTopic($id) {
		$this->db->query("SELECT topics.*, users.username, users.name, users.avatar FROM topics 
			INNER JOIN users 
			ON topics.user_id = users.id
			WHERE topics.id = :id
			");
		$this->db->bind(':id', $id);

		//Assign the row 
		$row = $this->db->single();
		return $row;
	}

	/**
	 * Get Topic Replies
	 */
	public function getReplies($topic_id) {
		$this->db->query("SELECT replies.*, users.* FROM replies
			INNER JOIN users
			ON replies.user_id = users.id
			WHERE replies.topic_id = :topic_id
			ORDER BY create_date ASC 
			");
		$this->db->bind(':topic_id', $topic_id);

		//Assign Result set
		$results = $this->db->resultset();

		return $results;
	}

	/**
	 * Create Topic 
	 */
	public function create($data) {
		$this->db->query("INSERT INTO topics(user_id, category_id, title, body, last_activity) VALUES(:user_id, :category_id, :title, :body, :last_activity)
			");

		$this->db->bind(':user_id', $data['user_id']);
		$this->db->bind(':category_id', $data['category_id']);
		$this->db->bind(':title', $data['title']);
		$this->db->bind(':body', $data['body']);
		$this->db->bind(':last_activity', $data['last_activity']);

		if($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Reply Topic
	 */
	public function reply($data) {
		$this->db->query("INSERT INTO replies(topic_id, user_id, body) VALUES(:topic_id, :user_id, :body)
			");

		//Bind the values
		$this->db->bind(':topic_id', $data['topic_id']);
		$this->db->bind(':user_id', $data['user_id']);
		$this->db->bind(':body', $data['body']);

		if($this->db->execute()) {
			return true;
		} else {
			return false;
		}
	}
}