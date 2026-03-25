const productList = document.getElementById("product-lists");
const noItem = document.getElementById("no-product");

document.addEventListener("DOMContentLoaded", () => {
  fetch("/fabdul/controller/rent/returned-items.php")
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
                      <span class="text-gray-600">Return Date:</span>
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
                    <span class="bg-blue-100 text-blue-700 text-sm font-semibold px-3 py-1.5 rounded-md">
                        Returned
                    </span>
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
