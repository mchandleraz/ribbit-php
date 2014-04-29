class Model {
	private $db; //holds mysqli var

	function __construct(){
		$this->db = new mysqli('localhost', 'root', 'Duaphl3x2', 'Ribbit');
	}

	private function select($table, $arr){
		$query = "SELECT * FROM " . $table;
		$pref = " WHERE ";

		foreach($arr as $key => $value){
			$query .= $pref . $key . "='" . $value . "'";
			$pref = " AND ";
		}
		
		$query .= ";";

		return $This->db->query($query);

	}

	private function insert($table, $arr){
		$query = "INSERT INTO " . $table . " (";
		$pref = "";

		foreach($arr as $key => $value){
			$query .= $pref . $key;
			$pref = ", ";
		}

		$query .= ") VALUES (";
		$pref = "";

		foreach ($arr as $key => $value){
			$query .= $pref . "'" . $value . "'";
			$pref = ", ";
		}

		$query .= ");";

		return $this->db->query($query);

	}

	private function delete($table, $arr){
		$query = "DELETE FROM " . $table;
		$pref = " WHERE ";

		foreach ($arr as $key => $value){
			$query .= $pref . $key . "='" . $value . "'";
			$pref = " AND ";
		}

		$query .= ";"

		return $this->db->query($query);

	}

	private function exists($table, $arr){
		$res = $this->select($table, $arr);

		return ($res->num_rows > 0) ? true : false;

	}

}