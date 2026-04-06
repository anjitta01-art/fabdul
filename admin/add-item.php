<?php
include '../include/check-auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item - Fabdul Rentals</title>
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
            <div class="flex relative">
                <?php include '../include/sidebar.php'; ?>
                <div class="p-10 w-full">
                    <h1 class="text-3xl font-bold mb-6">Add New Item</h1>
                    <form id="add-item-form" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md space-y-4">
                        <div class="">
                            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <div class="">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select name="category" id="category" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                                <option value="">Select a category</option>
                                <option value="laptops">Laptops</option>
                                <option value="desktops">Desktops</option>
                                <option value="servers">Servers</option>
                                <option value="speakers">Speakers</option>
                                <option value="headphones">Headphones</option>
                                <option value="printer">Printers</option>
                                <option value="projector">Projector</option>
                            </select>
                        </div>
                        <div class="">
                            <label for="features" class="block text-sm font-medium text-gray-700">Product Features</label>
                            <input type="text" placeholder="e.g 1TB SSD Storage, 16GB RAM" name="features" id="features" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <div class="">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price Per Day ($)</label>
                            <input type="number" name="price" id="price" step="0.01" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <div>
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" min="0" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <div class="">
                            <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                            <input type="file" name="product_image" id="image" accept="image/*" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500">
                        </div>
                        <div class="">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-purple-500 focus:border-purple-500"></textarea>
                        </div>
                        <button type="submit" id="submit-btn" class="bg-purple-600 text-white text-sm py-2 px-4 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 cursor-pointer">Add Item</button>
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


    <script src="../public/js/util.js"></script>
    <script src="../public/js/admin/add-item.js"></script>
</body>
</html>