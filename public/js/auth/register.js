const form = document.getElementById("register-form");

const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const email = document.getElementById("email");
const username = document.getElementById("username");
const phone = document.getElementById("phone");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirmPassword");

form.addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData();
  formData.append("name", `${firstName.value} ${lastName.value}`);
  formData.append("email", email.value);
  formData.append("username", username.value);
  formData.append("phone", phone.value);
  formData.append("password", password.value);
  formData.append("confirmPassword", confirmPassword.value);

  console.log("Form Data:", formData);

  // fetch('fabdul/controllers/auth/register.php', {
  //     method: 'POST',
  //     body: formData,
  // })
});
