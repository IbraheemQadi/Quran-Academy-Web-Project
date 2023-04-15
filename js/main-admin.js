// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

function Sudent(){
document.getElementById("details_student").style.display="block";
document.getElementById("details_Superv").style.display="none";

}

function superv(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="block";
}
function Statistic(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="none";

}