<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../asset/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../../asset/js/script.js"></script>
</head>
<style type"text/css">
.container{
    background-color: #4e73df;
    background-image: linear-gradient(180deg,#4e73df 10%,#224abe 100%);
    background-size: cover;
    padding:0%;
    margin:0%;
    width: 100%;
    height:100vh;
}
.conten{
    background-color:white;
    padding: 3% 4%;
    margin-top: 10%;
    border-radius: 3%;
}
.title{
    text-align: center;
    padding-bottom: 3%;
}
#form-messages{
    background-color: rgb(255, 232, 232);
    border: 1px solid red;
    color: red;
    display: none;
    font-size: 12px;
    font-weight: bold;
    margin-bottom: 10px;
    padding: 10px 25px;
    max-width: 250px;
    margin-left: 15%;
}
</style>
<body>
    <div class="container ">
        <div class="content center" >
            <div class="col-md-offset-4 col-md-4 conten">
                <form action="" method="POST" id="loginform">
                    <div class="form-group">
                        <h4 class="title"><b>WELCOME BACK</b></h4> 
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password</label>
                        <input type="password"  name="password" class="form-control" id="password">
                        <span><?=(isset($msg))?$msg:'';?></span>
                    </div>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary" id="submit">Login</button>
                        <button type="reset" class="btn btn-primary">Batal</button>
                    </div>
                </form>
                <div id="ack"></div>
            </div>
        </div>
    </div>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#loginform').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'login.php',
                //data form dikirim menggunakan serialize
                data: $(this).serialize(),
                //umpan balik
                success: function(response)
                {
                    //parsing data ke JSON
                    var jsonData = JSON.parse(response);
    
                    // user is logged in successfully in the back-end
                    // let's redirect
                    if (jsonData.success == "1")
                    {
                        location.href = 'index.php?mod';
                    }
                    else
                    {
                        alert('Invalid Credentials!');
                    }
            }
        });
        });
    });
</script>  -->
</body>
</html>