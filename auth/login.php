<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fabdul Tech Rentals</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/laptop_ic.png" type="image/x-icon">
</head>
<body>
    <div>
        <?php include '../include/header.php'; ?>
        <section class="grid grid-cols-2 min-h-screen">
            <div class="bg-purple-700 text-white flex items-center justify-center">
                <div>
                    <h1 class="text-5xl font-bold text-center">Welcome to Fabdul <br/>Tech Rentals</h1>
                    <p class="py-4 text-sm text-center font-medium">Don't have an account?</p>
                    <div class="flex justify-center">
                        <a href="register.php" class="py-3 px-8 border text-sm border-white rounded-xl font-semibold hover:bg-purple-800">Register</a>
                    </div>
                </div>
            </div>
            <div class="py-10 px-8">
                <div class="space-y-4">
                    <div class="flex justify-end">
                        <a href="#" class="text-[#535151] text-sm font-semibold">Need Help?</a>
                    </div>
                    <form class="space-y-4 py-14 px-10" id="login-form" method="POST"> 
                        <h2 class="text-3xl font-bold text-purple-700 text-center">Welcome Back!</h2>
                        <div class="space-y-4">
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700">Username/email</label>
                                <input type="text" placeholder="Username" id="username" name="username" class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" placeholder="Password" id="password" name="password" class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                <div id="login-error" class="text-red-500 text-xs mt-1"></div>
                            </div>
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                <select id="role" name="role" class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                    <option value="">Select Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="bg-purple-700 text-white py-2 px-8 text-sm font-semibold rounded-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 cursor-pointer" id="login-button">Log In</button>
                            </div>
                        </div>
                    </form>
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
    <script src="../public/js/auth/login.js"></script>
</body>
</html>