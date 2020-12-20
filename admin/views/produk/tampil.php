<div class="row">
    <div class="pull-left">
        <h4>Daftar Produk</h4>
    </div>
    <div class="pull-right">
        <a href="index?mod=produk&page=add">
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
                <td>Kategori</td>
                <td>Nama Produk</td>
                <td>Deskripsi</td>
                <td>Harga</td>
                <td>Stok</td>
                <td>Berat</td>
                <td>Tanggal</td>
                <td>Gambar</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($produk != NULL){
                $no = 1;
                foreach($produk as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['id_produk'];?></td>
                        <td><?=$row['nama_kategori'];?></td>
                        <td><?=$row['nama_produk'];?></td>
                        <td><?=$row['deskripsi'];?></td>
                        <td>Rp <?=$row['harga_jual'];?></td>
                        <td><?=$row['stok'];?></td>
                        <td><?=$row['berat'];?></td>
                        <td><?=$row['tgl_masuk'];?></td>
                        <td><img src="../media/<?=$row['photo'];?>" width='50'></td>
                        <td>
                            <a href="index?mod=produk&page=edit&id=<?=md5($row['id_produk'])?>"><i class="fa fa-pencil"></i></a>
                            <a href="index?mod=produk&page=delete&id=<?=md5($row['id_produk'])?>" onclick="return confirm('Anda yakin akan menghapus data?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;}
            }?>
        </tbody>
    </table>
</div>