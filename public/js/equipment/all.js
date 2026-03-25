const productList = document.getElementById("product-lists");
const noProduct = document.getElementById("no-product");

document.addEventListener("DOMContentLoaded", () => {
  fetch("/fabdul/controller/admin/products/all-items.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const items = data.data;
        if (items.length === 0) {
          noProduct.classList.remove("hidden");
        } else {
          productList.innerHTML = "";
          noProduct.classList.add("hidden");
          items.forEach((item) => {
            let features = item.features ? item.features.split(",") : [];
            let content = `
                <li class="bg-white rounded-xl shadow-lg border border-[#eee]">
                    <div class="relative rounded-t-xl overflow-hidden h-48">
                        <img src="/fabdul/images/uploads/${item.image}" alt="${item.product_name}" class="w-full h-48 object-cover rounded-t">
                        <div class="absolute inset-0 bg-black/30 z-10"></div>
                    </div>
                    <div>
                        <div class="px-4 pt-4 pb-8 space-y-2">
                        <p class="text-xs font-semibold text-purple-700">${item.category}</p>
                        <h3 class="text-lg font-bold">${item.product_name}</h3>
                        <ul class="space-y-3 text-sm text-[#535151] font-medium">
                            <li>${features[0] || ""}</li>
                            <li>${features[1] || ""}</li>
                            <li>${features[2] || ""}</li>
                        </ul>
                        </div>
                        <div class="flex items-center justify-between px-4 py-4 border-t-2 border-[#bbb]">
                        <span class="text-xl font-bold">£${item.price}</span>
                        <a href="rent-item.php?id=${item.id}" class="bg-purple-700 text-white py-2 px-4 rounded-md hover:bg-purple-800 transition-colors text-sm font-medium">
                            Rent Now
                        </a>
                        </div>
                    </div>
                </li>
            `;
            productList.insertAdjacentHTML("beforeend", content);
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
