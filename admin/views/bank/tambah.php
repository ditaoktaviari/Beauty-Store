<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=bank&page=save" method="POST" id="formbank">
    <div class="col-md-6">
        <div class="form-group">
            <input type="hidden" name="id_bank" value="<?=(isset($_POST['id_bank']))?$_POST['id_bank']:'';?>" class="form-control">
            <label for="no_rek">No Rekening</label>
            <input type="text" name="no_rek" value="<?=(isset($_POST['no_rek']))?$_POST['no_rek']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['no_rek']))?$error['no_rek']:'';?></span>
            <label for="nama_bank">Nama Bank</label>
            <input type="text" name="nama_bank" value="<?=(isset($_POST['nama_bank']))?$_POST['nama_bank']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['nama_bank']))?$error['nama_bank']:'';?></span>
            <label for="atas_nama">Atas Nama</label>
            <input type="text" name="atas_nama" value="<?=(isset($_POST['atas_nama']))?$_POST['atas_nama']:'';?>" require class="form-control">
            <span class="text-danger"><?=(isset($error['atas_nama']))?$error['atas_nama']:'';?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>