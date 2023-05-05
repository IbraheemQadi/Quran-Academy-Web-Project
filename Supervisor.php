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

} else{       
     header('Location:login.php');
}

//changePassword




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Supervisor</title>
    <!-- include the tailwind css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="css/styleTest.css">
    <script type="text/javascript">

        function Logout_Super(){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {



            }
            xhttp.open("GET", "utils/LogOut_Stuent.php" ,true);
            xhttp.send();

        }



        function UpdatePass(){

            const xhttpss = new XMLHttpRequest();
            let old = document.getElementById("oldPass").value ;
            let New = document.getElementById("newPass").value ;

            let creds = "oldPass="+old+"&newPass="+New;

            xhttpss.onload = function() {


                document.getElementById("MSG").innerText = xhttpss.responseText;


            }
            xhttpss.open("POST", "utils/UpdatePass_supervis.php" ,true);
            xhttpss.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttpss.send(creds);

        }


        function UpdateInfo(){
            const xh = new XMLHttpRequest();

            let NameST = document.getElementById("NameStudent").value ;
            let db = document.getElementById("db").value ;
            let Phone = document.getElementById("Phone_number").value ;
            let Address = document.getElementById("Address_student").value ;

            let ST = "NameStudent="+NameST+"&DB_student="+db+"&Phone_number="+Phone+"&Address_student="+Address;


            xh.onload = function() {


                document.getElementById("MSG_inf").innerText = xh.responseText;


            }
            xh.open("POST", "utils/Updateinfo_supervis.php" ,true);
            xh.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xh.send(ST);




        }


    </script>
</head>


<body>
<!-- =============== Modal ================ -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div id="model-content" dir="rtl" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div  class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl text-center font-medium text-gray-900 dark:text-white">أدخل بياناتك لو سمحت</h3>
                <form id="myForm" class="space-y-6" onsubmit="handleSubmit(this)" >
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">رقم التسجيل</label>
                        <input type="text" name="email" id="email" placeholder="ID"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">كلمة السر</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">متابعة</button>

                </form>
            </div>
        </div>
    </div>
</div> 

<!-- =============== Modal ================ -->
<div class="container">
    <div class="navigation active" >
        <ul>
            <li>
                <a>
                    <span class="icon">
                        <img src="img/quranWhite.png">
                    </span>
                    <span style="font-size: xxx-large" class="title"> ﷺ</span>
                </a>
            </li>
            <li class="hovered">
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
                <a onclick="Logout_Super()" href="login.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                    <span class="title">تسجيل الخروج</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- ========================= Main ==================== -->
    <div class="main active">
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
        <div class="details" id="StudnetForsuper">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2  style="font-size: xxx-large;">الطلاب </h2>
                </div>
                <table dir="rtl">
                    <thead>
                    <tr>
                        <td>رقم الطالب</td>
                        <td>الإسم </td>
                        <td>تاريخ الميلاد</td>
                        <td>العنوان</td>
                        <td>رقم الهاتف</td>
                        <td>البريد الالكتروني</td>
                        <td> </td>
                        <td> </td>
                    </tr>
                    </thead>
                    <tbody>
            <?php
                $supervisorID=$_SESSION['ID'];

                if($db->connect_error){
                    die("Connection failed " . $db->connect_error);
                }

                $querystr="SELECT * FROM students where ST_SUP=$supervisorID";

                $res=$db->query($querystr);
                while($row = $res->fetch_assoc()){
                echo "
                <tr id=$row[ST_ID]>
                    <td>$row[ST_ID]</td>
                    <td>$row[NAME_STUDENT]</td>
                    <td ><span class='status delivered'>$row[BIRTHDATE]</span></td>
                    <td>$row[ADDRESS]</td>
                    <td>$row[PHONE_NUMBER]</td>
                    <td >$row[Email]</td>
                    <td ><a type='button' id='modal-trigger' data-modal-target='authentication-modal' data-modal-toggle='authentication-modal'  onclick='addToStorage($row[ST_ID])'><ion-icon name='trash' size='large' ></ion-icon></a></td>
                    <td > <button onclick='updateRow($row[ST_ID])'>احذف</button></td>
                </tr>";

                }
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
                <form method="post" action="" >
                    <div class="inputBox "  style="" >
                        <input type="text" name="NameStudent" id="NameStudent" >
                        <span style="top: -1px ">Name  </span>




                    </div>
                    <div  class="inputBox" style="transform: translateY(-43px) translateX(399px) ; ">
                        <input  id="db"  name="DB_student" type="text"  class="sm-form-control">
                        <span style="top: -1px"> BD </span>
                    </div>
                    <script type="text/javascript">

                        $("#db").datepicker({
                        });
                    </script>


                    <div  class="inputBox"  >
                        <input type="text" id="Phone_number" name="Phone_number" pattern="05[0-9]{8}"  >
                        <span style="top: -1px"> Phone_number </span>
                    </div>

                    <div  class="inputBox"   style="transform: translateY(-43px) translateX(399px) ; " >
                        <input type="text" id="Address_student" name="Address_student"    >
                        <span style="top: -1px"> Address </span>
                    </div>







                    <div style="color: green" id="MSG_inf">

                    </div>


                    <div class="wrapper">
                        <button  onclick="UpdateInfo()"  class="button" type="button">
                            Update!</button>
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


                <form method="post" action="">
                    <div class="inputBox " style="" >
                        <input type="text"  required="required" name="oldPass" id="oldPass">
                        <span style="top: -1px ">Old_password  </span>



                    </div>
                    <div  class="inputBox" style="transform: translateY(-43px) translateX(399px) ; ">
                        <input type="text" required="required" name="newPass" id="newPass">
                        <span style="top: -1px"> New_password </span>
                    </div>




                    <p id="MSG" style="color: red" > </p>










                    <div class="wrapper">
                        <button onclick="UpdatePass()"  class="button" type="button">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script>
</script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
