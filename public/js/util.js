function validateEmail(email, errorId) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const isValid = emailRegex.test(email);
  const errorElement = document.getElementById(errorId);
  if (!isValid && errorElement) {
    errorElement.textContent = "Please enter a valid email address.";
  } else if (errorElement) {
    errorElement.textContent = "";
  }
  return isValid;
}

function validateUsername(username, errorId) {
  const usernameRegex = /^[a-zA-Z0-9_]{4,20}$/;
  const isValid = usernameRegex.test(username);
  const errorElement = document.getElementById(errorId);
  if (!isValid && errorElement) {
    errorElement.textContent =
      "Username must be between 4 and 20 characters and can only contain letters, numbers, and underscores.";
  } else if (errorElement) {
    errorElement.textContent = "";
  }
  return isValid;
}

function validateConfirmPassword(password, confirmPassword, errorId) {
  const isValid = password === confirmPassword;
  const errorElement = document.getElementById(errorId);
  if (!isValid && errorElement) {
    errorElement.textContent = "Passwords do not match.";
  } else if (errorElement) {
    errorElement.textContent = "";
  }
  return isValid;
}

let toastTimeout;
function showToast(message, type = "success", duration = 3000) {
  const toast = document.getElementById("toast");
  const toastBox = document.getElementById("toast-box");
  const toastMessage = document.getElementById("toast-message");

  clearTimeout(toastTimeout);
  toastMessage.textContent = message;
  toastBox.classList.remove(
    "bg-green-600",
    "bg-red-600",
    "bg-yellow-500",
    "bg-blue-600",
  );

  if (type === "success") {
    toastBox.classList.add("bg-green-600");
  } else if (type === "error") {
    toastBox.classList.add("bg-red-600");
  } else if (type === "warning") {
    toastBox.classList.add("bg-yellow-500");
  } else {
    toastBox.classList.add("bg-blue-600");
  }

  toast.classList.remove("hidden");

  toastTimeout = setTimeout(() => {
    toast.classList.add("hidden");
  }, duration);
}
