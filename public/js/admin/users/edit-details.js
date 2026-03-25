const userId = new URLSearchParams(window.location.search).get("id");

const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const email = document.getElementById("email");
const phone = document.getElementById("phone");
const username = document.getElementById("username");
const role = document.getElementById("role");

document.addEventListener("DOMContentLoaded", () => {
  if (!userId) {
    showToast("Invalid user ID", "error");
    return;
  }

  fetch(`/fabdul/controller/admin/users/view-details.php?id=${userId}`)
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        firstName.value = data.data.name.split(" ")[0] || "";
        lastName.value = data.data.name.split(" ")[1] || "";
        email.value = data.data.email;
        phone.value = data.data.phone;
        username.value = data.data.username;
        role.value = data.data.role;
      } else {
        showToast(data.message, "error");
      }
    })
    .catch((error) => {
      console.error("Error fetching user details:", error);
      showToast("An error occurred while fetching user details.", "error");
    });
});

const editForm = document.getElementById("edit-user-form");
const updateBtn = document.getElementById("update-details-btn");

editForm.addEventListener("submit", (e) => {
  e.preventDefault();

  updateBtn.disabled = true;
  updateBtn.textContent = "Updating...";

  const formData = new FormData();
  formData.append("id", userId);
  formData.append("name", `${firstName.value.trim()} ${lastName.value.trim()}`);
  formData.append("email", email.value.trim());
  formData.append("phone", phone.value.trim());
  formData.append("username", username.value.trim());
  formData.append("role", role.value);

  fetch("/fabdul/controller/admin/users/edit-details.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2000);
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.log("Error updating user details:", error);
      showToast("An error occurred", "error");
    })
    .finally(() => {
      updateBtn.disabled = false;
      updateBtn.textContent = "Update Details";
    });
});
