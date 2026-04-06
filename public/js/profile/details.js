const fullname = document.getElementById("fullname");
const email = document.getElementById("email");
const phoneNumber = document.getElementById("phoneNumber");
const username = document.getElementById("username");
const role = document.getElementById("role");

document.addEventListener("DOMContentLoaded", () => {
  fetch("/fabdul/controller/user/profile-details.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const user = data.data;
        fullname.textContent = user.name;
        email.textContent = user.email;
        phoneNumber.textContent = user.phone;
        username.textContent = user.username;
        role.textContent = user.role;
      } else {
        showToast(data.message, "success", 2500);
      }
    })
    .catch((err) => {
      console.log("Error: ", err);
      showToast("An error occurred", "error");
    });
});
