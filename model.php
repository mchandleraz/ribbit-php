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
}