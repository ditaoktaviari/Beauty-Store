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

$(document).ready(function() {
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
});