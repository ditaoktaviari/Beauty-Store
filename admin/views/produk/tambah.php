<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=produk&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <input type="hidden" name="id_produk" value="<?=(isset($_POST['id_produk']))?$_POST['id_produk']:'';?>">
            <input type="hidden" name="photo_old"  value="<?=(isset($_POST['photo']))?$_POST['photo']:'';?>" >

            <label for="kategori">Kategori</label>
            <select name="id_kategori" class="form-control" required id="" >
                <option value="">Pilih Kategori</option>
                <?php if($kategori != NULL){
                    foreach($kategori as $row){?>
                        <option <?=(isset($_POST['id_kategori']) && $_POST['id_kategori']==$row['id_kategori'] )?"selected":'';?> value="<?=$row['id_kategori'];?>"> <?=$row['nama_kategori'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($error['kategori']))?$error['kategori']:'';?></span>

            <label for="nama_produk">Nama</label>
            <input type="text" name="nama_produk" value="<?=(isset($_POST['nama_produk']))?$_POST['nama_produk']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['nama_produk']))?$error['nama_produk']:'';?></span>

            <label for="harga_beli">Harga Beli</label>
            <input type="text" name="harga_beli" value="<?=(isset($_POST['harga_beli']))?$_POST['harga_beli']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['harga_beli']))?$error['harga_beli']:'';?></span>
            
            <label for="">Gambar Produk</label>
            <img src="../media/<?=$_POST['photo']?>" width="100">
            <input type="file" name="fileToUpload" class="form-control">
            <span class="text-danger"><?=(isset($error['fileToUpload']))?$error['fileToUpload']:'';?></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <input type="text" name="harga_jual" value="<?=(isset($_POST['harga_jual']))?$_POST['harga_jual']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['harga_jual']))?$error['harga_jual']:'';?></span>

            <label for="stok">Stok</label>
            <input type="text" name="stok" value="<?=(isset($_POST['stok']))?$_POST['stok']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['stok']))?$error['stok']:'';?></span>

            <label for="berat">Berat (gram)</label>
            <input type="text" name="berat" value="<?=(isset($_POST['berat']))?$_POST['berat']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['berat']))?$error['berat']:'';?></span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="ckedtor" name="deskripsi" rows="2" value="<?=(isset($_POST['deskripsi']))?$_POST['deskripsi']:'';?>" require class="form-control"></textarea>
            <span class="text-danger"><?=(isset($error['deskripsi']))?$error['deskripsi']:'';?></span>
            
            <br/><button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
    <script>
        CKEDITOR.replace('deskripsi', {
            uiColor: '#4e73df',
            language: 'id'
        });
    </script>
</form>
