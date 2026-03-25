const userId = new URLSearchParams(window.location.search).get("id");

const userNameEl = document.getElementById("user-name");
const userEmailEl = document.getElementById("user-email");
const userUsernameEl = document.getElementById("user-username");
const userPhoneEl = document.getElementById("user-phone");
const userRoleEl = document.getElementById("user-role");
const userStatusEl = document.getElementById("user-status");
const userDateEl = document.getElementById("user-date");
const userLastUpdatedEl = document.getElementById("user-last-updated");

document.addEventListener("DOMContentLoaded", () => {
  if (!userId) {
    showToast("Invalid user ID", "error");
    return;
  }

  fetch(`/fabdul/controller/admin/users/view-details.php?id=${userId}`)
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        userNameEl.textContent = data.data.name;
        userEmailEl.textContent = data.data.email;
        userUsernameEl.textContent = data.data.username;
        userPhoneEl.textContent = data.data.phone;
        userRoleEl.textContent = data.data.role;
        userStatusEl.textContent = data.data.status;
        userDateEl.textContent = formatDate(data.data.created_at);
        userLastUpdatedEl.textContent = formatDate(data.data.update_at);
      } else {
        showToast(data.message, "error");
      }
    })
    .catch((error) => {
      console.error("Error fetching user details:", error);
      showToast("An error occurred while fetching user details.", "error");
    });
});
