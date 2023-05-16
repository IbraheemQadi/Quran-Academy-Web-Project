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

// start work on Studet Profile

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

function initProfile(id) {
  getStudent(id, (student) => {
    document.getElementById("studentName").innerText = student.NAME_STUDENT;
    document.getElementById("studentID").innerText = student.ST_ID;
    document.getElementById("studentAddress").innerText = student.ADDRESS;
    document.getElementById("studentNumber").innerText = student.PHONE_NUMBER;
    document.getElementById("studentDate").innerText = student.BIRTHDATE;
    document.getElementById("studentEmail").innerText = student.Email;
  });
}

// Profile image upload

function loadProfileImg(stid) {
  let url = `utils/getStudentImage.php?stid=${stid}`;
  let xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);

  xhr.onload = function () {
    if (this.readyState === 4 && this.status === 200) {
      let previewImages = document.querySelectorAll(".previewImage");
      let imagePath = this.responseText;
      if (imagePath) {
        previewImages.forEach((img) => (img.src = imagePath));
        // previewImage.src = imagePath; // Update the preview image source
      } else {
        previewImages.forEach((img) => (img.src = "img/profile/Default3.png"));
        // previewImage.src = ; // default image
      }
      console.log(this.responseText);
    } else {
      console.log("Error retrieving image path.");
    }
  };

  xhr.send();
}

function saveProfileImg(stid) {
  let fileInput = event.target;

  let previewImages = document.querySelectorAll(".previewImage");

  let file = fileInput.files[0];
  let reader = new FileReader();

  reader.onload = function (e) {
    previewImages.forEach((img) => (img.src = e.target.result));
    // previewImage.src = e.target.result; // Display the preview image
  };

  reader.readAsDataURL(file); // Read the file as a data URL

  // Create a FormData object to send the file via AJAX
  let formData = new FormData();
  formData.append("photo", file);

  // Send an AJAX request to the PHP script
  let url = `utils/imgUpload.php?stid=${stid}`;
  let xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);

  xhr.onload = function () {
    if (this.readyState === 4 && this.status === 200) {
      // toast
      console.log(this.responseText);
      console.log("Photo saved successfully!");
      showToastFunction("✅ تم تغيير الصورة بنجاح", 1);
    } else {
      // toast
      console.log("Error saving photo.");
      showToastFunction("❌ حدث خطأ", 2);
    }
  };

  xhr.send(formData);
}
