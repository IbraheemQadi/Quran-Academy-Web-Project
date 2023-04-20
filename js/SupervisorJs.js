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

const wrapperr = document.querySelector(".wrapperr"),
    selectBtn = wrapperr.querySelector(".select-btn"),
    searchInp = wrapperr.querySelector("input"),
    options = wrapperr.querySelector(".options");

let countries = ["البقرة","آلعمران","النساء","المائدة","الأنعام","الأعراف","الأنفال","التوبة",

"يونس","هود","يوسف","الرعد","إبراهيم","الحجر","النحل","الإسراء",
"الكهف","مريم","طه","الأنبياء","الحج","المؤمنون","النور","الفرقان","الشعراء",
"النمل","القصص","العنكبوت","الروم","لقمان","السجدة","الأحزاب","سبأ",
"فاطر","يس","الصافات","ص","الزمر","غافر","فصلت","الشورى","الزخرف",
"الدخان","الجاثية","الأحقاف","محمد","الفتح","الحجرات","ق","الذاريات","الطور","النجم",
"القمر","الرحمن","الواقعة","الحديد","المجادلة","الحشر","الممتحنة","الصف","الجمعة","المنافقون",
"التغابن","الطلاق","التحريم","الملك","القلم","الحاقة","المعارج","نوح","الجن","المزمل","المدثر",
"القيامة","الإنسان","المرسلات","النبأ","النازعات","عبس","التكوير","الانفطار","المطففين","الانشقاق","البروج",
"الطارق","الأعلى","الغاشية","الفجر","البلد","الشمس","الليل","الضحى","الشرح","التين","العلق","القدر","البينة",
"الزلزلة","العاديات","القارعة","التكاثر","العصر","الهمزة","الفيل","قريش","الماعون","الكوثر","الكافرون","النصر","المسد","الإخلاص","الفلق","الناس"];

function addCountry(selectedCountry) {
    options.innerHTML = "";
    countries.forEach(country => {
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
    arr = countries.filter(data => {
        return data.toLowerCase().startsWith(searchWord);
    }).map(data => {
        let isSelected = data == selectBtn.firstElementChild.innerText ? "selected" : "";
        return `<li onclick="updateName(this)" class="${isSelected}">${data}</li>`;
    }).join("");
    options.innerHTML = arr ? arr : `<p style="margin-top: 10px;">تأكد من كتابة الاسم بشكل صحيح</p>`;
});

selectBtn.addEventListener("click", () => wrapperr.classList.toggle("active"));



function Settings(){
    document.getElementById("passwords").style.display="none";
    document.getElementById("Setting").style.display="block";
    document.getElementById("StudnetForsuper").style.display = "none";
    document.getElementById("ReportAllStudent").style.display = "none";
    document.getElementById("Record").style.display = "none";



}


function Change_pass() {

    document.getElementById("Setting").style.display = "none";
    document.getElementById("passwords").style.display = "block";
    document.getElementById("StudnetForsuper").style.display = "none";
    document.getElementById("ReportAllStudent").style.display = "none";
    document.getElementById("Record").style.display = "none";

}

function Studnetforvis(){

    document.getElementById("Setting").style.display = "none";
    document.getElementById("passwords").style.display = "none";
    document.getElementById("StudnetForsuper").style.display = "block";
    document.getElementById("ReportAllStudent").style.display = "none";
    document.getElementById("Record").style.display = "none";


}


function StudentReport(){

    document.getElementById("Setting").style.display = "none";
    document.getElementById("passwords").style.display = "none";
    document.getElementById("StudnetForsuper").style.display = "none";
    document.getElementById("ReportAllStudent").style.display = "block";

    document.getElementById("Record").style.display = "none";


}

function RecordGruade(){

    document.getElementById("Setting").style.display = "none";
    document.getElementById("passwords").style.display = "none";
    document.getElementById("StudnetForsuper").style.display = "none";
    document.getElementById("ReportAllStudent").style.display = "none";
    document.getElementById("Record").style.display = "block";


}

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
