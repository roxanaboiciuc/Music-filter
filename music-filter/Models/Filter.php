<?php

namespace Models;

class Filter {

	private $filtered_input;
	private $db_obj;
		
	public function __construct($a, $b) {
		
		$this->filtered_input = $a;
		$this->db_obj=$b;
		
	}
	
	public function get_results() {
		
		try {
	
			if (!$this->filtered_input || empty($this->filtered_input['search'])) {
				
					$sql_query = "SELECT artist, song_name, album, released, genre FROM playlist ORDER BY released ASC";
				
				$results = $this->db_obj->query($sql_query);
				
				} else {
					
					$sql_arr = array (
						':search' => '%'.$this->filtered_input['search'].'%'
					);
					
					$sql_query  = "SELECT artist, song_name, album, released, genre FROM playlist ";
					$sql_query .= "WHERE artist LIKE :search OR song_name LIKE :search OR album LIKE :search OR genre LIKE :search ";
					$sql_query .= "ORDER BY released ASC";
					
					
					$results = $this->db_obj->prepare($sql_query);
				
					$results->execute($sql_arr);
					
				}
			
			return $results;
		
		} catch (\PDOException $e) {
			
			$date_str = date ('Y-m-d H:i:s');
			
			$error_msg = $date_str.' <----> '.$e->getMessage()."\r\n";
			
			file_put_contents('db_errors.log', $error_msg, FILE_APPEND);
			
			die('Database error!');
			
		}

	}
	
}