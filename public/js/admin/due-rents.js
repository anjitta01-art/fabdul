const tableBody = document.getElementById("due-rents-table");
const noItem = document.getElementById("no-data");

document.addEventListener("DOMContentLoaded", () => {
  fetch(`/fabdul/controller/admin/products/due-rents.php`, {
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
          items.forEach((item, index) => {
            const row = document.createElement("tr");
            row.classList.add("hover:bg-gray-50", "transition", "text-sm");

            row.innerHTML = `
                    <td class="px-6 py-2 font-medium">${index + 1}</td>
                    <td class="px-6 py-2 whitespace-nowrap">${item.name}</td>
                    <td class="px-6 py-2 whitespace-nowrap">${item.phone}</td>
                    <td class="px-6 py-2 whitespace-nowrap">${item.email}</td>
                    <td class="px-6 py-2">${item.product_name}</td>
                    <td class="px-6 py-2 whitespace-nowrap">${formatDate(item.rent_date)}</td>
                    <td class="px-6 py-2">${item.quantity}</td>
                    <td class="px-6 py-2 whitespace-nowrap">${formatDate(item.return_date)}</td>
                    <td class="px-6 py-2 whitespace-nowrap">
                        <span class="px-2 py-1 rounded-full font-medium bg-red-100/50 text-red-800 text-sm font-semibold rounded-md w-max py-2 px-4">
                            ${item.due_days} days
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
