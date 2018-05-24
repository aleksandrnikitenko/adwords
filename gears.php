<?php 

class Gear  {
	public $result = [];

	public function __construct () {
		$badSigns = array('+','"',"'",'[',']');

		$this->getPost($_POST['keywords'],$_POST['keywords1']);

			foreach ($this->preparedData as $key => $value) {						
				$this->preparedData[$key] = str_replace($badSigns, '', $value);					
			}
			foreach ($this->preparedData1 as $key => $value) {						
				$this->preparedData1[$key] = str_replace($badSigns, '', $value);					
			}

		$this->getMethod($_POST['val']);

		$this->showResult();		
		//header('location: index.php');
	}
	
	public function getPost ($incoming,$incoming1) {		   #READY
		 $this->preparedData = explode("\n", $incoming);
		 $this->preparedData1 = explode("\n", $incoming1); 		 		
	}

	public function getMethod ($postvalue) {				   #READY
		if($postvalue == 'concat') {
			$this->concat();
		} elseif ($postvalue == 'replace') {
			$this->replace();
		} elseif ($postvalue == 'wrap') {
			$this->wrap();
		} elseif($postvalue == 'filterBy') {
			$this->filterBy();
		}
	}

	private function showResult () {						   #READY
		foreach ($this->result as $key => $value) {
			if(!$value == '') {
				echo trim($value) . "\n";
			} else {
				continue;
			}
		} 
	}

	public function debug ($arr) {

		echo '<pre>';
			foreach ($arr as $key => $value) {
				if ($value) {
					echo(trim($value)) . "</br>";
				} else {
					unset ($key);
				} 
			}
		echo '</pre>';   							#                          #READY
		
	}
	
	private function filterBy () {
		// возвращает массив со строками, в которые входит слово из 2-го поля для ввода
		$pattern = $this->preparedData1[0];
		$pattern = '#' . trim($pattern) . '#';

		foreach ($this->preparedData as $key => $value) {
			if(preg_match($pattern, $value)) {
				array_push($this->result, $value);
			} else {
				continue;
			} 
				
		}
	}							#READY

	private function replace () {
		foreach ($this->preparedData as $value) {		
			array_push($this->result, str_replace(trim($this->preparedData1[0]), trim($this->preparedData1[1]), $value));		 
		}
	}

	private function concat () {			
		foreach ($this->preparedData as $value)  {
			foreach ($this->preparedData1 as $valueone) {
				array_push($this->result, $value . ' ' . $valueone);							
			}
		}
	}

	private function wrap () {
		foreach ($this->preparedData as $key => $value) {
			$value = mb_strtolower($value);				
			array_push($this->result, '"' . trim($value) . '"');
		}
	}
}	

?>