<?php
if(isset($_POST['email'])){
    //action
    $conn = $con->koneksi(); // panggil koneksi

    $email = $_POST['email'];
    $psw = md5($_POST['password']);

    $sql = "SELECT * FROM admin where password='$psw' and email='$email'";
    $user = $conn->query($sql);

    if($user->num_rows>0){
        $sess = $user->fetch_array();
        $_SESSION['login']['email']=$sess['email'];
        $_SESSION['login']['id_admin']=$sess['id_admin'];

        header('Location:'.'http://localhost:8080/Beautyd2/admin/index?mod');
        //echo "<script>location:'../index.php?mod=pelanggan';<script>";
    }else{
        $msg = "Email atau Password salah";
        include_once 'views/v_login.php';
    }
}else{
    include_once 'views/v_login.php';
}
/* if (isset($_POST['email'])) {
    // do user authentication as per your requirements
    // ...
    // ...
    // based on successful authentication
    echo json_encode(array('success' => 1));
} else {
    echo json_encode(array('success' => 0));
}
?> */