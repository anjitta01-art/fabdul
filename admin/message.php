<?php
include '../include/check-auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Messages from contact us - Fabdul Rentals</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/laptop_ic.png" type="image/x-icon">
</head>
<body>
    <div>
        <?php include '../include/admin-header.php'; ?>
        <main class="pt-[74px]">
            <div class="flex relative">
                <?php include '../include/sidebar.php'; ?>
                <div class="p-10 w-full">
                    <h1 class="text-3xl font-bold mb-6">All Messages From Conatct us Page</h1>
                    <p class="text-gray-600">View all messages from the contact us page.</p>
                    <div class="overflow-x-auto mt-6">
                        <table class="w-full border border-gray-200 rounded-lg overflow-hidden shadow-sm">
                            <thead class="bg-gray-100 text-gray-700 uppercase text-sm tracking-wider">
                                <tr>
                                    <th class="px-6 py-3 text-left">S/N</th>
                                    <th class="px-6 py-3 text-left">Full Name</th>
                                    <th class="px-6 py-3 text-left">Email</th>
                                    <th class="px-6 py-3 text-left">Phone</th>
                                    <th class="px-6 py-3 text-left">Equipment Type</th>
                                    <th class="px-6 py-3 text-left">Message</th>
                                    <th class="px-6 py-3 text-left">Messaged Date</th>
                                </tr>
                            </thead>
                            <tbody id="messages-table" class="divide-y divide-gray-200 bg-white text-gray-700">
                                <!-- Messages appear here -->

                                <tr class="hover:bg-gray-50 transition hidden" id="no-data">
                                    <td colspan="7" class="text-center py-6 text-gray-500">
                                        No messages found
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

    </div>


    <script src="../public/js/util.js"></script>
    <script src="../public/js/admin/all-message.js"></script>
</body>
</html>