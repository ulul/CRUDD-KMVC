<?php
/**
 * crudd Model
 * Simple Create Read Update Delete Detail
 * KomprenganMVC + jQuery-2.1.4 
 * By : Nuzulul Huda
 * Created with <3
 *  
 * */
class crudd_model extends System_model
{
	function getAllPost(){
		$query = "SELECT * FROM view_post ";
		return $this->db->sql($query)->result_array();
	}	
	function getAllKategory(){
		$query = "SELECT * FROM kategory";
		return $this->db->sql($query)->result_array();
	}
	function insert_post($judul,$post,$kategory){
		$query = "INSERT INTO post VALUES('null','$judul','$post','$kategory')";
		return $this->db->sql($query);
	}
	function hapusPost($id){
		$query = "DELETE FROM post WHERE id=$id";
		$this->db->sql($query);
	}
	function getDataPost($id){
		$query = "SELECT * FROM view_post WHERE id=$id";
		return $this->db->sql($query)->row_array();
	}
	function update($id,$judul,$post,$kategory){
		$query = "UPDATE post SET judul='$judul', post='$post', id_kategory='$kategory' WHERE id=$id";
		$this->db->sql($query);
	}
}
// End off file crudd_model.php
