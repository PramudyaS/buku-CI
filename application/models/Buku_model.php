<?php
class Buku_model extends CI_Model {
	public $idbuku;
	public $judul;
	public $penulis;
	public $harga;
	public $isbn;
	public $penerbit;
	public $tahun_terbit;

	public $rows;
	public $row;
	
	public $labels = [];
	
	public function __construct(){
		parent::__construct();
		$this->labels = $this->_attributeLabels();
		
		//panggil lib database
		$this->load->database();
	}
	
	public function get_row($kode){
		$sql = sprintf("SELECT * FROM buku_tbl WHERE idbuku='%s'", $kode);
		
		$query = $this->db->query($sql);
		$this->row = $query->row();		
	}
	
	public function get_rows(){
		$sql = "SELECT * FROM buku_tbl ORDER BY idbuku";
		
		$query = $this->db->query($sql);
		$rows = array();
		foreach($query->result() as $row){
			$rows[] = $row;
		}
		
		$this->rows = $rows;
	}
	
	public function insert(){
		$sql = sprintf("INSERT INTO buku_tbl(judul , isbn, penulis, penerbit , tahun_terbit) VALUES('%s', '%s', '%s','%s','%s')",
				$this->judul,
				$this->isbn,
				$this->penulis,
				$this->penerbit,
				$this->tahun_terbit
				);
		
		$this->db->query($sql);
	}
	
	public function update(){
		$sql = sprintf("UPDATE buku_tbl SET judul='%s', isbn='%s' , penulis='%s' , penerbit='%s', tahun_terbit='%d' WHERE idbuku='%s' ",
				$this->judul,
				$this->isbn,
				$this->penulis,
				$this->penerbit,
				$this->tahun_terbit,
				$this->idbuku
				);

		$this->db->query($sql);
	}
	
	public function delete($kode){
		$sql = sprintf("DELETE FROM buku_tbl WHERE idbuku='%s'", $kode);		
		$this->db->query($sql);
	}
	
	public function _attributeLabels(){
		return [
			'idbuku' => 'ID Buku: ',
			'judul' => 'Judul Buku: ',
			'penulis' => 'Penulis Buku: ',
			'harga' => 'Harga: '
		 ];
	}
}
