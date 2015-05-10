<?php 

class Page {

	/**
	* contains host adress
	*/
	private $host = "localhost";

	/**
	* contains database name
	*/ 
	private $dbname = "bn-admin";

	/**
	* contains user login to db
	*/
	private $user = "root";

	/**
	* contains user password to db
	*/
	private $password = ""; 

	
	/**
	* find and return page from database
	*
	* @param $id - page id
	*/
	public function getPageById($id) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "SELECT * FROM pages WHERE id = ?";
		$query = $conn->prepare($sql_string);
		$query->execute(array($id));
		$conn = null;
		return $query->fetch(PDO::FETCH_OBJ);;
	}

	/**
	* find and return all pages
	*/
	public function getAllPages() {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "SELECT * FROM pages";
		$query = $conn->prepare($sql_string);
		$query->execute();
		
		$pages = array();
		while ( ($obj = $query->fetch(PDO::FETCH_OBJ)) != NULL) {
                $pages[] = $obj;
        }
        $conn = null;
		return $pages;
	}

	/**
	* allows to add new page to database
	*
	* @param $url - page url
	*/
	public function addPage($url) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "INSERT INTO pages (url) VALUES (?)";
		$query = $conn->prepare($sql_string);
		$query->execute(array($url));
		$conn = null;
		return true;
	}

	/**
	* allows to delete page from database
	*
	* @param $id - page id
	*/
	public function deletePage($id) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "DELETE FROM pages WHERE id = ?";
		$query = $conn->prepare($sql_string);
		$query->execute(array($id));
		
		$sql_string = "DELETE FROM banners_pages WHERE pageID = ?";
		$query = $conn->prepare($sql_string);
		$query->execute(array($id));
		
		$conn = null;
		return true;	
	}
}