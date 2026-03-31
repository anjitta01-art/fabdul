const tableBody = document.getElementById("messages-table");
const noDataRow = document.getElementById("no-data");

document.addEventListener("DOMContentLoaded", () => {
  fetch("/fabdul/controller/admin/messages.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const items = data.data;
        if (items.length === 0) {
          noDataRow.classList.remove("hidden");
        } else {
          tableBody.innerHTML = "";
          items.forEach((item, index) => {
            const row = document.createElement("tr");
            row.classList.add("hover:bg-gray-50", "transition", "text-sm");

            row.setAttribute("data-product-id", item.id);
            row.innerHTML = `
                    <td class="px-6 py-2 font-medium">${index + 1}</td>
                    <td class="px-6 py-2">${item.name}</td>
                    <td class="px-6 py-2">${item.email}</td>
                    <td class="px-6 py-2">${item.phone}</td>
                    <td class="px-6 py-2">${item.equipment}</td>
                    <td class="px-6 py-2">${item.message}</td>
                    <td class="px-6 py-2">${formatDate(item.created_at)}</td>
                `;
            tableBody.appendChild(row);
          });
        }
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.error("Error fetching messages:", error);
      showToast("An error occurred", "error", 2000);
    });
});
