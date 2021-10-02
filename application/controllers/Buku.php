<?php
class Buku extends CI_Controller {
	public $model = null;
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Buku_model');
		$this->model = $this->Buku_model;
	}
	
	public function index(){
		$this->model->get_rows();
		$data = array('model' => $this->model);
		$this->load->view('buku_list_view', $data);
	}
	
	public function tambah(){
		#echo "Tambah"; exit;

		if(isset($_POST['btnSubmit'])){
			$this->model->judul = $_POST['txt_judul'];
			$this->model->isbn	= $_POST['txt_isbn'];
			$this->model->penerbit = $_POST['txt_penerbit'];
			$this->model->tahun_terbit = $_POST['txt_tahun_terbit'];
			$this->model->penulis = $_POST['txt_penulis'];
			//$this->model->harga = $_POST['txt_harga'];

			
			$this->model->insert();
			
			$this->model->get_rows();
			$this->load->view('buku_list_view', ['model' => $this->model]);
		}else{
			$this->load->view('buku_form_add_view', ['model' => $this->model]);
		}
	}
	
	public function edit(){
		$kode = $this->uri->segment(3);
		$this->model->get_row($kode);
		
		$this->load->view('buku_form_add_view', ['model' => $this->model]);
	}
	
	public function ubah(){
		$this->model->idbuku 		= $this->input->post('h_idbuku');
		
		$this->model->judul 		= $this->input->post('txt_judul');
		$this->model->isbn			= $this->input->post('txt_isbn');
		$this->model->penerbit		= $this->input->post('txt_penerbit');
		$this->model->tahun_terbit	= $this->input->post('txt_tahun_terbit');
		$this->model->penulis 		= $this->input->post('txt_penulis');
		$this->model->update();
		redirect('buku');
	}
	
	public function hapus(){
		$kode = $this->uri->segment(3);
		$this->model->delete($kode);
		redirect('buku');
	}
}
?>
