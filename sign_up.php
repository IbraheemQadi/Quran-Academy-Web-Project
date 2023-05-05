<?php
session_start();

$flagSamePass = 0 ;
$_SESSION['$flagSign'] = 0 ;
$flagTypeUser = 0 ;
if((isset($_POST['name']))  || (isset($_POST['mobile'])) || (isset($_POST['address']))
|| isset($_POST['email']) ||  isset($_POST['pass1']) || isset($_POST['pass2']) || isset($_POST['mrqz']) || isset($_POST['']) ){


if((empty($_POST['name']))  || (empty($_POST['mobile'])) || (empty($_POST['address']))
    || empty($_POST['email']) ||  empty($_POST['pass1']) || empty($_POST['pass2']) || $_POST['georgian_start_date']=="")   {
    $_SESSION['$flagSign'] = 1;
}
else{



    if ( ($_POST['pass1'] == $_POST['pass2']) ) {


        if ($_COOKIE['selectItim'] == 2) { // Reigstersuper


        $db= new mysqli('localhost','root','','academy');



        $max="SELECT MAX(ID)  FROM supervisor;";
        $res = $db->query($max);

        $rw = $res->fetch_assoc();
            $yourID = $rw['MAX(ID)'] + 1 ;



            $Qar ="INSERT INTO supervisor (CENTER_NUMBER, ID, BIRTHDATE, ADDRESS, PHONE_NUMBER, PASS, NAME_SUP, Email) VALUES ('".$_POST['mrqz']."','".++$rw['MAX(ID)']."', '".$_POST['georgian_start_date']."', '".$_POST['address']."', '".$_POST['mobile']."', '".$_POST['pass1']."', '".$_POST['name']."', '".$_POST['email']."');";
            $res = $db->query($Qar);
            $db ->close();
$flagSamePass = 2;

        } else { //// ReigsterStudent

            if (isset($_POST['comboSuper'])) {
                $db = new mysqli('localhost', 'root', '', 'academy');


                $max = "SELECT MAX(ST_ID)  FROM students;";
                $res = $db->query($max);

                $rw = $res->fetch_assoc();
                $yourID = $rw['MAX(ST_ID)'] + 1;

                $Qar = "INSERT INTO students (CENTER_NUMBER, ST_ID, BIRTHDATE, ADDRESS, PHONE_NUMBER, PASS, NAME_STUDENT, Email,ST_SUP) VALUES ('" . $_POST['mrqz'] . "','" . ++$rw['MAX(ST_ID)'] . "', '" . $_POST['georgian_start_date'] . "', '" . $_POST['address'] . "', '" . $_POST['mobile'] . "', '" . $_POST['pass1'] . "', '" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['comboSuper'] . "');";
                $res = $db->query($Qar);
                $db->close();


                $flagSamePass = 2;
            } else{$_SESSION['$flagSign'] = 1; }
        }

    } else{$flagSamePass = 1 ;}}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

    <script
            src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous"></script>

  <!--  Design date text -->

  <link href="https://plan.etqaaan.com/js/hijri/src/css/bootstrap-datetimepicker.css" rel="stylesheet">

  <!-- Include Date Text -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  <style type="text/css">

    ::selection{
      background-color: #ba992e !important;
    }
    
    .btnn {
      display: inline-block;
      font-weight: 400;
      line-height: 2;
      color: #161c2d;
      text-align: center;
      vertical-align: middle;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
      background-color: transparent;
      border: 1px solid transparent;
      padding: 0.8125rem 1.25rem;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }


    .btnn:hover{
      color: white;
    }


    .bgg-color {
      background-color: #ba992e !important;
    }

    .bgg-color *::selection{
      background-color: #fffcfc5c !important;
    }

    .btn-secondaryy {
      color: #000;
      background-color: #fff;
      border-color: #ba992e;
      box-shadow: 0 0;
    }

    .btn-secondaryy:hover {
      color: #fff;
      background-color: #ba992e;
      border-color: #fff;
    }


    .btn-primaryy:hover, .show>.btn-primary.dropdown-toggle {
      color: #fff;
      background-color: #ba992e;
      border-color: #ba992e;
    }


    .btn-primaryy.active, .show>.btn-primary.dropdown-toggle {
      color: #fff;
      background-color: #ba992e;
      border-color: #ba992e;
    }
  </style>

<script type="text/javascript">



let jstTophp = 2 ;
document.cookie = "selectItim="+jstTophp;




  function changea( a, b){






    a.className = "btnn btn-primaryy btn-block btn-outline center w-100 ";
    b.className= "btnn btn-primaryy btn-block btn-outline center w-100 active" ;
    document.getElementById("comboSuper").style.visibility ="visible";
      document.getElementById("labSuper").style.visibility ="visible";
      let jstTophp = 1 ;
      document.cookie = "selectItim="+jstTophp;

  }
  function changeb( a, b){

      document.getElementById("comboSuper").style.visibility ="hidden";
      document.getElementById("labSuper").style.visibility ="hidden";

    a.className = "btnn btn-primaryy btn-block btn-outline center w-100 active ";
    b.className= "btnn btn-primaryy btn-block btn-outline center w-100 " ;
      let jstTophp = 2 ;


      document.cookie = "selectItim="+jstTophp;


  }

function  SelectCenter( str){

    if (str == "") {
        document.getElementById("comboSuper").innerHTML = "";
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {



         document.getElementById("comboSuper").innerHTML = xhttp.responseText ;


     }
    xhttp.open("GET", "Select_Super.php?SelectMr="+str ,true);
    xhttp.send();



}



</script>


<!-- Font Google
============================================= -->
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

  <!-- Stylesheets
  ============================================= -->
  <link rel="stylesheet" href="https://plan.etqaaan.com/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="https://plan.etqaaan.com/css/style.css" type="text/css" />
  <link rel="stylesheet" href="https://plan.etqaaan.com/css/font-icons.css" type="text/css" />
  <link rel="stylesheet" href="https://plan.etqaaan.com/css/datepicker.css" type="text/css"/>
</head>
<body>

<div class="container-fluid">
  <div class="row align-items-stretch">

    <div class=" col-12 col-md-4 bgg-color position-md-sticky d-flex align-items-center vh-md-100" style="top: 0; ">
      <div class="card-body px-md-0 px-lg-5">
        <div class="justify-content-center align-items-center h-100 py-3">
          <h1 class="display-2 fw-bolder color01 mt-6">يا مرحبًا بأهل القرآن</h1>
          <h3 class="fw-normal color01">أعد البرنامج نخبة من المتخصصين في مجال تحفيظ القرآن الكريم </h3>
          <a class="btn btn-white btn-block center w-100 btn-outline h3" href="home.html">العودة للموقع التعريفي</a>
         <div style="padding-top: 30px"> <a class="btn btn-white btn-block center w-100 btn-outline h3"  href="login.php">لدي حساب بالفعل</a>
         </div>
         </div>
      </div>
    </div>

    <div class="col-lg-8 col-md-8">
      <div class="container-fluid">

        <form  id="plan_form" action="sign_up.php" method="POST" >
          <!-- action ^          (data base)----------------------------- -->
          <input type="hidden" name="_token" value="rvXXMShw7BFknZIuF2i1bNOSFjjf3PiyTPWo0GTw0"  >	<!-- البيانات الشخصية -->
          <div class="row clearfix mt-md-12 mt-6 mb-md-8 mb-4">

            <div class="col-12 mb-4">
              <h3 class="heading mb-7">البيانات الشخصية</h3>
              <label class="my-1">الاسم الثلاثي</label>
              <input type="text" name="name" id="path-registration-first-name" class="sm-form-control border-form-control col-12 col-md-8" required="required" placeholder="الاسم الثلاثي">

              <div style="padding: 20px 0 0 0 ">
              <label class="my-1">رقم الهاتف</label>
              <input type="text" name="mobile" id="mobile_number" pattern="05[0-9]{8}" class="sm-form-control border-form-control col-12 col-md-8" required="required" placeholder="رقم الهاتف">

              </div>

              <div style="padding: 20px 0 0 0 ">
                <label class="my-1">العنوان</label>
                <input type="text" name="address" id="address" class="sm-form-control border-form-control col-12 col-md-8" value="" required="required"placeholder="ادخل العنوان هنا ">
              </div>

              <div style="padding: 20px 0 0 0 ">
                <label class="my-1">يوم الميلاد</label>

              <ul id="myTab2" class="nav row col-md-8 col-12 nav-pills boot-tabs mx-0">
                <li class="nav-item col-md-4 col-12 px-0">
                  <div id="myTabContent2" class="w-100 tab-content col-md-6 col-12">

                    <div class="w-100 tab-pane fade active show" id="ad">

                      <input type="text" id="datetime"  value="" required="required" name="georgian_start_date" class="bg-gray-800 hijri-date-input-g sm-form-control text-left form-control valid" placeholder="MM/DD/YYYY" readonly >
                      <script type="text/javascript">
                       $(function () {
                         $("#datetime").datepicker({});});

                      </script>


                    </div>
                  </div>
                </li>

                <li class="nav-item col-md-4 col-12 px-0">
                  <a class="btnn btn-primaryy  btn-block btn-outline center w-100 active"  data-toggle="tab"> ميلادي</a>
                </li>
              </ul>

            </div>
</div>

            <!--Radio buttons-->

            </div>









          <!-- المحفوظ السابق-->
          <div class="row clearfix mb-md-8 mb-4">
            <div class="col-md-12 col-12">

              <h3 class="heading mb-7">المراكز</h3>
              <label class="mb-3">رقم الفوج</label>
                <label class="mb-3" style="transform: translateX(-279px) ; visibility: hidden"  id="labSuper" >المشرف </label>

              <div id="myTabContent22" class="tab-content row col-md-8 col-12 mx-0">
                <div class="tab-pane fade show active" id="joze">
                  <div class="row align-items-center" id="pathj_1">




                    <select   onchange="SelectCenter(this.value)"  class="col-md-4 col-12 mb-1 h3 sm-form-control border-form-control" name="mrqz" id="mrqz">

                        <option value="" disabled selected hidden >اختر رقم الفوج</option>
                        <?php
$db= new mysqli('localhost','root','','academy');


$combo = "SELECT NUMBER_CENTER FROM center;";
$res = $db->query($combo);


for ($i = 0 ; $i< $res->num_rows;$i++){
    $rw = $res->fetch_assoc();
    echo "<option value='".$rw['NUMBER_CENTER']."'>".$rw['NUMBER_CENTER']."</option>";

}

$db->close();
?>

                    </select>

                      <select  style="transform: translateX(-71px) ; visibility: hidden ; width: 280px" class="col-md-4 col-12 mb-1 h3 sm-form-control border-form-control" name="comboSuper" id="comboSuper" >




                      </select>


                  </div>
                </div>



              </div>


            </div>
          </div>
          <div class="col-12 mb-4">
            <label class="my-1">طبيعة المسجل </label>
            <div class="row mx-0" data-toggle="buttons">
              <div class="col-md-4 col-6 px-0">
                <label class="btnn btn-primaryy btn-block btn-outline center w-100 active" id="a" name="superr" style="border: 1px solid black;">
                  <input   onclick=" changeb(a,b)" class="form-check-input" id="super"  value="مشرف" type="radio" checked >مشرف
                </label>
              </div>
              <div class="col-md-4 col-6 px-0">
                <label class="btnn btn-primaryy btn-block btn-outline center w-100" id="b"  name="studentt"style="border: 1px solid black ; " >
                  <input  class="form-check-input" onclick=" changea(a,b)" id="student" value="طالب" type="radio">طالب
                </label>
              </div>
            </div>
          </div>
          <!-- تحديد المجال -->


          <div class="row clearfix mb-md-8 mb-4">
            <div class="col-md-12 col-12">
              <h3 class="heading mb-7">معلومات التسجيل</h3>

              <div style="padding: 20px 0 0px 0 ">
                <label class="my-1">البريد الألكتروني</label>
                <input dir="ltr" type="email" name="email" id="email" class="sm-form-control border-form-control col-12 col-md-8" required="required" placeholder="exp@gmail.com">
              </div>

              <div style="padding: 20px 0 0px 0 ">
                <label class="my-1">كلمة السر</label>
                <input dir="ltr" type="password" name="pass1" id="pass1" class="sm-form-control border-form-control col-12 col-md-8" required="required" placeholder="enter the password">
              </div>

              <div style="padding: 20px 0 30px 0 ">
                <label class="my-1">ادخل كلمة السر مرة أٌخرى</label>
                <input dir="ltr" type="password" name="pass2" id="pass2" class="sm-form-control border-form-control col-12 col-md-8" required="required" placeholder="enter the password again">
              </div>
<?php


    if ( $flagSamePass == 1 ){

        ?>
                <p style="color: red"> Verify that the password matches</p>
                <?php
    }
elseif ($flagSamePass == 2){


    echo "<p style='color: green'> You have been registered successfully ,Your ID: ".$yourID."' </p> "  ;

}



                if ($_SESSION['$flagSign'] == 1){


                    ?>
                <p style="color: red">mistake! Make sure to enter all data </p>
                <?php
                }






?>


              <div class="col-md-8 col-12 mx-0">


                <input  type="submit" style="border: 1px solid black;" class="btnn btn-secondaryy btn-block center w-100 btn-outline h3" id="submit_form" value="التسجيل في الدورة">

                <span   class="color3" style="font-size: 16px; alignment: left">
                صنع بإخلاص <span class="text-danger"> ❤ </span>  </span>
              </div>


            </div>
          </div>

        </form>



      </div>

    </div>

  </div>
</div>


</body>
</html>