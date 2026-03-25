<?php
include '../../include/check-auth.php';
$userId = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details - Fabdul Rentals</title>
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
                <div class="p-10 w-full space-y-4">
                    <h2 class="text-2xl font-semibold mb-4">Personal Information</h2>
                    <div class="flex items-center justify-between pb-4">
                        <p class="text-gray-600 text-lg">See users full details here.</p>
                        <a href="edit-user.php?id=<?php echo $userId; ?>" class="bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium py-2 px-4 rounded">Edit Profile</a>
                    </div>
                    <div>
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <p class="text-gray-600">Name</p>
                                    <p id="user-name" class="text-lg font-medium text-gray-800">Loading...</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Email</p>
                                    <p id="user-email" class="text-lg font-medium text-gray-800">Loading...</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Username</p>
                                    <p id="user-username" class="text-lg font-medium text-gray-800">Loading...</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Phone Number</p>
                                    <p id="user-phone" class="text-lg font-medium text-gray-800">Loading...</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Role</p>
                                    <p id="user-role" class="text-lg font-medium text-gray-800">Loading...</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Status</p>
                                    <p id="user-status" class="text-lg font-medium text-gray-800">Loading...</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Date Joined</p>
                                    <p id="user-date" class="text-lg font-medium text-gray-800">Loading...</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Last Updated</p>
                                    <p id="user-last-updated" class="text-lg font-medium text-gray-800">Loading...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-10">
                        <h1 class="text-2xl font-bold mb-6 text-purple-700">Rents History</h1>
                        <div class="overflow-x-auto mt-6">
                            <table class="w-full border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                                <thead class="bg-gray-100 text-gray-700 uppercase text-sm tracking-wider">
                                    <tr>
                                        <th class="px-6 py-3 text-left">ID</th>
                                        <th class="px-6 py-3 text-left">Product Name</th>
                                        <th class="px-6 py-3 text-left">Category</th>
                                        <th class="px-6 py-3 text-left">Rent Date</th>
                                        <th class="px-6 py-3 text-left">Rent Price</th>
                                        <th class="px-6 py-3 text-left">Returned Date</th>
                                    </tr>
                                </thead>
                                <tbody id="users-table" class="divide-y divide-gray-200 bg-white text-gray-700">
                                    <!-- Users appear here -->

                                    <tr class="hover:bg-gray-50 transition hidden" id="no-data">
                                        <td colspan="6" class="text-center py-6 text-gray-500">
                                            No rents found
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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


    <script src="../../public/js/util.js"></script>
    <script src="../../public/js/admin/users/view-more.js"></script>
</body>
</html>