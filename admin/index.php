<?php
include '../include/check-auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Fabdul Rentals</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/laptop_ic.png" type="image/x-icon">
    <style>
        .lobsterWrite {
            font-family: "Caveat", sans-serif;
        }
    </style>
</head>
<body>
    <div>
        <?php include '../include/admin-header.php'; ?>
        <main class="pt-[74px]">
            <div class="flex">
                <?php include '../include/sidebar.php'; ?>
                <div class="p-10 w-full">
                    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h2 class="text-xl font-semibold mb-2">Total Users</h2>
                            <p class="text-3xl font-bold" id="totalUsers">150</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h2 class="text-xl font-semibold mb-2">Total Products</h2>
                            <p class="text-3xl font-bold" id="totalEquipments">75</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h2 class="text-xl font-semibold mb-2">Active Rentals</h2>
                            <p class="text-3xl font-bold" id="activeRentals">30</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h2 class="text-xl font-semibold mb-2">Revenue</h2>
                            <p class="text-3xl font-bold" id="revenue">$5,000</p>
                        </div>
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



    <script src="../public/js/util.js"></script>
    <script src="../public/js/admin/dashboard.js"></script>
</body>
</html>