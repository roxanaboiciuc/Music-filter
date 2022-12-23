<?php

namespace Controllers;

class Filter {
	
	private $input;
	private $filtered_input;
	private $db_obj;
	
	public function __construct() {
		
		$this->input = !empty($_REQUEST) ? $_REQUEST : false;
		$this->filter();
		$this->db_obj = \Helpers\Database::db_connect();
		
	}
	
	private function filter() {
	
		if (!$this->input) {
		
			$this->filtered_input = false;
			
		} else {
		
			$this->filtered_input = array();
			$this->filtered_input['search'] = trim($this->input['search']);
			$this->filtered_input['webservice'] = isset($this->input['webservice']) ? $this->input['webservice'] : 0;
			
		}
		
	}
	
	public function contr_display() {
		
		$model_obj = new \Models\Filter($this->filtered_input, $this->db_obj);
		$results = $model_obj->get_results();
		
		$view_obj = new \Views\Filter($results, $this->filtered_input);
		$view_obj->generate_output();
		
	}
}