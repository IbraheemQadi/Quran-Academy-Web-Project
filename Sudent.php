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

    <script
            type="text/javascript"
            charset="utf8"
            src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" media="all"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" media="all"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
      <!-- toastify.js -->
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
      tailwind.config = {
        darkMode: "class",
        theme: {
          fontFamily: {
            sans: ["Roboto", "sans-serif"],
            body: ["Roboto", "sans-serif"],
            mono: ["ui-monospace", "monospace"],
          },
        },
        corePlugins: {
          preflight: false,
        },
      };
    </script>
    <!-- ======= Styles ====== -->
  <link rel="stylesheet" href="css/styleTest.css">
  <script type="text/javascript">
     function Logout_stuent(){
         const xhttp = new XMLHttpRequest();
         xhttp.open("GET", "utils/LogOut_Stuent.php" ,true);
         xhttp.send();
      }
  </script>
</head>

<body>
       <!-- ===============  Student profile Modal ================ -->
       <div
      data-te-modal-init
      class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
      id="profileModal"
      tabindex="-1"
      aria-labelledby="profileModalLabel"
      aria-hidden="true"
    >
      <div
        data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]"
      >
        <div
          class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600"
        >
          <!--Modal body-->
          <!--Third Testimonial-->
          <div>
            <div
              class="block rounded-lg bg-white shadow-lg dark:bg-neutral-700 dark:shadow-black/30"
            >
              <div
                class="h-40 rounded-t-lg overflow-hidden bg-[url('img/quds.jpg')] bg-cover bg-center bg-no-repeat"
              ></div>
              <div
                class="mx-auto -mt-24 w-44 overflow-hidden rounded-full border-2 border-white bg-white dark:border-neutral-800 dark:bg-neutral-800"
              >
                <img
                class="previewImage w-44 h-44 object-cover"
                />
              </div>
              <label for="photoInput" class="absolute top-[205px] right-[180px] inline-flex justify-center items-center h-10 w-10 bg-gray-100 rounded-full text-center cursor-pointer">
                    <ion-icon class="text-primary" size="large" name="camera-outline"></ion-icon>
              </label>
              <div class="p-6">
                <h4
                  id="studentName"
                  class="text-center text-3xl font-semibold"
                >

                </h4>
                <div
                  id="studentID"
                  class="mb-4 text-center text-gray-500 text-xl font-light"
                >

                </div>
                <hr />
                <div style="color: gray" class="mt-2 text-xl">
                  <div class="grid grid-cols-2 gap-4 mb-5 text-right">
                    <div id="studentAddress"></div>
                    <div class="font-bold">
                      : العنوان
                      <ion-icon class="ml-2" name="home-outline"></ion-icon>
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4 mb-5 text-right">
                    <div id="studentNumber"></div>
                    <div class="font-bold">
                      : الجوال
                      <ion-icon class="ml-2" name="call-outline"></ion-icon>
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4 mb-5 text-right">
                    <div id="studentDate"></div>
                    <div class="font-bold">
                      : تاريخ الميلاد
                      <ion-icon class="ml-2" name="calendar-outline"></ion-icon>
                    </div>
                  </div>
                  <div class="grid grid-cols-2 gap-4 mb-5 text-right">
                    <div id="studentEmail"></div>
                    <div class="font-bold">
                      : البريد الالكتروني
                      <ion-icon class="ml-2" name="mail-outline"></ion-icon>
                    </div>
                  </div>
                </div>
                <input 
                    class="hidden relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                    type="file" 
                    name="photo" 
                    accept="image/*"
                    id="photoInput"
                    onchange="saveProfileImg(<?php echo $_SESSION['ID']?>)"
                    >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
      <li class="hovered">
        <a id="a_student" onclick="RportGradsSudent()">
                        <span class="icon">
                          <ion-icon name="receipt-outline"></ion-icon>
                        </span>
          <span class="title">سجل العلامات</span>
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
          <form action="" method="POST">
        <label>
          <input type="text" placeholder="Search here" value="" id="Search_Filter"    >
          <i class='bx bx-search' style='color:#222121'  ></i>
        </label>
          </form>
      </div>
      <span style="color: white" >ID : <?php echo $_SESSION['ID']?> </span>
      <span style="color: white" >type : Student</span>
      <div class="user border-2 border-white">
            <img 
              onclick="initProfile(<?php echo $_SESSION['ID']?>)"     
              data-te-toggle="modal"
              data-te-target="#profileModal"
              data-te-ripple-init
              data-te-ripple-color="light" 
              class="previewImage"
               >
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


$db->close();
?>
        <div class="iconBx">
          <img style="width: 60px ;height: 60px" src="img/group.png">
        </div>
        <div class="card__data">
          <div class="numbers"></div>


          <div class="numbers" id="NameSuper"> <?php  echo$CN_NUM ; ?></div>

          <div class="cardName">رقم الفوج</div>

        </div>


      </div>



      <div class="card">

        <div class="iconBx">
          <img style="width: 60px ;height: 60px" src="img/education.png">
        </div>
        <div class="card__data">
          <div class="numbers"><?php  echo $nameSuper ; ?></div>
          <div class="cardName">اسم المشرف</div>





        </div>
      </div>

      <div class="card">
        <div class="iconBx">
          <img style="width: 60px ;height: 60px" src="img/mosque.png">
        </div>
        <div class="card__data">

          <div class="numbers" id=""> <?php  echo $Adds_center ; ?></div>

          <div class="cardName">اسم المسجد</div>


        </div>
      </div>
    </div>


    <!-- ================ Student ================= -->
      <div class="details" id="Studnet_grads" style="display: none">
          <div class="recentOrders">
              <div class="cardHeader" dir="rtl">
                  <h2 style="font-size: xxx-large">سجل العلامات </h2>
              </div>

              <table dir="rtl" id="TableReport">
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

                  <?php

                  $db= new mysqli('localhost','root','','academy');

                  $sql = "SELECT DateFor,MOMRIZE_Gread,Rev_grad,Rev_for,MOM_for,NameSoraMEMO,NameSoraREV FROM report WHERE ST_ID = '" . $_SESSION['ID'] . "' ;";

                  $es = $db->query($sql);

                  for ($i=0 ; $i < $es->num_rows;$i++) {
                      $rw = $es->fetch_assoc();

                      echo "
        <tr>
        <td><span class='status delivered'>$rw[DateFor] </span></td>
        <td> $rw[NameSoraMEMO]  </td>
          <td>  $rw[MOM_for] </td>
         <td> $rw[MOMRIZE_Gread]  </td>
         <td>  $rw[NameSoraREV] </td>
         <td> $rw[Rev_for] </td>
         <td>  $rw[Rev_grad] </td>
         </tr>";

                  }


                  ?>

                  </tbody>
              </table>
          </div>
      </div>

      <script type="text/javascript">
          $(document).ready(function() {

              $("#SuperChangeInfo").on('click', function() {

                  let NameStudent = $("#NameStudent").val() ;
                  let DB_student = $("#db").val() ;
                  let Phone_number = $("#Phone_number").val() ;
                  let Address_student = $("#Address_student").val() ;


                  if (true) {

                      $.ajax({
                          url: "utils/Update_info_STD.php",

                          method: "POST",

                          data: {
                              NameStudent: NameStudent,
                              DB_student: DB_student,
                              Phone_number: Phone_number,
                              Address_student: Address_student
                          },
                          success: function (data) {

                              $("#MSG_inf").html( data)
                          }
                      });

                  }
              });







              $("#changePassSuper").on('click', function() {

                  let oldPass = $("#oldPass").val() ;
                  let newPass = $("#newPass").val() ;



                  if (true) {

                      $.ajax({
                          url: "utils/Update_pass.php",

                          method: "POST",

                          data: {
                              oldPass: oldPass,
                              newPass: newPass,

                          },
                          success: function (data) {

                              $("#MSG").html( data)
                          }
                      });

                  }
              });



              $("#Search_Filter").on('keyup', function() {
                  let input = $(this).val();
                  if (true) {

                      $.ajax({
                          url: "utils/TableFilterStudnetPage.php",
                          method: "POST",

                          data: {
                              input: input
                          },
                          success: function(data) {

                              $("#TableReport tbody").html( '<tr><td>' + data +    '</td></tr>' )
                          }
                      });
                  }
              });
          });


      </script>





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
          <input  id="db"  readonly name="DB_student" type="text"  class="sm-form-control">
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







           <div  id="MSG_inf">

           </div>


              <div class="wrapper">
              <button  id="SuperChangeInfo"   class="button" type="button">
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




              <div id="MSG"  > </div>










              <div class="wrapper">
                  <button  id="changePassSuper" class="button" type="button">
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
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script>
  loadProfileImg(<?php echo $_SESSION['ID']?>);
</script>
<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<
</body>

</html>
