let countries = [
  "البقرة",
  "آلعمران",
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
var testFlag= 2 ;
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
   testFlag= 2 ;
}


function StudentReport() {
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "none";
  document.getElementById("StudnetForsuper").style.display = "none";
  document.getElementById("ReportAllStudent").style.display = "block";

  document.getElementById("Record").style.display = "none";
  testFlag =1;

}

function RecordGruade() {
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "none";
  document.getElementById("StudnetForsuper").style.display = "none";
  document.getElementById("ReportAllStudent").style.display = "none";
  document.getElementById("Record").style.display = "block";
}

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

function addToStorage(id) {
  window.localStorage.setItem("stid", id);
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
