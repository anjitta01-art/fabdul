const userId = new URLSearchParams(window.location.search).get("id");

const userNameEl = document.getElementById("user-name");
const userEmailEl = document.getElementById("user-email");
const userUsernameEl = document.getElementById("user-username");
const userPhoneEl = document.getElementById("user-phone");
const userRoleEl = document.getElementById("user-role");
const userStatusEl = document.getElementById("user-status");
const userDateEl = document.getElementById("user-date");
const userLastUpdatedEl = document.getElementById("user-last-updated");

const tableBody = document.getElementById("rent-history-table");
const noItem = document.getElementById("no-data");

document.addEventListener("DOMContentLoaded", () => {
  if (!userId) {
    showToast("Invalid user ID", "error");
    return;
  }

  // get user details
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

  // get user rent history
  fetch(`/fabdul/controller/admin/users/rents-history.php?id=${userId}`, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const items = data.data;
        if (items.length === 0) {
          noItem.classList.remove("hidden");
        } else {
          tableBody.innerHTML = "";
          noItem.classList.add("hidden");

          tableBody.innerHTML = "";
          items.forEach((item) => {
            const isReturned =
              item.returned_date != null ? "Returned" : "Not Returned";
            const styleReturned =
              item.returned_date != null
                ? "bg-blue-100/50 text-blue-800 text-sm font-semibold rounded-md w-max py-2 px-4"
                : "bg-red-100/50 text-red-800 text-sm font-semibold rounded-md w-max py-2 px-4";
            const row = document.createElement("tr");
            row.classList.add("hover:bg-gray-50", "transition", "text-sm");

            row.setAttribute("data-product-id", item.id);
            row.innerHTML = `
                    <td class="px-6 py-2 font-medium">${item.id}</td>
                    <td class="px-6 py-2">${item.product_name}</td>
                    <td class="px-6 py-2">${item.category}</td>
                    <td class="px-6 py-2">${formatDate(item.rent_date)}</td>
                    <td class="px-6 py-2">£${item.rent_price}</td>
                    <td class="px-6 py-2">${item.quantity}</td>
                    <td class="px-6 py-2">${item.review != null ? item.review : ""}</td>
                    <td class="px-6 py-2">${formatDate(item.return_date)}</td>
                    <td class="px-6 py-2">
                        <span class="px-2 py-1 rounded-full font-medium ${styleReturned}">
                            ${isReturned}
                        </span>
                    </td>
                `;
            tableBody.appendChild(row);
          });
        }
      } else {
        noItem.classList.remove("hidden");
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.error("Error fetching products:", error);
      showToast("An error occurred", "error", 2000);
    });
});
