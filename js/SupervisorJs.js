let countries = [
  "البقرة",
  "آل عمران",
  "النساء",
  "المائدة",
  "الأنعام",
  "الأعراف",
  "الأنفال",
  "التوبة",
  "يونس",
  "هود",
  "يوسف",
  "الرعد",
  "إبراهيم",
  "الحجر",
  "النحل",
  "الإسراء",
  "الكهف",
  "مريم",
  "طه",
  "الأنبياء",
  "الحج",
  "المؤمنون",
  "النور",
  "الفرقان",
  "الشعراء",
  "النمل",
  "القصص",
  "العنكبوت",
  "الروم",
  "لقمان",
  "السجدة",
  "الأحزاب",
  "سبأ",
  "فاطر",
  "يس",
  "الصافات",
  "ص",
  "الزمر",
  "غافر",
  "فصلت",
  "الشورى",
  "الزخرف",
  "الدخان",
  "الجاثية",
  "الأحقاف",
  "محمد",
  "الفتح",
  "الحجرات",
  "ق",
  "الذاريات",
  "الطور",
  "النجم",
  "القمر",
  "الرحمن",
  "الواقعة",
  "الحديد",
  "المجادلة",
  "الحشر",
  "الممتحنة",
  "الصف",
  "الجمعة",
  "المنافقون",
  "التغابن",
  "الطلاق",
  "التحريم",
  "الملك",
  "القلم",
  "الحاقة",
  "المعارج",
  "نوح",
  "الجن",
  "المزمل",
  "المدثر",
  "القيامة",
  "الإنسان",
  "المرسلات",
  "النبأ",
  "النازعات",
  "عبس",
  "التكوير",
  "الانفطار",
  "المطففين",
  "الانشقاق",
  "البروج",
  "الطارق",
  "الأعلى",
  "الغاشية",
  "الفجر",
  "البلد",
  "الشمس",
  "الليل",
  "الضحى",
  "الشرح",
  "التين",
  "العلق",
  "القدر",
  "البينة",
  "الزلزلة",
  "العاديات",
  "القارعة",
  "التكاثر",
  "العصر",
  "الهمزة",
  "الفيل",
  "قريش",
  "الماعون",
  "الكوثر",
  "الكافرون",
  "النصر",
  "المسد",
  "الإخلاص",
  "الفلق",
  "الناس",
];

// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("click", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

const wrapperr = document.querySelector(".wrapperr"),
  selectBtn = wrapperr.querySelector(".select-btn"),
  searchInp = wrapperr.querySelector("input"),
  options = wrapperr.querySelector(".options");

function addCountry(selectedCountry) {
  options.innerHTML = "";
  countries.forEach((country) => {
    let isSelected = country == selectedCountry ? "selected" : "";
    let li = `<li onclick="updateName(this)" class="${isSelected}">${country}</li>`;
    options.insertAdjacentHTML("beforeend", li);
  });
}
addCountry();

function updateName(selectedLi) {
  searchInp.value = "";
  addCountry(selectedLi.innerText);
  wrapperr.classList.remove("active");
  selectBtn.firstElementChild.innerText = selectedLi.innerText;
}

searchInp.addEventListener("keyup", () => {
  let arr = [];
  let searchWord = searchInp.value.toLowerCase();
  arr = countries
    .filter((data) => {
      return data.toLowerCase().startsWith(searchWord);
    })
    .map((data) => {
      let isSelected =
        data == selectBtn.firstElementChild.innerText ? "selected" : "";
      return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
    })
    .join("");
  options.innerHTML = arr
    ? arr
    : `<p style="margin-top: 10px;">تأكد من كتابة الاسم بشكل صحيح</p>`;
});

selectBtn.addEventListener("click", () => wrapperr.classList.toggle("active"));

function Settings() {
  document.getElementById("passwords").style.display = "none";
  document.getElementById("Setting").style.display = "block";
  document.getElementById("StudnetForsuper").style.display = "none";
  document.getElementById("ReportAllStudent").style.display = "none";
  document.getElementById("Record").style.display = "none";
}
var testFlag = 2;
function Change_pass() {
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "block";
  document.getElementById("StudnetForsuper").style.display = "none";
  document.getElementById("ReportAllStudent").style.display = "none";
  document.getElementById("Record").style.display = "none";
}

function Studnetforvis() {
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "none";
  document.getElementById("StudnetForsuper").style.display = "block";
  document.getElementById("ReportAllStudent").style.display = "none";
  document.getElementById("Record").style.display = "none";
  testFlag = 2;
}

function StudentReport() {
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "none";
  document.getElementById("StudnetForsuper").style.display = "none";
  document.getElementById("ReportAllStudent").style.display = "block";

  document.getElementById("Record").style.display = "none";
  testFlag = 1;
}

function RecordGruade() {
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "none";
  document.getElementById("StudnetForsuper").style.display = "none";
  document.getElementById("ReportAllStudent").style.display = "none";
  document.getElementById("Record").style.display = "block";
}

function addToStorage(id) {
  window.localStorage.setItem("stid", id);
}

// ------ Start working on Students Modals ------

function handleDelete(form) {
  event.preventDefault();

  let id = form.elements.id.value;
  let password = form.elements.password.value;
  let stid = window.localStorage.getItem("stid");

  let url = `utils/validateSupervisor.php?id=${id}&password=${password}`;

  // send requset to validate supervior data
  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (
      this.readyState === 4 &&
      this.status === 200 &&
      this.responseText == "true"
    ) {
      // alert(this.responseText);
      // 1- Delete the student form the page
      let tableRow = document.getElementById(stid);
      tableRow.remove();

      let studentCount = document.getElementById("GroupStudent");
      let stc = parseInt(studentCount.innerText);
      studentCount.innerText = stc - 1;

      // 2- send the requset to delete the student in the database
      url = `utils/delelteStudent.php?stid=${stid}`;
      let request2 = new XMLHttpRequest();
      request2.open("post", url);
      request2.send();

      Toastify({
        text: "✅ تم حذف الطالب بنجاح",
        duration: 3000,
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
          padding: "20px 50px",
        },
      }).showToast();
      // reset the form
      form.elements.id.value = "";
      form.elements.password.value = "";
      window.localStorage.removeItem("stid");
      document.getElementById("deleteCloseBtn").click();
    } else {
      Toastify({
        text: "❌ اعد ادخال بياناتك",
        duration: 3000,
        style: {
          background: "linear-gradient(to bottom, #e60000, #ff3300)",
          padding: "20px 50px",
        },
      }).showToast();
    }
  };
  request.send();
}

function getStudent(id, callback) {
  let url = `utils/getStudent.php?stid=${id}`;

  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (this.readyState === 4 && this.status === 200) {
      callback(JSON.parse(this.responseText));
    }
  };
  request.send();
}

function setModalData(id) {
  getStudent(id, (student) => {
    let form = document.getElementById("updateStudentForm");

    form.elements.name.value = student.NAME_STUDENT;
    form.elements.BD.value = student.BIRTHDATE;
    form.elements.address.value = student.ADDRESS;
    form.elements.phoneNumber.value = student.PHONE_NUMBER;
    form.elements.email.value = student.Email;
  });
}

function handleUpdate(form) {
  event.preventDefault();

  let id = localStorage.getItem("stid");
  let name = form.elements.name.value;
  let BD = form.elements.BD.value;
  let address = form.elements.address.value;
  let phoneNumber = form.elements.phoneNumber.value;
  let email = form.elements.email.value;

  let url = `utils/updateStudent.php?stid=${id}&name=${name}&BD=${BD}&address=${address}&phoneNumber=${phoneNumber}&email=${email}`;

  // 1- update the student in the database
  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (
      this.readyState === 4 &&
      this.status === 200 &&
      this.responseText === "true"
    ) {
      // 2- update the student in the DOM
      let tableRow = document.getElementById(id);
      tableRow.children[1].innerText = name;
      tableRow.children[2].innerHTML = `<span class="status delivered">${BD}</span>`;
      tableRow.children[3].innerText = address;
      tableRow.children[4].innerText = phoneNumber;
      tableRow.children[5].innerText = email;

      Toastify({
        text: "✅ تم تعديل الطالب بنجاح",
        duration: 3000,
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
          padding: "20px 50px",
        },
      }).showToast();

      window.localStorage.removeItem("stid");
      document.getElementById("updateCloseBtn").click();
    } else {
      Toastify({
        text: "❌ حدث خطأ",
        duration: 3000,
        style: {
          background: "linear-gradient(to bottom, #e60000, #ff3300)",
          padding: "20px 50px",
        },
      }).showToast();
    }
  };

  request.send();
}

// ------ Start working on Report Modals ------

function addIndixToStorage(indix) {
  window.localStorage.setItem("indix", indix);
}

function handleReportDelete() {
  let indix = window.localStorage.getItem("indix");
  let stid = window.localStorage.getItem("stid");

  let url = `utils/deleteReport.php?INDIX=${indix}&stid=${stid}`;

  // send requset
  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (
      this.readyState === 4 &&
      this.status === 200 &&
      this.responseText == "true"
    ) {
      // Delete the student form the page
      let tableRow = document.getElementById(indix);
      tableRow.remove();

      Toastify({
        text: "✅ تم حذف التقرير بنجاح",
        duration: 3000,
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
          padding: "20px 50px",
        },
      }).showToast();

      window.localStorage.removeItem("stid");
      window.localStorage.removeItem("indix");
      document.getElementById("deleteReportClosebtn").click();
    } else {
      Toastify({
        text: "❌ اعد المحاولة",
        duration: 3000,
        style: {
          background: "linear-gradient(to bottom, #e60000, #ff3300)",
          padding: "20px 50px",
        },
      }).showToast();
    }
  };
  request.send();
}

function setSelectSoras() {
  let selectElements = document.querySelectorAll(".sora");

  // clear the select element
  selectElements.forEach((selectElement) => {
    selectElement.innerHTML = " ";
  });

  // now add all soras to the select element
  selectElements.forEach((selectElement) => {
    countries.forEach((sora, index) => {
      const optionElement = document.createElement("option");
      const optionText = document.createTextNode(sora);
      optionElement.appendChild(optionText);
      optionElement.value = index;
      selectElement.appendChild(optionElement);
    });
  });
}

function getReport(stid, indix, callback) {
  let url = `utils/getReport.php?stid=${stid}&INDIX=${indix}`;

  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (this.readyState === 4 && this.status === 200) {
      callback(JSON.parse(this.responseText));
    }
  };
  request.send();
}

function setReportModalData(id, indix) {
  getReport(id, indix, (report) => {
    setSelectSoras();
    let form = document.getElementById("updateReportForm");

    let selectIndex1 = countries.findIndex((sora, index) => {
      if (sora == report.NameSoraMEMO) return index;
    });

    form.elements.memSora.value = selectIndex1;
    form.elements.memRange.value = report.MOM_for;
    form.elements.memGrade.value = report.MOMRIZE_Gread;

    let selectIndex2 = countries.findIndex((sora, index) => {
      if (sora == report.NameSoraREV) return index;
    });
    form.elements.revSora.value = selectIndex2;
    form.elements.revRange.value = report.Rev_for;
    form.elements.revGrade.value = report.Rev_grad;

    form.elements.date.value = report.DateFor;
  });
}

function handleUpdateReport(form) {
  event.preventDefault();

  let stid = localStorage.getItem("stid");
  let indix = localStorage.getItem("indix");
  let memSoraElement = form.elements.memSora;
  let revSoraElement = form.elements.revSora;

  let memSora = memSoraElement.options[memSoraElement.value].innerText;

  let memRange = form.elements.memRange.value;
  let memGrade = form.elements.memGrade.value;

  let revSora = revSoraElement.options[revSoraElement.value].innerText;
  let revRange = form.elements.revRange.value;
  let revGrade = form.elements.revGrade.value;

  let date = form.elements.date.value;

  let url = `utils/updateReport.php?stid=${stid}&INDIX=${indix}
  &memSora=${memSora}&memRange=${memRange}&memGrade=${memGrade}
  &revSora=${revSora}&revRange=${revRange}&revGrade=${revGrade}&date=${date}`;

  // update the student in the database
  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (
      this.readyState === 4 &&
      this.status === 200 &&
      this.responseText === "true"
    ) {
      // update the report in the DOM
      let tableRow = document.getElementById(indix);
      tableRow.children[1].innerHTML = `<span class="status delivered">${date}</span>`;

      tableRow.children[2].innerText = memSora;
      tableRow.children[3].innerText = memRange;
      tableRow.children[4].innerText = memGrade;

      tableRow.children[5].innerText = revSora;
      tableRow.children[6].innerText = revRange;
      tableRow.children[7].innerText = revGrade;

      Toastify({
        text: "✅ تم تعديل التقرير بنجاح",
        duration: 3000,
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
          padding: "20px 50px",
        },
      }).showToast();

      window.localStorage.removeItem("stid");
      window.localStorage.removeItem("indix");
      document.getElementById("updateReportCloseBtn").click();
    } else {
      Toastify({
        text: "❌ حدث خطأ",
        duration: 3000,
        style: {
          background: "linear-gradient(to bottom, #e60000, #ff3300)",
          padding: "20px 50px",
        },
      }).showToast();
    }
  };

  request.send();
}

function getSupervisorStudents(spid, callback) {
  let url = `utils/getSupervisorStudents.php?spid=${spid}`;

  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (this.readyState === 4 && this.status === 200) {
      callback(JSON.parse(this.responseText));
    }
  };
  request.send();
}

function initAddReportModal(spid) {
  getSupervisorStudents(spid, (students) => {
    setSelectSoras();

    let selectElement = document.querySelector(".studentname");
    selectElement.innerHTML = " ";

    students.forEach((student) => {
      const optionElement = document.createElement("option");
      const optionText = document.createTextNode(student.NAME_STUDENT);
      optionElement.appendChild(optionText);
      optionElement.value = student.ST_ID;
      selectElement.appendChild(optionElement);
    });
  });
}

function handleAddReport(form) {
  event.preventDefault();

  let studentnameElement = form.elements.studentname;
  let memSoraElement = form.elements.memSora;
  let revSoraElement = form.elements.revSora;

  let studentname =
    studentnameElement.options[studentnameElement.options.selectedIndex]
      .innerText;

  let stid = studentnameElement.value;
  let memSora = memSoraElement.options[memSoraElement.value].innerText;
  let memRange = form.elements.memRange.value;
  let memGrade = form.elements.memGrade.value;

  let revSora = revSoraElement.options[revSoraElement.value].innerText;
  let revRange = form.elements.revRange.value;
  let revGrade = form.elements.revGrade.value;

  let date = form.elements.date.value;

  let url = `utils/addReport.php?stid=${stid}
  &memSora=${memSora}&memRange=${memRange}&memGrade=${memGrade}
  &revSora=${revSora}&revRange=${revRange}&revGrade=${revGrade}&date=${date}`;

  // update the student in the database
  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (
      this.readyState === 4 &&
      this.status === 200 &&
      this.responseText !== "true"
    ) {
      // add the report in the DOM
      let reportIndex = this.responseText;
      let tableBody = document.getElementById("reportsTableBody");
      let row = document.createElement("tr");
      let rowText = `
           <td>${studentname}</td>
           <td><span class='status delivered'>${date}</span></td>
           <td>${memSora}</td>
           <td>${memRange}</td>
           <td>${memGrade}</td>
           <td>${revSora}</td>
           <td>${revRange}</td>
           <td>${revGrade}</td>
           <td><a onclick='addToStorage(${stid}); addIndixToStorage(${reportIndex});' type='button' data-te-toggle='modal' data-te-target='#deleteReportModal' data-te-ripple-init ><ion-icon name='trash' size='large' ></ion-icon></a>
           <a onclick='addToStorage(${stid}); addIndixToStorage(${reportIndex}); setReportModalData(${stid},${reportIndex});' type='button' data-te-toggle='modal' data-te-target='#updateReportModal' data-te-ripple-init ><ion-icon name='create' size='large' ></ion-icon></a></td>`;
      row.setAttribute("id", reportIndex);
      row.innerHTML = rowText;
      tableBody.appendChild(row);

      Toastify({
        text: "✅ تم اضافة التقرير بنجاح",
        duration: 3000,
        style: {
          background: "linear-gradient(to right, #00b09b, #96c93d)",
          padding: "20px 50px",
        },
      }).showToast();

      // reset the modal form
      form.elements.memRange.value = " ";
      form.elements.memGrade.value = " ";
      form.elements.revRange.value = " ";
      form.elements.revGrade.value = " ";
      form.elements.date.value = " ";
      document.getElementById("addReportCloseBtn").click();
    } else {
      Toastify({
        text: "❌ حدث خطأ",
        duration: 3000,
        style: {
          background: "linear-gradient(to bottom, #e60000, #ff3300)",
          padding: "20px 50px",
        },
      }).showToast();
    }
  };

  request.send();
}

// start work on superviosr profile modal

function getSupervisor(id, callback) {
  let url = `utils/getSupervisor.php?spid=${id}`;

  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (this.readyState === 4 && this.status === 200) {
      callback(JSON.parse(this.responseText));
    }
  };
  request.send();
}

function initProfile(id) {
  getSupervisor(id, (supervior) => {
    document.getElementById("supervisorName").innerText = supervior.NAME_SUP;
    document.getElementById("supervisorID").innerText = supervior.ID;
    document.getElementById("supervisorAddress").innerText = supervior.ADDRESS;
    document.getElementById("supervisorNumber").innerText =
      supervior.PHONE_NUMBER;
    document.getElementById("supervisorDate").innerText = supervior.BIRTHDATE;
    document.getElementById("supervisorEmail").innerText = supervior.Email;
  });
}
