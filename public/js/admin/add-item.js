const form = document.getElementById("add-item-form");

const name = document.getElementById("name");
const price = document.getElementById("price");
const description = document.getElementById("description");
const image = document.getElementById("image");
const category = document.getElementById("category");
const features = document.getElementById("features");
const quantity = document.getElementById("quantity");

form.addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData();
  formData.append("name", name.value);
  formData.append("price", price.value);
  formData.append("description", description.value);
  formData.append("image", image.files[0]);
  formData.append("category", category.value);
  formData.append("features", features.value);
  formData.append("quantity", quantity.value);

  console.log("Form data:", {
    name: name.value,
    price_per_day: price.value,
    description: description.value,
    image: image.files[0],
    category: category.value,
    features: features.value,
    quantity: quantity.value,
  });
});
