<?php

namespace Views;

class Filter {
	
	private $results;
	private $filtered_input;
	
	public function __construct($a, $b) {
		
			$this->results = $a;
			$this->filtered_input = $b;
		
	}
	
	public function generate_output() {
		
			if ($this->filtered_input['webservice']==0) {
				
				$this->generate_output_html();
				
			} else {
				
				$this->generate_output_json();
			}
	
	}
	
	private function generate_output_json() {
		
			$response_arr = array();
			
			while ($row = $this->results->fetch()) {
				
				$response_arr []= $row;
				
			}
			
			$output = json_encode($response_arr);
			
			echo $output;
	}
	
	private function generate_output_html() {
		
		$input_str = !$this->filtered_input ? '' : $this->filtered_input['search'];
		
			$output  = '<form>';
			$output .= '<H3> Proiect Final: Back-end Web Development - Modulul 1 (PHP/MySQL) </H3> ';
			$output .= '<H4> Music filter:</H4> ';
			$output .= '<input type="text" name="search" value="'.$input_str.'" placeholder="Ex: Metallica"> ';
			$output .= '<input type="submit" value="Search"> ';
			$output .= '<br><a href="/music-filter">Reset</a> ';
			$output .= '</form><hr>';
		
		$entries = $this->results->rowCount();
				
		if ($entries == 0) {
			
			$output .= 'No hits found!';
			
		} else {
			
			if (!empty($this->filtered_input['search'])) {
			
				$output .= '<p>Number of hits found: '.$entries.'</p>';
			
			}
		
		$output .= '<ul>';
				
			foreach ($this->results as $row) {
				$output .='<li>'.$row['artist'].' - '.$row['song_name'].'<br> Album: '.$row['album'].'<br>Year: '.$row['released'].
						'<br>Genre: '.$row['genre'].'</li><br>'; 
					
			}

		$output .= '</ul>';
		
		}
		
		echo $output;
		
	}	
	
}