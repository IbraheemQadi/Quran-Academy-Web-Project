<?php

session_start();
$flagPass = 0 ;

$flagInfo_error = 0 ;
if(isset($_SESSION['isStudent'])){

    if($_SESSION['isStudent'] == 1 ){

    } else{             header('Location:login.php');
    }

} else{        header('Location:login.php');


}

//changePassword




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Student</title>
  <!-- ======= Styles ====== -->
  <link rel="stylesheet" href="css/styleTest.css">
  <script type="text/javascript">

     function Logout_stuent(){
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
         xhttpss.open("POST", "utils/Update_pass.php" ,true);
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
        xh.open("POST", "utils/Update_info_STD.php" ,true);
        xh.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xh.send(ST);




    }

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
        <a id="a_student" onclick="RportGradsSudent()">
                        <span class="icon">
<ion-icon name="receipt-outline"></ion-icon>
                        </span>
          <span class="title">سجل العلامات</span>
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


        <a  onclick="Logout_stuent()" id="Sign_out" href="login.php">
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
      <span style="color: white" >type : Student</span>

      <div class="user">

        <i class='bx bx-user-circle' style='color:#d7d7d7 ; font-size: 40px'></i>
      </div>

    </div>

    <!-- ======================= Cards ================== -->
    <div class="cardBox">
      <div class="card">
<?php
          $db= new mysqli('localhost','root','','academy');



          $max="SELECT  ST_SUP,CENTER_NUMBER  FROM students where ST_ID = '". $_SESSION['ID'] ."' ;";
          $res = $db->query($max);

          $rw = $res->fetch_assoc();
         $CN_NUM =  $rw['CENTER_NUMBER'];
          $ID_SUP = $rw['ST_SUP'];


$max="SELECT NAME_SUP FROM supervisor WHERE ID ='".$ID_SUP."' ;";
$res = $db->query($max);

$rw = $res->fetch_assoc();
 $nameSuper = $rw['NAME_SUP'];

$max="SELECT ADDREES FROM center WHERE NUMBER_CENTER = '".$CN_NUM."' ;";
$res = $db->query($max);

$rw = $res->fetch_assoc();


$Adds_center = $rw['ADDREES'];



?>
        <div class="iconBx">
          <img style="width: 60px ;height: 60px" src="img/group.png">
        </div>
        <div>
          <div class="numbers"></div>


          <div class="numbers" id="NameSuper"> <?php  echo$CN_NUM ; ?></div>

          <div class="cardName">رقم الفوج</div>

        </div>


      </div>



      <div class="card">

        <div class="iconBx">
          <img style="width: 60px ;height: 60px" src="img/education.png">
        </div>
        <div>
          <div class="numbers"><?php  echo $nameSuper ; ?></div>
          <div class="cardName">اسم المشرف</div>





        </div>
      </div>

      <div class="card">
        <div class="iconBx">
          <img style="width: 60px ;height: 60px" src="img/mosque.png">
        </div>
        <div>

          <div class="numbers" id=""> <?php  echo $Adds_center ; ?></div>

          <div class="cardName">اسم المسجد</div>


        </div>
      </div>
    </div>


    <!-- ================ Student ================= -->
    <div class="details" id="Studnet_grads" style="display: none">
      <div class="recentOrders">
        <div class="cardHeader" dir="rtl">
          <h2  style="font-size: xxx-large">سجل العلامات </h2>





        </div>

        <table dir="rtl">
          <thead>
          <tr>
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
            <td ><span class="status delivered">2023/4/17</span></td>

            <td>البقرة</td>
            <td>1-15</td>
            <td>9.5</td>
            <td>ال عمران</td>
            <td>1-20</td>
            <td>10</td>
          </tr>

          <tr>
            <td ><span class="status delivered">2023/4/17</span></td>

            <td>البقرة</td>
            <td>1-15</td>
            <td>9.5</td>
            <td>ال عمران</td>
            <td>1-20</td>
            <td>10</td>
          </tr>

          <tr>
            <td ><span class="status delivered">2023/4/17</span></td>

            <td>البقرة</td>
            <td>1-15</td>
            <td>9.5</td>
            <td>ال عمران</td>
            <td>1-20</td>
            <td>10</td>
          </tr>

          <tr>
            <td ><span class="status delivered">2023/4/17</span></td>

            <td>البقرة</td>
            <td>1-15</td>
            <td>9.5</td>
            <td>ال عمران</td>
            <td>1-20</td>
            <td>10</td>
          </tr>

          <tr>
            <td ><span class="status delivered">2023/4/17</span></td>

            <td>البقرة</td>
            <td>1-15</td>
            <td>9.5</td>
            <td>ال عمران</td>
            <td>1-20</td>
            <td>10</td>
          </tr>

          <tr>
            <td ><span class="status delivered">2023/4/17</span></td>

            <td>البقرة</td>
            <td>1-15</td>
            <td>9.5</td>
            <td>ال عمران</td>
            <td>1-20</td>
            <td>10</td>
          </tr>

          <tr>
            <td ><span class="status delivered">2023/4/17</span></td>

            <td>البقرة</td>
            <td>1-15</td>
            <td>9.5</td>
            <td>ال عمران</td>
            <td>1-20</td>
            <td>10</td>
          </tr>

          <tr>
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
<script src="js/Student.js"></script>

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