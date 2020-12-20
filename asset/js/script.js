$(document).ready(function(){
    $('.checkbox').click(function(){
        if($(this).is(':checked')){
            $('#Password').attr('type','text');
        }else{
            $('#Password').attr('type','password');
        }
    });
});

$(document).ready(function(){
    $('ul.first').hover(function(){
        $('this').find('ul.secondary').slideToggle('normal');
    });
});

$("button#submit").click(function() {
    if($("#email").val() == "" || ("#password").val() == "" )
        $("div#ack").html("Masukan Email dan Password");
    else
        $.post($("#loginform").attr("action"), 
                $("loginform :input").serializeArray(),
                function(data){
                    $("div#ack").html(data);
                });

    $("#loginform").submit(function(){
        return false;
    });

    $(document).ready(function(){
        $("#search-data").click(function(){    
            $.ajax({
                url: 'http://localhost:8080/Beautyd2/admin/index?mod=admin',
                data: {
                    keyword: $('#keyword-input').val(),
                },
                type: 'POST',
                success: function(res) {
                    $('.data').html(res);
                },
                error: function(error) {
                    console.log(error);
                }
            })
        });
});
/* $(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'login.php',
            data: $(this).serialize(),
            success: function(response)
            {
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
}); */
