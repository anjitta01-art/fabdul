const form = document.getElementById("change-password-form");

const oldPassword = document.getElementById("oldPassword");
const newPassword = document.getElementById("newPassword");
const confirmPassword = document.getElementById("confirmPassword");

newPassword.addEventListener("blur", () => {
  validatePassword(newPassword.value, "password-error");
});

confirmPassword.addEventListener("blur", () => {
  validateConfirmPassword(newPassword.value, "confirm-error");
});

const ChangePwdBtn = document.getElementById("change-pwd-button");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  ChangePwdBtn.disabled = true;
  ChangePwdBtn.textContent = "Changing password...";

  const formData = new FormData();
  formData.append("oldPassword", oldPassword.value);
  formData.append("newPassword", newPassword.value);

  fetch("/fabdul/controller/user/change-password.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2500);
        form.reset();
      } else {
        showToast(data.message, "error");
      }
    })
    .catch((err) => {
      console.log("Error: ", err);
      showToast("An error occurred", "error");
    })
    .finally(() => {
      ChangePwdBtn.disabled = false;
      ChangePwdBtn.textContent = "Change Password";
    });
});
