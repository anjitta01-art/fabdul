const fullname = document.getElementById("fullname");
const email = document.getElementById("email");
const phoneNumber = document.getElementById("phoneNumber");
const username = document.getElementById("username");
const role = document.getElementById("role");

const tableBody = document.getElementById("rent-history-table");
const noItem = document.getElementById("no-data");

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

  // get user rent history
  fetch(`/fabdul/controller/admin/users/rents-history.php`)
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
