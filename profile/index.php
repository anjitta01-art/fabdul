<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Profile | Fabdul IT Solutions</title>
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
                    <h2 class="text-2xl font-bold">Profile Details</h2>
                    <p class="text-sm text-[#333] font-medium">View your profile details here.</p>
                </div>
                <div>
                    <a href="change-password.php" class="text-xs text-gray-700 font-medium border border-gray-700 rounded-md py-2 px-4">Change Password</a>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-10">
                <div class="flex items-center gap-x-2">
                    <h2 class="font-semibold">Fullname: </h2>
                    <p class="text-gray-700 font-semibold" id="fullname">Ammah</p>
                </div>
                <div class="flex items-center gap-x-2">
                    <h2 class="font-semibold">Email: </h2>
                    <p class="text-gray-700 font-semibold" id="email">Ammah</p>
                </div>
                <div class="flex items-center gap-x-2">
                    <h2 class="font-semibold">Phone Number: </h2>
                    <p class="text-gray-700 font-semibold" id="phoneNumber">Ammah</p>
                </div>
                <div class="flex items-center gap-x-2">
                    <h2 class="font-semibold">Username: </h2>
                    <p class="text-gray-700 font-semibold" id="username">Ammah</p>
                </div>
                <div class="flex items-center gap-x-2">
                    <h2 class="font-semibold">Role: </h2>
                    <p class="text-gray-700 font-semibold" id="role">Ammah</p>
                </div>
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
    <script src="../public/js/profile/details.js"></script>
</body>
</html>