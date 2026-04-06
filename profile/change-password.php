<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | Fabdul IT Solutions</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/laptop_ic.png" type="image/x-icon">
</head>
<body>
    <div class="">
        <?php include '../include/header.php'; ?>
        <section class="py-14 px-20 space-y-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold">Change Password</h2>
                    <p class="text-sm text-[#333] font-medium">Change your old password here.</p>
                </div>
                <div>
                    <a href="index.php" class="text-xs text-gray-700 font-medium border border-gray-700 rounded-md py-2 px-4">Account Profile</a>
                </div>
            </div>
            <div>
                <form class="space-y-4 py-6 px-10 w-xl" id="change-password-form" autocomplete="off"> 
                    <div class="space-y-4">
                        <div>
                            <label for="oldPassword" class="block text-sm font-medium text-gray-700">Old Password</label>
                            <input type="password" placeholder="Enter old password" id="oldPassword" name="oldPassword" class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full" autocomplete="new-password">
                        </div>
                        <div>
                            <label for="newPassword" class="block text-sm font-medium text-gray-700">New Password</label>
                            <input type="password" placeholder="Enter new password" id="newPassword" name="newPassword" class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full" autocomplete="new-password">
                            <div id="password-error" class="text-red-500 text-xs mt-1"></div>
                        </div>
                        <div>
                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                            <input type="password" placeholder="Confirm new password" id="confirmPassword" name="confirmPassword" class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full" autocomplete="new-password">
                            <div id="confirm-error" class="text-red-500 text-xs mt-1"></div>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="bg-purple-700 text-white py-2 px-8 text-sm font-semibold rounded-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 cursor-pointer" id="change-pwd-button">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php include '../include/footer.php'; ?>

        <!-- Toast Notification -->
        <div id="toast" class="hidden fixed top-5 right-5 z-50">
            <div id="toast-box" class="bg-gray-800 text-white px-4 py-3 rounded shadow-lg flex items-center gap-3">
                <div id="toast-message" class="text-sm"></div>
            </div>
        </div>
    </div>


    <script src="../public/js/util.js"></script>
    <script src="../public/js/profile/change-password.js"></script>
</body>
</html>