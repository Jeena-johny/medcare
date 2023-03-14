<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>medcare</title>
<style>*
    {
        padding: 0px;
        margin:  0px;
    }
    body
    {
        background-color:#d0f0ce;/*#a5b3e4*/
        perspective: 1500px;
    }
    .card
    {
        width: 380px;
        height: 510px;
        position: relative;
        margin: 50px auto;
        border-radius: 10px;
        font-family: tahoma;
        transform-style: preserve-3d;
        transition: all 1s ease-in-out;
    }
    /* .card:hover
    {
        transform: rotateY(180deg);
    } */
    .card > div
    {
        position: absolute;
        top: 0;
        left:0;
        width: 100%;
        height: 100%;
        border-radius: 10px;
        text-align: center;
        background-color:azure;
    }
    /*front card*/
    .card .front
    {
        z-index: 1;
        backface-visibility: hidden;
    }
    
    .card .front p
    {
        text-align: center;
    }
    
    .card .front form button
    {
        background-color:#29d61e;
        padding: 12px 60px 12px 60px; 
        margin-top:30px;
        cursor: pointer;
    }
    
    .f1
    {
        padding: 13px 60px 13px 60px;
        border-radius: 4px;
        background-color:#e5fae3;
        margin: 7px;
        border: none;
        text-align: center;
        font-size: 15px;
    }
    .card .front img
    {
        width: 110px;
        height: 110px;
        margin: 20px 30px 50px 30px
    }
    .login_word
    {
        margin:30px auto;
        border-bottom:2px solid #FFB30E;
        width:60px;
        font-weight: bold;
    }
    .not_registered_word
    {
        margin-top: 35px;
        font-size: 14px;
    }
    
    .card .front form p
    {
        margin-top: 20px;
        font-size: 15px;
    }
    
    .card .front span
    {
        cursor: pointer;
        color:#FFB30E;
    }
    /*back card*/
    .card .back
    {
        z-index: 2;
        transform: rotateY(180deg);
        backface-visibility: hidden;
    }
    .signup_word
    {
        margin:45px auto 15px auto;
        border-bottom:2px solid #FFB30E;
        width:70px;
        font-weight: bold;
    }
    
    #signUp button
    {
        background-color:#29d61e; 
        padding: 12px 60px 12px 60px; 
        margin-top:30px
    }</style>
     <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
    <body onload="login_signUp()">
        <div class="card" id="card">
             
            <div class="front">
                <p class="login_word">LOG IN</p>
                <img src="https://drive.google.com/uc?export=view&id=1K5_tAX_taOQQ0wwmFx3P--V05kjvg4cu" alt="person picture">
                <form method="post" action="" >
                  
                    <input type="text" name="username" placeholder="username" class="f1" maxlength="10" required autocomplete="off">
                    <input type="password" name="password" placeholder="password" class="f1" maxlength="10" required autocomplete="off">
                    <button class="f1" name="login" value="clicked">Log in</button>
                    <p>Not registered? <span onclick="flip()">Create an account</span></p>
                </form>
            </div>
            <div class="back">
                <p class="signup_word">SIGN UP</p>
                <form method="post" action=""  id="signUp">
                <?php echo e(csrf_field()); ?>

                    <input type="text" id="f_name" name="f_name" placeholder="first name" class="f1" maxlength="10" value="" >
                    <input type="text" id="l_name" name="l_name" placeholder="last name" class="f1" maxlength="10" value=""  >
                    <input type="email" id="emai;" name="email" placeholder="e-mail" class="f1" maxlength="30" value=""  >
                    <input type="text" id="username" name="username" placeholder="username" class="f1" maxlength="10" value="" >
                    
                    <input type="password" id="password" name="password" placeholder="password" class="f1" maxlength="10" value=""  >
                    <button type="submit" class="f1" name="signup" value="signup" id="signup" >Sign up</button>
                </form>
            </div>
        </div>
        <!-- <script src="script.js"></script> -->
        <script>let card ;

            function login_signUp()
            {
                document.getElementById("signUp").addEventListener("submit", function(event){
                    card.style.transform = 'rotateY(0deg)';
                    event.preventDefault(); 
                });
            
                card = document.getElementById('card');
            }
            
            
            function flip()
            {
                card.style.transform = 'rotateY(180deg)';
            }
            
            function openLogin()
            {
                window.open('login.html','_self')
            }</script>

        <!-- <script type="text/javascript">
     $(document).ready(function() {

$('.signUp').on('signup', function(e) {
  e.preventDefault();
  var button = $(this);
        swal.fire({
            title: "Submit?",
            icon: 'question',
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, Submit it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(url('home/signup')); ?>" ,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal.fire("Done!", results.message, "success");
                            // refresh page after 2 seconds
                            setTimeout(function(){
                                location.reload();
                            },2000);
                        } else {
                            swal.fire("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
</script>  -->
 <script>
       $('body').on('click', '#signup', function(){
        var f_name = $('#f_name').val();
        var l_name = $('#l_name').val();
        var email = $('#email').val();
        var username = $('#username').val();
        var password = $('#password').val();
         // alert("<?php echo e(url('home/signup')); ?>");

        $.ajax({
            url : "home/signup",
            method :'post',
            dataType:'json',
            data    :{'f_name': f_name},

            sucess : function(result)
            {
              if (result.success === true) {
                // alert("ok");
                            swal.fire("Done!", result.message, "success");
                            // refresh page after 2 seconds
                            setTimeout(function(){
                                location.reload();
                            },2000);
                        } else {
                            swal.fire("Error!", results.message, "error");
                            // alert("error");
                        }   
            },
            error:function(result)
            {
                alert(JSON.stringfy(result));
            }

        })
       })
    </script> 
    </body>
    </html><?php /**PATH C:\xampp\htdocs\medcare\medcare\resources\views/login.blade.php ENDPATH**/ ?>