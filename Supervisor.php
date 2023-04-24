<?php
session_start();
$flagPass = 0 ;

$flagInfo_name = 0 ;
$flagInfo_DB = 0 ;
$flagInfo_phone = 0 ;
$flagInfo_Address = 0 ;
$flagInfo_error = 0 ;


if(isset($_SESSION['isSupervis'])){

    if($_SESSION['isSupervis'] == 1 ){

    } else{             header('Location:login.php');
    }

} else{        header('Location:login.php');


}

//changePassword
if(isset($_POST['oldPass']) && isset($_POST['newPass'])  ){

    if (!empty($_POST['oldPass']) || !empty($_POST['newPass'])){

        $db= new mysqli('localhost','root','','academy');



        $max="SELECT   PASS FROM supervisor where ID = '". $_SESSION['ID'] ."' ;";
        $res = $db->query($max);

        $rw = $res->fetch_assoc();

        $oldPassword = $rw['PASS'];


        if ($oldPassword == $_POST['oldPass']){

            $max="UPDATE supervisor  SET PASS = '".$_POST['newPass']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";
            $res = $db->query($max);
            $flagPass  = 3; //update


        } else{
            $flagPass = 2 ; //  error oldPassword





        }


    } else{$flagPass = 1 ; }

}

if(isset($_POST['NameStudent']) && isset($_POST['DB_student'])  && isset($_POST['Phone_number']) && isset($_POST['Address_student'])){

    if (!empty($_POST['NameStudent'])){
        $db= new mysqli('localhost','root','','academy');



        $max="UPDATE supervisor  SET NAME_SUP = '".$_POST['NameStudent']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";;
        $res = $db->query($max);

        $db->close();
        $flagInfo_name = 1 ;
    }


    if (!empty($_POST['DB_student'])){
        $db= new mysqli('localhost','root','','academy');



        $max="UPDATE supervisor  SET BIRTHDATE = '".$_POST['DB_student']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";;
        $res = $db->query($max);

        $db->close();
        $flagInfo_DB = 2 ;

    }

    if (!empty($_POST['Phone_number'])){
        $db= new mysqli('localhost','root','','academy');



        $max="UPDATE supervisor  SET PHONE_NUMBER = '".$_POST['Phone_number']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";;
        $res = $db->query($max);

        $db->close();
        $flagInfo_phone = 3 ;

    }

    if(!empty($_POST['Address_student'])){
        $db= new mysqli('localhost','root','','academy');



        $max="UPDATE supervisor  SET ADDRESS = '".$_POST['Address_student']."'  WHERE ID = '". $_SESSION['ID'] ."' ;";;
        $res = $db->query($max);

        $db->close();
        $flagInfo_Address = 4 ;

    }
    if($flagInfo_Address == 0 && $flagInfo_phone == 0 && $flagInfo_DB ==0 && $flagInfo_name == 0 ){
        $flagInfo_error = 5 ;


    }




}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Supervisor</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/styleTest.css">
    <script type="text/javascript">


    </script>
</head>



<body>
<!-- =============== Navigation ================ -->
<div class="container">
    <div class="navigation">
        <ul>
            <li>
                <a>
                    <span class="icon">
<img src="img/quranWhite.png">
                    </span>
                    <span style="font-size: xxx-large" class="title"> ﷺ</span>


                </a>
            </li>


            <li>
                <a id="a_student" onclick="Studnetforvis()">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                    <span class="title">الطلاب</span>
                </a>
            </li>

            <li>
                <a  onclick="RecordGruade()">
                        <span class="icon">
<ion-icon name="pencil-outline"></ion-icon>                        </span>
                    <span class="title">تسجيل العلامات</span>
                </a>
            </li>



            <li>
                <a  onclick="StudentReport()">
                        <span class="icon">
<ion-icon name="receipt-outline"></ion-icon>
                        </span>
                    <span class="title">تقرير العلامات</span>
                </a>
            </li>




            <li>
                <a href="index.html">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                    <span class="title">الرسائل</span>
                </a>
            </li>




            <li>
                <a onclick="Settings()">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                    <span class="title">Settings</span>
                </a>
            </li>

            <li>
                <a onclick="Change_pass()">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                    <span class="title">Password</span>
                </a>
            </li>

            <li>
                <a href="login.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                    <span class="title">تسجيل الخروج</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar" style="color: white">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <i class='bx bx-search' style='color:#222121'  ></i>
                </label>
            </div>
            <span style="color: white" >ID : <?php echo $_SESSION['ID']?> </span>
            <span style="color: white" >type : Supervisor</span>

            <div class="user">

                <i class='bx bx-user-circle' style='color:#d7d7d7 ; font-size: 40px'></i>
            </div>

        </div>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">
            <div class="card">
                <?php
                $db= new mysqli('localhost','root','','academy');



                $max="SELECT CENTER_NUMBER FROM supervisor WHERE ID =  '". $_SESSION['ID'] ."' ;";
                $res = $db->query($max);

                $rw = $res->fetch_assoc();
                $CN_NUM =  $rw['CENTER_NUMBER'];





                $max="SELECT ADDREES FROM center WHERE NUMBER_CENTER = '".$CN_NUM."' ;";
                $res = $db->query($max);

                $rw = $res->fetch_assoc();


                $Adds_center = $rw['ADDREES'];

                $max="SELECT COUNT(ST_ID) FROM students WHERE ST_SUP = '".$_SESSION['ID']."' ;";
                $res = $db->query($max);

                $rw = $res->fetch_assoc();
                $NumberOfStudents = $rw['COUNT(ST_ID)'];




                ?>


                <div class="iconBx">
                    <img style="width: 60px ;height: 60px" src="img/group.png">
                </div>
                <div>

                    <div class="numbers" id="GroupStudent"> <?php  echo$NumberOfStudents ; ?></div>

                    <div class="cardName">عدد الطلاب المجموعة</div>

                </div>


            </div>



            <div class="card">

                <div class="iconBx">
                    <img style="width: 60px ;height: 60px" src="img/education.png">
                </div>
                <div>


                    <div class="numbers" id="NameSuper"> <?php  echo$CN_NUM ; ?></div>

                    <div class="cardName">رقم الفوج</div>

                </div>
            </div>

            <div class="card">
                <div class="iconBx">
                    <img style="width: 60px ;height: 60px" src="img/mosque.png">
                </div>
                <div>


                    <div class="numbers" id=""><?php  echo $Adds_center ; ?></div>

                    <div class="cardName">اسم المسجد</div>

                </div>
            </div>
        </div>


        <!-- ================ Student ================= -->
        <div class="details" id="StudnetForsuper" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2  style="font-size: xxx-large">الطلاب </h2>





                </div>

                <table dir="rtl">
                    <thead>
                    <tr>
                        <td>الإسم </td>
                        <td>تاريخ الميلاد</td>
                        <td>العنوان</td>
                        <td>رقم الهاتف</td>





                    </tr>
                    </thead>

                    <tbody>
                    <tr>

                        <td>عباس دويكات</td>
                        <td ><span class="status delivered">2002/10/3</span></td>
                        <td>بلاطة</td>
                        <td>0594504708 </td>

                    </tr>

                    <tr>
                        <td>عباس دويكات</td>
                        <td ><span class="status delivered">2002/10/3</span></td>
                        <td>بلاطة</td>
                        <td>0594504708 </td>
                    </tr>

                    <tr>
                        <td>عباس دويكات</td>
                        <td ><span class="status delivered">2002/10/3</span></td>
                        <td>بلاطة</td>
                        <td>0594504708 </td>
                    </tr>

                    <tr>
                        <td>عباس دويكات</td>
                        <td ><span class="status delivered">2002/10/3</span></td>
                        <td>بلاطة</td>
                        <td>0594504708 </td>
                    </tr>

                    <tr>

                        <td>عباس دويكات</td>
                        <td ><span class="status delivered">2002/10/3</span></td>
                        <td>بلاطة</td>
                        <td>0594504708 </td>
                    </tr>

                    <tr>

                        <td>عباس دويكات</td>
                        <td ><span class="status delivered">2002/10/3</span></td>
                        <td>بلاطة</td>
                        <td>0594504708 </td>
                    </tr>

                    <tr>
                        <td>عباس دويكات</td>
                        <td ><span class="status delivered">2002/10/3</span></td>
                        <td>بلاطة</td>
                        <td>0594504708 </td>
                    </tr>

                    <tr>
                        <td>عباس دويكات</td>
                        <td ><span class="status delivered">2002/10/3</span></td>
                        <td>بلاطة</td>
                        <td>0594504708 </td>
                    </tr>

                    </tbody>
                </table>

            </div>


            <!--                <div class="inputBox " style="" >-->
            <!--                    <input type="text"  required="required">-->
            <!--                    <span style="top: -1px ">first  </span>-->



            <!--                </div>-->
            <!--                <div class="inputBox" style="transform: translateY(-90px); ">-->
            <!--                    <input type="text" required="required" >-->
            <!--                    <span style="top: -1px"> name </span>-->
            <!--                </div>-->




        </div>






        <div class="details" id="ReportAllStudent" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2  style="font-size: xxx-large">سجل العلامات </h2>





                </div>

                <table dir="rtl">
                    <thead>
                    <tr>
                        <td>اسم الطالب </td>
                        <td>التاريخ </td>
                        <td>الحفظ</td>
                        <td>الموضع</td>
                        <td>العلامة</td>
                        <td>المراجعة</td>
                        <td>الموضع</td>
                        <td>العلامة</td>




                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>عباس نضال دويكات </td>
                        <td ><span class="status delivered">2023/4/17</span></td>

                        <td>البقرة</td>
                        <td>1-15</td>
                        <td>9.5</td>
                        <td>ال عمران</td>
                        <td>1-20</td>
                        <td>10</td>
                    </tr>

                    <tr>
                        <td>عباس نضال دويكات </td>

                        <td ><span class="status delivered">2023/4/17</span></td>

                        <td>البقرة</td>
                        <td>1-15</td>
                        <td>9.5</td>
                        <td>ال عمران</td>
                        <td>1-20</td>
                        <td>10</td>
                    </tr>

                    <tr>
                        <td>عباس نضال دويكات </td>

                        <td ><span class="status delivered">2023/4/17</span></td>

                        <td>البقرة</td>
                        <td>1-15</td>
                        <td>9.5</td>
                        <td>ال عمران</td>
                        <td>1-20</td>
                        <td>10</td>
                    </tr>

                    <tr>
                        <td>عباس نضال دويكات </td>

                        <td ><span class="status delivered">2023/4/17</span></td>

                        <td>البقرة</td>
                        <td>1-15</td>
                        <td>9.5</td>
                        <td>ال عمران</td>
                        <td>1-20</td>
                        <td>10</td>
                    </tr>

                    <tr>
                        <td>عباس نضال دويكات </td>

                        <td ><span class="status delivered">2023/4/17</span></td>

                        <td>البقرة</td>
                        <td>1-15</td>
                        <td>9.5</td>
                        <td>ال عمران</td>
                        <td>1-20</td>
                        <td>10</td>
                    </tr>

                    <tr>
                        <td>عباس نضال دويكات </td>

                        <td ><span class="status delivered">2023/4/17</span></td>

                        <td>البقرة</td>
                        <td>1-15</td>
                        <td>9.5</td>
                        <td>ال عمران</td>
                        <td>1-20</td>
                        <td>10</td>
                    </tr>

                    <tr>
                        <td>عباس نضال دويكات </td>

                        <td ><span class="status delivered">2023/4/17</span></td>

                        <td>البقرة</td>
                        <td>1-15</td>
                        <td>9.5</td>
                        <td>ال عمران</td>
                        <td>1-20</td>
                        <td>10</td>
                    </tr>

                    <tr>
                        <td>عباس نضال دويكات </td>

                        <td ><span class="status delivered">2023/4/17</span></td>

                        <td>البقرة</td>
                        <td>1-15</td>
                        <td>9.5</td>
                        <td>ال عمران</td>
                        <td>1-20</td>
                        <td>10</td>
                    </tr>

                    </tbody>
                </table>

            </div>


            <!--                <div class="inputBox " style="" >-->
            <!--                    <input type="text"  required="required">-->
            <!--                    <span style="top: -1px ">first  </span>-->



            <!--                </div>-->
            <!--                <div class="inputBox" style="transform: translateY(-90px); ">-->
            <!--                    <input type="text" required="required" >-->
            <!--                    <span style="top: -1px"> name </span>-->
            <!--                </div>-->




        </div>
        <!-- Record Grad -->
        <div class="details" id="Record" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2  style="font-size: xx-large" >تسجيل العلامات</h2>


                </div>


                <div class="wrapperr" dir="rtl " >
                    <div  class="select-btn">
                        <span style="text-align: right" >اسم السورة</span>
                        <i class="uil uil-angle-down"></i>
                    </div>
                    <div class="content">
                        <div class="search" dir="rtl">
                            <i class="bx bx-search" style="color:#222121"></i>
                            <input spellcheck="false" type="text" placeholder="بحث">
                        </div>
                        <ul class="options"></ul>
                    </div>
                </div>


            </div>



        </div>

        <!-- ================ Setting ================= -->
        <div class="details" id="Setting" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2  style="font-size: xx-large" >المعلومات الشخصية</h2>



                </div>

                <form method="post"  action="Supervisor.php">

                    <div class="inputBox"  >
                    <input type="text"  name="NameStudent" >
                    <span style="top: -1px ">Name  </span>




                </div>
                <div  class="inputBox" style="transform: translateY(-43px) translateX(399px) ; ">
                    <input  id="db" type="text" name="DB_student" >
                    <span style="top: -1px"> BD </span>
                </div>
                <script type="text/javascript">

                    $("#db").datepicker({
                    });
                </script>


                <div  class="inputBox"  >
                    <input type="text" name="Phone_number"  pattern="05[0-9]{8}"  >
                    <span style="top: -1px"> Phone_number </span>
                </div>

                <div  class="inputBox"  style="transform: translateY(-43px) translateX(399px) ; " >
                    <input type="text"  name="Address_student"   >
                    <span style="top: -1px"> Address </span>

                </div>

                    <?php

                    if($flagInfo_name == 1 ){

                        ?>
                        <p style="color: green">Name successfully changed
                        </p>

                        <?php
                    }

                    if ($flagInfo_DB == 2 ){

                        ?>
                        <p style="color: green">DB successfully changed
                        </p>
                        <?php

                    }
                    if ($flagInfo_phone == 3 ){

                        ?>
                        <p style="color: green">Phone_number successfully changed
                        </p>
                        <?php

                    }

                    if ($flagInfo_Address == 4 ){

                        ?>
                        <p style="color: green">Address successfully changed
                        </p>
                        <?php

                    }

                    if($flagInfo_error == 5) {

                        ?>
                        <p style="color: red">mistake! Make sure to enter all data </p>
                        <?php

                    }

                    ?>

                <div class="wrapper">

                    <button class="button" type="submit">Update!</button>
                </div>

                    </form>
            </div>







        </div>

        <!-- ================ Password ================= -->
        <div class="details" id="passwords" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2 style="font-size: xx-large" >كلمة المرور</h2>



                </div>

                <form method="post"  action="Supervisor.php">
                <div class="inputBox " style="" >
                    <input type="text"  required="required" name="oldPass">
                    <span style="top: -1px ">Old_password  </span>



                </div>
                <div  class="inputBox" style="transform: translateY(-43px)translateX(399px) ; ">
                    <input type="text" required="required" name="newPass" >
                    <span style="top: -1px"> New_password </span>
                </div>


                    <?php

                    if($flagPass == 1 ){

                        ?>
                        <p style="color: red">mistake! Make sure to enter all data </p>
                        <?php
                    }

                    elseif ($flagPass == 2 ){

                        ?>
                        <p style="color: red"> The old password is wrong!
                        </p>
                        <?php

                    }
                    elseif ($flagPass == 3 ){

                        ?>
                        <p style="color: green">Password successfully changed
                        </p>
                        <?php

                    }




                    ?>

                    <div class="wrapper">
                        <button class="button" type="submit">
                            Update!</button>
                    </div>
                </form>
            </div>







        </div>

    </div>

    <!-- ================= New Customers ================ -->


</div>

</div>
</div>

<!-- =========== Scripts =========  -->
<script src="js/SupervisorJs.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html><script>
    (function() {
        var ws = new WebSocket('ws://' + window.location.host +
            '/jb-server-page?reloadMode=RELOAD_ON_SAVE&'+
            'referrer=' + encodeURIComponent(window.location.pathname));
        ws.onmessage = function (msg) {
            if (msg.data === 'reload') {
                window.location.reload();
            }
            if (msg.data.startsWith('update-css ')) {
                var messageId = msg.data.substring(11);
                var links = document.getElementsByTagName('link');
                for (var i = 0; i < links.length; i++) {
                    var link = links[i];
                    if (link.rel !== 'stylesheet') continue;
                    var clonedLink = link.cloneNode(true);
                    var newHref = link.href.replace(/(&|\?)jbUpdateLinksId=\d+/, "$1jbUpdateLinksId=" + messageId);
                    if (newHref !== link.href) {
                        clonedLink.href = newHref;
                    }
                    else {
                        var indexOfQuest = newHref.indexOf('?');
                        if (indexOfQuest >= 0) {
                            // to support ?foo#hash
                            clonedLink.href = newHref.substring(0, indexOfQuest + 1) + 'jbUpdateLinksId=' + messageId + '&' +
                                newHref.substring(indexOfQuest + 1);
                        }
                        else {
                            clonedLink.href += '?' + 'jbUpdateLinksId=' + messageId;
                        }
                    }
                    link.replaceWith(clonedLink);
                }
            }
        };
    })();
</script>