<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Fabdul Tech Rentals</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <?php include '../include/header.php'; ?>
        <section class="grid grid-cols-2 min-h-screen">
            <div class="bg-purple-700 text-white flex items-center justify-center">
                <div>
                    <h1 class="text-3xl font-bold text-center">Welcome to Fabdul <br/>Tech Rentals</h1>
                    <p class="py-4 text-sm text-center font-medium">Already have an account?</p>
                    <div class="flex justify-center">
                        <a href="#" class="py-3 px-8 border text-sm border-white rounded-xl font-semibold hover:bg-purple-800">Log in</a>
                    </div>
                </div>
            </div>
            <div class="py-10 px-8">
                <div class="space-y-4">
                    <div class="flex justify-end">
                        <a href="#" class="text-[#535151] text-sm font-semibold">Need Help?</a>
                    </div>
                    <form class="space-y-4 py-14 px-6"> 
                        <h2 class="text-2xl font-bold text-purple-700 text-center">Create Your Account</h2>
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
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="tel" placeholder="Phone Number" id="phone" name="phone" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                            </div>
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" placeholder="Username" id="username" name="username" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                            </div>
                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" placeholder="Password" id="password" name="password" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                            </div>
                            <div>
                                <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                                <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                            </div>
                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                <select id="role" name="role" required class="border border-gray-300 text-sm rounded-md py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                                    <option value="">Select Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="terms" id="terms" required>
                                <label for="terms" class="block text-sm font-medium text-gray-700">I accept the terms of the agreement</label>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" class="bg-purple-700 text-white py-2 px-4 rounded-md hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 cursor-pointer">Create Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php include '../include/footer.php'; ?>
    </div>
</body>
</html>