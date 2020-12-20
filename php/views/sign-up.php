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
    <title>Beautyd-Sign Up</title>
  </head>
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
                        <li id="cart"><a href="#"><i class="fa fa-cart-plus"></i></a></li>
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
                <form method="POST" action="../controller/sign-up.php" class="form-sign">
                    <h3>CREATE ACCOUNT</h3>
                    <div>
                        <input type="text" name="nama" class="input" placeholder="Name" required>
                        <span class="text-danger"><?=(isset($error['nama']))?$error['nama']:'';?></span>
                        <input type="email" name="email" class="input" placeholder="Email" required>
                        <span class="text-danger"><?=(isset($error['email']))?$error['email']:'';?></span>
                        <input type="text" name="telp" class="input" placeholder="Telp" required>
                        <span class="text-danger"><?=(isset($error['telp']))?$error['telp']:'';?></span>
                        <input type="text" name="alamat" class="input" placeholder="Alamat" required>
                        <span class="text-danger"><?=(isset($error['alamat']))?$error['alamat']:'';?></span>
                        <select name="id_kota" class="input" required id="" >
                            <option value="">Pilih Kota</option>
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
                        <span class="text-danger"><?=(isset($error['kota']))?$error['kota']:'';?></span>
                        <input type="password" name="password" class="input" id="Password" placeholder="Password" required>
                        <span class="text-danger"><?=(isset($error['password']))?$error['password']:'';?></span>
                        <p><input type="checkbox" class="checkbox"> Show Password</p>
                    </div>
                    <input type="submit" value="CREATE" name="create" class="btn-create">
                </form>
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