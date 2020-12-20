<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../asset/css/style-sign-up-in.css">
    <script type="text/javascript" src="../../asset/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../../asset/js/script.js"></script>
    <script defer src="../../asset/font/fontawesome-free-5.0.2/svg-with-js/js/fontawesome-all.min.js"></script>
    <title>Beautyd-Cart</title>
  </head>
  <style type="text/css">
    .btn-cekout{
        padding: 5% 6%;
        background-color: #474747;
        border: 1px solid #474747;
        color: white;
        font-size: 1vw;
        margin: 2% 0% 20% 0%;
        border-radius: 3px;
        font-weight: bold;
    }
  </style>
  <body>
        <div class="container">
            <nav class="nav">
                <div class="nav-1">
                    <ul class="first">
                        <li><i class="fa fa-align-justify"></i></li>
                    </ul>
                    <ul class="secondary">
                        <li><a href="#"><i class="fa fa-window-close"></i></a></li>
                        <li><a href="../../index">HOME</a></li>
                        <li><a href="#">SHOP <i class="fa fa-angle-down"></i></a></li>
                        <li><a href="#">TESTIMONIAL</a></li>
                        <li><a href="#">ABOUT</a></li>
                    </ul>
                    <img src="../../asset/image/logo.png"/>
                    <ul>
                        <li id="cart"><a href="keranjang"><i class="fa fa-cart-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-search"></i></a></li> 
                        <li><a href="sign-in"><i class="fa fa-user"></i></a></li>   
                    </ul>
                </div>
                <div class="nav-2">
                    <ul>
                        <li><a href="../../index">HOME</a></li>
                        <li><a href="#">SHOP <i class="fa fa-angle-down"></i></a></li>
                        <li><a href="#">TESTIMONIAL</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="keranjang">CART</a></li>
                    </ul>
                </div>
            </nav>
            <main>
                <div>
                        <table width="80%" border="1" style="margin:5% 10% 5% 10%;">
                            <thead>
                                <tr align="center" style="background-color:pink;">
                                    <td style="padding: .5%;">#</td>
                                    <td style="padding: .5%;">Produk</td>
                                    <td style="padding: .5%;">Qty</td>
                                    <td style="padding: .5%;">Harga</td>
                                    <td style="padding: .5%;">Sub Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once '../../config/Config.php';
                                    $con = new Config();
                                    $conn=$con->koneksi();
                                    
                                    $sql = "select * from detail_order join produk using(id_produk) join kota using(id_kota)";
                                    $detail = $conn -> query($sql);
                                    $conn -> close();
                                    $total = 0;
                                    if($detail != NULL){
                                    $no = 1;

                                    foreach($detail as $row){?>
                                        <tr>
                                            <td style="padding: .5%;" align="center"><?=$no;?></td>
                                            <td style="padding: .5%;"><?=$row['nama_produk'];?></td>
                                            <td style="padding: .5%;"><?=$row['jumlah'];?></td>
                                            <td style="padding: .5%;">Rp <?=$row['harga_jual'];?></td>
                                            <?php
                                                $jumlah = $row['jumlah'];
                                                $harga = $row['harga_jual'];
                                                $subtotal = $jumlah * $harga;
                                                $total += $subtotal;

                                                $berat = $row['berat'];
                                                $totberat = ($berat * $jumlah)/1000;

                                                $ongkir = $row['ongkir'];
                                                if ($totberat < 1){
                                                    $totongkir = $ongkir;
                                                }else{
                                                    $totongkir = $ongkir * $totberat;
                                                }
                                                
                                                $grandtot = $totongkir + $total;
                                            ?>
                                            <td style="padding: .5%;">Rp <?= $subtotal?></td>
                                        </tr>
                                    <?php $no++;}
                                }?>
                                <tr>
                                    <td style="padding: .5%; text-align:right;" colspan="4">Sub Total</td>
                                    <td style="padding: .5%;">Rp <?= $total?></td>
                                </tr>
                                <tr>
                                    <td style="padding: .5%; text-align:right;" colspan="4">Total Berat</td>
                                    <td style="padding: .5%;"><?= $totberat?> Kg</td>
                                </tr>
                                <tr>
                                    <td style="padding: .5%; text-align:right;" colspan="4">Ongkir</td>
                                    <td style="padding: .5%;">Rp <?= $totongkir?></td>
                                </tr>
                                <tr>
                                    <td style="padding: .5%; text-align:right;" colspan="4"><b>Total Pembayaran<b></td>
                                    <td style="padding: .5%;"><b>Rp <?= $grandtot?><b></td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="../controller/detail-order.php" method="POST">
                            <table style="margin-left: 10%;">
                                <tr>
                                    <td><textarea name="alamat_pengiriman" id="" rows="3" placeholder="Alamat Pengiriman" class="input"></textarea></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="id_kota" class="input" required id="">
                                            <option value="">Pilih Kota Tujuan</option>
                                            <?php 
                                            include_once '../../config/Config.php';
                                            $con = new Config();
                                            $conn=$con->koneksi();

                                            $kota="select * from kota";
                                            $kota=$conn->query($kota);
                                            if($kota != NULL){
                                                foreach($kota as $row){ ?>
                                                    <option <?=(isset($_POST['id_kota']) && $_POST['id_kota']==$row['id_kota'] )?"selected":'';?> value="<?=$row['id_kota'];?>"> <?=$row['nama_kota'];?></option>
                                                <?php }
                                            }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="nama_pengirim" placeholder="Nama Pengirim" class="input"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="no_rek" placeholder="No Rekening Pengirim" class="input"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="id_bank" class="input" required id="" >
                                            <option value="">Pilih Bank Tujuan</option>
                                            <?php 
                                            include_once '../../config/Config.php';
                                            $con = new Config();
                                            $conn=$con->koneksi();

                                            $bank="select * from bank";
                                            $bank=$conn->query($bank);
                                            if($bank != NULL){
                                                foreach($bank as $row){ ?>
                                                    <option <?=(isset($_POST['id_bank']) && $_POST['id_bank']==$row['id_bank'] )?"selected":'';?> value="<?=$row['id_bank'];?>"> <?=$row['nama_bank'];?></option>
                                                <?php }
                                            }?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="file" name="bukti_transfer" class="input"></td>
                                </tr>
                                <tr>
                                    <td><a href="#"><input type="submit" value="BUAT PESANAN" class="btn-cekout"></a></td>
                                </tr>
                            </table>
                        </form>
                </div>
            </main>
            <footer>
                    <div class="footer">
                        <ul>
                            <li>
                                <h4><a href="#">BEAUTY<span style="color: #ff9a85;">D</span></a></h4><br/>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam cum ab assumenda sapiente rem quibusdam atque repellendus illo necessitatibus suscipit. </p>
                            </li>
                            <li>
                                <h4><a href="#">INFO</a></h4><br/>
                                <p><a href="#">Contact</a></p>
                                <p><a href="#">Shipping</a></p>
                                <p><a href="#">Search</a></p>
                            </li>
                            <li>
                                <h4>SOSIAL MEDIA</h4><br/>
                                <p><a href="#">Instagram</a></p>
                                <p><a href="#">Shoope</a></p>
                                <p><a href="#">Youtube</a></p>
                            </li>
                        </ul>
                    </div>
                    <div class="footer2">Copyright &copy 2020 Beauty Dita</div>
                </footer>
        </div>
  </body>
</html>