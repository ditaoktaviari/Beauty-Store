<?php
class Config{
    function koneksi(){ //fungsi untuk cek koneksi
        $conn = new mysqli('localhost', 'root', '', 'db_beautyd2');
        if($conn->connect_error){ //kondisi untuk cek koneksi 
            $conn = die("Koneksi gagal : ". $conn->connect_error);
	    }
        return $conn;
    }
    
    function auth(){ //fungsi untuk cek admin sudah login
        if(isset($_SESSION['login']['email'])){ // cek apakah session login dengan nama email sudah terbentuk
            return true;
        }else{
            return false;
        }
    }

    function site_url(){
        return "http://localhost:8080/Beautyd2";
    }
}
?>