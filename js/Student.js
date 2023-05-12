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

function Settings() {
  document.getElementById("passwords").style.display = "none";
  document.getElementById("Setting").style.display = "block";
  document.getElementById("Studnet_grads").style.display = "none";
}

function Change_pass() {
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "block";
  document.getElementById("Studnet_grads").style.display = "none";
}
function RportGradsSudent() {
  document.getElementById("Setting").style.display = "none";
  document.getElementById("passwords").style.display = "none";
  document.getElementById("Studnet_grads").style.display = "block";
}
RportGradsSudent();
