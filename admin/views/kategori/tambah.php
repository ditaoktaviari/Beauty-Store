<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=kategori&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <input type="hidden" name="id_kategori" value="<?=(isset($_POST['id_kategori']))?$_POST['id_kategori']:'';?>" class="form-control">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" name="nama_kategori" value="<?=(isset($_POST['nama_kategori']))?$_POST['nama_kategori']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['nama_kategori']))?$error['nama_kategori']:'';?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>