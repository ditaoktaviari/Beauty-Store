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
  .btn-order{
      padding: 2% 4%;
      background-color: pink;
      width: auto;
      margin-left: 3%;
      float:left;
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
                        <li><a href="../../index.php">HOME</a></li>
                        <li><a href="#">SHOP <i class="fa fa-angle-down"></i></a></li>
                        <li><a href="#">TESTIMONIAL</a></li>
                        <li><a href="#">ABOUT</a></li>
                    </ul>
                    <img src="../../asset/image/logo.png"/>
                    <ul>
                        <li id="cart"><a href="#"><i class="fa fa-cart-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-search"></i></a></li> 
                        <li><a href="sign-in.html"><i class="fa fa-user"></i></a></li>   
                    </ul>
                </div>
                <div class="nav-2">
                    <ul>
                        <li><a href="../../index.php">HOME</a></li>
                        <li><a href="#">SHOP <i class="fa fa-angle-down"></i></a></li>
                        <li><a href="#">TESTIMONIAL</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#">CART</a></li>
                    </ul>
                </div>
            </nav>
            <main>
                <div class="keranjang">
                        <table width="80%" border="1" style="margin:5% 10% 5% 10%;">
                            <thead>
                                <tr align="center" style="background-color:pink;">
                                    <td style="padding: .5%;">#</td>
                                    <td style="padding: .5%;">Produk</td>
                                    <td style="padding: .5%;">Tanggal Order</td>
                                    <td style="padding: .5%;">Status</td>
                                    <td style="padding: .5%;">Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include_once '../../config/Config.php';
                                    $con = new Config();
                                    $conn=$con->koneksi();
                                    
                                    $sql = "select * from detail_order join produk using(id_produk)";
                                    $order = $conn -> query($sql);
                                    $conn -> close();
                                
                                    if($order != NULL){
                                    $no = 1;
                                    foreach($order as $row){?>
                                        <tr>
                                            <td style="padding: .5%;" align="center"><?=$no;?></td>
                                            <td style="padding: .5%;"><?=$row['nama_produk'];?></td>
                                            <td style="padding: .5%;"><?=$row['id_order'];?>
                                            <!-- <td style="padding: .5%;"><?=$row['status_order'];?> -->
                                            <td style="padding: .5%;">
                                                <div class="btn-order"><a href="detail-order.php">Detail</a></div>
                                                <!-- <div class="btn-order"><a href="#">Sudah Diterima</i></a></div> -->
                                            </td>
                                        </tr>
                                    <?php $no++;}
                                }?>
                            </tbody>
                        </table>
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