<div class="row">
    <div class="pull-left">
        <h4>Daftar Kota</h4>
    </div>
    <div class="pull-right">
        <a href="index?mod=kota&page=add">
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
                <td>Nama Kota</td>
                <td>Ongkos Kirim</td>
            </tr>
        </thead>
        <tbody>
            <?php if($kota != NULL){
                $no = 1;
                foreach($kota as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['id_kota'];?></td>
                        <td><?=$row['nama_kota'];?></td>
                        <td><?=$row['ongkir'];?></td>
                        <td>
                            <a href="index?mod=kota&page=edit&id=<?=md5($row['id_kota'])?>"><i class="fa fa-pencil"></i></a>
                            <a href="index?mod=kota&page=delete&id=<?=md5($row['id_kota'])?>" onclick="return confirm('Anda yakin akan menghapus data?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;}
            }?>
        </tbody>
    </table>
</div>