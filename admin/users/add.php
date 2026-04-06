<?php
include '../../include/check-auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User - Fabdul Rentals</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../images/laptop_ic.png" type="image/x-icon">
    <style>
        .lobsterWrite {
            font-family: "Caveat", sans-serif;
        }
    </style>
</head>
<body>
    <div>
        <?php include '../../include/admin-header.php'; ?>
        <main class="pt-[74px]">
            <div class="flex relative">
                <?php include '../../include/sidebar.php'; ?>
                <div class="p-10 w-full">
                    <h1 class="text-3xl font-bold mb-6">Add User</h1>
                    <p class="text-gray-600 pb-4">Add new users to the system on this page.</p>
                    <form id="add-user-form" class="bg-white p-6 rounded-lg shadow-md space-y-4 max-w-3xl">
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-x-4">
                                <div>
                                    <label for="firstName" class="block text-sm font-medium text-gray-700">First Name</label>
                                    <input type="text" placeholder="First Name" id="firstName" name="firstName" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                </div>
                                <div>
                                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name</label>
                                    <input type="text" placeholder="Last Name" id="lastName" name="lastName" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" placeholder="Email" id="email" name="email" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                <div id="email-error" class="text-red-500 text-xs mt-1"></div>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="tel" placeholder="Phone Number" id="phone" name="phone" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                <div id="phone-error" class="text-red-500 text-xs mt-1"></div>
                            </div>
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" placeholder="Username" id="username" name="username" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                <div id="username-error" class="text-red-500 text-xs mt-1"></div>
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="text" placeholder="Password" id="password" name="password" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                <div id="password-error" class="text-red-500 text-xs mt-1"></div>
                            </div>
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                <select id="role" name="role" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                    <option value="">Select Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="flex justify-start">
                                <button type="submit" id="add-user-btn" class="bg-purple-700 text-white py-2 px-4 rounded-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 cursor-pointer">Add User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <!-- Toast Notification -->
        <div id="toast" class="hidden fixed top-5 right-5 z-50">
            <div id="toast-box" class="bg-gray-800 text-white px-4 py-3 rounded shadow-lg flex items-center gap-3">
                <div id="toast-message" class="text-sm"></div>
            </div>
        </div>
    </div>


    <script src="../../public/js/util.js"></script>
    <script src="../../public/js/admin/users/add.js"></script>
</body>
</html>