<div class="row">
    <div class="pull-left">
        <h4>Daftar Bank</h4>
    </div>
    <div class="pull-right">
        <a href="index?mod=bank&page=add">
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
                <td>No Rekening</td>
                <td>Nama Bank</td>
                <td>Atas Nama</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($bank != NULL){
                $no = 1;
                foreach($bank as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['id_bank'];?></td>
                        <td><?=$row['no_rek'];?></td>
                        <td><?=$row['nama_bank'];?></td>
                        <td><?=$row['atas_nama'];?></td>
                        <td>
                            <a href="index?mod=bank&page=edit&id=<?=md5($row['id_bank'])?>"><i class="fa fa-pencil"></i></a>
                            <a href="index?mod=bank&page=delete&id=<?=md5($row['id_bank'])?>" onclick="return confirm('Anda yakin akan menghapus data?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;}
            }?>
        </tbody>
    </table>
</div>