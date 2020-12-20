<div class="row">
    <div class="pull-left">
        <h4>Daftar Kategori Produk</h4>
    </div>
    <div class="pull-right">
        <a href="index?mod=kategori&page=add">
            <button class="btn btn-primary">Add</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>ID</td>
                <td>Nama Kategori</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($kategori != NULL){
                $no = 1;
                foreach($kategori as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['id_kategori'];?></td>
                        <td><?=$row['nama_kategori'];?></td>
                        <td>
                            <a href="index?mod=kategori&page=edit&id=<?=md5($row['id_kategori'])?>"><i class="fa fa-pencil"></i></a>
                            <a href="index?mod=kategori&page=delete&id=<?=md5($row['id_kategori'])?>" onclick="return confirm('Anda yakin akan menghapus data?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;}
            }?>
        </tbody>
    </table>
</div>