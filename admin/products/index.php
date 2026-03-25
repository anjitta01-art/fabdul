<?php
include '../../include/check-auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - Fabdul Rentals</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../images/laptop_ic.png" type="image/x-icon">
</head>
<body>
    <div>
        <?php include '../../include/admin-header.php'; ?>
        <main class="pt-[74px]">
            <div class="flex relative">
                <?php include '../../include/sidebar.php'; ?>
                <div class="p-10 w-full">
                    <h1 class="text-3xl font-bold mb-6">All Products</h1>
                    <p class="text-gray-600">Manage all products here</p>
                    <div class="overflow-x-auto mt-6">
                        <table class="w-full border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                            <thead class="bg-gray-100 text-gray-700 uppercase text-sm tracking-wider">
                                <tr>
                                    <th class="px-6 py-3 text-left">ID</th>
                                    <th class="px-6 py-3 text-left">Name</th>
                                    <th class="px-6 py-3 text-left">Category</th>
                                    <th class="px-6 py-3 text-left">Price</th>
                                    <th class="px-6 py-3 text-left">Stock</th>
                                    <th class="px-6 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="product-table-body" class="divide-y divide-gray-200 bg-white text-gray-700">
                                <!-- Products appear here -->

                                <tr class="hover:bg-gray-50 transition hidden" id="no-data">
                                    <td colspan="6" class="text-center py-6 text-gray-500">
                                        No products found
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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

        <!-- Delete Modal -->
        <div id="delete-modal" class="hidden fixed inset-0 bg-black/50 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-xl font-bold mb-4">Delete Product</h2>
                <p class="text-gray-600">Are you sure you want to delete this product?</p>
                <div class="flex justify-end gap-3 mt-6">
                    <button id="cancel-delete" class="bg-gray-300 text-gray-700 text-sm cursor-pointer py-2 px-4 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Cancel</button>
                    <button id="confirm-delete" class="bg-red-600 text-white text-sm cursor-pointer py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <script src="../../public/js/util.js"></script>
    <script src="../../public/js/admin/products.js"></script>
</body>
</html>