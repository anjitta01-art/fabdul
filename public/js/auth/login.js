const form = document.getElementById("login-form");

const username = document.getElementById("username");
const password = document.getElementById("password");
const role = document.getElementById("role");
const loginError = document.getElementById("login-error");
const loginButton = document.getElementById("login-button");

form.addEventListener("submit", function (e) {
  e.preventDefault();

  if (username.value.trim() === "" || password.value === "") {
    loginError.textContent = "Please enter both username and password.";
    return;
  }

  const formData = new FormData();
  formData.append("username", username.value.trim());
  formData.append("password", password.value);
  formData.append("role", role.value);

  loginButton.disabled = true;
  loginButton.textContent = "Logging in...";

  fetch("/fabdul/controller/auth/login.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2000);
        window.localStorage.setItem("user", JSON.stringify(data.user));
        window.location.href = "/fabdul/index.php";
      } else {
        showToast(data.message, "error");
        loginButton.disabled = false;
        loginButton.textContent = "Log In";
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      loginButton.disabled = false;
      loginButton.textContent = "Log In";
    });
});
