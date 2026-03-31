const form = document.getElementById("contactForm");

const fullname = document.getElementById("fullname");
const email = document.getElementById("email");
const phone = document.getElementById("phone");
const equipmentType = document.getElementById("equipmentType");
const message = document.getElementById("message");

const submitBtn = document.getElementById("submit-btn");
const btnTextContainer = document.getElementById("btn-text-space");

email.addEventListener("blur", () => {
  validateEmail(email.value, "email-error");
});

phone.addEventListener("blur", () => {
  validatePhoneNumber(phone.value, "phone-error");
});

form.addEventListener("submit", (e) => {
  e.preventDefault();

  if (
    fullname.value === "" ||
    email.value === "" ||
    phone.value === "" ||
    message.value === ""
  ) {
    showToast("Please fill all required fields.", "error", 3000);
    return;
  }

  submitBtn.disabled = true;
  btnTextContainer.textContent = "Sending message...";

  const formData = new FormData();

  formData.append("fullname", fullname.value);
  formData.append("email", email.value);
  formData.append("phone", phone.value);
  formData.append("equipmentType", equipmentType.value);
  formData.append("message", message.value);

  fetch("/fabdul/controller/contact-us.php", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        showToast(data.message, "success", 3000);
        form.reset();
      } else {
        showToast(data.message, "error", 2000);
      }
    })
    .catch((err) => {
      console.log("Error: ", err);
      showToast("An error occured", "error", 2000);
    })
    .finally(() => {
      submitBtn.disabled = false;
      btnTextContainer.textContent = "Send Message";
    });
});
