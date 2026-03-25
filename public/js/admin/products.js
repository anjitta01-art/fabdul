const tableBody = document.getElementById("product-table-body");
const noDataRow = document.getElementById("no-data");

document.addEventListener("DOMContentLoaded", () => {
  fetch("/fabdul/controller/admin/products/all-items.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const items = data.data;
        if (items.length === 0) {
          noDataRow.classList.remove("hidden");
        } else {
          items.forEach((item) => {
            const row = document.createElement("tr");
            row.classList.add("hover:bg-gray-50", "transition");
            row.innerHTML = `
                    <td class="px-6 py-2 font-medium">${item.id}</td>
                    <td class="px-6 py-2">${item.product_name}</td>
                    <td class="px-6 py-2">${item.category}</td>
                    <td class="px-6 py-2 font-medium">£${item.price}</td>
                    <td class="px-6 py-2">
                        <span class="px-2 py-1 text-sm rounded-full bg-green-100 text-green-700">
                            ${item.quantity} in stock
                        </span>
                    </td>
                    <td class="px-6 py-2 space-x-2">
                        <a href="/fabdul/admin/products/edit.php?id=${item.id}" class="bg-blue-500 text-white px-3 py-1.5 rounded-md text-sm font-medium hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <button class="bg-red-500 text-white px-3 py-1.5 rounded-md text-sm font-medium hover:bg-red-600 transition cursor-pointer">
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
      console.error("Error fetching products:", error);
      showToast("An error occurred", "error", 2000);
    });
});
