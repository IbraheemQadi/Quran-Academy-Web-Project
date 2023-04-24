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
  document.getElementById("Setting").style.display="none";
  document.getElementById("passwords").style.display="none";
  document.getElementById("mrqz").style.display="none";
  document.getElementById("st").style.display="none";


}

function superv(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="block";
  document.getElementById("Setting").style.display="none";
  document.getElementById("mrqz").style.display="none";
  document.getElementById("passwords").style.display="none";
  document.getElementById("st").style.display="none";


}
function Statistic(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="none";
  document.getElementById("Setting").style.display="none";
  document.getElementById("passwords").style.display="none";
  document.getElementById("mrqz").style.display="none";
  document.getElementById("st").style.display="block";



}

function Settings(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="none";
  document.getElementById("passwords").style.display="none";
  document.getElementById("Setting").style.display="block";
  document.getElementById("mrqz").style.display="none";
  document.getElementById("st").style.display="none";

}

function Change_pass(){

  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="none";
  document.getElementById("Setting").style.display="none";
  document.getElementById("passwords").style.display="block";
  document.getElementById("st").style.display="none";

  document.getElementById("mrqz").style.display="none";

}
function mrqzz(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="none";
  document.getElementById("Setting").style.display="none";
  document.getElementById("passwords").style.display="none";
  document.getElementById("mrqz").style.display="block";
  document.getElementById("st").style.display="none";


}







//back


















