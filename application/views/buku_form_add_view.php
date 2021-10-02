<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form Barang</title>
</head>

<body>
<h2>Form <?php echo isset($model->row->kode) ? 'Ubah' : 'Tambah';?> Data</h2>

<?php
if(isset($model->row->idbuku)){
	$kode_hidden = '<input type="hidden" name="h_idbuku" id="h_idbuku" value="'.$model->row->idbuku.'">';
	$kode_disable = ' disabled ';
	$action = site_url('buku/ubah');
}else{
	$kode_hidden = '';
	$kode_disable = '';
	$action = site_url('buku/tambah');
}
?>

<div style="border:#8E8585 1px solid; padding:20px; width:300px">
    <form action="<?php echo $action;?>" method="post">
     
     <div>
      <label for="judul">Judul: </label>
      <input type="text" name="txt_judul" id="txt_judul" value="<?php echo @$model->row->judul;?>" />
     </div>

     <div>
      <label for="txt_penulis">Penulis: </label>
      <input type="text" name="txt_penulis" id="txt_penulis" value="<?php echo @$model->row->penulis;?>" />
     </div>

      <div>
           <label for="txt_isbn">ISBN: </label>
           <input type="text" name="txt_isbn" id="txt_isbn" value="<?php echo @$model->row->isbn;?>" />
      </div>

     <div>
           <label for="txt_penerbit">Penerbit: </label>
           <input type="text" name="txt_penerbit" id="txt_penerbit" value="<?php echo @$model->row->penerbit;?>" />
     </div>

     <div>
           <label for="txt_tahun_terbit">Tahun Terbit: </label>
           <input type="number" name="txt_tahun_terbit" id="txt_tahun_terbit" value="<?php echo @$model->row->tahun_terbit;?>" />
     </div>

     <div>
      <?php echo $kode_hidden;?>
      
      <input type="submit" name="btnSubmit" id="btnSubmit" value="Simpan" />
      <input type="reset" name="btn_reset" id="btn_reset" value="Reset" />
     </div>
      
    </form>
   </div>
</body>
</html>
