<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=pelanggan&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <input type="hidden" name="id_pelanggan" value="<?=(isset($_POST['id_pelanggan']))?$_POST['id_pelanggan']:'';?>" class="form-control">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?=(isset($_POST['nama']))?$_POST['nama']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['nama']))?$error['nama']:'';?></span>
            <label for="telp">Telp</label>
            <input type="text" name="telp" value="<?=(isset($_POST['telp']))?$_POST['telp']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['telp']))?$error['telp']:'';?></span>
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" value="<?=(isset($_POST['alamat']))?$_POST['alamat']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['alamat']))?$error['alamat']:'';?></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kota">Kota</label>
            <select name="id_kota" class="form-control" required id="" >
                <option value="">Pilih Kota</option>
                <?php if($kota != NULL){
                    foreach($kota as $row){?>
                        <option <?=(isset($_POST['id_kota']) && $_POST['id_kota']==$row['id_kota'] )?"selected":'';?> value="<?=$row['id_kota'];?>"> <?=$row['nama_kota'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($error['kota']))?$error['kota']:'';?></span>
            <label for="email">Email</label>
            <input type="text" name="email" value="<?=(isset($_POST['email']))?$_POST['email']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['email']))?$error['email']:'';?></span>
            <label for="password">Password</label>
            <input type="password" name="password" value="<?=(isset($_POST['password']))?$_POST['password']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['password']))?$error['password']:'';?></span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>