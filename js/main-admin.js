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
var flagClick = 1;

function Sudent() {
  document.getElementById("details_student").style.display = "block";
  document.getElementById("details_Superv").style.display = "none";
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "none";
  document.getElementById("mrqz").style.display = "none";

  flagClick = 1;
}

Sudent();

function superv() {
  document.getElementById("details_student").style.display = "none";
  document.getElementById("details_Superv").style.display = "block";
  document.getElementById("Setting").style.display = "none";
  document.getElementById("mrqz").style.display = "none";
  document.getElementById("passwords").style.display = "none";

  flagClick = 2;
}

function Settings() {
  document.getElementById("details_student").style.display = "none";
  document.getElementById("details_Superv").style.display = "none";
  document.getElementById("passwords").style.display = "none";
  document.getElementById("Setting").style.display = "block";
  document.getElementById("mrqz").style.display = "none";
}

function Change_pass() {
  document.getElementById("details_student").style.display = "none";
  document.getElementById("details_Superv").style.display = "none";
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "block";

  document.getElementById("mrqz").style.display = "none";
}
function mrqzz() {
  document.getElementById("details_student").style.display = "none";
  document.getElementById("details_Superv").style.display = "none";
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "none";
  document.getElementById("mrqz").style.display = "block";

  flagClick = 3;
}

function closeClick() {
  let closeButtons = document.querySelectorAll(".close");
  closeButtons.forEach((btn) => btn.click());
}

function showToastFunction(msg, state) {
  if (state) {
    // succsess toast
    Toastify({
      text: msg,
      duration: 3000,
      style: {
        background: "linear-gradient(to right, #00b09b, #96c93d)",
        padding: "20px 50px",
      },
    }).showToast();
  } else {
    // failed toast
    Toastify({
      text: msg,
      duration: 3000,
      style: {
        background: "linear-gradient(to bottom, #e60000, #ff3300)",
        padding: "20px 50px",
      },
    }).showToast();
  }
}

function addToStorage(id) {
  window.localStorage.setItem("centerIndex", id);
}

// --------------------- new center modal -------
function handleNewCenter(form) {
  event.preventDefault();

  let workingDaysElement = form.elements.workingDays;

  let address = form.elements.address.value;
  let workingDays =
    workingDaysElement.options[workingDaysElement.value].innerText;

  let url = `utils/addCenter.php?address=${address}&workingDays=${workingDays}`;

  // update the student in the database
  let request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (
      this.readyState === 4 &&
      this.status === 200 &&
      this.responseText !== "false"
    ) {
      // add the report in the DOM
      let centerIndex = this.responseText;
      let tableBody = document.getElementById("centersTableBody");
      let row = document.createElement("tr");
      let rowText = `
            <td><span class='status delivered'>${centerIndex}</span></td>
           <td>${workingDays}</td>
           <td>${address}</td>
           <td ><a onclick='addToStorage(${centerIndex})' type='button' data-te-toggle='modal' data-te-target='#deleteCenterModal' data-te-ripple-init ><ion-icon name='trash' size='large' ></ion-icon></a>
           <a onclick='addToStorage(${centerIndex}); setCenterModalData(${centerIndex});' type='button' data-te-toggle='modal' data-te-target='#updateCenterModal' data-te-ripple-init ><ion-icon name='create' size='large' ></ion-icon></a></td>`;
      row.setAttribute("id", centerIndex);
      row.innerHTML = rowText;
      tableBody.appendChild(row);

      showToastFunction("✅ تم اضافة المركز بنجاح", 1);
      // reset the modal form
      form.elements.address.value = "";
      closeClick();
    } else {
      showToastFunction("❌ حدث خطأ", 0);
    }
  };

  request.send();
}
