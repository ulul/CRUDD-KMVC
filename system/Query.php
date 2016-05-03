<?php 
/**
 * Query system
 *
 * @author  Nuzulul Huda <hudanuzulul@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @package Query.php
 * 
 */ 

class Query
{
	public $query;
	public function sql($sql){
		$sql = strtolower($sql);
		$data = explode(" ", $sql);
		if ($data[0] != "select") {
			$this->builder($sql);
		}else{
			$this->query = $sql;
			return $this;
		}
	} 
	public function row_array(){
		return $this->select_row($this->query." LIMIT 1");
	}
	public function row_json(){
		return json_encode($this->select_row($this->query." LIMIT 1"));
	}
	public function result_array(){
		return $this->select_result($this->query);
	}
	public function result_json(){
		return json_encode($this->select_result($this->query));
	}
	public function select_row($sql){
		$sql = strtolower($sql);
		$data = explode(" ", $sql);

		if ($data[0] == "select") {
			try {
			$conn = DB::connection();
			$query = $conn->prepare($sql);
			$query->execute();
				if ($query->rowCount()) {			
					return $query->fetch();			
				}else{
					return FALSE;
				}
			} catch (Exception $e) {
				Render::error($e->getMessage(), 42);
			}
		}else{
			Render::error("Query salah ", 42);
		}
		
	}
	public function select_result($sql){
		$sql = strtolower($sql);
		$data = explode(" ", $sql);
		if ($data[0] == "select") {
			try {
			$conn = DB::connection();
			$query = $conn->prepare($sql);
			$query->execute();
				if ($query->rowCount()) {			
					return $query->fetchAll();			
				}else{
					return FALSE;
				}
			} catch (Exception $e) {
				Render::error($e->getMessage(), 42);
			}
		}else{
			Render::error("Query salah", 42);
		}
		
	}
	public function builder($sql = NULL){
		if ($sql != '') {
			$data = explode(" ", $sql);
			$ext = strtolower($data[0]);
				if ($ext == "insert" || $ext == "update" || $ext == "delete") {
						try {
						$conn = DB::connection();
						$query = $conn->prepare($sql);
						$query->execute();
					  		return $query->rowCount();
						} catch (Exception $e) {
							Render::error($e->getMessage(), 42);
						}
				}else{
					Render::error("Tidak dapat menemukan query {$sql} ");
				}
		}else{
			Render::error("Query kosong");
		}
		function __destruct(){
			$conn = NULL;
		}
	}
}
// End of file Query.php
