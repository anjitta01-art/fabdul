const urlParams = new URLSearchParams(window.location.search);
const productId = urlParams.get("id");

const productName = document.getElementById("productName");
const category = document.getElementById("category");
const price = document.getElementById("price");
const quantity = document.getElementById("quantity");
const features = document.getElementById("features");
const image = document.getElementById("product_image");
const description = document.getElementById("description");
const lastUpdated = document.getElementById("last-updated");

document.addEventListener("DOMContentLoaded", () => {
  fetch(
    `/fabdul/controller/admin/products/get-item-details.php?id=${productId}`,
  )
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const product = data.data;
        productName.textContent = product.product_name;
        category.textContent = product.category;
        price.textContent = "£" + product.price;
        quantity.textContent = product.quantity;
        features.textContent = product.features;
        description.textContent = product.description;
        image.src = "/fabdul/images/uploads/" + product.image;
        lastUpdated.textContent = formatDate(product.updated_at);
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.log("Error fetching product details:", error);
      showToast("An error occurred", "error", 2000);
    });
});

const openModalBtn = document.getElementById("open-rent-modal");
const modal = document.getElementById("rent-modal");
const closeModalBtn = document.getElementById("close-rent-modal");

const modalName = document.getElementById("modal-name");
const modalPrice = document.getElementById("modal-price");
const modalImage = document.getElementById("modal-image");
const stockQuantity = document.getElementById("stock_quantity");

openModalBtn.addEventListener("click", () => {
  modal.classList.remove("hidden");

  modalName.textContent = productName.textContent;
  modalPrice.textContent = price.textContent;
  modalImage.src = image.src;
  stockQuantity.textContent = "(" + quantity.textContent + ")";
});

closeModalBtn.addEventListener("click", () => {
  modal.classList.add("hidden");
});

modal.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.classList.add("hidden");
  }
});

const form = document.getElementById("rent-form");
const rentDate = document.getElementById("rent-date");
const returnDate = document.getElementById("return-date");
const rentQuantity = document.getElementById("rent-quantity");

const rentBtn = document.getElementById("rent-btn");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  rentBtn.disable = true;
  rentBtn.textContent = "Placing rent...";

  const formData = new FormData();
  formData.append("rentDate", rentDate.value);
  formData.append("returnDate", returnDate.value);
  formData.append("rentQuantity", rentQuantity.value);
  formData.append("itemId", productId);

  fetch("/fabdul/controller/rent/rent-product.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2000);
        modal.classList.add("hidden");
        window.location.href = "/fabdul/equipments/rent-history.php";
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.log("Error placing rent:", error.message);
      showToast("An error occurred", "error", 2000);
    })
    .finally(() => {
      rentBtn.disable = false;
      rentBtn.textContent = "Confirm Rent";
    });
});

const step1 = document.getElementById("step-1");
const step2 = document.getElementById("step-2");

const toPaymentBtn = document.getElementById("to-payment");
const backBtn = document.getElementById("back-btn");

toPaymentBtn.addEventListener("click", () => {
  if (!rentDate.value || !returnDate.value || !rentQuantity.value) {
    showToast("Fill all rent details", "error", 2000);
    return;
  }

  step1.classList.add("hidden");
  step2.classList.remove("hidden");
});

backBtn.addEventListener("click", () => {
  step2.classList.add("hidden");
  step1.classList.remove("hidden");
});
