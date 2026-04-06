<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Equipments | Fabdul IT Solutions</title>
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
                    <h2 class="text-2xl font-bold">Premium Hardware Catalog</h2>
                    <p class="text-sm text-[#333] w-2/3 font-medium">Browse our range of enterprise-grade equipment ready for immediate deployment.</p>
                </div>
            </div>
            <div>
                <form id="search-form" class="flex justify-between items-center">
                    <div class="border border-gray-600 text-sm p-2 rounded-md w-max flex">
                        <input type="text" placeholder="search products..." id="search-field" class="w-96 focus:outline-none">
                        <span class="flex gap-x-2 items-center">
                            <button type="button" id="clear-btn" class="text-2xl text-red-500 font-semibold cursor-pointer">&times;</button>
                            <button class="bg-purple-700 text-white py-2 px-4 rounded-md hover:bg-purple-800 transition-colors text-xs font-medium cursor-pointer">Search</button>
                        </span>
                    </div>
                    <div>
                        <select name="searchCategory" id="search-category" class="min-w-60 bg-white p-2 rounded-lg">
                            <option value="">Search by category</option>
                            <option value="laptops">Laptops</option>
                            <option value="desktops">Desktops</option>
                            <option value="servers">Servers</option>
                            <option value="speakers">Speakers</option>
                            <option value="headphones">Headphones</option>
                            <option value="printer">Printers</option>
                            <option value="projector">Projector</option>
                        </select>
                    </div>
                </form>
            </div>
            <ul class="grid grid-cols-3 gap-10 pt-5" id="product-lists">
                <!-- Items will appear here -->

                <li class="text-center text-gray-600" id="no-product">No product yet</li>
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
        <section class="py-20 px-20 border-b border-[#eee]">
            <div class="space-y-4">
                <h2 class="text-center text-4xl font-bold">Why Rent with Fabdul Tech Rentals?</h2>
                <p class="text-center text-[#535151] font-medium">We've redesigned hardware procurement to be as flexible as your cloud infrastructure</p>
                <div class="flex items-center justify-center gap-16 pt-10">
                    <div class="border-2 border-[#eee] rounded-lg p-6 shadow-md space-y-4">
                        <div>
                            <span class="text-purple-700 p-3 rounded-lg bg-purple-300/20 flex items-center justify-center w-max"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M13 6v5a1 1 0 0 0 1 1h6.102a1 1 0 0 1 .712.298l.898.91a1 1 0 0 1 .288.702V17a1 1 0 0 1-1 1h-3"/><path d="M5 18H3a1 1 0 0 1-1-1V8a2 2 0 0 1 2-2h12c1.1 0 2.1.8 2.4 1.8l1.176 4.2M9 18h5"/><circle cx="16" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></g></svg></span>
                        </div>
                        <h4 class="text-lg font-semibold">Next-Day Logistics</h4>
                        <p class="text-[#535151] text-sm font-semibold">We deliver directly to your office or your employee's home address anywhere in the UK</p>
                    </div>
                    <div class="border-2 border-[#eee] rounded-lg p-6 shadow-md space-y-4">
                        <div>
                            <span class="text-purple-700 p-3 rounded-lg bg-purple-300/20 flex items-center justify-center w-max"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M13 6v5a1 1 0 0 0 1 1h6.102a1 1 0 0 1 .712.298l.898.91a1 1 0 0 1 .288.702V17a1 1 0 0 1-1 1h-3"/><path d="M5 18H3a1 1 0 0 1-1-1V8a2 2 0 0 1 2-2h12c1.1 0 2.1.8 2.4 1.8l1.176 4.2M9 18h5"/><circle cx="16" cy="18" r="2"/><circle cx="7" cy="18" r="2"/></g></svg></span>
                        </div>
                        <h4 class="text-lg font-semibold">Full Lifecycle Support</h4>
                        <p class="text-[#535151] text-sm font-semibold">If it breaks, we swap it within 24 hours. No repair bills, no downtime, total peace of mind.</p>
                    </div>
                    <div class="border-2 border-[#eee] rounded-lg p-6 shadow-md space-y-4">
                        <div>
                            <span class="text-purple-700 p-3 rounded-lg bg-purple-300/20 flex items-center justify-center w-max"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none"><path d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12"/><path stroke="currentColor" stroke-linecap="square" stroke-width="2" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12Z"/><path stroke="currentColor" stroke-linecap="square" stroke-width="2" d="M12 6.5V12l3 3"/></g></svg></span>
                        </div>
                        <h4 class="text-lg font-semibold">True Monthly Terms</h4>
                        <p class="text-[#535151] text-sm font-semibold">Cancel or upgrade anytime. No multi-year lock-ins. Scale your hardware as fast as your roadmap.</p>
                    </div>
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
    <script src="../public/js/equipment/all.js"></script>
</body>
</html>