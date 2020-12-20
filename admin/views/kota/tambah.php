<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=kota&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <input type="hidden" name="id_kota" value="<?=(isset($_POST['id_kota']))?$_POST['id_kota']:'';?>" class="form-control">
            <label for="nama_kota">Nama Kota</label>
            <input type="text" name="nama_kota" value="<?=(isset($_POST['nama_kota']))?$_POST['nama_kota']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['nama_kota']))?$error['nama_kota']:'';?></span>
            <label for="ongkir">Ongkir</label>
            <input type="text" name="ongkir" value="<?=(isset($_POST['ongkir']))?$_POST['ongkir']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['ongkir']))?$error['ongkir']:'';?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>