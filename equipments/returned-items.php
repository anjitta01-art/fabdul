<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Returned Items | Fabdul IT Solutions</title>
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
        <section class="py-14 px-20 space-y-8 bg-purple-300/40">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-3xl font-bold text-purple-700">Returned Items</h2>
                </div>
            </div>
            <ul class="grid grid-cols-3 gap-10 pt-5" id="product-lists">
                <!-- Returned items will appear here -->

                <li class="text-center text-gray-600 hidden" id="no-product">No product yet</li>
            </ul>
            <div class="pt-10 px-10">
                <div class="bg-purple-700 rounded-xl flex items-center justify-between py-10 px-8">
                    <div class="text-white">
                        <h4 class="text-2xl font-bold">Custom Enterprise Solutions</h4>
                        <p class="text-[#bbb] text-sm font-medium w-2/3">Need 100+ units or specialized configurations? Our enterprise team handles custom bulk procurement dedicated support.</p>
                    </div>
                    <div>
                        <a href="#" class="bg-white text-gray-800 px-6 py-3 rounded-md hover:bg-gray-200 transition-colors text-xs font-medium">Contact Enterprise Sales</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-24 px-20">
            <div class="bg-purple-300/40 rounded-xl py-20 px-8 text-center space-y-6 mx-6">
                <h2 class="text-2xl font-bold">Ready to scale your operations?</h2>
                <p class="text-[#535151] font-medium">Join 2,000+ companies who have traded capital expenditure for operational <br/>agility. Get your custom quote in minutes.</p>
                <form class="flex items-center gap-x-3 justify-center">
                    <input type="email" placeholder="Enter your work email" class="px-4 py-2 rounded border border-[#bbb] focus:outline-none focus:ring-2 focus:ring-purple-700 focus:border-transparent text-sm font-medium w-64 bg-white">
                    <button type="submit" class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 transition-colors text-sm font-semibold">Get a Quote</button>
                </form>
                <p class="text-[#535151] text-xs">By clicking, you agree to our <span class="underline">Privacy Policy</span> and <span class="underline">Terms</span></p>
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
    <script src="../public/js/rent/returned-items.js"></script>
</body>
</html>