const form = document.getElementById("add-item-form");

const name = document.getElementById("name");
const price = document.getElementById("price");
const description = document.getElementById("description");
const image = document.getElementById("image");
const category = document.getElementById("category");
const features = document.getElementById("features");
const quantity = document.getElementById("quantity");

const submitBtn = document.getElementById("submit-btn");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  submitBtn.disabled = true;
  submitBtn.textContent = "Adding...";

  const formData = new FormData();
  formData.append("name", name.value);
  formData.append("price", price.value);
  formData.append("description", description.value);
  formData.append("image", image.files[0]);
  formData.append("category", category.value);
  formData.append("features", features.value);
  formData.append("quantity", quantity.value);

  fetch("/fabdul/controller/admin/add-equipment.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 2000);
        form.reset();
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      showToast("An error occured.", "error", 2000);
    })
    .finally(() => {
      submitBtn.disabled = false;
      submitBtn.textContent = "Add Item";
    });
});
