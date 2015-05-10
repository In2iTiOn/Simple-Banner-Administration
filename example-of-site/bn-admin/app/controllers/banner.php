<?php

class BannerController extends Controller {
	
	/**
	* Find banner in model and call view to represent it
	* 
	* @param $id - banner ID
	*/
	public function show($id = NULL) {
		if ($id){
			$banner = $this->model('Banner');
			$this->view('home/banner/banner', $banner->getBannerById($id));
		} else {
			$this->view('home/error', 'Missing argument for method show()');
		}
	}


	/**
	* find all banners and call view to represent them
	*/
	public function showAll() {
		$banner = $this->model('Banner');
		$this->view('home/banner/banners', $banner->getAllBanners());
	}

	/**
	*  allows to delete banner
	* 
	* @param $id - banner ID
	*/	
	public function delete($id) {
		$banner = $this->model('Banner');
		$banner->deleteBanner($id);
		$this->redirect("../../../bn-admin");
	}

	/**
	*  allows to add a new banner 
	*/
	public function add() {
		$banner = $this->model('Banner');
		if (isset($_POST['name'])) {
			$name = $_POST['name'];
			$visible = $_POST['visible'];
			$body = $_POST['body'];
			$banner->addBanner($name, $visible, $body);
			$this->redirect("../../bn-admin");	
		} else {
			$this->view('home/banner/add');	
		}
	}

	/**
	*  allows to update banner which have already been created
	*
	* @param $id - banner ID
	*/
	public function update($id=NULL) {
		if($id) {
			$banner = $this->model('Banner');
			if (isset($_POST['name'])) {
				$name = $_POST['name'];
				$visible = $_POST['visible'];
				$body = $_POST['body'];
				$banner->updateBanner($id, $name, $visible, $body);
				$this->redirect("../../../bn-admin");		
			} else {
				$this->view('home/banner/update', $banner->getBannerById($id));	
			}	
		} else {
			$this->view('home/error', 'Missing argument for update');		
		}
	}

	/**
	*  print an id of random banner which can be show on input url
	*
	* @param $url - page url
	*/
	public function iframe($url='index') {
		$banner = $this->model('Banner');
		$id = $banner->getBannerIDByPageURL($url);
		echo $id;
	}

	/**
	*  print a html body of banner
	*
	* @param $id - banner ID
	*/
	public function showBody($id) {
		$banner = $this->model('Banner');
		$obj = $banner->getBannerById($id);
		echo $obj->body;	
	}

	/**
	*  allows to add new url to banner
	*
	* @param $bannerID - banner ID
	*/
	public function link($bannerID) {
		$banner = $this->model('Banner');
		if (isset($_POST['pageID'])) {
			$pageID = $_POST['pageID'];
			$banner->linkPageToBanner($bannerID, $pageID);
			$this->redirect("../../../bn-admin");		
		} else {
			$this->view('home/banner/link');	
		}
	}

	/**
	*  allows to delete url from banner
	*
	* @param $bannerID - banner ID
	*/
	public function unlink($bannerID) {
		$banner = $this->model('Banner');
		if (isset($_POST['pageID'])) {
			$pageID = $_POST['pageID'];
			$banner->unlinkPageFromBanner($bannerID, $pageID);
			$this->redirect("../../../bn-admin");		
		} else {
			$this->view('home/banner/unlink');	
		}
	}

	/**
	* sends http header to a client
	*
	* @param $location - location to redirect
	*/
	private function redirect($location) {
    	header('Location: ' . $location);
    }
}