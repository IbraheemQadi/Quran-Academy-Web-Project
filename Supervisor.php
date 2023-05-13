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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"  href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script
            type="text/javascript"
            charset="utf8"
            src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"
    ></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" media="all"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

</head>



<body>
<!-- =============== Delete student Modal ================ -->
<div
      data-te-modal-init
      class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
      id="DeleteStudentModal"
      tabindex="-1"
      aria-labelledby="DeleteStudentModalLabel"
      aria-hidden="true"
    >
      <div
        data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]"
      >
        <div
          class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600"
        >
          <div 
            dir="rtl"
            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50"
          >
            <!--Modal title-->
            <h5
              class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
              id="DeleteStudentModalLabel"
            >
              أدخل بياناتك لو سمحت
            </h5>
            <!--Close button-->
            <button
              type="button"
              id="deleteCloseBtn"
              class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
              data-te-modal-dismiss
              aria-label="Close"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>

          <!--Modal body-->
          <div
            class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700"
          >
            <form onsubmit="handleDelete(this)">
              <!--E-mail input-->
              <div class="relative mb-12" data-te-input-wrapper-init>
                <input
                  type="text"
                  name="id"
                  class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="ID"
                  autocomplete="off"
                  required
                />
                <label
                  for="exampleInputEmail1"
                  class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                  >رقم التسجيل</label
                >
              </div>

              <!--Password input-->
              <div class="relative mb-6" data-te-input-wrapper-init>
                <input
                  type="password"
                  name="password"
                  class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                  id="exampleInputPassword1"
                  placeholder="Password"
                  required
                />
                <label
                  for="exampleInputPassword1"
                  class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                  >كلمة السر</label
                >
              </div>
              <!--Submit button-->
              <button
                type
                class="block w-full rounded bg-primary px-6 pb-2 pt-2.5 font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-ripple-init
                data-te-ripple-color="light"
              >
                متابعة
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- =============== update student modal ================ -->
<div
      data-te-modal-init
      class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
      id="updateStudentModal"
      tabindex="-1"
      aria-labelledby="updateStudentModalLabel"
      aria-hidden="true"
    >
      <div
        data-te-modal-dialog-ref
        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]"
      >
        <div
          class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600"
        >
          <div
            dir="rtl"
            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50"
          >
            <!--Modal title-->
            <h5
              class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
              id="exampleModalLabel"
            >
              أدخل التعديلات لو سمحت
            </h5>
            <!--Close button-->
            <button
              type="button"
              id="updateCloseBtn"
              class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
              data-te-modal-dismiss
              aria-label="Close"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>

          <!--Modal body-->
          <div
            class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700"
          >
            <form id="updateStudentForm" onsubmit="handleUpdate(this);">
              <!--Name input-->
              <div class="relative mb-12" data-te-input-wrapper-init>
                <input
                  type="text"
                  name="name"
                  class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  autocomplete="off"
                />
                <label
                  for="exampleInputEmail1"
                  class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                  >الاسم</label
                >
              </div>
              <!--BD input-->
              <div
              class="relative mb-12"
              data-te-datepicker-init
              data-te-format="yyyy-mm-dd"
              data-te-input-wrapper-init
            >
              <input
                type="text"
                name="BD"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
              />
              <label
                for="floatingInput"
                class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                >تاريخ الميلاد</label
              >
            </div>
              <!--Address input-->
              <div class="relative mb-12" data-te-input-wrapper-init>
                <input
                  type="text"
                  name="address"
                  class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  autocomplete="off"
                />
                <label
                  for="exampleInputEmail1"
                  class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                  >العنوان</label
                >
              </div>
              <!--Phone number input-->
              <div class="relative mb-12" data-te-input-wrapper-init>
                <input
                  type="text"
                  name="phoneNumber"
                  class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  autocomplete="off"
                />
                <label
                  for="exampleInputEmail1"
                  class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                  >الجوال</label
                >
              </div>
              <!--E-mail input-->
              <div class="relative mb-12" data-te-input-wrapper-init>
                <input
                  type="text"
                  name="email"
                  onshow="getStudentData()"
                  class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  autocomplete="off"
                />
                <label
                  for="exampleInputEmail1"
                  class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                  >البريد الالكتروني</label
                >
              </div>

              <!--Submit button-->
              <button
                type="submit"
                class="block w-full rounded bg-primary px-6 pb-2 pt-2.5 font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                data-te-ripple-init
                data-te-ripple-color="light"
              >
                متابعة
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- =============== Delete report modal ================ -->
<div
      data-te-modal-init
      class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
      id="deleteReportModal"
      tabindex="-1"
      aria-labelledby="deleteReportModalTitle"
      aria-modal="true"
      role="dialog"
    >
      <div
        data-te-modal-dialog-ref
        class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]"
      >
        <div
          class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600"
        >
          <div
            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50"
          >
            <!--Close button-->
            <button
              type="button"
              id="deleteReportClosebtn"
              class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
              data-te-modal-dismiss
              aria-label="Close"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="h-6 w-6"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>

          <!--Modal body-->
          <div class="relative p-4 flex justify-center text-lg font-extrabold">
            <p>هل انت متاكد من حذف التقرير ؟</p>
          </div>

          <!--Modal footer-->
          <div
            class="flex flex-shrink-0 flex-wrap items-center justify-center rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50"
          >
            <button
              type="button"
              class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5  font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
              data-te-modal-dismiss
              data-te-ripple-init
              data-te-ripple-color="light"
            >
              اخرج
            </button>
            <button
              type="button"
              onclick="handleReportDelete()"
              class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5  font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
              data-te-ripple-init
              data-te-ripple-color="light"
            >
              نعم ، احذف
            </button>
          </div>
        </div>
      </div>
    </div>
<!-- =============== navigation ================ -->
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
                    <input type="text" style="color: black" placeholder="Search here" id="Search_Filter" >
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
                <div class="card__data">
                    <div class="numbers" id="GroupStudent"> <?php  echo$NumberOfStudents ; ?></div>
                    <div class="cardName">عدد الطلاب المجموعة</div>
                </div>
            </div>
            <div class="card">
                <div class="iconBx">
                    <img style="width: 60px ;height: 60px" src="img/education.png">
                </div>
                <div class="card__data">
                    <div class="numbers" id="NameSuper"> <?php  echo$CN_NUM ; ?></div>
                    <div class="cardName">رقم الفوج</div>
                </div>
            </div>

            <div class="card">
                <div class="iconBx">
                    <img style="width: 60px ;height: 60px" src="img/mosque.png">
                </div>
                <div class="card__data">
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
                <table dir="rtl" id="Sutednt_info">
                    <thead>
                    <tr>
                        <td>رقم الطالب</td>
                        <td>الإسم </td>
                        <td>تاريخ الميلاد</td>
                        <td>العنوان</td>
                        <td>رقم الهاتف</td>
                        <td>البريد الالكتروني</td>
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
                    <td ><a onclick='addToStorage($row[ST_ID])' type='button' data-te-toggle='modal' data-te-target='#DeleteStudentModal' data-te-ripple-init ><ion-icon name='trash' size='large' ></ion-icon></a>
                    <a onclick='addToStorage($row[ST_ID]); setModalData($row[ST_ID]);' type='button' data-te-toggle='modal' data-te-target='#updateStudentModal' data-te-ripple-init ><ion-icon name='create' size='large' ></ion-icon></a></td>
                </tr>";

                }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ================ Reports ================= -->
        <div class="details" id="ReportAllStudent" style="display: none">
            <div class="recentOrders">
                <div class="cardHeader" dir="rtl">
                    <h2  style="font-size: xxx-large">سجل العلامات </h2>
                </div>
                <table dir="rtl" id="TableReport">
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
                    <?php

$db = new mysqli( 'localhost', 'root', '', 'academy' );

$sql = "SELECT s.ST_ID ,s.NAME_STUDENT, r.DateFor, r.INDIX, r.MOMRIZE_Gread, r.Rev_grad, r.Rev_for, r.MOM_for, r.NameSoraMEMO, r.NameSoraREV
                    FROM students s JOIN report r ON s.ST_ID = r.ST_ID WHERE s.ST_SUP = {$_SESSION['ID']}  AND r.ST_ID IS NOT NULL;";

$es = $db->query( $sql );

for ( $i = 0 ; $i < $es->num_rows; $i++ ) {
    $rw = $es->fetch_assoc();

    echo "
    <tr id=$rw[INDIX] >
         <td>$rw[NAME_STUDENT]</td>
         <td><span class='status delivered'>$rw[DateFor]</span></td>
         <td>$rw[NameSoraMEMO]</td>
         <td>$rw[MOM_for]</td>
         <td>$rw[MOMRIZE_Gread]</td>
         <td>$rw[NameSoraREV]</td>
         <td>$rw[Rev_for]</td>
         <td>$rw[Rev_grad]</td>
         <td ><a onclick='addToStorage($rw[ST_ID]);addIndixToStorage($rw[INDIX]);' type='button' data-te-toggle='modal' data-te-target='#deleteReportModal' data-te-ripple-init ><ion-icon name='trash' size='large' ></ion-icon></a>
         <a onclick='addToStorage($rw[ST_ID]); addIndixToStorage($rw[INDIX]); setModalData($rw[ST_ID]);' type='button' data-te-toggle='modal' data-te-target='#updateStudentModal' data-te-ripple-init ><ion-icon name='create' size='large' ></ion-icon></a></td>
     </tr>";

}

$db->close();

?>
                    </tbody>
                </table>
            </div>
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
<script type="text/javascript">
                    $(document).ready(function() {
                        $("#Search_Filter").on('keyup', function() {
                            let input = $(this).val();
                            if (testFlag == 1) {
                                $.ajax({
                                    url: "utils/SupervisPhp/ReportSuper_ForAllStudent.php",
                                    method: "POST",
                                    data: {
                                        input: input
                                    },
                                    success: function(data) {
                                        $("#TableReport tbody").html( '<tr><td>' + data +    '</td></tr>' )
                                    }
                                });
                            } else if ( testFlag == 2){
                                $.ajax({
                                    url: "utils/SupervisPhp/StudetFromSupervisFilter.php",
                                    method: "POST",
                                    data: {
                                        input: input
                                    },
                                    success: function(data) {
                                        $("#Sutednt_info tbody").html( '<tr><td>' + data +    '</td></tr>' )
                                    }
                                });
                            }
                        });
                    });
                </script>
<script src="js/SupervisorJs.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

<!-- ====== ionicons ======= -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
