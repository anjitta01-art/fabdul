const tableBody = document.getElementById("users-table");
const noDataRow = document.getElementById("no-data");

document.addEventListener("DOMContentLoaded", () => {
  fetch("/fabdul/controller/admin/users/get-all.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const items = data.data;
        if (items.length === 0) {
          noDataRow.classList.remove("hidden");
        } else {
          tableBody.innerHTML = "";
          items.forEach((item, index) => {
            const accActive =
              item.status === "active"
                ? "bg-green-100 text-green-800"
                : "bg-red-100 text-red-800";
            const row = document.createElement("tr");
            row.classList.add("hover:bg-gray-50", "transition", "text-sm");

            row.setAttribute("data-product-id", item.id);
            row.innerHTML = `
                    <td class="px-6 py-2 font-medium">${index + 1}</td>
                    <td class="px-6 py-2">${item.name}</td>
                    <td class="px-6 py-2">${item.email}</td>
                    <td class="px-6 py-2">${item.role}</td>
                    <td class="px-6 py-2">${formatDate(item.created_at)}</td>
                    <td class="px-6 py-2 space-x-2">
                        <a href="/fabdul/admin/users/view-more.php?id=${item.id}" class="bg-blue-500 text-white px-3 py-1.5 rounded-md text-sm font-medium hover:bg-blue-600 transition">
                            View More
                        </a>
                        <button type="button" class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-medium hover:bg-red-600 transition cursor-pointer" onclick="opendeleteModal(${item.id})">
                            Delete
                        </button>
                    </td>
                `;
            tableBody.appendChild(row);
          });
        }
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.error("Error fetching users:", error);
      showToast("An error occurred", "error", 2000);
    });
});

const deleteModal = document.getElementById("delete-modal");
const confirmDeleteBtn = document.getElementById("confirm-delete");
const cancelDeleteBtn = document.getElementById("cancel-delete");

let userIdtoDelete = null;

function opendeleteModal(userId) {
  userIdtoDelete = userId;
  deleteModal.classList.remove("hidden");
}

cancelDeleteBtn.addEventListener("click", () => {
  userIdtoDelete = null;
  deleteModal.classList.add("hidden");
});

confirmDeleteBtn.addEventListener("click", (e) => {
  e.preventDefault();

  deleteUser();
  userIdtoDelete = null;
  deleteModal.classList.add("hidden");
});

function deleteUser() {
  if (!userIdtoDelete) return;

  fetch(`/fabdul/controller/admin/users/delete-user.php?id=${userIdtoDelete}`, {
    method: "DELETE",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2000);
        const row = tableBody.querySelector(
          `tr[data-product-id='${userIdtoDelete}']`,
        );
        if (row) {
          row.remove();
        }

        if (tableBody.querySelectorAll("tr").length === 0) {
          noDataRow.classList.remove("hidden");
        }
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.error("Error deleting user:", error);
      showToast("An error occurred", "error", 2000);
    });
}
