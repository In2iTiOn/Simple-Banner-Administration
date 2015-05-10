<?php 

class Banner {
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
	* find and return banner from database
	*
	* @param $id - banner id
	*/
	public function getBannerById($id) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "SELECT * FROM banners WHERE id = ?";
		$query = $conn->prepare($sql_string);
		$query->execute(array($id));
		$banner = $query->fetch(PDO::FETCH_OBJ);
		$banner->pages = $this->getPagesByBannerId($id);
		$conn = null;
		return $banner;
	}

	/**
	* find and return all URLs for banner
	*
	* @param $id - banner id
	*/
	public function getPagesByBannerId($id) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "SELECT pages.url FROM pages "
							."JOIN banners_pages ON banners_pages.pageID = pages.id "
							."JOIN banners ON banners.id = banners_pages.bannerID "
						."WHERE banners.id = ?";
		$query = $conn->prepare($sql_string);
		$query->execute(array($id));
		
		$pages = array();
		while ( ($obj = $query->fetch(PDO::FETCH_OBJ)) != NULL) {
                $pages[] = $obj;
        }
        $conn = null;
		return $pages;		
	}

	/**
	* find and return random banner for url
	*
	* @param $url - page url
	*/
	public function getBannerIDByPageURL($url){
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "SELECT banners.id FROM banners "
							."JOIN banners_pages ON banners_pages.bannerID = banners.id "
							."JOIN pages ON pages.id = banners_pages.pageID "
						."WHERE pages.url = ? AND banners.visible = 1 "
						."ORDER BY RAND() LIMIT 1";
		$query = $conn->prepare($sql_string);
		$query->execute(array($url));
		$obj = $query->fetch(PDO::FETCH_OBJ);
		if(!$obj){
			return -1;
		}
		return $obj->id;
	}

	/**
	* find all banners and return them from database
	*/
	public function getAllBanners() {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "SELECT * FROM banners";
		$query = $conn->prepare($sql_string);
		$query->execute();
		
		$banners = array();
		while ( ($obj = $query->fetch(PDO::FETCH_OBJ)) != NULL) {
                $banners[] = $obj;
        }
        $conn = null;
		return $banners;		
	}


	/**
	* allows to add new banner to database
	*
	* @param $name - banner name
	* @param $visible - banner visible or not(0 or 1)
	* @param $body - banner body
	*/
	public function addBanner($name, $visible, $body) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "INSERT INTO banners (name, visible, body) VALUES (?, ?, ?)";
		$query = $conn->prepare($sql_string);
		$query->execute(array($name, $visible, $body));
		$conn = null;
		return true;				
	}


	/**
	* allows to update banner in database
	*
	* @param $id - banner id for updating
	* @param $name - banner name
	* @param $visible - banner visible or not(0 or 1)
	* @param $body - banner body
	*/
	public function updateBanner($id, $name, $visible, $body) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "UPDATE banners SET name=?, visible=?, body=? WHERE id = ?";
		$query = $conn->prepare($sql_string);
		$query->execute(array($name, $visible, $body, $id));
		$conn = null;
		return true;
	}


	/**
	* allows to delete banner from database
	*
	* @param $id - banner id
	*/
	public function deleteBanner($id) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "DELETE FROM banners WHERE id = ?";
		$query = $conn->prepare($sql_string);
		$query->execute(array($id));
		
		$sql_string = "DELETE FROM banners_pages WHERE bannerID = ?";
		$query = $conn->prepare($sql_string);
		$query->execute(array($id));
		
		$conn = null;
		return true;	
	}


	/**
	* allows to link page to banner
	*
	* @param $bannerID - banner id
	* @param $pageID - page id
	*/
	public function linkPageToBanner($bannerID, $pageID) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "INSERT INTO banners_pages (bannerID, pageID) VALUES (?, ?)";
		$query = $conn->prepare($sql_string);
		$query->execute(array($bannerID, $pageID));
		$conn = null;
		return true;			
	}

	/**
	* allows to unlink page from banner
	*
	* @param $bannerID - banner id
	* @param $pageID - page id
	*/
	public function unlinkPageFromBanner($bannerID, $pageID) {
		$conn =  new PDO("mysql:host=".$this->host.";"."dbname=".$this->dbname, $this->user, $this->password);
		$sql_string = "DELETE FROM banners_pages WHERE bannerID = ? AND pageID = ?";
		$query = $conn->prepare($sql_string);
		$query->execute(array($bannerID, $pageID));
		$conn = null;
		return true;			
	}

}