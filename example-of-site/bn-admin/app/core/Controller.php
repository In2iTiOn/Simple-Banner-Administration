<?php

class Controller {

	/**
	* create and return an instance of model
	* 
	* @param $model - name of model
	*/
	protected function model($model) {
		require_once 'app/models/' . $model . '.php';
		return new $model();
	}

	/**
	* Find and represent view
	* 
	* @param $view - path to view
	* @param $data - data to send to view
	*/
	protected function view($view, $data = []) {
		require_once 'app/views/' . $view . '.php';	
	}
	
}