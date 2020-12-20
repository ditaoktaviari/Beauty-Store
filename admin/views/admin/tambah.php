<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=admin&page=save" method="POST">
    <div class="col-md-12">
        <div class="form-group">
            <input type="hidden" name="id_admin" value="<?=(isset($_POST['id_admin']))?$_POST['id_admin']:'';?>" class="form-control">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?=(isset($_POST['email']))?$_POST['email']:'';?>" require class="form-control" autocomplate="off">
            <span class="text-danger"><?=(isset($error['email']))?$error['email']:'';?></span>
            <label for="password">Password</label>
            <input type="password" name="password" value="<?=(isset($_POST['password']))?$_POST['password']:'';?>" require class="form-control" autocomplate="off">
            <span class="text-danger"><?=(isset($error['password']))?$error['password']:'';?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>