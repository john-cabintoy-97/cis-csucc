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
  checkNum,
} from "./main.module.js";

$(document).ready(function () {
  let deletePersonnel = document.getElementById("deletePersonnel");
  if (deletePersonnel) {
    deletePersonnel.addEventListener("click", () => {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        customClass: {
          container: "custom-modal-class", // Add your custom CSS class here
        },
      }).then((result) => {
        if (result.isConfirmed) {
          let patient_pass_id =
            document.getElementById("patient_pass_id").value;

          let data = new FormData();
          data.append("delete_patient", "item");
          data.append("patient_id", patient_pass_id);

          const path = "../ajax/admin/delete.php";
          fetch(path, {
            method: "POST",
            body: data,
          })
            .then((response) => {
              return response.text();
            })
            .then((data) => {
              data = data.trim();
              if (data === "delete") {
                alert("success", "top", "User deleted successfully.");
                setTimeout(() => {
                  location.reload();
                }, 1000);
              } else {
                alert("error", "top", "Something went wrong.");
              }
            })
            .catch(console.error);
        }
      });
    });
  }

  let cupdatePersonnel = document.querySelector("#cupdatePersonnel");
  if (cupdatePersonnel) {
    cupdatePersonnel.addEventListener("submit", async (e) => {
      e.preventDefault();
      let data = new FormData();
      for (const i of new FormData(cupdatePersonnel)) {
        data.append(i[0], i[1]);
      }
      data.append("personnel_update", true);

      const path = "ajax/admin/post.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();

          if (data == "ok") {
            alert("success", "top", "Profile update successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else if (data == "not_match") {
            alert("warning", "top", "Password dont match.");
          } else {
            alert("error", "top", "Something went wrong.");
          }
        })
        .catch(console.error);
    });
  }
  let cpassword_update = document.querySelector("#cpassword_update");
  if (cpassword_update) {
    cpassword_update.addEventListener("input", async (e) => {
      let cupdatePersonnel = document.getElementById("cupdatePersonnel");
      let id_pass = cupdatePersonnel["id_pass"].value;
      let cpass = e.target.value;

      let data = new FormData();
      data.append("check_pass", true);
      data.append("id_pass", id_pass);
      data.append("cpass", cpass);

      const path = "ajax/admin/get.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();
          if (data === "ok") {
            cupdatePersonnel["cpassword"].disabled = true;
            cupdatePersonnel["username"].disabled = false;
            cupdatePersonnel["password"].disabled = false;
            cupdatePersonnel["repassword"].disabled = false;
            cupdatePersonnel["lname"].disabled = false;
            cupdatePersonnel["fname"].disabled = false;
            cupdatePersonnel["mname"].disabled = false;
            cupdatePersonnel["gender"].disabled = false;
            cupdatePersonnel["updatePersonnel"].disabled = false;
          }
        })
        .catch(console.error);
    });
  }
  // Create College
  let createCollege = document.querySelector("#createCollege");
  if (createCollege) {
    createCollege.addEventListener("submit", async (e) => {
      e.preventDefault();

      let college = createCollege["college"];
      let collegeError = document.getElementById("collegeError");
      let collegeButton = createCollege["collegeButton"];

      if (college.value === "") {
        showErrorMessage(collegeError, college, "Input is required.");
        return false;
      } else {
        hideErrorMessage(collegeError, college);
      }

      let data = new FormData();
      for (const i of new FormData(createCollege)) {
        data.append(i[0], i[1]);
      }

      collegeButton.disabled = true;

      const path = "../ajax/admin/post.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();

          if (data == "ok") {
            alert("success", "top", "College name save successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else if (data == "exist") {
            alert("warning", "top", "College name already exist.");
            setTimeout(() => {
              collegeButton.disabled = false;
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              collegeButton.disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  // Edit College
  let editCollege = document.querySelector("#editCollege");
  if (editCollege) {
    editCollege.addEventListener("submit", async (e) => {
      e.preventDefault();

      let college = editCollege["college"];
      let collegeError = document.getElementById("collegeError");
      let collegeButton = editCollege["collegeButton"];

      if (college.value === "") {
        showErrorMessage(collegeError, college, "Input is required.");
        return false;
      } else {
        hideErrorMessage(collegeError, college);
      }

      let data = new FormData();
      for (const i of new FormData(editCollege)) {
        data.append(i[0], i[1]);
      }

      collegeButton.disabled = true;

      const path = "../ajax/admin/update.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();

          if (data == "ok") {
            alert("success", "top", "College name updated successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              collegeButton.disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  // Create Course
  let createCourse = document.querySelector("#createCourse");
  if (createCourse) {
    createCourse.addEventListener("submit", async (e) => {
      e.preventDefault();

      let course = createCourse["course"];
      let courseError = document.getElementById("courseError");
      let courseButton = createCourse["courseButton"];

      if (course.value === "") {
        showErrorMessage(courseError, course, "Input is required.");
        return false;
      } else {
        hideErrorMessage(courseError, course);
      }

      let data = new FormData();
      for (const i of new FormData(createCourse)) {
        data.append(i[0], i[1]);
      }

      courseButton.disabled = true;

      const path = "../ajax/admin/post.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();

          if (data == "ok") {
            alert("success", "top", "Course name save successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else if (data == "exist") {
            alert("warning", "top", "Course name already exist.");
            setTimeout(() => {
              courseButton.disabled = false;
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              courseButton.disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  // Edit College
  let editCourse = document.querySelector("#editCourse");
  if (editCourse) {
    editCourse.addEventListener("submit", async (e) => {
      e.preventDefault();

      let course = editCourse["course"];
      let courseError = document.getElementById("courseError");
      let courseButton = editCourse["courseButton"];

      if (course.value === "") {
        showErrorMessage(courseError, course, "Input is required.");
        return false;
      } else {
        hideErrorMessage(courseError, course);
      }

      let data = new FormData();
      for (const i of new FormData(editCourse)) {
        data.append(i[0], i[1]);
      }

      courseButton.disabled = true;

      const path = "../ajax/admin/update.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();

          if (data == "ok") {
            alert("success", "top", "Course name updated successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              courseButton.disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  // Create Office
  let createOffice = document.querySelector("#createOffice");
  if (createOffice) {
    createOffice.addEventListener("submit", async (e) => {
      e.preventDefault();

      let office = createOffice["office"];
      let officeError = document.getElementById("officeError");
      let officeButton = createOffice["officeButton"];

      if (office.value === "") {
        showErrorMessage(officeError, office, "Input is required.");
        return false;
      } else {
        hideErrorMessage(officeError, office);
      }

      let data = new FormData();
      for (const i of new FormData(createOffice)) {
        data.append(i[0], i[1]);
      }

      officeButton.disabled = true;

      const path = "../ajax/admin/post.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();

          if (data == "ok") {
            alert("success", "top", "Office name save successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else if (data == "exist") {
            alert("warning", "top", "Office name already exist.");
            setTimeout(() => {
              officeButton.disabled = false;
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              officeButton.disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  // Edit Office
  let editOffice = document.querySelector("#editOffice");
  if (editOffice) {
    editOffice.addEventListener("submit", async (e) => {
      e.preventDefault();

      let office = editOffice["office"];
      let officeError = document.getElementById("officeError");
      let officeButton = editOffice["officeButton"];

      if (office.value === "") {
        showErrorMessage(officeError, office, "Input is required.");
        return false;
      } else {
        hideErrorMessage(officeError, office);
      }

      let data = new FormData();
      for (const i of new FormData(editOffice)) {
        data.append(i[0], i[1]);
      }

      officeButton.disabled = true;

      const path = "../ajax/admin/update.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();
       
          if (data == "ok") {
            alert("success", "top", "Office name updated successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              officeButton.disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  // Create Illness
  let createIllness = document.querySelector("#createIllness");
  if (createIllness) {
    createIllness.addEventListener("submit", async (e) => {
      e.preventDefault();

      let illness = createIllness["illness"];
      let illnessError = document.getElementById("illnessError");
      let illnessButton = createIllness["illnessButton"];

      if (illness.value === "") {
        showErrorMessage(illnessError, illness, "Input is required.");
        return false;
      } else {
        hideErrorMessage(illnessError, illness);
      }

      let data = new FormData();
      for (const i of new FormData(createIllness)) {
        data.append(i[0], i[1]);
      }

      illnessButton.disabled = true;

      const path = "../ajax/admin/post.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();

          if (data == "ok") {
            alert("success", "top", "Illness name save successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else if (data == "exist") {
            alert("warning", "top", "Illness name already exist.");
            setTimeout(() => {
              illnessButton.disabled = false;
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              illnessButton.disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  // Edit Illness
  let editIllness = document.querySelector("#editIllness");
  if (editIllness) {
    editIllness.addEventListener("submit", async (e) => {
      e.preventDefault();

      let illness = editIllness["illness"];
      let illnessError = document.getElementById("illnessError");
      let illnessButton = editIllness["illnessButton"];

      if (illness.value === "") {
        showErrorMessage(illnessError, illness, "Input is required.");
        return false;
      } else {
        hideErrorMessage(illnessError, illness);
      }

      let data = new FormData();
      for (const i of new FormData(editIllness)) {
        data.append(i[0], i[1]);
      }

      illnessButton.disabled = true;

      const path = "../ajax/admin/update.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();
        
          if (data == "ok") {
            alert("success", "top", "Illness name updated successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              illnessButton.disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  // Create School Nurse
  let schoolNurse = document.querySelector("#schoolNurse");
  if (schoolNurse) {
    schoolNurse.addEventListener("submit", async (e) => {
      e.preventDefault();

      let nurse = schoolNurse["nurse_name"];
      let nurseError = document.getElementById("nurseError");
      let nurseButton = schoolNurse["nurseButton"];

      if (nurse.value === "") {
        showErrorMessage(nurseError, nurse, "Input is required.");
        return false;
      } else {
        hideErrorMessage(nurseError, nurse);
      }

      let data = new FormData();
      for (const i of new FormData(schoolNurse)) {
        data.append(i[0], i[1]);
      }

      nurseButton.disabled = true;

      const path = "../ajax/admin/post.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();
  
          if (data == "ok") {
            alert("success", "top", "Nurse name save successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              nurseButton.disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  function medicinceFunc() {
    // Create Medicine
    let createMedicine = document.querySelector("#createMedicine");
    if (createMedicine) {
      createMedicine.addEventListener("submit", async (e) => {
        e.preventDefault();

        let gname = createMedicine["gname"];
        let bname = createMedicine["bname"];
        let description = createMedicine["description"];
        let dosage = createMedicine["dosage"];
        let type = createMedicine["type"];

        let gnameError = document.getElementById("gnameError");
        let bnameError = document.getElementById("bnameError");
        let descriptionError = document.getElementById("descriptionError");
        let dosageError = document.getElementById("dosageError");
        let typeError = document.getElementById("typeError");

        let medicineButton = createMedicine["medicineButton"];

        if (gname.value === "") {
          showErrorMessage(gnameError, gname, "Input is required.");
          return false;
        } else {
          hideErrorMessage(gnameError, gname);
        }

        if (bname.value === "") {
          showErrorMessage(bnameError, bname, "Input is required.");
          return false;
        } else {
          hideErrorMessage(bnameError, bname);
        }

        if (description.value === "") {
          showErrorMessage(descriptionError, description, "Input is required.");
          return false;
        } else {
          hideErrorMessage(descriptionError, description);
        }

        if (dosage.value === "") {
          showErrorMessage(dosageError, dosage, "Input is required.");
          return false;
        } else {
          hideErrorMessage(dosageError, dosage);
        }

        if (type.value === "") {
          showErrorMessage(typeError, type, "Input is required.");
          return false;
        } else {
          hideErrorMessage(typeError, type);
        }

        let data = new FormData();
        for (const i of new FormData(createMedicine)) {
          data.append(i[0], i[1]);
        }

        medicineButton.disabled = true;

        const path = "../ajax/admin/post.php";
        await fetch(path, {
          method: "POST",
          body: data,
        })
          .then((response) => {
            return response.text();
          })
          .then((data) => {
            data = data.trim();
      
            if (data == "ok") {
              alert("success", "top", "Medicine save successfully.");
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else if (data == "exist") {
              alert("warning", "top", "Medicine already exist.");
              setTimeout(() => {
                medicineButton.disabled = false;
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                medicineButton.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }

    // Edit Illness
    let editMedicine = document.querySelector("#editMedicine");
    if (editMedicine) {
      editMedicine.addEventListener("submit", async (e) => {
        e.preventDefault();

        let gname = editMedicine["gname"];
        let bname = editMedicine["bname"];
        let description = editMedicine["description"];
        let dosage = editMedicine["dosage"];
        let type = editMedicine["type"];

        let gnameError = document.getElementById("gnameError");
        let bnameError = document.getElementById("bnameError");
        let descriptionError = document.getElementById("descriptionError");
        let dosageError = document.getElementById("dosageError");
        let typeError = document.getElementById("typeError");

        let medicineButton = editMedicine["medicineButton"];

        if (gname.value === "") {
          showErrorMessage(gnameError, gname, "Input is required.");
          return false;
        } else {
          hideErrorMessage(gnameError, gname);
        }

        if (bname.value === "") {
          showErrorMessage(bnameError, bname, "Input is required.");
          return false;
        } else {
          hideErrorMessage(bnameError, bname);
        }

        if (description.value === "") {
          showErrorMessage(descriptionError, description, "Input is required.");
          return false;
        } else {
          hideErrorMessage(descriptionError, description);
        }

        if (dosage.value === "") {
          showErrorMessage(dosageError, dosage, "Input is required.");
          return false;
        } else {
          hideErrorMessage(dosageError, dosage);
        }

        if (type.value === "") {
          showErrorMessage(typeError, type, "Input is required.");
          return false;
        } else {
          hideErrorMessage(typeError, type);
        }

        let data = new FormData();
        for (const i of new FormData(editMedicine)) {
          data.append(i[0], i[1]);
        }

        medicineButton.disabled = true;

        const path = "../ajax/admin/update.php";
        await fetch(path, {
          method: "POST",
          body: data,
        })
          .then((response) => {
            return response.text();
          })
          .then((data) => {
            data = data.trim();
            if (data == "ok") {
              alert("success", "top", "Medicine updated successfully.");
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                medicineButton.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }
  }

  let cnew = document.getElementById("cnew");
  if (cnew) {
    cnew.addEventListener("click", () => {
      let patient_id = document.getElementById("patient_id");
      if (patient_id.value == "") {
        alert("warning", "top", "Please select patient.");
      } else {
        let consultationForm = document.getElementById("consultationForm");

        consultationForm["ctemp"].disabled = false;
        consultationForm["cpulse"].disabled = false;
        consultationForm["crr"].disabled = false;
        consultationForm["cbp1"].disabled = false;
        consultationForm["cbp2"].disabled = false;

        consultationForm["ccomplaint"].disabled = false;
        consultationForm["cmedicine"].disabled = false;
        consultationForm["cqty"].disabled = false;
        consultationForm["ctaken"].disabled = false;
        consultationForm["cremark"].disabled = false;
        consultationForm["cconsultans"].disabled = false;
        consultationForm["cnew"].disabled = true;
        consultationForm["csave"].disabled = false;
        consultationForm["ccancel"].disabled = false;

        consultationForm["addButton"].disabled = false;
      }
    });
  }

  let newPersonnel = document.getElementById("newPersonnel");
  if (newPersonnel) {
    newPersonnel.addEventListener("click", () => {
      let personnelForm = document.getElementById("personnelForm");

      personnelForm["username"].value = "";
      //personnelForm["password"].value = "";
      personnelForm["lname"].value = "";
      personnelForm["fname"].value = "";
      personnelForm["mname"].value = "";
      personnelForm["gender"].value = "";
      //    personnelForm["usertype"].value = "";
      personnelForm["cancelPersonnel"].disabled = false;
      personnelForm["savePersonnel"].disabled = false;
      personnelForm["newPersonnel"].disabled = true;

      personnelForm["username"].disabled = false;
      personnelForm["password"].disabled = false;
      personnelForm["lname"].disabled = false;
      personnelForm["fname"].disabled = false;
      personnelForm["mname"].disabled = false;
      personnelForm["gender"].disabled = false;
      personnelForm["usertype"].disabled = false;
      personnelForm["cancelPersonnel"].disabled = false;
      personnelForm["savePersonnel"].disabled = false;
      personnelForm["newPersonnel"].disabled = true;

      personnelForm["activate"].disabled = false;
      personnelForm["consultation"].disabled = false;
      personnelForm["reports"].disabled = false;
      personnelForm["rp_consultation"].disabled = false;
      personnelForm["rp_individual"].disabled = false;
      personnelForm["rp_medicine"].disabled = false;
      personnelForm["rp_registered"].disabled = false;
      personnelForm["rp_health"].disabled = false;
      personnelForm["inventory"].disabled = false;
      personnelForm["inv_medicine"].disabled = false;
      personnelForm["inv_equipment"].disabled = false;
      personnelForm["inv_stocks"].disabled = false;
      personnelForm["management"].disabled = false;
      personnelForm["mn_students"].disabled = false;
      personnelForm["mn_faculty"].disabled = false;
      personnelForm["mn_employee"].disabled = false;
      personnelForm["mn_personnel"].disabled = false;
      personnelForm["setup"].disabled = false;
      personnelForm["st_college"].disabled = false;
      personnelForm["st_course"].disabled = false;
      personnelForm["st_office"].disabled = false;
      personnelForm["st_illness"].disabled = false;
      personnelForm["st_nurse"].disabled = false;

      personnelForm["activate"].checked = true;
      personnelForm["consultation"].checked = false;
      personnelForm["reports"].checked = false;
      personnelForm["rp_consultation"].checked = false;
      personnelForm["rp_individual"].checked = false;
      personnelForm["rp_medicine"].checked = false;
      personnelForm["rp_registered"].checked = false;
      personnelForm["rp_health"].checked = false;
      personnelForm["inventory"].checked = false;
      personnelForm["inv_medicine"].checked = false;
      personnelForm["inv_equipment"].checked = false;
      personnelForm["inv_stocks"].checked = false;
      personnelForm["management"].checked = false;
      personnelForm["mn_students"].checked = false;
      personnelForm["mn_faculty"].checked = false;
      personnelForm["mn_employee"].checked = false;
      personnelForm["mn_personnel"].checked = false;
      personnelForm["setup"].checked = false;
      personnelForm["st_college"].checked = false;
      personnelForm["st_course"].checked = false;
      personnelForm["st_office"].checked = false;
      personnelForm["st_illness"].checked = false;
      personnelForm["st_nurse"].checked = false;
    });
  }

  let personnelForm = document.getElementById("personnelForm");
  if (personnelForm) {
    personnelForm.addEventListener("submit", async (e) => {
      e.preventDefault();

      personnelForm["username"].disabled = false;
      personnelForm["password"].disabled = false;
      personnelForm["lname"].disabled = false;
      personnelForm["fname"].disabled = false;
      personnelForm["mname"].disabled = false;
      personnelForm["gender"].disabled = false;
      personnelForm["usertype"].disabled = false;

      let data = new FormData();
      for (const i of new FormData(personnelForm)) {
        data.append(i[0], i[1]);
      }
      // data.append("save_personnel", 1);
      personnelForm["savePersonnel"].disabled = true;
      const path = "../ajax/admin/post.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();
    
          if (data == "ok") {
            alert("success", "top", "Personnel save successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else if (data == "update") {
            alert("success", "top", "Personnel update successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          } else if (data == "exist") {
            alert("warning", "top", "Personnel already exist.");
            setTimeout(() => {
              personnelForm["savePersonnel"].disabled = false;
              personnelForm["username"].disabled = true;
              personnelForm["password"].disabled = true;
            }, 1000);
          } else {
            alert("error", "top", "Something went wrong.");
            setTimeout(() => {
              personnelForm["savePersonnel"].disabled = false;
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }
  let mstocks_form = document.querySelector("#mstocks_form");
  if (mstocks_form) {
    mstocks_form.addEventListener("submit", async (e) => {
      e.preventDefault();

      mstocks_form["tissued"].disabled = false;
      mstocks_form["tavailable"].disabled = false;

      let data = new FormData();
      for (const i of new FormData(mstocks_form)) {
        data.append(i[0], i[1]);
      }

      const path = "../ajax/admin/post.php";
      await fetch(path, {
        method: "POST",
        body: data,
      })
        .then((response) => {
          return response.text();
        })
        .then((data) => {
          data = data.trim();

          if (data == "ok") {
            alert("success", "top", "Medicine save successfully.");
            setTimeout(() => {
              location.reload();
            }, 1000);
          }
        })
        .catch(console.error);
    });
  }

  function equipFunc() {
    let createEquipment = document.querySelector("#createEquipment");
    if (createEquipment) {
      createEquipment.addEventListener("submit", async (e) => {
        e.preventDefault();

        let article = createEquipment["article"];
        let desc = createEquipment["desc"];
        let pro_num = createEquipment["pro_num"];
        let unit_measure = createEquipment["unit_measure"];
        let unit_val = createEquipment["unit_val"];
        let qty_pro = createEquipment["qty_pro"];

        let articleError = document.getElementById("articleError");
        let descError = document.getElementById("descError");
        let pronumError = document.getElementById("pronumError");
        let umeasureError = document.getElementById("umeasureError");
        let uvalueError = document.getElementById("uvalueError");
        let qproError = document.getElementById("qproError");

        let equipmentButton = createEquipment["equipmentButton"];

        if (article.value === "") {
          showErrorMessage(articleError, article, "Input is required.");
          return false;
        } else {
          hideErrorMessage(articleError, article);
        }

        if (desc.value === "") {
          showErrorMessage(descError, desc, "Input is required.");
          return false;
        } else {
          hideErrorMessage(descError, desc);
        }

        if (pro_num.value === "") {
          showErrorMessage(pronumError, pro_num, "Input is required.");
          return false;
        } else {
          hideErrorMessage(pronumError, pro_num);
        }

        if (unit_measure.value === "") {
          showErrorMessage(umeasureError, unit_measure, "Input is required.");
          return false;
        } else {
          hideErrorMessage(umeasureError, unit_measure);
        }

        if (unit_val.value === "") {
          showErrorMessage(uvalueError, unit_val, "Input is required.");
          return false;
        } else {
          hideErrorMessage(uvalueError, unit_val);
        }

        if (!checkNum(unit_val.value)) {
          showErrorMessage(uvalueError, unit_val, "Invalid number.");
          return false;
        } else {
          hideErrorMessage(uvalueError, unit_val);
        }

        if (qty_pro.value === "") {
          showErrorMessage(qproError, qty_pro, "Input is required.");
          return false;
        } else {
          hideErrorMessage(qproError, qty_pro);
        }

        let data = new FormData();
        for (const i of new FormData(createEquipment)) {
          data.append(i[0], i[1]);
        }

        equipmentButton.disabled = true;

        const path = "../ajax/admin/post.php";
        await fetch(path, {
          method: "POST",
          body: data,
        })
          .then((response) => {
            return response.text();
          })
          .then((data) => {
            data = data.trim();
      
            if (data == "ok") {
              alert("success", "top", "Equipment save successfully.");
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else if (data == "exist") {
              alert("warning", "top", "Equipment already exist.");
              setTimeout(() => {
                equipmentButton.disabled = false;
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                equipmentButton.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }

    let editEquipment = document.querySelector("#editEquipment");
    if (editEquipment) {
      editEquipment.addEventListener("submit", async (e) => {
        e.preventDefault();

        let article = editEquipment["article"];
        let desc = editEquipment["desc"];
        let pro_num = editEquipment["pro_num"];
        let unit_measure = editEquipment["unit_measure"];
        let unit_val = editEquipment["unit_val"];
        let qty_pro = editEquipment["qty_pro"];

        let articleError = document.getElementById("articleError");
        let descError = document.getElementById("descError");
        let pronumError = document.getElementById("pronumError");
        let umeasureError = document.getElementById("umeasureError");
        let uvalueError = document.getElementById("uvalueError");
        let qproError = document.getElementById("qproError");

        let equipmentButton = editEquipment["equipmentButton"];

        if (article.value === "") {
          showErrorMessage(articleError, article, "Input is required.");
          return false;
        } else {
          hideErrorMessage(articleError, article);
        }

        if (desc.value === "") {
          showErrorMessage(descError, desc, "Input is required.");
          return false;
        } else {
          hideErrorMessage(descError, desc);
        }

        if (pro_num.value === "") {
          showErrorMessage(pronumError, pro_num, "Input is required.");
          return false;
        } else {
          hideErrorMessage(pronumError, pro_num);
        }

        if (unit_measure.value === "") {
          showErrorMessage(umeasureError, unit_measure, "Input is required.");
          return false;
        } else {
          hideErrorMessage(umeasureError, unit_measure);
        }

        if (unit_val.value === "") {
          showErrorMessage(uvalueError, unit_val, "Input is required.");
          return false;
        } else {
          hideErrorMessage(uvalueError, unit_val);
        }

        if (!checkNum(unit_val.value)) {
          showErrorMessage(uvalueError, unit_val, "Invalid number.");
          return false;
        } else {
          hideErrorMessage(uvalueError, unit_val);
        }

        if (qty_pro.value === "") {
          showErrorMessage(qproError, qty_pro, "Input is required.");
          return false;
        } else {
          hideErrorMessage(qproError, qty_pro);
        }

        equipmentButton.disabled = true;

        let data = new FormData();
        for (const i of new FormData(editEquipment)) {
          data.append(i[0], i[1]);
        }

        const path = "../ajax/admin/update.php";
        await fetch(path, {
          method: "POST",
          body: data,
        })
          .then((response) => {
            return response.text();
          })
          .then((data) => {
            data = data.trim();
       
            if (data == "ok") {
              alert("success", "top", "Equipment updated successfully.");
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                equipmentButton.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }
  }

  function courseFunc() {
    let courseCollege = document.getElementById("courseCollege");
    if (courseCollege) {
      courseCollege.addEventListener("change", (id) => {
        let val = id.target.value;
        let college = val.split("/");

        let cdata = new FormData();
        cdata.append("get_college", "item");
        cdata.append("college_id", college[1]);

        const path = "../ajax/user/get.php";
        fetch(path, {
          method: "POST",
          body: cdata,
        })
          .then((response) => {
            return response.text();
          })
          .then((data) => {
            data = JSON.parse(data);
            let createStudent = document.getElementById("createStudent");
            let college = createStudent["college"];
            college.value = data.college_id;
          })
          .catch(console.error);
      });
    }
  }

  function createStud() {
    let createstudent = document.querySelector("#createStudent");

    if (createstudent) {
      createstudent.addEventListener("submit", async (e) => {
        e.preventDefault();

        let idnum = createstudent["idnum"];
        let fname = createstudent["fname"];
        let lname = createstudent["lname"];
        let mname = createstudent["mname"];
        let sex = createstudent["sex"];
        let age = createstudent["age"];
        let course = createstudent["course"];
        let college = createstudent["college"];
        let email = createstudent["email"];
        let password = createstudent["password"];

        let studentButton = createstudent["studentButton"];

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
          showErrorMessage(
            sidnumError,
            idnum,
            "Invalid ID number, ex. 0000-0000"
          );
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

        if (email.value !== "" && !isValidEmail(email.value)) {
          showErrorMessage(semailError, email, "Invalid email address.");
          return false;
        } else {
          hideErrorMessage(semailError, email);
        }

        if (password.value === "") {
          showErrorMessage(spasswordError, password, "Input is required.");
          return false;
        } else {
          hideErrorMessage(spasswordError, password);
        }

        studentButton.disabled = true;

        let data = new FormData();
        for (const i of new FormData(createstudent)) {
          data.append(i[0], i[1]);
        }
        data.append("email", email.value);
        data.append("student_registration", "1");

        const path = "../ajax/user/post.php";
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
                studentButton.disabled = false;
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                studentButton.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }

    let updateStudent = document.querySelector("#updateStudent");
    if (updateStudent) {
      updateStudent.addEventListener("submit", async (e) => {
        e.preventDefault();

        let idnum = updateStudent["idnum"];
        let fname = updateStudent["fname"];
        let lname = updateStudent["lname"];
        let mname = updateStudent["mname"];
        let sex = updateStudent["sex"];
        let age = updateStudent["age"];
        let course = updateStudent["course"];
        let college = updateStudent["college"];
        let email = updateStudent["email"];
        let password = updateStudent["password"];

        let studentButton = updateStudent["studentButton"];

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
          showErrorMessage(
            sidnumError,
            idnum,
            "Invalid ID number, ex. 0000-0000"
          );
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

        if (email.value !== "" && !isValidEmail(email.value)) {
          showErrorMessage(semailError, email, "Invalid email address.");
          return false;
        } else {
          hideErrorMessage(semailError, email);
        }

        if (password.value === "") {
          showErrorMessage(spasswordError, password, "Input is required.");
          return false;
        } else {
          hideErrorMessage(spasswordError, password);
        }

        let data = new FormData();
        for (const i of new FormData(updateStudent)) {
          data.append(i[0], i[1]);
        }
        data.append("email", email.value);
        data.append("update_registration", "1");

        const path = "../ajax/admin/update.php";
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
              alert("success", "top", "Update successfully.");
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                studentButton.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }
  }
  function createFac() {
    let createFaculty = document.querySelector("#createFaculty");

    if (createFaculty) {
      createFaculty.addEventListener("submit", async (e) => {
        e.preventDefault();

        let idnum = createFaculty["idnum"];
        let fname = createFaculty["fname"];
        let lname = createFaculty["lname"];
        let mname = createFaculty["mname"];
        let sex = createFaculty["sex"];
        let age = createFaculty["age"];
        let course = createFaculty["course"];
        let college = createFaculty["college"];
        let email = createFaculty["email"];
        let password = createFaculty["password"];

        let button = createFaculty["facultyButton"];

        let idnumError = document.getElementById("fidnumError");
        let fnameError = document.getElementById("ffnameError");
        let lnameError = document.getElementById("flnameError");
        let mnameError = document.getElementById("fmnameError");
        let sexError = document.getElementById("fsexError");
        let ageError = document.getElementById("fageError");
        let collegeError = document.getElementById("fcollegeError");
        let emailError = document.getElementById("femailError");
        let passwordError = document.getElementById("fpasswordError");

        if (idnum.value === "") {
          showErrorMessage(idnumError, idnum, "Input is required.");
          return false;
        } else if (!isFacEmID(idnum.value)) {
          showErrorMessage(
            idnumError,
            idnum,
            "Invalid ID number, ex. 000000-000000"
          );
          return false;
        } else {
          hideErrorMessage(idnumError, idnum);
        }

        if (fname.value === "") {
          showErrorMessage(fnameError, fname, "Input is required.");
          return false;
        } else if (!isString(fname.value)) {
          showErrorMessage(
            fnameError,
            fname,
            "Invalid input, only strings allowed,  and min 2 and max 50 characters."
          );
          return false;
        } else {
          hideErrorMessage(fnameError, fname);
        }

        if (lname.value === "") {
          showErrorMessage(lnameError, lname, "Input is required.");
          return false;
        } else if (!isString(lname.value)) {
          showErrorMessage(
            lnameError,
            lname,
            "Invalid input, only strings allowed, and min 2 and max 50 characters."
          );
          return false;
        } else {
          hideErrorMessage(lnameError, lname);
        }

        if (!isValidMiddleName(mname.value)) {
          showErrorMessage(
            mnameError,
            lname,
            "Invalid input, only strings allowed, and max 50 characters"
          );
          return false;
        } else {
          hideErrorMessage(mnameError, lname);
        }

        if (sex.value === "") {
          showErrorMessage(sexError, sex, "Input is required.");
          return false;
        } else {
          hideErrorMessage(sexError, sex);
        }

        if (age.value === "") {
          showErrorMessage(ageError, age, "Input is required.");
          return false;
        } else if (!isValidAge(age.value)) {
          showErrorMessage(
            ageError,
            age,
            "Invalid age. Only numbers are allowed. Age must be at least 8 years old and should not exceed."
          );
          return false;
        }
        {
          hideErrorMessage(ageError, age);
        }

        if (college.value === "") {
          showErrorMessage(collegeError, college, "Input is required.");
          return false;
        } else {
          hideErrorMessage(collegeError, college);
        }

        if (email.value !== "" && !isValidEmail(email.value)) {
          showErrorMessage(emailError, email, "Invalid email address.");
          return false;
        } else {
          hideErrorMessage(emailError, email);
        }

        if (password.value === "") {
          showErrorMessage(passwordError, password, "Input is required.");
          return false;
        } else {
          hideErrorMessage(passwordError, password);
        }

        button.disabled = true;

        let data = new FormData();
        for (const i of new FormData(createFaculty)) {
          data.append(i[0], i[1]);
        }
        data.append("email", email.value);
        data.append("faculty_registration", "1");

        const path = "../ajax/user/post.php";
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
                button.disabled = false;
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                button.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }

    let updateFaculty = document.querySelector("#updateFaculty");
    if (updateFaculty) {
      updateFaculty.addEventListener("submit", async (e) => {
        e.preventDefault();

        let idnum = updateFaculty["idnum"];
        let fname = updateFaculty["fname"];
        let lname = updateFaculty["lname"];
        let mname = updateFaculty["mname"];
        let sex = updateFaculty["sex"];
        let age = updateFaculty["age"];
        let college = updateFaculty["college"];
        let email = updateFaculty["email"];
        let password = updateFaculty["password"];

        let studentButton = updateFaculty["studentButton"];

        let sidnumError = document.getElementById("sidnumError");
        let sfnameError = document.getElementById("sfnameError");
        let slnameError = document.getElementById("slnameError");
        let smnameError = document.getElementById("smnameError");
        let ssexError = document.getElementById("ssexError");
        let sageError = document.getElementById("sageError");

        let scollegeError = document.getElementById("scollegeError");
        let semailError = document.getElementById("semailError");
        let spasswordError = document.getElementById("spasswordError");

        if (idnum.value === "") {
          showErrorMessage(sidnumError, idnum, "Input is required.");
          return false;
        } else if (!isStudentID(idnum.value)) {
          showErrorMessage(
            sidnumError,
            idnum,
            "Invalid ID number, ex. 0000-0000"
          );
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

        if (college.value === "") {
          showErrorMessage(scollegeError, college, "Input is required.");
          return false;
        } else {
          hideErrorMessage(scollegeError, college);
        }

        if (email.value !== "" && !isValidEmail(email.value)) {
          showErrorMessage(semailError, email, "Invalid email address.");
          return false;
        } else {
          hideErrorMessage(semailError, email);
        }

        if (password.value === "") {
          showErrorMessage(spasswordError, password, "Input is required.");
          return false;
        } else {
          hideErrorMessage(spasswordError, password);
        }

        let data = new FormData();
        for (const i of new FormData(updateFaculty)) {
          data.append(i[0], i[1]);
        }
        data.append("email", email.value);
        data.append("faculty_update_registration", "1");

        const path = "../ajax/admin/update.php";
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
              alert("success", "top", "Update successfully.");
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                studentButton.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }
  }
  function createEmp() {
    let createEmployee = document.querySelector("#createEmployee");

    if (createEmployee) {
      createEmployee.addEventListener("submit", async (e) => {
        e.preventDefault();

        let idnum = createEmployee["idnum"];
        let fname = createEmployee["fname"];
        let lname = createEmployee["lname"];
        let mname = createEmployee["mname"];
        let sex = createEmployee["sex"];
        let age = createEmployee["age"];
        let office = createEmployee["office"];
        let position = createEmployee["position"];
        let email = createEmployee["email"];
        let password = createEmployee["password"];

        let button = createEmployee["employeeButton"];

        let idnumError = document.getElementById("eidnumError");
        let fnameError = document.getElementById("efnameError");
        let lnameError = document.getElementById("elnameError");
        let mnameError = document.getElementById("emnameError");
        let sexError = document.getElementById("esexError");
        let ageError = document.getElementById("eageError");
        let eofficeError = document.getElementById("eofficeError");
        let epositionError = document.getElementById("epositionError");
        let emailError = document.getElementById("eemailError");
        let passwordError = document.getElementById("epasswordError");

        if (idnum.value === "") {
          showErrorMessage(idnumError, idnum, "Input is required.");
          return false;
        } else if (!isFacEmID(idnum.value)) {
          showErrorMessage(
            idnumError,
            idnum,
            "Invalid ID number, ex. 000000-000000"
          );
          return false;
        } else {
          hideErrorMessage(idnumError, idnum);
        }

        if (fname.value === "") {
          showErrorMessage(fnameError, fname, "Input is required.");
          return false;
        } else if (!isString(fname.value)) {
          showErrorMessage(
            fnameError,
            fname,
            "Invalid input, only strings allowed,  and min 2 and max 50 characters."
          );
          return false;
        } else {
          hideErrorMessage(fnameError, fname);
        }

        if (lname.value === "") {
          showErrorMessage(lnameError, lname, "Input is required.");
          return false;
        } else if (!isString(lname.value)) {
          showErrorMessage(
            lnameError,
            lname,
            "Invalid input, only strings allowed, and min 2 and max 50 characters."
          );
          return false;
        } else {
          hideErrorMessage(lnameError, lname);
        }

        if (!isValidMiddleName(mname.value)) {
          showErrorMessage(
            mnameError,
            lname,
            "Invalid input, only strings allowed, and max 50 characters"
          );
          return false;
        } else {
          hideErrorMessage(mnameError, lname);
        }

        if (sex.value === "") {
          showErrorMessage(sexError, sex, "Input is required.");
          return false;
        } else {
          hideErrorMessage(sexError, sex);
        }

        if (age.value === "") {
          showErrorMessage(ageError, age, "Input is required.");
          return false;
        } else if (!isValidAge(age.value)) {
          showErrorMessage(
            ageError,
            age,
            "Invalid age. Only numbers are allowed. Age must be at least 8 years old and should not exceed."
          );
          return false;
        }
        {
          hideErrorMessage(ageError, age);
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

        if (email.value !== "" && !isValidEmail(email.value)) {
          showErrorMessage(emailError, email, "Invalid email address.");
          return false;
        } else {
          hideErrorMessage(emailError, email);
        }

        if (password.value === "") {
          showErrorMessage(passwordError, password, "Input is required.");
          return false;
        } else {
          hideErrorMessage(passwordError, password);
        }

        button.disabled = true;

        let data = new FormData();
        for (const i of new FormData(createEmployee)) {
          data.append(i[0], i[1]);
        }
        data.append("email", email.value);
        data.append("employee_registration", "1");

        const path = "../ajax/user/post.php";
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
                button.disabled = false;
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                button.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }

    let updateEmployee = document.querySelector("#updateEmployee");
    if (updateEmployee) {
      updateEmployee.addEventListener("submit", async (e) => {
        e.preventDefault();

        let idnum = updateEmployee["idnum"];
        let fname = updateEmployee["fname"];
        let lname = updateEmployee["lname"];
        let mname = updateEmployee["mname"];
        let sex = updateEmployee["sex"];
        let age = updateEmployee["age"];
        let office = updateEmployee["office"];
        let position = updateEmployee["position"];
        let email = updateEmployee["email"];
        let password = updateEmployee["password"];

        let studentButton = updateEmployee["studentButton"];

        let sidnumError = document.getElementById("sidnumError");
        let sfnameError = document.getElementById("sfnameError");
        let slnameError = document.getElementById("slnameError");
        let smnameError = document.getElementById("smnameError");
        let ssexError = document.getElementById("ssexError");
        let sageError = document.getElementById("sageError");

        let eofficeError = document.getElementById("eofficeError");
        let epositionError = document.getElementById("epositionError");
        let semailError = document.getElementById("semailError");
        let spasswordError = document.getElementById("spasswordError");

        if (idnum.value === "") {
          showErrorMessage(sidnumError, idnum, "Input is required.");
          return false;
        } else if (!isStudentID(idnum.value)) {
          showErrorMessage(
            sidnumError,
            idnum,
            "Invalid ID number, ex. 0000-0000"
          );
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

        if (email.value !== "" && !isValidEmail(email.value)) {
          showErrorMessage(semailError, email, "Invalid email address.");
          return false;
        } else {
          hideErrorMessage(semailError, email);
        }

        if (password.value === "") {
          showErrorMessage(spasswordError, password, "Input is required.");
          return false;
        } else {
          hideErrorMessage(spasswordError, password);
        }

        let data = new FormData();
        for (const i of new FormData(updateEmployee)) {
          data.append(i[0], i[1]);
        }
        data.append("email", email.value);
        data.append("employee_update_registration", "1");

        const path = "../ajax/admin/update.php";
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
              alert("success", "top", "Update successfully.");
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                studentButton.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }
  }
  // consultation
  function consFunc() {
    let consultationForm = document.getElementById("consultationForm");
    if (consultationForm) {
      consultationForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        consultationForm["cdate"].disabled = false;
        consultationForm["csemester"].disabled = false;
        consultationForm["cschool_year"].disabled = false;
        consultationForm["ctime"].disabled = false;

        let cdate = consultationForm["cdate"];
        let csemester = consultationForm["csemester"];
        let cschool_year = consultationForm["cschool_year"];
        let ctime = consultationForm["ctime"];
        let ccomplaint = consultationForm["ccomplaint"];
        let ctaken = consultationForm["ctaken"];
        let cremark = consultationForm["cremark"];
        let cconsultans = consultationForm["cconsultans"];

        let cdateError = document.getElementById("cdateError");
        let csemesterError = document.getElementById("csemesterError");
        let cschool_yearError = document.getElementById("cschool_yearError");
        let ctimeError = document.getElementById("ctimeError");
        let ccomplaintError = document.getElementById("ccomplaintError");
        let ctakenError = document.getElementById("ctakenError");
        let cremarkError = document.getElementById("cremarkError");
        let cconsultansError = document.getElementById("cconsultansError");

        let patient_id = document.getElementById("patient_id");
        let csave = consultationForm["csave"];

        if (cdate.value === "") {
          showErrorMessage(cdateError, cdate, "");
          consultationForm["cdate"].disabled = true;
          consultationForm["csemester"].disabled = true;
          consultationForm["cschool_year"].disabled = true;
          consultationForm["ctime"].disabled = true;
          return false;
        } else {
          hideErrorMessage(cdateError, cdate);
        }

        if (csemester.value === "") {
          showErrorMessage(csemesterError, csemester, "");
          consultationForm["cdate"].disabled = true;
          consultationForm["csemester"].disabled = true;
          consultationForm["cschool_year"].disabled = true;
          consultationForm["ctime"].disabled = true;
          return false;
        } else {
          hideErrorMessage(csemesterError, csemester);
        }

        if (cschool_year.value === "") {
          showErrorMessage(cschool_yearError, cschool_year, "");
          consultationForm["cdate"].disabled = true;
          consultationForm["csemester"].disabled = true;
          consultationForm["cschool_year"].disabled = true;
          consultationForm["ctime"].disabled = true;
          return false;
        } else {
          hideErrorMessage(cschool_yearError, cschool_year);
        }

        if (ctime.value === "") {
          showErrorMessage(ctimeError, ctime, "");
          consultationForm["cdate"].disabled = true;
          consultationForm["csemester"].disabled = true;
          consultationForm["cschool_year"].disabled = true;
          consultationForm["ctime"].disabled = true;
          return false;
        } else {
          hideErrorMessage(ctimeError, ctime);
        }

        if (ccomplaint.value === "") {
          showErrorMessage(ccomplaintError, ccomplaint, "");
          consultationForm["cdate"].disabled = true;
          consultationForm["csemester"].disabled = true;
          consultationForm["cschool_year"].disabled = true;
          consultationForm["ctime"].disabled = true;
          return false;
        } else {
          hideErrorMessage(ccomplaintError, ccomplaint);
        }

        if (ctaken.value === "") {
          showErrorMessage(ctakenError, ctaken, "");
          consultationForm["cdate"].disabled = true;
          consultationForm["csemester"].disabled = true;
          consultationForm["cschool_year"].disabled = true;
          consultationForm["ctime"].disabled = true;
          return false;
        } else {
          hideErrorMessage(ctakenError, ctaken);
        }

        if (cremark.value === "") {
          showErrorMessage(cremarkError, cremark, "");
          consultationForm["cdate"].disabled = true;
          consultationForm["csemester"].disabled = true;
          consultationForm["cschool_year"].disabled = true;
          consultationForm["ctime"].disabled = true;
          return false;
        } else {
          hideErrorMessage(cremarkError, cremark);
        }

        if (cconsultans.value === "") {
          showErrorMessage(cconsultansError, cconsultans, "");
          consultationForm["cdate"].disabled = true;
          consultationForm["csemester"].disabled = true;
          consultationForm["cschool_year"].disabled = true;
          consultationForm["ctime"].disabled = true;
          return false;
        } else {
          hideErrorMessage(cconsultansError, cconsultans);
        }

        csave.disabled = true;
        var table = document.getElementById("cmedicineTable");
        var tbody = table.getElementsByTagName("tbody")[0];
        var medicineValues = [];
        var medicineHelper = [];

        for (var i = 0; i < tbody.rows.length; i++) {
          var medicineCell = tbody.rows[i].cells[1];
          var medicineQtyCell = tbody.rows[i].cells[2];
          var medicineIDCell = tbody.rows[i].cells[3];
          var medicineValue = medicineCell.textContent;
          var medicineQty = medicineQtyCell.textContent;
          var medicineID = medicineIDCell.textContent;
          var entry = "(" + medicineValue + ", " + " #" + medicineQty + ")";
          medicineValues.push(entry);
          medicineHelper.push(medicineQty + "/" + medicineID);
        }

        var formattedString = medicineValues.join("; ");

        let data = new FormData();
        for (const i of new FormData(consultationForm)) {
          data.append(i[0], i[1]);
        }
        data.append("patient_id", patient_id.value);
        data.append("medicine", formattedString);
        data.append("medicine_helper", JSON.stringify(medicineHelper));
        data.append("saveConsult", "1");

        const path = "../ajax/admin/post.php";
        await fetch(path, {
          method: "POST",
          body: data,
        })
          .then((response) => {
            return response.text();
          })
          .then((data) => {
            data = data.trim();
        
            
            if (data == "ok") {
              alert("success", "top", "Save successfully.");
              setTimeout(() => {
                location.reload();
              }, 1000);
            } else {
              alert("error", "top", "Something went wrong.");
              setTimeout(() => {
                csave.disabled = false;
              }, 1000);
            }
          })
          .catch(console.error);
      });
    }
  }

  // consultation helper
  const idRadio = document.querySelector('input[value="id"]');
  const lastnameRadio = document.querySelector('input[value="lastname"]');
  const searchInput = document.getElementById("searchInput");
  var consulTables = $("#consulTable").DataTable();

  function updatePlaceholder() {
    const form = document.getElementById("searchForm");
    if (idRadio) {
      if (idRadio.checked) {
        searchInput.placeholder = "Enter ID number";
        searchInput.value = "";
        form["seidnum"].value = "";
        form["sename"].value = "";
        form["seage"].value = "";
        form["segender"].value = "";
      } else if (lastnameRadio.checked) {
        searchInput.placeholder = "Enter Lastname";
        searchInput.value = "";
        form["seidnum"].value = "";
        form["sename"].value = "";
        form["seage"].value = "";
        form["segender"].value = "";
      }
    }
  }

  function handleInput() {
    const form = document.getElementById("searchForm");

    if (idRadio) {
      if (idRadio.checked) {
        const searchValue = searchInput.value;
        if (searchValue === "") {
          resetFormFields(form);
        } else {
          handleIdNumber(searchValue, form, consulTables);
        }
      } else if (lastnameRadio.checked) {
        const searchValue = searchInput.value;
        if (searchValue === "") {
          resetFormFields(form);
        } else {
          handleLastname(searchValue, form, consulTables);
        }
      } else {
        resetFormFields(form);
      }
    }
  }

  if (idRadio) {
    idRadio.addEventListener("change", updatePlaceholder);
  }
  if (lastnameRadio) {
    lastnameRadio.addEventListener("change", updatePlaceholder);
  }
  if (searchInput) {
    if (searchInput.value === "") {
      consulTables.column("1").search(0, true, false).draw();
    }
    searchInput.addEventListener("input", handleInput);
  }

  const studentField = document.getElementById("studentField");
  const facultyField = document.getElementById("facultyField");
  const employeeField = document.getElementById("employeeField");

  let statusProfile = document.getElementById("statusProfile");

  const handleIdNumber = async (value, form, consulTables) => {
    let data = new FormData();
    data.append("get_idnum", "item");
    data.append("idnum", value);

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

        if (data.patient_idno != undefined) {
          form["seidnum"].value = data.patient_idno;
          form[
            "sename"
          ].value = `${data.patient_fname} ${data.patient_lname} ${data.patient_mname}`;
          form["seage"].value = data.patient_age;
          form["segender"].value = data.patient_gender;
          form["patient_id"].value = data.patient_id;

          consulTables.column("1").search(data.patient_id, true, false).draw();

          if (data.patient_type == "student") {
            form["scollege"].value = data.patient_college_id;
            form["scourse"].value = data.patient_course_id;
          }

          if (data.patient_type == "faculty") {
            form["fcollege"].value = data.patient_college_id;
          }

          if (data.patient_type == "employee") {
            form["eoffice"].value = data.patient_office_id;
            form["eposition"].value = data.patient_position;
          }
        } else {
          form["seidnum"].value = "";
          form["sename"].value = "";
          form["seage"].value = "";
          form["segender"].value = "";
          toggleFields("");
        }
        let patient_type = data.patient_type;
        updateStatusProfile(patient_type);
        toggleFields(data.patient_type);
      })
      .catch(console.error);
  };

  const handleLastname = async (value, form, consulTables) => {
    let data = new FormData();
    data.append("get_lastname", "item");
    data.append("lastname", value);
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
        if (data.patient_idno != undefined) {
          form["seidnum"].value = data.patient_idno;
          form[
            "sename"
          ].value = `${data.patient_fname} ${data.patient_lname} ${data.patient_mname}`;
          form["seage"].value = data.patient_age;
          form["segender"].value = data.patient_gender;
          form["patient_id"].value = data.patient_id;

          consulTables.column("1").search(data.patient_id, true, false).draw();

          if (data.patient_type == "student") {
            form["scollege"].value = data.patient_college_id;
            form["scourse"].value = data.patient_course_id;
          }

          if (data.patient_type == "faculty") {
            form["fcollege"].value = data.patient_college_id;
          }

          if (data.patient_type == "employee") {
            form["eoffice"].value = data.patient_office_id;
            form["eposition"].value = data.patient_position;
          }
        } else {
          form["seidnum"].value = "";
          form["sename"].value = "";
          form["seage"].value = "";
          form["segender"].value = "";
          toggleFields("");
        }
        let patient_type = data.patient_type;
        updateStatusProfile(patient_type);
        toggleFields(data.patient_type);
      })
      .catch(console.error);
  };

  function resetFormFields(form) {
    consulTables.column("1").search("0", true, false).draw();

    form["seidnum"].value = "";
    form["sename"].value = "";
    form["seage"].value = "";
    form["segender"].value = "";
    form["scollege"].value = "";
    form["scourse"].value = "";
    form["fcollege"].value = "";
    form["eoffice"].value = "";
    form["eposition"].value = "";
    form["patient_id"].value = "";

    toggleFields("");
    updateStatusProfile("");
  }

  function updateStatusProfile(patientType) {
    if (patientType != "") {
      if (statusProfile) {
        statusProfile.innerText = `- ${patientType.toUpperCase()}`;
      }
    } else {
      if (statusProfile) {
        statusProfile.innerText = ``;
      }
    }
  }

  function toggleFields(status) {
    studentField.classList.toggle("d-none", status != "student");
    facultyField.classList.toggle("d-none", status != "faculty");
    employeeField.classList.toggle("d-none", status != "employee");
  }

  updatePlaceholder();

  // report
  const inv_idRadio = document.querySelector('input[value="invid"]');
  const inv_lastnameRadio = document.querySelector(
    'input[value="invlastname"]'
  );

  function updateInvPlaceholder() {
    const input = document.getElementById("indv-filter");
    if (inv_idRadio) {
      if (inv_idRadio.checked) {
        input.placeholder = "Enter ID number";
        input.value = "";
      } else if (inv_lastnameRadio.checked) {
        input.placeholder = "Enter Lastname";
        input.value = "";
      }
    }
  }

  if (inv_idRadio) {
    inv_idRadio.addEventListener("change", updateInvPlaceholder);
  }
  if (inv_lastnameRadio) {
    inv_lastnameRadio.addEventListener("change", updateInvPlaceholder);
  }

  updateInvPlaceholder();

  createEmp();
  createFac();
  equipFunc();
  medicinceFunc();
  consFunc();
  courseFunc();
  createStud();
});
