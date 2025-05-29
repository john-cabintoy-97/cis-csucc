import { LoginValidation } from "./validation/index.js";
import {
  idnumPattern,
  isFacEmID,
  isValidPassword,
  isValidEmail,
  isValidAge,
  isValidMiddleName,
  isStudentID,
  isString,
  showErrorMessage,
  hideErrorMessage,
  alert,
  createCookie,
  eraseCookie,
} from "./main.module.js";
// Login Administrator
var host = window.location.pathname;

let comment = document.getElementById("feedback_comment");
if (comment) {
  comment.addEventListener("input", (e) => {
    let com = e.target.value;
    let form = document.getElementById("feedbackForm");
    if (com !== "") {
      form["feedbackAction"].disabled = false;
    } else {
      form["feedbackAction"].disabled = true;
    }
  });
}

let feedback = document.getElementById("feedbackForm");
if (feedback) {
  feedback.addEventListener("submit", async (e) => {
    e.preventDefault();
    let data = new FormData();
    for (const i of new FormData(feedback)) {
      data.append(i[0], i[1]);
    }
    data.append("feedback", true);
    feedback["feedbackAction"].disabled = true;
    const path = "ajax/user/post.php";
    fetch(path, {
      method: "POST",
      body: data,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        data = data.trim();

        if (data === "ok") {
          alert("success", "top", "Thank you for your response.");
          setTimeout(() => {
            location.reload();
          }, 1000);
        } else if (data === "already") {
          alert("warning", "top", "Thank you for your response, but you already gave your feedback for today.");
          setTimeout(() => {
            feedback["feedbackAction"].disabled = false;
          }, 1000);
        } else {
          alert("error", "top", "Something went wrong.");
          setTimeout(() => {
            feedback["feedbackAction"].disabled = false;
          }, 1000);
        }
      })
      .catch(console.error);
  });
}

let loginAdmin = document.querySelector("#adminlogin");
if (loginAdmin) {
  loginAdmin.addEventListener("submit", (e) => {
    e.preventDefault();

    let username = loginAdmin["per_username"];
    let password = loginAdmin["per_password"];
    let adminButton = loginAdmin["adminButton"];
    let rememberMe = loginAdmin["rememberMe"];

    let usernameError = document.getElementById("usernameError");
    let passwordError = document.getElementById("passwordError");

    if (username.value === "") {
      showErrorMessage(usernameError, username, "Input is required.");
      return false;
    } else {
      hideErrorMessage(usernameError, username);
    }

    if (password.value === "") {
      showErrorMessage(passwordError, password, "Input is required.");
      return false;
    } else {
      hideErrorMessage(passwordError, password);
    }

    if (rememberMe.checked == true) {
      createCookie("cis_rememberMe", true, 10);
      createCookie("cis_username", username.value, 10);
    } else {
      eraseCookie("cis_rememberMe");
      createCookie("cis_username", "", 1);
    }

    // if (LoginValidation(email, password)) {
    let data = new FormData();
    for (const i of new FormData(loginAdmin)) {
      data.append(i[0], i[1]);
    }
    const path = "../ajax/personnel.php";
    fetch(path, {
      method: "POST",
      body: data,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        data = data.trim();
        adminButton.disabled = true;
        if (data === "ok") {
          alert("success", "top", "Login successfully.");
          setTimeout(() => {
            location.reload();
          }, 1000);
        } else if (data === "not") {
          alert("warning", "top", "Account not recognized.");
          setTimeout(() => {
            adminButton.disabled = false;
          }, 1000);
        } else if (data === "incorrect") {
          alert("warning", "top", "Invalid password or username.");
          setTimeout(() => {
            adminButton.disabled = false;
          }, 1000);
        } else {
          alert("error", "top", "Something went wrong.");
          setTimeout(() => {
            adminButton.disabled = false;
          }, 1000);
        }
      })
      .catch(console.error);
    // }
  });
}

let loginUser = document.querySelector("#loginUser");
if (loginUser) {
  loginUser.addEventListener("submit", (e) => {
    e.preventDefault();
    let id_num = loginUser["id_num"];
    let password = loginUser["password"];
    let rememberMe = loginUser["rememberMe"];
    let userButton = loginUser["userButton"];

    let idnumError = document.getElementById("idnumError");
    let passwordError = document.getElementById("passwordError");

    if (id_num.value === "") {
      showErrorMessage(idnumError, id_num, "Input is required.");
      return false;
    } else {
      hideErrorMessage(idnumError, id_num);
    }

    if (password.value === "") {
      showErrorMessage(passwordError, password, "Input is required.");
      return false;
    } else {
      hideErrorMessage(passwordError, password);
    }

    if (rememberMe.checked == true) {
      createCookie("cis_urememberMe", true, 10);
      createCookie("cis_idnum", id_num.value, 10);
    } else {
      eraseCookie("cis_urememberMe");
      createCookie("cis_idnum", "", 1);
    }

    let data = new FormData();
    for (const i of new FormData(loginUser)) {
      data.append(i[0], i[1]);
    }
    const path = "./ajax/auth.php";
    fetch(path, {
      method: "POST",
      body: data,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        console.log(data);
        data = data.trim();
        userButton.disabled = true;
        if (data === "ok") {
          alert("success", "top", "Login successfully.");
          setTimeout(() => {
            location.reload();
          }, 1000);
        } else if (data === "not") {
          alert("warning", "top", "Account not recognized.");
          setTimeout(() => {
            userButton.disabled = false;
          }, 1000);
        } else if (data === "no") {
          alert("warning", "top", "Account not activated.");
          setTimeout(() => {
            userButton.disabled = false;
          }, 1000);
        } else if (data === "incorrect") {
          alert("warning", "top", "Invalid password.");
          setTimeout(() => {
            userButton.disabled = false;
          }, 1000);
        } else {
          alert("error", "top", "Something went wrong.");
          setTimeout(() => {
            userButton.disabled = false;
          }, 1000);
        }
      })
      .catch(console.error);
  });
}

// Create Database
let createDatabase = document.querySelector("#createDatabase");
if (createDatabase) {
  createDatabase.addEventListener("submit", (e) => {
    e.preventDefault();
    alert(0);
  });
}

// total count
let tcount = document.getElementById("tcount");
if (tcount) {
  tcount.addEventListener("input", (e) => {
    let tavailable = document.getElementById("tavailable");
    if (e.target.value != "") {
      tavailable.value = e.target.value;
    } else {
      tavailable.value = 0;
    }
  });
}

let courseandCollege = document.getElementById("courseandCollege");
if (courseandCollege) {
  courseandCollege.addEventListener("change", (id) => {
    let val = id.target.value;
    let college = val.split("/");

    let cdata = new FormData();
    cdata.append("get_college", "item");
    cdata.append("college_id", college[1]);

    const path = "./ajax/user/get.php";
    fetch(path, {
      method: "POST",
      body: cdata,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        console.log(data);
        data = JSON.parse(data);
        let reg_student = document.getElementById("reg_student");
        let college = reg_student["college"];
        college.value = data.college_id;
      })
      .catch(console.error);
  });
}

// register student

let reg_student = document.querySelector("#reg_student");

if (reg_student) {
  reg_student.addEventListener("submit", async (e) => {
    e.preventDefault();

    let idnum = reg_student["idnum"];
    let fname = reg_student["fname"];
    let lname = reg_student["lname"];
    let mname = reg_student["mname"];
    let sex = reg_student["sex"];
    let age = reg_student["age"];
    let course = reg_student["course"];
    let college = reg_student["college"];
    let email = reg_student["email"];
    let password = reg_student["password"];
    let stud_status = reg_student["stud_status"];

    let cisBtnStud = reg_student["cisBtnStud"];

    let sidnumError = document.getElementById("sidnumError");
    let sfnameError = document.getElementById("sfnameError");
    let slnameError = document.getElementById("slnameError");
    let smnameError = document.getElementById("smnameError");
    let ssexError = document.getElementById("ssexError");
    let sageError = document.getElementById("sageError");
    let scourseError = document.getElementById("scourseError");
    let scollegeError = document.getElementById("scollegeError");
    let semailError = document.getElementById("semailError");
    let spasswordError = document.getElementById("spasswordError");

    if (idnum.value === "") {
      showErrorMessage(sidnumError, idnum, "Input is required.");
      return false;
    } else if (!isStudentID(idnum.value)) {
      showErrorMessage(sidnumError, idnum, "Invalid ID number, ex. 0000-0000");
      return false;
    } else {
      hideErrorMessage(sidnumError, idnum);
    }

    if (fname.value === "") {
      showErrorMessage(sfnameError, fname, "Input is required.");
      return false;
    } else if (!isString(fname.value)) {
      showErrorMessage(
        sfnameError,
        fname,
        "Invalid input, only strings allowed,  and min 2 and max 50 characters."
      );
      return false;
    } else {
      hideErrorMessage(sfnameError, fname);
    }

    if (lname.value === "") {
      showErrorMessage(slnameError, lname, "Input is required.");
      return false;
    } else if (!isString(lname.value)) {
      showErrorMessage(
        slnameError,
        lname,
        "Invalid input, only strings allowed, and min 2 and max 50 characters."
      );
      return false;
    } else {
      hideErrorMessage(slnameError, lname);
    }

    if (!isValidMiddleName(mname.value)) {
      showErrorMessage(
        smnameError,
        lname,
        "Invalid input, only strings allowed, and max 50 characters"
      );
      return false;
    } else {
      hideErrorMessage(smnameError, lname);
    }

    if (sex.value === "") {
      showErrorMessage(ssexError, sex, "Input is required.");
      return false;
    } else {
      hideErrorMessage(ssexError, sex);
    }

    if (age.value === "") {
      showErrorMessage(sageError, age, "Input is required.");
      return false;
    } else if (!isValidAge(age.value)) {
      showErrorMessage(
        sageError,
        age,
        "Invalid age. Only numbers are allowed. Age must be at least 8 years old and should not exceed."
      );
      return false;
    }
    {
      hideErrorMessage(sageError, age);
    }

    if (course.value === "") {
      showErrorMessage(scourseError, course, "Input is required.");
      return false;
    } else {
      hideErrorMessage(scourseError, course);
    }

    if (college.value === "") {
      showErrorMessage(scollegeError, college, "Input is required.");
      return false;
    } else {
      hideErrorMessage(scollegeError, college);
    }

    let ebtnContainer = document.getElementById("sbtnContainer");
    let otpEContainer = document.getElementById("otpSContainer");
    let emailContainer = document.getElementById("emailSContainer");
    if (email.value === "") {
      showErrorMessage(semailError, email, "Input is required.");
      ebtnContainer.classList.add("mb-3");
      otpEContainer.classList.add("mb-3");
      return false;
    } else if (!isValidEmail(email.value)) {
      showErrorMessage(semailError, email, "Invalid email address.");
      ebtnContainer.classList.add("mb-3");
      otpEContainer.classList.add("mb-3");
      return false;
    } else if (stud_status.value === "") {
      showErrorMessage(semailError, email, "Email not verified.");
      emailContainer.classList.remove("mb-3");
      emailContainer.classList.add("mb-1");
      ebtnContainer.classList.add("mb-3");
      otpEContainer.classList.add("mb-3");
      return false;
    } else {
      hideErrorMessage(semailError, email);
    }

    if (password.value === "") {
      showErrorMessage(spasswordError, password, "Input is required.");
      return false;
    }
    if (!isValidPassword(password.value)) {
      showErrorMessage(
        spasswordError,
        password,
        "Invalid password, at least 8 characters long, at least one uppercase and one lowercase, with digits and special characters."
      );
      return false;
    } else {
      hideErrorMessage(spasswordError, password);
    }

    cisBtnStud.disabled = true;

    let data = new FormData();
    for (const i of new FormData(reg_student)) {
      data.append(i[0], i[1]);
    }
    data.append("email", email.value);
    data.append("student_registration", "1");

    const path = "./ajax/user/post.php";
    fetch(path, {
      method: "POST",
      body: data,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        data = data.trim();
        console.log(data);
        if (data === "ok") {
          alert("success", "top", "Registered successfully.");
          setTimeout(() => {
            location.reload();
          }, 1000);
        } else if (data === "exist") {
          alert(
            "warning",
            "top",
            "Account already registered. Check your ID number, name, and email."
          );
          setTimeout(() => {
            cisBtnStud.disabled = false;
          }, 1000);
        } else {
          alert("error", "top", "Something went wrong.");
          setTimeout(() => {
            cisBtnStud.disabled = false;
          }, 1000);
        }
      })
      .catch(console.error);
  });
}

// register student
let reg_faculty = document.querySelector("#reg_faculty");
if (reg_faculty) {
  reg_faculty.addEventListener("submit", async (e) => {
    e.preventDefault();

    let idnum = reg_faculty["idnum"];
    let fname = reg_faculty["fname"];
    let lname = reg_faculty["lname"];
    let mname = reg_faculty["mname"];
    let sex = reg_faculty["sex"];
    let age = reg_faculty["age"];
    let college = reg_faculty["college"];
    let email = reg_faculty["email"];
    let password = reg_faculty["password"];
    let fac_status = reg_faculty["fac_status"];

    let cisBtnFacul = reg_faculty["cisBtnFacul"];
    let fidnumError = document.getElementById("fidnumError");
    let ffnameError = document.getElementById("ffnameError");
    let flnameError = document.getElementById("flnameError");
    let fmnameError = document.getElementById("fmnameError");
    let fsexError = document.getElementById("fsexError");
    let fageError = document.getElementById("fageError");
    let fcollegeError = document.getElementById("fcollegeError");
    let femailError = document.getElementById("femailError");
    let fpasswordError = document.getElementById("fpasswordError");

    let fac_btn = document.getElementById("fbtnContainer");

    if (idnum.value === "") {
      showErrorMessage(fidnumError, idnum, "Input is required.");
      return false;
    } else if (!isFacEmID(idnum.value)) {
      showErrorMessage(
        fidnumError,
        idnum,
        "Invalid ID number, ex. 000000-000000"
      );
      return false;
    } else {
      hideErrorMessage(fidnumError, idnum);
    }

    if (fname.value === "") {
      showErrorMessage(ffnameError, fname, "Input is required.");
      return false;
    } else if (!isString(fname.value)) {
      showErrorMessage(
        ffnameError,
        fname,
        "Invalid input, only strings allowed,  and min 2 and max 50 characters."
      );
      return false;
    } else {
      hideErrorMessage(ffnameError, fname);
    }

    if (lname.value === "") {
      showErrorMessage(flnameError, lname, "Input is required.");
      return false;
    } else if (!isString(lname.value)) {
      showErrorMessage(
        flnameError,
        lname,
        "Invalid input, only strings allowed, and min 2 and max 50 characters."
      );
      return false;
    } else {
      hideErrorMessage(flnameError, lname);
    }

    if (!isValidMiddleName(mname.value)) {
      showErrorMessage(
        fmnameError,
        lname,
        "Invalid input, only strings allowed, and max 50 characters"
      );
      return false;
    } else {
      hideErrorMessage(fmnameError, lname);
    }

    if (sex.value === "") {
      showErrorMessage(fsexError, sex, "Input is required.");
      return false;
    } else {
      hideErrorMessage(fsexError, sex);
    }

    if (age.value === "") {
      showErrorMessage(fageError, age, "Input is required.");
      return false;
    } else if (!isValidAge(age.value)) {
      showErrorMessage(
        fageError,
        age,
        "Invalid age. Only numbers are allowed. Age must be at least 8 years old and should not exceed."
      );
      return false;
    }
    {
      hideErrorMessage(fageError, age);
    }

    if (college.value === "") {
      showErrorMessage(fcollegeError, college, "Input is required.");
      return false;
    } else {
      hideErrorMessage(fcollegeError, college);
    }

    let ebtnContainer = document.getElementById("fbtnContainer");
    let otpEContainer = document.getElementById("otpFContainer");
    let emailContainer = document.getElementById("emailFContainer");
    if (email.value === "") {
      showErrorMessage(femailError, email, "Input is required.");
      ebtnContainer.classList.add("mb-3");
      otpEContainer.classList.add("mb-3");
      return false;
    } else if (!isValidEmail(email.value)) {
      showErrorMessage(femailError, email, "Invalid email address.");
      ebtnContainer.classList.add("mb-3");
      otpEContainer.classList.add("mb-3");
      return false;
    } else if (fac_status.value === "") {
      showErrorMessage(femailError, email, "Email not verified.");
      emailContainer.classList.remove("mb-3");
      emailContainer.classList.add("mb-1");
      ebtnContainer.classList.add("mb-3");
      otpEContainer.classList.add("mb-3");
      return false;
    } else {
      hideErrorMessage(femailError, email);
    }

    if (password.value === "") {
      showErrorMessage(fpasswordError, password, "Input is required.");
      return false;
    }
    if (!isValidPassword(password.value)) {
      showErrorMessage(
        fpasswordError,
        password,
        "Invalid password, at least 8 characters long, at least one uppercase and one lowercase, with digits and special characters."
      );
      return false;
    } else {
      hideErrorMessage(fpasswordError, password);
    }

    let data = new FormData();
    for (const i of new FormData(reg_faculty)) {
      data.append(i[0], i[1]);
    }
    data.append("email", email.value);
    cisBtnFacul.disabled = true;
    data.append("faculty_registration", "1");
    const path = "./ajax/user/post.php";
    fetch(path, {
      method: "POST",
      body: data,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        data = data.trim();
        if (data === "ok") {
          alert("success", "top", "Registered successfully.");
          setTimeout(() => {
            location.reload();
          }, 1000);
        } else if (data === "exist") {
          alert(
            "warning",
            "top",
            "Account already registered. Check your ID number, name, and email."
          );
          setTimeout(() => {
            cisBtnFacul.disabled = false;
          }, 1000);
        } else {
          alert("error", "top", "Something went wrong.");
          setTimeout(() => {
            cisBtnFacul.disabled = false;
          }, 1000);
        }
      })
      .catch(console.error);
  });
}

// register student
let reg_employee = document.querySelector("#reg_employee");
if (reg_employee) {
  reg_employee.addEventListener("submit", async (e) => {
    e.preventDefault();

    let idnum = reg_employee["idnum"];
    let fname = reg_employee["fname"];
    let lname = reg_employee["lname"];
    let mname = reg_employee["mname"];
    let sex = reg_employee["sex"];
    let age = reg_employee["age"];
    let office = reg_employee["office"];
    let position = reg_employee["position"];
    let email = reg_employee["email"];
    let password = reg_employee["password"];
    let em_status = reg_employee["em_status"];
    let cisBtnEmplo = reg_employee["cisBtnEmplo"];
    let eidnumError = document.getElementById("eidnumError");
    let efnameError = document.getElementById("efnameError");
    let elnameError = document.getElementById("elnameError");
    let emnameError = document.getElementById("emnameError");
    let esexError = document.getElementById("esexError");
    let eageError = document.getElementById("eageError");
    let eofficeError = document.getElementById("eofficeError");
    let epositionError = document.getElementById("epositionError");
    let eemailError = document.getElementById("eemailError");
    let epasswordError = document.getElementById("epasswordError");

    if (idnum.value === "") {
      showErrorMessage(eidnumError, idnum, "Input is required.");
      return false;
    } else if (!isFacEmID(idnum.value)) {
      showErrorMessage(
        eidnumError,
        idnum,
        "Invalid ID number, ex. 000000-000000"
      );
      return false;
    } else {
      hideErrorMessage(eidnumError, idnum);
    }

    if (fname.value === "") {
      showErrorMessage(efnameError, fname, "Input is required.");
      return false;
    } else if (!isString(fname.value)) {
      showErrorMessage(
        efnameError,
        fname,
        "Invalid input, only strings allowed,  and min 2 and max 50 characters."
      );
      return false;
    } else {
      hideErrorMessage(efnameError, fname);
    }

    if (lname.value === "") {
      showErrorMessage(elnameError, lname, "Input is required.");
      return false;
    } else if (!isString(lname.value)) {
      showErrorMessage(
        elnameError,
        lname,
        "Invalid input, only strings allowed, and min 2 and max 50 characters."
      );
      return false;
    } else {
      hideErrorMessage(elnameError, lname);
    }

    if (!isValidMiddleName(mname.value)) {
      showErrorMessage(
        emnameError,
        lname,
        "Invalid input, only strings allowed, and max 50 characters"
      );
      return false;
    } else {
      hideErrorMessage(emnameError, lname);
    }

    if (sex.value === "") {
      showErrorMessage(esexError, sex, "Input is required.");
      return false;
    } else {
      hideErrorMessage(esexError, sex);
    }

    if (age.value === "") {
      showErrorMessage(eageError, age, "Input is required.");
      return false;
    } else if (!isValidAge(age.value)) {
      showErrorMessage(
        eageError,
        age,
        "Invalid age. Only numbers are allowed. Age must be at least 8 years old and should not exceed."
      );
      return false;
    } else {
      hideErrorMessage(eageError, age);
    }

    if (office.value === "") {
      showErrorMessage(eofficeError, office, "Input is required.");
      return false;
    } else {
      hideErrorMessage(eofficeError, office);
    }

    if (position.value === "") {
      showErrorMessage(epositionError, position, "Input is required.");
      return false;
    } else {
      hideErrorMessage(epositionError, position);
    }

    let ebtnContainer = document.getElementById("ebtnContainer");
    let otpEContainer = document.getElementById("otpEContainer");
    let emailContainer = document.getElementById("emailEContainer");
    if (email.value === "") {
      showErrorMessage(eemailError, email, "Input is required.");
      ebtnContainer.classList.add("mb-3");
      otpEContainer.classList.add("mb-3");
      return false;
    } else if (!isValidEmail(email.value)) {
      showErrorMessage(eemailError, email, "Invalid email address.");
      ebtnContainer.classList.add("mb-3");
      otpEContainer.classList.add("mb-3");
      return false;
    } else if (em_status.value === "") {
      showErrorMessage(eemailError, email, "Email not verified.");
      emailContainer.classList.remove("mb-3");
      emailContainer.classList.add("mb-1");
      ebtnContainer.classList.add("mb-3");
      otpEContainer.classList.add("mb-3");
      return false;
    } else {
      hideErrorMessage(eemailError, email);
    }

    if (password.value === "") {
      showErrorMessage(epasswordError, password, "Input is required.");
      return false;
    }
    if (!isValidPassword(password.value)) {
      showErrorMessage(
        epasswordError,
        password,
        "Invalid password, at least 8 characters long, at least one uppercase and one lowercase, with digits and special characters."
      );
      return false;
    } else {
      hideErrorMessage(epasswordError, password);
    }

    let data = new FormData();
    for (const i of new FormData(reg_employee)) {
      data.append(i[0], i[1]);
    }
    data.append("email", email.value);
    cisBtnEmplo.disabled = true;
    data.append("employee_registration", "1");
    const path = "./ajax/user/post.php";
    fetch(path, {
      method: "POST",
      body: data,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        data = data.trim();
        if (data === "ok") {
          alert("success", "top", "Registered successfully.");
          setTimeout(() => {
            location.reload();
          }, 1000);
        } else if (data === "exist") {
          alert(
            "warning",
            "top",
            "Account already registered. Check your ID number, name, and email."
          );
          setTimeout(() => {
            cisBtnEmplo.disabled = false;
          }, 1000);
        } else {
          alert("error", "top", "Something went wrong.");
          setTimeout(() => {
            cisBtnEmplo.disabled = false;
          }, 1000);
        }
      })
      .catch(console.error);
  });
}

$(document).ready(function () {
  $("#select-field").select2({
    theme: "bootstrap-5",
    width: $(this).data("width")
      ? $(this).data("width")
      : $(this).hasClass("w-100")
      ? "100%"
      : "style",
    placeholder: $(this).data("placeholder"),
    closeOnSelect: false,
  });

  $("#cmedicine").select2({
    theme: "bootstrap-5",
    width: $(this).data("width")
      ? $(this).data("width")
      : $(this).hasClass("w-100")
      ? "100%"
      : "style",
    placeholder: $(this).data("placeholder"),
    closeOnSelect: false,
  });

  $("#search_medicine").select2({
    theme: "bootstrap-5",
    width: $(this).data("width")
      ? $(this).data("width")
      : $(this).hasClass("w-100")
      ? "100%"
      : "style",
    placeholder: $(this).data("placeholder"),
    closeOnSelect: false,
  });

  // Listen for change event
  $("#search_medicine").on("change", async function () {
    let selectedValue = $(this).val();

    let data = new FormData();
    data.append("get_medicine", "item");
    data.append("medicine_id", selectedValue);

    let mstocks_form = document.getElementById("mstocks_form");

    const path = "../ajax/admin/get.php";
    await fetch(path, {
      method: "POST",
      body: data,
    })
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        data = JSON.parse(data);

        var currentDate = new Date().toISOString().split("T")[0];
        // Set the min attribute of the "Batch Date" input field to the current date
        document
          .querySelector('input[name="bdate"]')
          .setAttribute("min", currentDate);
        document
          .querySelector('input[name="edate"]')
          .setAttribute("min", currentDate);

        mstocks_form["gname"].value = data.med_brand;
        mstocks_form["bname"].value = data.med_generic;
        mstocks_form["dosage"].value = data.med_dose;
        mstocks_form["type"].value = data.med_type;
        mstocks_form["description"].value = data.med_desc;

        mstocks_form["saveStocks"].disabled = false;
        mstocks_form["updateStocks"].disabled = true;
        mstocks_form["cancelStocks"].disabled = false;

        mstocks_form["bdate"].disabled = false;
        mstocks_form["edate"].disabled = false;
        mstocks_form["tcount"].disabled = false;
        // mstocks_form['tissued'].disabled = false;
        mstocks_form["tavailable"].disabled = false;
        mstocks_form["olevel"].disabled = false;

        mstocks_form["bdate"].value = "";
        mstocks_form["edate"].value = "";
        mstocks_form["tcount"].value = "";
        // mstocks_form['tissued'].value = '';
        mstocks_form["tavailable"].value = "";
        mstocks_form["olevel"].value = "";

        // Check if elements exist and remove them
        if (mstocks_form["updateStocksSubmit"]) {
          mstocks_form.removeChild(mstocks_form["updateStocksSubmit"]);
        }
        if (mstocks_form["inv_id"]) {
          mstocks_form.removeChild(mstocks_form["inv_id"]);
        }
        if (mstocks_form["med_id"]) {
          mstocks_form.removeChild(mstocks_form["med_id"]);
        }

        var inputElement = document.querySelector(
          'input[name="saveStocksSubmit"]'
        );
        if (!inputElement) {
          inputElement = document.createElement("input");
          inputElement.type = "hidden";
          inputElement.name = "saveStocksSubmit";

          mstocks_form.appendChild(inputElement);
        }
      })
      .catch(console.error);
  });

  // var calendarEl = document.getElementById('calendar');

  // var calendar = new FullCalendar.Calendar(calendarEl, {
  //     timeZone: 'UTC',
  //     themeSystem: 'bootstrap5',
  //     headerToolbar: {
  //         left: 'prev,next today',
  //         center: 'title',
  //         right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
  //     },
  //     weekNumbers: true,
  //     dayMaxEvents: true, // allow "more" link when too many events
  //     events: ''
  // });

  // calendar.render();
});
