const form = document.getElementById("add-user-form");

const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const email = document.getElementById("email");
const username = document.getElementById("username");
const phone = document.getElementById("phone");
const password = document.getElementById("password");
const role = document.getElementById("role");
const addUserBtn = document.getElementById("add-user-btn");

email.addEventListener("blur", function () {
  validateEmail(email.value.trim(), "email-error");
});

username.addEventListener("blur", function () {
  validateUsername(username.value.trim(), "username-error");
});

phone.addEventListener("blur", () => {
  validatePhoneNumber(phone.value.trim(), "phone-error");
});

form.addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData();
  formData.append("name", `${firstName.value} ${lastName.value}`);
  formData.append("email", email.value);
  formData.append("username", username.value);
  formData.append("phone", phone.value);
  formData.append("password", password.value);
  formData.append("role", role.value);

  if (
    email.value.trim() === "" ||
    username.value.trim() === "" ||
    password.value === ""
  ) {
    showToast("Please fill in all required fields.", "error", 2000);
    return;
  }

  addUserBtn.disabled = true;
  addUserBtn.textContent = "Adding User...";

  fetch("/fabdul/controller/admin/users/add-user.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2000);
        form.reset();
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      showToast("An error occurred. Please try again.", "error", 2000);
    })
    .finally(() => {
      addUserBtn.disabled = false;
      addUserBtn.textContent = "Add User";
    });
});
