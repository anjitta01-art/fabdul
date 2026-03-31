const totalUsers = document.getElementById("totalUsers");
const totalEquipments = document.getElementById("totalEquipments");
const activeRentals = document.getElementById("activeRentals");
const revenue = document.getElementById("revenue");

document.addEventListener("DOMContentLoaded", () => {
  fetch("/fabdul/controller/admin/dashboard-info.php", {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const item = data.data;
        totalUsers.textContent = item.total_users;
        totalEquipments.textContent = item.total_equipment;
        activeRentals.textContent = item.active_rentals;

        const revenueValue = item.total_revenue;
        revenue.textContent =
          revenueValue > 1000
            ? `£${(revenueValue / 1000).toFixed(1)}k`
            : `£${revenueValue}`;
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.error("Error fetching messages:", error);
      showToast("An error occurred", "error", 2000);
    });
});
