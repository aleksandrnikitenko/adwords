<?php
class Gear {
	public $result = [];
	public function __construct () {
		 $this->getPost($_POST['keywords'],$_POST['keywords1']);
		 $this->getMethod($_POST['val']);
		 $this->showResult();		
	}
	public function getPost ($incoming,$incoming1) {
		 $this->preparedData = explode("\n", $incoming);
		 $this->preparedData1 = explode("\n", $incoming1);
	}
	public function getMethod ($postvalue) {
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
	private function showResult () {
		foreach ($this->result as $key => $value) {
			if($value != '' && $value != '""' ) {
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
		echo '</pre>'; 
	}
	private function filterBy () {
		$pattern = $this->preparedData1[0];
		$pattern = '#' . trim($pattern) . '#';
		foreach ($this->preparedData as $key => $value) {
			if(preg_match($pattern, $value)) {
				array_push($this->result, $value);
			} else {
				continue;
			} 
		}
	}
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
			array_push($this->result, $this->preparedData1[0]{0} . trim($value) . $this->preparedData1[0]{1});
			
		}
	} 
}

class DataBase {
	private $link;

	public function __construct() {
		$this->connect();
	}
	private function connect () {
		$config = require_once'config.php';		
		$dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';chaeset='.$config['charset'];				
		$this->link = new PDO ($dsn,$config['username'],$config['password']);
		
		if($this->link) {
			echo "Connected";
		} else die('Connection failed');
		//return $this;
	}
	public function execute ($sql) {
		$sth = $this->link->prepare($sql);
		return $sth->execute();
	}
	public function query ($sql) {
		$exe = $this->execute($sql);
		$result = $this->exe->fetchAll(PDO::FETCH_ASSOC);
		if ($result === false) {
			return [];
		}
		return $result;
	}
}
//echo 'OK';
$db = new DataBase ();

/* CREATE */
/*$db->execute("
	INSERT INTO user 
	(username,password) 
	VALUES 
	('Aleksandr','Даладно');
	");
*/

/* UPDATE */	
/*$db->execute("
	UPDATE user
	SET password = 'me709897'
	WHERE password ='107310';
	");*/

/* DELETE */
/*$db->execute("
	DELETE FROM user	
	");*/

$a = $db->execute("
	SELECT * 
	WHERE id>3
	");
	
?>

