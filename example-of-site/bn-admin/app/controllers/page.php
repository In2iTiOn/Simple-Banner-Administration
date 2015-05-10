<?php

class PageController extends Controller {

	/**
	* find all pages and call view to represent them
	*/
	public function showAll() {
		$page = $this->model('Page');
		$this->view('home/page/pages', $page->getAllPages());
	}

	/**
	* allows to add new page
	*/
	public function add() {
		$page = $this->model('Page');
		if (isset($_POST['url'])) {
			$url = $_POST['url'];
			$page->addPage($url);
			$this->redirect("../page");	
		} else {
			$this->view('home/page/add');	
		}
	}

	/**
	* allows to delete page 
	* 
	* @param $id - page id
	*/
	public function delete($id) {
		$page = $this->model('Page');
		$page->deletePage($id);
		$this->redirect("../../page");
		$this->view('home/page/pages', $page->getAllPages());
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