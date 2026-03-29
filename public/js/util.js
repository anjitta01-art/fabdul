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

function validatePhoneNumber(phoneNumber, errorId) {
  const phoneRegex = /^\d{11}$/;
  const isValid = phoneRegex.test(phoneNumber);

  const errorElement = document.getElementById(errorId);
  if (!isValid && errorElement) {
    errorElement.textContent = "Phone number must be 11 digits";
  } else if (errorElement) {
    errorElement.textContent = "";
  }
  return isValid;
}

function validatePassword(password, errorId) {
  const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{8,}$/;
  const isValid = passwordRegex.test(password);

  const errorElement = document.getElementById(errorId);

  if (!isValid && errorElement) {
    errorElement.textContent =
      "Password must be at least 8 characters long and include at least 1 number and 1 special character";
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

function checkAuth() {
  const user = JSON.parse(window.localStorage.getItem("user"));
  if (!user) {
    return null;
  } else {
    return user;
  }
}

function getInitials(name) {
  if (!name || name.trim() === "") return "";
  const names = name.split(" ");
  const initials = names.map((n) => n.charAt(0).toUpperCase()).join("");
  return initials;
}

function formatDate(dateString) {
  const months = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ];
  const date = new Date(dateString);
  return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()} - ${date.getHours()}:${String(date.getMinutes()).padStart(2, "0")}`;
}
