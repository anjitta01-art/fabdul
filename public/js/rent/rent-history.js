const productList = document.getElementById("product-lists");
const noItem = document.getElementById("no-product");

document.addEventListener("DOMContentLoaded", () => {
  fetch("/fabdul/controller/rent/history.php", {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const items = data.data;
        if (items.length === 0) {
          noItem.classList.remove("hidden");
        } else {
          productList.innerHTML = "";
          noItem.classList.add("hidden");

          items.forEach((item) => {
            let features = item.features ? item.features.split(",") : [];
            let returned = item.returned_date !== null;
            let content = `
              <li class="bg-white rounded-xl shadow-lg border border-[#eee]">
                <div class="relative rounded-t-xl overflow-hidden h-48">
                  <img src="/fabdul/images/uploads/${item.image}" 
                       alt="${item.product_name}" 
                       class="w-full h-48 object-cover rounded-t">
                  <div class="absolute inset-0 bg-black/30 z-10"></div>
                </div>

                <div>
                  <div class="px-4 pt-4 pb-4 space-y-2">
                    <p class="text-xs font-semibold text-purple-700">${item.category}</p>
                    <h3 class="text-lg font-bold">${item.product_name}</h3>

                    <ul class="space-y-2 text-sm text-[#535151] font-medium">
                      <li>${features[0] || ""}</li>
                      <li>${features[1] || ""}</li>
                      <li>${features[2] || ""}</li>
                    </ul>
                  </div>

                  <div class="px-4 pb-4 space-y-2 text-sm">
                    <div class="flex items-center gap-x-2">
                      <span class="text-gray-600">Rent Date:</span>
                      <span class=" font-semibold">${formatDate(item.rent_date)}</span>
                    </div>
                    <div class="flex items-center gap-x-2">
                      <span class="text-gray-600">Due Date:</span>
                      <span class=" font-semibold">${formatDate(item.return_date)}</span>
                    </div>
                    <div class="flex items-center gap-x-2">
                      <span class="text-gray-600">Total Pay:</span>
                      <span class="text-purple-700 font-semibold">£${item.total_pay}</span>
                    </div>
                  </div>
                  <div class="flex items-center justify-between px-4 py-4 border-t-2 border-[#bbb]">
                    <span class="text-xl font-bold">
                      £${item.rent_price} 
                      <span class="text-sm text-[#535151]">/day</span>
                    </span>
                    ${
                      returned
                        ? `<span class="bg-blue-100 text-blue-700 text-sm font-semibold px-3 py-1.5 rounded-md">
                            Returned
                        </span>`
                        : `<button class="bg-purple-700 text-white py-2 px-4 rounded-md hover:bg-purple-800 transition text-sm cursor-pointer" onclick="openReturnModal(${item.id})">
                            Return Item
                        </button>`
                    }
                  </div>
                </div>
              </li>
            `;
            productList.insertAdjacentHTML("beforeend", content);
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

const returnModal = document.getElementById("return-modal");
const confirmReturnBtn = document.getElementById("confirm-return");
const cancelReturnBtn = document.getElementById("cancel-return");

let rentReturnId = null;

function openReturnModal(rentId) {
  rentReturnId = rentId;
  returnModal.classList.remove("hidden");
}

cancelReturnBtn.addEventListener("click", () => {
  rentReturnId = null;
  returnModal.classList.add("hidden");
});

confirmReturnBtn.addEventListener("click", () => {
  returnProduct();
  rentReturnId = null;
  returnModal.classList.add("hidden");
});

function returnProduct() {
  if (!rentReturnId) return;

  fetch(`/fabdul/controller/rent/return-item.php?id=${rentReturnId}`, {
    method: "GET",
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2000);
        window.location.href = "/fabdul/equipments/returned-items.php";
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.error("Error deleting product:", error);
      showToast("An error occurred", "error", 2000);
    });
}
