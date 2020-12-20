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
    <title>Beautyd-Sign In</title>
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
                        <li><a href="#">BLOG</a></li>
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
                        <li><a href="#">BLOG</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="keranjang">CART</a></li>
                    </ul>
                </div>
            </nav>
            <main>
                <form method="POST" action="../controller/sign-in.php" class="form-sign">
                    <h3>ACCOUNT</h3>
                    <div>
                        <input type="email" name="email" class="input" placeholder="Email" required>
                        <input type="password" name="password" class="input" id="Password" placeholder="Password" required>
                        <span><?=(isset($msg))?$msg:'';?></span>
                        <p><input type="checkbox" class="checkbox" id="check"> Show Password</p>
                    </div>
                    <input type="submit" value="SIGN IN" name="create" class="btn-signin">
                    <h4 style="text-align: center;"><a href="#">Forgot your password ?</a></h4>
                    <h3 id="create-account"><a href="sign-up.php">Create Account</a></h3>
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