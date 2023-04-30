<?php
 if( isset($_POST['pass']) && isset($_POST['Register'])) {
 session_start();

     $pass = $_POST['pass'] ;
     $Reg = $_POST['Register'];
     $_SESSION['ID']= $_POST['Register'];
     $_SESSION['password']= $_POST['pass'];

 $FirstDeg = $Reg[0];

if($pass === '123456' && $Reg ==='1'){ // go to admin
    $_SESSION['ID']= $_POST['Register'];
    $_SESSION['isAdmin'] = 1;
    header('Location:admin-page.php');


}



     try {
         $db= new mysqli('localhost','root','','academy');

         if($Reg < 3000)  { // Supervis

             $Qar ="SELECT * FROM supervisor WHERE ID ='".$Reg."'and PASS ='".$pass."'";
             $res = $db->query($Qar);
             $rw = $res->fetch_assoc();
             $db ->close();
             if(isset($rw['PASS']) && !empty($pass)  ){

                 $_SESSION['isSupervis'] = 1;
                 header('Location:Supervisor.php');

             }
             else{
                 $flag = 1 ;

             }



         }

         elseif ( 3<= $FirstDeg){ // Student



             $Qay ="SELECT * FROM students WHERE ST_ID ='".$Reg."'and PASS ='".$pass."'";
   $res = $db->query($Qay);
    $row = $res->fetch_assoc();
    $db ->close();
    if(isset($row['PASS']) && !empty($pass)  ){
        $_SESSION['isStudent'] = 1;
        header('Location:Sudent.php');

    }
    else{
        $flag = 1 ;

    }
         }



     }
catch (Exception $e){

}

 }




?>

<!DOCTYPE html>


<html lang="en">


<style type="text/css">


    @media (max-width: 360px) {
       h1 {
           max-width: 10ch;
           transform:  translateY(90px);

       }
    }

    @media (min-width: 500px) {
        h1 {
            max-width: 20ch;
            transform:  translateY(90px);


        }


    }



    @media (min-width: 800px) {
        h1 {
            max-width: 30ch;            transform:  translateY(90px);


        }


    }

    @media (min-width: 1000px) {
        h1 {
            max-width: 40ch;
            transform:  translateY(90px);


        }


    }




    @font-face {

        font-family: 'me_quran-webfont';
        src: url('https://globalquran.com/images/fonts/me_quran-webfont.eot');
        src: url('https://globalquran.com/images/fonts/me_quran-webfont.eot?#iefix') format('embedded-opentype'),
        url('https://globalquran.com/images/fonts/me_quran-webfont.woff') format('woff'),
        url('https://globalquran.com/images/fonts/me_quran-webfont.ttf') format('truetype'),
        url('https://globalquran.com/images/fonts/me_quran-webfont.svg#me_quran-webfont') format('svg');
        font-weight: normal;
        font-style: normal;
    }

    @import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");

    * {
        padding: 0;
        margin: 0;
    }



    h1 {

        max-width: 40ch;
        text-align: center;
        transform: scale(0.94);
        animation: scale 3s forwards cubic-bezier(0.5, 1, 0.89, 1);
    }
    @keyframes scale {
        100% {
            transform: scale(1);
        }
    }

    h1  span {

font-family: "me_quran-webfont";


        transform: translateX(30px) translateY(90px);
        display: inline-block;
        opacity: 0;
        filter: blur(4px);
        color: black;
    }

    span:nth-child(1) {
        animation: fade-in 0.8s 0.1s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(2) {
        animation: fade-in 0.8s 0.2s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(3) {
        animation: fade-in 0.8s 0.3s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(4) {
        animation: fade-in 0.8s 0.4s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(5) {
        animation: fade-in 0.8s 0.5s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(6) {
        animation: fade-in 0.8s 0.6s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(7) {
        animation: fade-in 0.8s 0.7s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(8) {
        animation: fade-in 0.8s 0.8s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(9) {
        animation: fade-in 0.8s 0.9s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(10) {
        animation: fade-in 0.8s 1s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(11) {
        animation: fade-in 0.8s 1.1s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(12) {
        animation: fade-in 0.8s 1.2s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(13) {
        animation: fade-in 0.8s 1.3s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(14) {
        animation: fade-in 0.8s 1.4s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(15) {
        animation: fade-in 0.8s 1.5s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(16) {
        animation: fade-in 0.8s 1.6s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(17) {
        animation: fade-in 0.8s 1.7s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    span:nth-child(18) {
        animation: fade-in 0.8s 1.8s forwards cubic-bezier(0.11, 0, 0.5, 0);
    }

    @keyframes fade-in {
        100% {
            opacity: 1;
            filter: blur(0);
        }
    }



    .container{
position: absolute;
        width: 75%;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        height: 550px;
        background: url("img/people-reading-holy-quran.jpg")  no-repeat;
        background-size: cover ;
        background-position: center ;
        border-radius: 10px;
        margin-top: 20px;
    }
    body{

        background: #020410;
    }
.container .content{
    position: absolute;
    top: 0;
    left: 0;
    width: 58%;
    height: 100%;
    background: transparent;
}

.container .logreg-box{
    position: absolute;
    top: 0;
    right: 0;
width: calc(100% - 58%);
    height: 100%;

}

.logreg-box .form-box register{

    transform: translateX(430px);
}
.logreg-box .form-box {

    position: absolute;

    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    background: transparent;
    backdrop-filter: blur(20px) ;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    color: #e4e4e4;
}
.form-box h2 {
    font-size: 32px;
    text-align: center;
    font-family: system-ui;
}
.form-box .input-box{
    position: relative;
    width: 340px;
    height: 50px;
    border-bottom: 2px solid  #e4e4e4;
    margin: 30px 0 ;
}
.input-box input{

    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 16px;
    color: #e4e4e4;
    font-weight: 500;
    padding-right: 28px;
    margin-top: 15px;
}

.input-box label{
    position: absolute;
    top: 50%;
    left: 278px;
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: 500;
    pointer-events: none;
    transition: .5s ease;


}
.input-box input:focus~label,
.input-box input:valid~label{
 top: +5px;
}


.input-box .icon{

    position: absolute;
    top: 23px;

    font-size: 19px;
}

.form-box .remember-forgot{


    font-size: 14.5px;
    font-weight: 500;
    margin:  -15px 0 15px;
    display: flex;
    justify-content: space-between;
}



.remember-forgot label input{
    accent-color: #e4e4e4;
    margin-right: 3px;
}

.remember-forgot a{
    color: #e4e4e4;
    text-decoration: none;
}



    .remember-forgot a:hover{

        text-decoration: underline;
    }


    .btn{
        width: 100%;
        height: 45px;
        background: #c465108f;
        border: none;
        outline: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        color: #e4e4e4;
        font-weight: 500;
        box-shadow: 0 0 10px rgba(0,0,0,.5);


    }

.form-box .login-rdgister{

    font-size: 14.5px;
    font-weight: 500;
    text-align: center;
    margin-top: 25px;
}
    .login-rdgister p a {
        color: #e4e4e4;
        font-weight: 600;
        text-decoration: none;

    }
    .login-rdgister p a:hover{
        text-decoration: underline;
    }
.background{
    width: 100%;
    height: 100vh;
    background: url("img/people-reading-holy-quran.jpg");
    background-size: cover;
    background-position: center;
    filter: blur(10px);
}
.logreg-box .form-box{
    transform: translateX(0);
    transition: .6s ease;
}
    .logreg-box.active .form-box{
        transform: translateX(430px);
transition-delay: 0s ;
    }
    *,
    :before,
    :after {
        margin: 0;
        padding: 0;
        box-sizing: content-box;
    }



    .con {
        left: 35px;
        top: 70px;
        width: 9.25em;
        height: 1.15em;
        font-size: 4rem;
        font-family: sans-serif;
        position: relative;
    }

    .con div {
        position: absolute;
        left: 0;
        text-transform: uppercase;
        width: 100%;
        display: block;
        text-align:center;
    }

    .upper {
        top: 0;
        height: 52.5%;
        color: #fff;
        overflow: hidden;
        z-index: 3;
        animation: moveUp 3s ease-in-out 1 ;
        background-color: #121212;
        animation-delay: 1s;


    }

    .lower {
        bottom: 0;
        height: 100%;
        background: linear-gradient(180deg, transparent 52.5%, #fff 52.5%);
        color: transparent;
        background-clip: text;
        -webkit-background-clip: text;
        z-index: 1;
        animation: moveDown 3s ease-in-out 1;
        animation-delay: 1s;

    }

    .inside {
        position: absolute;
        top: 40%;
        transform: translateY(-40%);
        text-align: center;
        z-index: 2;
        font-size: 1rem;
        color: red;
    }

    @keyframes moveUp {
        0%,
        100% {
            top: 0;

        }

        50%,
        70% {
            top: -45px;
        }
    }

    @keyframes moveDown {
        0%,
        100% {
            top: 0;
        }

        50%,
        70% {
            top: 30px;
        }
    }

    @media (max-width: 424px) {
        .container {
            font-size: 2.5rem;

        }

        .inside {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 320px) {
        .container {
            font-size: 2rem;

        }

        .inside {
            font-size: 0.5rem;
        }
    }

    ion-icon{
        transform: translateY(-22px);
        height: 20px;
        width: 20px;

    }

</style>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<head>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Login</title>
    <script type="text/javascript">


     const  logregBox = document.querySelector(".logreg-box");
     const  loginLink = document.querySelector(".login-link");
     const registerLink = document.querySelector(".register-link");

     registerLink.addEventListener("click",() =>{
         logregBox.classList.add('active');
     });

     function ToShow() {



         document.getElementById("show").style.display="block";
         document.getElementById("hid").style.display="none";


         let temp = document.getElementById("pass");
         if (temp.type === "password") {
             temp.type = "text";
         }
         else {
             temp.type = "password";
         }
     }

     function toHid() {

         document.getElementById("show").style.display="none";
         document.getElementById("hid").style.display="block";
         let zx = document.getElementById("pass");
         if (zx.type === "password") {
             zx.type = "text";
         }
         else {
             zx.type = "password";
         }
     }



    </script>
</head>
<body>

<div class="background"></div>
<div class="container">

    <h1 style="top: 90px" >


        <span >وَعِيدِ</span>
        <span >يَخَافُ</span>
        <span >مَن</span>
        <span >بِالْقُرْآنِ</span>
        <span >فَذَكِّرْ</span>

    </h1>

    <div class="logreg-box">
        <div class="form-box">
            <form  action="login.php" method="post">
                <h2>تسجيل الدخول</h2>
                <div class="input-box">
                    <span class="icon"> <i class='bx bxs-user'> </i> </span>
                    <input type="text" required dir="rtl" name="Register">
                    <label>رقم التسجيل</label>
                </div>

                <div class="input-box">
                    <span class="icon">

                      <i class='bx bxs-hide' style='color:#e9e5e5  '  id="hid" onclick="ToShow()"></i>
                        <i class='bx bxs-show' style='color:#e9e5e5 ;display: none'   id="show" onclick="toHid() " ></i>
                    </span>

                    <input  type="password" required dir="rtl"  id="pass" name="pass">



                    <label>كلمة السر</label>


                </div>

                <?php

                if (isset($flag)  ){
                    ?>
                    <p  style="color: red ; transform: translateX(65px);"> Wrong password! Try again </p>
                    <br>
                    <?php
                }


                ?>


<div class="remember-forgot">

    <label>
        <input type="checkbox"> تذكرني</label>
    <a href="#">نسيت كلمة السر ؟</a>
</div>

                 <button class="btn" type="submit"   >تسجيل الدخول </button>

<div class="login-rdgister">
    <p>ليس لديك حساب؟ <a class="register-link" href="sign_up.php">تسجيل
    </a> </p>
</div>
            </form>

        </div>


    </div>


    <!--    <div class="form-box-register">-->
    <!--        <form action="#">-->
    <!--            <h2>Repter</h2>-->
    <!--            <div class="input-box">-->
    <!--                <span class="icon">-->
    <!--                    <i class='bx bxs-envelope' ></i>-->
    <!--                    </span>-->
    <!--                <input type="email" required>-->
    <!--                <label>Email</label>-->
    <!--            </div>-->

    <!--            <div class="input-box">-->
    <!--                    <span class="icon">-->
    <!--                       <i class='bx bxs-user'> </i>-->
    <!--                    </span>-->
    <!--                <input type="text" required>-->
    <!--                <label>Id</label>-->
    <!--            </div>-->
    <!--            <div class="remember-forgot">-->


    <!--                <a href="#">Remembered password?</a>-->
    <!--            </div>-->

    <!--            <button class="btn" type="submit">Check</button>-->

    <!--            <div class="login-rdgister">-->
    <!--                <p> <a class="login-link" href="sign_up.html">Remembered password?</a> </p>-->
    <!--            </div>-->
    <!--        </form>-->




</div>
</div>
</body>
</html>