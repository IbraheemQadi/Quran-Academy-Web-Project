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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css"
    />
    <script
            type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/toastify-js"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/micromodal/dist/micromodal.min.js"></script>
    <!-- include tailwind elements library  -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css"
    />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
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
                <a href="index.php">
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
                    <input type="text" placeholder="Search here" id="Search_Filter" style="color: black">
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







                </div>

                <table dir="rtl" id="TableReport">
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




                    <?php

                    $db= new mysqli('localhost','root','','academy');

                    $sql = "SELECT s.NAME_STUDENT, s.BIRTHDATE, s.ADDRESS, s.PHONE_NUMBER, s.PASS, s.ST_ID, s.ST_SUP, s.CENTER_NUMBER, s.Email, sv.NAME_SUP, c.ADDREES FROM students s INNER JOIN supervisor sv ON s.ST_SUP = sv.ID INNER JOIN center c ON s.CENTER_NUMBER = c.NUMBER_CENTER;";


                    $es = $db->query($sql);

                    for ($i=0 ; $i < $es->num_rows;$i++) {
                        $rw = $es->fetch_assoc();

                        echo "
        <tr>
         <td> <span class='status delivered'> $rw[ST_ID] </span> </td>
        <td>$rw[NAME_STUDENT]</td>
        <td>  $rw[BIRTHDATE] </td>
          <td>  $rw[PHONE_NUMBER] </td>
         <td> $rw[ADDREES]  </td>
         <td> $rw[NAME_SUP]  </td>
         
         </tr>";

                    }

                    $db->close();




                    ?>


                    </tbody>
                </table>

            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $("#Search_Filter").on('keyup', function() {
                        let input = $(this).val();
                        if (true) {

                            if (flagClick == 1){

                            $.ajax({
                                url: "AdminPhpHelper/FiltertStudent_Admin.php",

                                method: "POST",

                                data: {
                                    input: input
                                },
                                success: function(data) {

                                    $("#TableReport tbody").html( '<tr><td>' + data +    '</td></tr>' )
                                }
                            });                         }
                            else if (flagClick == 2){

                                $.ajax({
                                    url: "AdminPhpHelper/FilterSupervis_Admin.php",

                                    method: "POST",

                                    data: {
                                        input: input
                                    },
                                    success: function(data) {

                                        $("#TableSuper tbody").html( '<tr><td>' + data +    '</td></tr>' )
                                    }
                                });




                            } else if (flagClick == 3){

                                $.ajax({
                                    url: "AdminPhpHelper/FilterCenter_Admin.php",

                                    method: "POST",

                                    data: {
                                        input: input
                                    },
                                    success: function(data) {

                                        $("#TableCenter tbody").html( '<tr><td>' + data +    '</td></tr>' )
                                    }
                                });



                            }
                        }
                    });
                });


            </script>

            </div>




        <!-- ================ super ================= -->
        <div class="details" id="details_Superv" style="display: none">



            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2 style="font-size: xx-large" >جدول المشرفين</h2> <br>











                </div>


                <table dir="rtl" id="TableSuper">
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


                        <?php

                        $db= new mysqli('localhost','root','','academy');

                         $sql = "SELECT supervisor.CENTER_NUMBER, supervisor.ID, supervisor.BIRTHDATE,  supervisor.PHONE_NUMBER,  supervisor.NAME_SUP, center.ADDREES
FROM supervisor
INNER JOIN center
ON supervisor.CENTER_NUMBER = center.NUMBER_CENTER";


                        $es = $db->query($sql);

                        for ($i=0 ; $i < $es->num_rows;$i++) {
                            $rw = $es->fetch_assoc();

                            echo "
        <tr>
         <td> <span class='status delivered'> $rw[ID] </span> </td>
        <td>$rw[NAME_SUP]</td>
        <td>  $rw[BIRTHDATE] </td>
          <td>  $rw[PHONE_NUMBER] </td>
         <td> $rw[ADDREES]  </td>
         
         </tr>";

                        }

                        $db->close();





                        ?>




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








                    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>


                </div>

                <table dir="rtl" id="TableCenter">
                    <thead>
                    <tr>
                        <td>رقم الفوج </td>
                        <td>أيام الدوام</td>
                        <td>العنوان</td>







                    </tr>
                    </thead>

                    <tbody>

                    <?php

                    $db= new mysqli('localhost','root','','academy');

                    $sql = "SELECT `ADDREES`, `NUMBER_CENTER`, `WORKING_DAYS` FROM `center`;";


                    $es = $db->query($sql);

                    for ($i=0 ; $i < $es->num_rows;$i++) {
                        $rw = $es->fetch_assoc();

                        echo "
        <tr>
         <td> <span class='status delivered'> $rw[NUMBER_CENTER] </span> </td>
        <td>$rw[WORKING_DAYS]</td>
        <td>  $rw[ADDREES] </td>
      
         
         </tr>";

                    }

                    $db->close();




                    ?>


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

</html>
