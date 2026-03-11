const form = document.getElementById("register-form");

const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const email = document.getElementById("email");
const username = document.getElementById("username");
const phone = document.getElementById("phone");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirmPassword");
const role = document.getElementById("role");

email.addEventListener("blur", function () {
  validateEmail(email.value.trim(), "email-error");
});

username.addEventListener("blur", function () {
  validateUsername(username.value.trim(), "username-error");
});

confirmPassword.addEventListener("blur", function () {
  validateConfirmPassword(
    password.value,
    confirmPassword.value,
    "confirm-password-error",
  );
});

form.addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData();
  formData.append("name", `${firstName.value} ${lastName.value}`);
  formData.append("email", email.value);
  formData.append("username", username.value);
  formData.append("phone", phone.value);
  formData.append("password", password.value);
  formData.append("confirmPassword", confirmPassword.value);
  formData.append("role", role.value);

  fetch("/fabdul/controller/auth/register.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2000);
        window.setTimeout(() => {
          window.location.href = "/fabdul/auth/login.php";
        }, 2000);
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      showToast("An error occurred. Please try again.", "error", 2000);
    });
});
