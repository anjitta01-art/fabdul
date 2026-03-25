const urlParams = new URLSearchParams(window.location.search);
const productId = urlParams.get("id");

const productName = document.getElementById("productName");
const category = document.getElementById("category");
const price = document.getElementById("price");
const quantity = document.getElementById("quantity");
const features = document.getElementById("features");
const image = document.getElementById("image");
const description = document.getElementById("description");

document.addEventListener("DOMContentLoaded", () => {
  fetch(
    `/fabdul/controller/admin/products/get-item-details.php?id=${productId}`,
  )
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        const product = data.data;
        productName.value = product.product_name;
        category.value = product.category;
        price.value = product.price;
        quantity.value = product.quantity;
        features.value = product.features;
        description.value = product.description;
        document.getElementById("current-image").src =
          "/fabdul/images/uploads/" + product.image;
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.log("Error fetching product details:", error);
      showToast("An error occurred", "error", 2000);
    });
});

const form = document.getElementById("edit-item-form");
const submitBtn = document.getElementById("edit-item-btn");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData();

  submitBtn.disabled = true;
  submitBtn.textContent = "Updating...";

  formData.append("id", productId);
  formData.append("product_name", productName.value);
  formData.append("category", category.value);
  formData.append("price", price.value);
  formData.append("quantity", quantity.value);
  formData.append("features", features.value);
  formData.append("description", description.value);
  if (image.files[0]) {
    formData.append("image", image.files[0]);
  }
  formData.append(
    "current_image",
    document.getElementById("current-image").src,
  );

  fetch("/fabdul/controller/admin/products/edit-item.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2000);
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.log("Error updating product:", error);
      showToast("An error occurred", "error", 2000);
    })
    .finally(() => {
      submitBtn.disabled = false;
      submitBtn.textContent = "Update Product";
    });
});
