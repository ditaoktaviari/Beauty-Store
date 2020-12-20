<div class="row">
    <div class="pull-left">
        <h4>Daftar Admin</h4>
    </div>
    <div class="pull-right">
        <a href="index?mod=admin&page=add">
            <button class="btn btn-primary">Add</button>
        </a>
    </div>
</div>
<div class="row">
    <form action="" method="POST">
        <div class="col-md-4">
            <div class="form-group">
                <br/><input type="text" name="keyword" class="form-control" id="keyword-input" autofocus autocomplate="off">
            </div>
        </div>   
        <div class="col-md-8">
            <div class="form-group">
            <br/><button type="submit" name="submit" class="btn btn-primary" id="search-data">Search</button>
            </div>
        </div>  
    </form>
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>ID</td>
                <td>Email</td>
                <td>Password</td>
            </tr>
        </thead>
        <tbody class="data">
            <?php if($admin != NULL){
                $no = 1;
                foreach($admin as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['id_admin'];?></td>
                        <td><?=$row['email'];?></td>
                        <td><?=$row['password'];?></td>
                        <td>
                            <a href="index?mod=admin&page=edit&id=<?=md5($row['id_admin'])?>"><i class="fa fa-pencil"></i></a>
                            <a href="index?mod=admin&page=delete&id=<?=md5($row['id_admin'])?>" onclick="return confirm('Anda yakin akan menghapus data?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;}
            }?>
        </tbody>
    </table>
</div>