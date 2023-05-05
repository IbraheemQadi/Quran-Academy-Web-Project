<?php
session_start();
if(isset($_SESSION['isAdmin'])){

    if($_SESSION['isAdmin'] == 1 ){

    } else{             header('Location:login.php');
    }

} else{        header('Location:login.php');


}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script type="text/javascript">

        function Logout_Admin(){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {



            }
            xhttp.open("GET", "utils/LogOut_Stuent.php" ,true);
            xhttp.send();

        }

    </script>


    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin</title>
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
                <a  id="Statistics" onclick="Statistic()" >
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                    <span class="title">الإحصائيات</span>
                </a>
            </li>

            <li>
                <a id="a_student" onclick="Sudent()">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                    <span class="title">الطلاب</span>
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
                <a id="super" onclick="superv()">
                        <span class="icon">
                           <ion-icon name="people-circle-outline"></ion-icon>

                        </span>
                    <span class="title">المشرفين</span>
                </a>
            </li>
            <li>
                <a  id="Center" onclick="mrqzz()" >
                        <span class="icon">
<i class='bx bx-plus-circle'></i>                        </span>
                    <span class="title">المراكز</span>
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
                <a onclick="Logout_Admin()" href="login.php">
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
            <span style="color: white" >ID : 1</span>
            <span style="color: white" >type : Admin</span>

            <div class="user">

                <i class='bx bx-user-circle' style='color:#d7d7d7 ; font-size: 40px'></i>
            </div>

        </div>

        <!-- ======================= Cards ================== -->
        <div class="cardBox">
            <div class="card">

                <?php
                $db= new mysqli('localhost','root','','academy');



                $max="SELECT COUNT(ST_ID) FROM students ;";

                $res = $db->query($max);

                $rw = $res->fetch_assoc();
                $numAllStudent =  $rw['COUNT(ST_ID)'];





                $max="SELECT COUNT(ID) FROM supervisor;";

                $res = $db->query($max);

                $rw = $res->fetch_assoc();


                $numAllSuper = $rw['COUNT(ID)'];

                $max="SELECT COUNT(NUMBER_CENTER) FROM center ;";
                $res = $db->query($max);

                $rw = $res->fetch_assoc();
                $NumberAllCenter = $rw['COUNT(NUMBER_CENTER)'];




                ?>


                <div class="iconBx">
                    <img style="width: 60px ;height: 60px" src="img/group.png">
                </div>
                <div>
                    <div class="numbers"> <?php echo $numAllStudent ; ?></div>
                    <div class="cardName">عدد الطلاب</div>

                </div>


            </div>



            <div class="card">

                <div class="iconBx">
                    <img style="width: 60px ;height: 60px" src="img/education.png">
                </div>
                <div>
                    <div class="numbers"><?php echo $numAllSuper ; ?></div>
                    <div class="cardName">عدد المشرفين</div>

                </div>
            </div>

            <div class="card">
                <div class="iconBx">
                    <img style="width: 60px ;height: 60px" src="img/mosque.png">
                </div>
                <div>

                    <div class="numbers"> <?php echo $NumberAllCenter ; ?></div>
                    <div class="cardName">عدد الأفواج</div>


                </div>
            </div>
        </div>



        <!-- ================ ST ================= -->
        <div class="details" id="st" style="display: none">







            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2  style="font-size: xxx-large">الإحصاء</h2>





                </div>






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


        <!-- ================ Student ================= -->
        <div class="details" id="details_student" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2  style="font-size: xxx-large">جدول الطلبة</h2>



                    <button type="button" class="buttonn" style=" background: #3310B2FF;  ">

                        <span class="button__icon">
			<i class='bx bxs-add-to-queue' style='color:#eae6e6'  ></i>
		</span>
                        <span class="button__text">insert</span>
                    </button>




                </div>

                <table dir="rtl">
                    <thead>
                    <tr>
                        <td>ID </td>
                        <td>ألاسم</td>
                        <td>BD</td>
                        <td>رقم الهاتف</td>
                        <td>المركز</td>
                        <td>المشرف</td>





                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>
                        <td>أبو معاذ</td>
                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>
                        <td>أبو معاذ</td>
                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>
                        <td>أبو معاذ</td>
                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>
                        <td>أبو معاذ</td>
                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>
                        <td>أبو معاذ</td>
                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>
                        <td>أبو معاذ</td>
                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>
                        <td>أبو معاذ</td>
                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>
                        <td>أبو معاذ</td>
                    </tr>

                    </tbody>
                </table>

            </div>



            </div>




        <!-- ================ super ================= -->
        <div class="details" id="details_Superv" style="display: none">



            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2 style="font-size: xx-large" >جدول المشرفين</h2> <br>




                    <button type="button" class="buttonn" style=" background: #3310B2FF;  ">

                        <span class="button__icon">
			<i class='bx bxs-add-to-queue' style='color:#eae6e6'  ></i>
		</span>
                        <span class="button__text">insert</span>
                    </button>






                </div>


                <table dir="rtl">
                    <thead>
                    <tr>
                        <td>ID </td>
                        <td>ألاسم</td>
                        <td>BD</td>
                        <td>رقم الهاتف</td>
                        <td>المركز</td>






                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">12011080</span></td>
                        <td>عباس نضال دويكات</td>
                        <td>2002/10/3</td>
                        <td>0594504708</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

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

        <!-- ================ mrqz ================= -->
        <div class="details" id="mrqz" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2 style="font-size: xxx-large" >جدول المراكز</h2>



                    <button type="button" class="buttonn" style=" background: #3310B2FF;  ">

                        <span class="button__icon">
			<i class='bx bxs-add-to-queue' style='color:#eae6e6'  ></i>
		</span>
                        <span class="button__text">insert</span>
                    </button>





                    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>


                </div>

                <table dir="rtl">
                    <thead>
                    <tr>
                        <td>رقم الفوج </td>
                        <td>أيام الدوام</td>
                        <td>العنوان</td>







                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td ><span class="status delivered">14</span></td>
                        <td>سبت-اثنين-أربعاء</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>


                    </tr>

                    <tr>
                        <td ><span class="status delivered">14</span></td>
                        <td>سبت-اثنين-أربعاء</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>


                    </tr>

                    <tr>
                        <td ><span class="status delivered">14</span></td>
                        <td>سبت-اثنين-أربعاء</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">14</span></td>
                        <td>سبت-اثنين-أربعاء</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">14</span></td>
                        <td>سبت-اثنين-أربعاء</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">14</span></td>
                        <td>سبت-اثنين-أربعاء</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">14</span></td>
                        <td>سبت-اثنين-أربعاء</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>

                    </tr>

                    <tr>
                        <td ><span class="status delivered">14</span></td>
                        <td>سبت-اثنين-أربعاء</td>
                        <td>بلاطة البلد-أبو بكر الصديق</td>
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




        <!-- ================ Setting ================= -->
        <div class="details" id="Setting" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2  style="font-size: xx-large" >المعلومات الشخصية</h2>



                </div>

                <div class="inputBox " style="" >
                    <input type="text"  required="required">
                    <span style="top: -1px ">Name  </span>




                </div>
                <div  class="inputBox" style="transform: translateY(-74px) translateX(399px) ; ">
                    <input  id="db" type="text" required="required" class="sm-form-control">
                    <span style="top: -1px"> BD </span>
                </div>
                <script type="text/javascript">

                    $("#db").datepicker({
                    });
                </script>


                <div  class="inputBox"  >
                    <input type="text" required="required" >
                    <span style="top: -1px"> Phone_number </span>
                </div>

                <div  class="inputBox"  style="transform: translateY(-74px) translateX(399px) ; " >
                    <input type="text" required="required"   >
                    <span style="top: -1px"> Address </span>
                </div>


                <div class="wrapper">
                    <a  class="button">Update!</a>
                </div>

            </div>







        </div>

        <!-- ================ Password ================= -->
        <div class="details" id="passwords" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2 style="font-size: xx-large" >كلمة المرور</h2>



                </div>

                <div class="inputBox " style="" >
                    <input type="text"  required="required">
                    <span style="top: -1px ">Old_password  </span>



                </div>
                <div  class="inputBox" style="transform: translateY(-110px) translateX(399px) ; ">
                    <input type="text" required="required" >
                    <span style="top: -1px"> New_password </span>
                </div>


<form method="post" >
                <div class="wrapper">
                    <a  class="button" >Update!</a>
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
<script src="js/main-admin.js"></script>

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