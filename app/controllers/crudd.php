<?php
/**
 * crudd Controller
 * Simple Create Read Update Delete Detail
 * KomprenganMVC + jQuery-2.1.4
 * By : Nuzulul Huda
 * Created with <3
 *  
 * */
class crudd extends System_controller
{
	function __construct()
	{
		// Menggambil method __construct pada parent System_controller
		parent::__construct();
		// Inisialisasi model crudd_model pada folder app/model
		$this->load->model("crudd_model");
	}
	function index(){
		// Akses db melalui crudd_model.php pada file app/model/crudd_model.php
		$data["post"] = $this->model->crudd_model->getAllPost();
		// Me load view crudd_index pada folder app/views dan membawa variabel di dalam array $data
		Render::view("crudd_index", $data);
	}
	function add_post(){
		// Cek semua inputan POST
		if (isset($_POST["save_post"])) {
			// Looping array inputan post
			foreach ($_POST as $key => $value) {
				// Ubah name menjadi variabel
				${$key} = addslashes($_POST[$key]);
				if (${$key} == "") {
					echo $key." Masih kosong<br>";
					exit();
				}
			}
			// Insert data ke db melalui model
			$this->model->crudd_model->insert_post($judul,$post,$kategory);
			// Redirect ke controller crudd dan akses method index 
			Redirect::location("crudd");			
		}
		$data["kategory"] = $this->model->crudd_model->getAllKategory();
		Render::view("add_post", $data);
	}
	function hapus(){
		// mendapatkan ID dari url
		$id = $this->uri->segments(3);
		$this->model->crudd_model->hapusPost($id);
		Redirect::location("crudd");
	}
	function update(){
		if (isset($_POST["update_post"])) {
			foreach ($_POST as $key => $value) {
				${$key} = addslashes($_POST[$key]);
				if (${$key} == "") {
					echo $key." Masih kosong<br>";
					exit();
				}
			}
			$this->model->crudd_model->update($id,$judul,$post,$kategory);
			Redirect::location("crudd");			
		}
		$id = $this->uri->segments(3);
		$data["post"] = $this->model->crudd_model->getDataPost($id);
		$data["kategory"] = $this->model->crudd_model->getAllKategory();
		Render::view("update_post",$data);
	}
	function detail(){
		$id = $this->uri->segments(3);
		$data["post"] = $this->model->crudd_model->getDataPost($id);
		Render::view("modal_detail",$data);
	}

}

// End off file crudd.php 
