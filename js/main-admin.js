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

}

function superv(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="block";
  document.getElementById("Setting").style.display="none";
  document.getElementById("mrqz").style.display="none";
  document.getElementById("passwords").style.display="none";

}
function Statistic(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="none";
  document.getElementById("Setting").style.display="none";
  document.getElementById("passwords").style.display="none";
  document.getElementById("mrqz").style.display="none";

}

function Settings(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="none";
  document.getElementById("passwords").style.display="none";
  document.getElementById("Setting").style.display="block";
  document.getElementById("mrqz").style.display="none";
}

function Change_pass(){

  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="none";
  document.getElementById("Setting").style.display="none";
  document.getElementById("passwords").style.display="block";
  document.getElementById("mrqz").style.display="none";

}
function mrqzz(){
  document.getElementById("details_student").style.display="none";
  document.getElementById("details_Superv").style.display="none";
  document.getElementById("Setting").style.display="none";
  document.getElementById("passwords").style.display="none";
  document.getElementById("mrqz").style.display="block";


}


//back

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  var actions = $("table td:last-child").html();
// Append table with add row form on add new button click
  $(".add-new").click(function(){
    $(this).attr("disabled", "disabled");
    var index = $("table tbody tr:last-child").index();
    var row = '<tr>' +
        '<td><input type="text" class="form-control" name="name" id="name"></td>' +
        '<td><input type="text" class="form-control" name="department" id="department"></td>' +
        '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
        '<td>' + actions + '</td>' +
        '</tr>';
    $("table").append(row);
    $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
    $('[data-toggle="tooltip"]').tooltip();
  });
// Add row on add button click
  $(document).on("click", ".add", function(){
    var empty = false;
    var input = $(this).parents("tr").find('input[type="text"]');
    input.each(function(){
      if(!$(this).val()){
        $(this).addClass("error");
        empty = true;
      } else{
        $(this).removeClass("error");
      }
    });
    $(this).parents("tr").find(".error").first().focus();
    if(!empty){
      input.each(function(){
        $(this).parent("td").html($(this).val());
      });
      $(this).parents("tr").find(".add, .edit").toggle();
      $(".add-new").removeAttr("disabled");
    }
  });
// Edit row on edit button click
  $(document).on("click", ".edit", function(){
    $(this).parents("tr").find("td:not(:last-child)").each(function(){
      $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
    });
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
  });
// Delete row on delete button click
  $(document).on("click", ".delete", function(){
    $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
  });
});


















