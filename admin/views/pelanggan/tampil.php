<div class="row">
    <div class="pull-left">
        <h4>Daftar Pelanggan</h4>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>ID</td>
                <td>Nama</td>
                <td>Telp</td>
                <td>Alamat</td>
                <td>Kota</td>
                <td>Email</td>
                <td>Password</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($pelanggan != NULL){
                $no = 1;
                foreach($pelanggan as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['id_pelanggan'];?></td>
                        <td><?=$row['nama'];?></td>
                        <td><?=$row['telp'];?></td>
                        <td><?=$row['alamat'];?></td>
                        <td><?=$row['nama_kota'];?></td>
                        <td><?=$row['email'];?></td>
                        <td><?=$row['password'];?></td>
                        <td>
                            <!-- <i href="index.php?mod=pelanggan&page=edit&id=<?=md5($row['id_pelanggan'])?>"><i class="fa fa-pencil"></i></a> -->
                            <a href="index?mod=pelanggan&page=delete&id=<?=md5($row['id_pelanggan'])?>" onclick="return confirm('Anda yakin akan menghapus data?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;}
            }?>
        </tbody>
    </table>
</div>