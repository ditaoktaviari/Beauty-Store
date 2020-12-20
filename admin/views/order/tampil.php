<div class="row">
    <div class="pull-left">
        <h4>Daftar Orderan</h4>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>#</td>
                <td>ID</td>
                <td>Pelanggan</td>
                <td>Tanggal Order</td>
                <td>Alamat Pengiriman</td>
                <td>Kota</td>
                <td>Status Order</td>
                <td>Status Konfirmasi</td>
                <td>Status Diterima</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($order != NULL){
                $no = 1;
                foreach($order as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['id_order'];?></td>
                        <td><?=$row['nama'];?></td>
                        <td><?=$row['tgl_order'];?></td>
                        <td><?=$row['alamat_pengiriman'];?></td>
                        <td><?=$row['nama_kota'];?></td>
                        <td><?=$row['status_order'];?></td>
                        <td><?=$row['status_konfirmasi'];?></td>
                        <td><?=$row['status_diterima'];?></td>
                        <td>
                            <!-- <i href="index.php?mod=order&page=edit&id=<?=md5($row['id_order'])?>"><i class="fa fa-pencil"></i></a>  -->
                            <a href="index?mod=order&page=delete&id=<?=md5($row['id_order'])?>" onclick="return confirm('Anda yakin akan menghapus data?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;}
            }?>
        </tbody>
    </table>
</div>