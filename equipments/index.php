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
                <li class="bg-white rounded-xl shadow-lg border border-[#eee]">
                    <div class="relative rounded-t-xl overflow-hidden h-48">
                        <img src="../images/items/laptop1.jpg" alt="MacBook Pro 16 inches M3 Max" class="w-full h-48 object-cover rounded-t">
                        <span class="absolute top-4 left-4 bg-pink-500 text-white text-xs font-bold px-2 py-1 rounded-full z-20">In Stock</span>
                        <div class="absolute inset-0 bg-black/30 z-10"></div>
                    </div>
                    <div>
                        <div class="px-4 pt-4 pb-8 space-y-2">
                            <p class="text-xs font-semibold text-purple-700">LAPTOPS</p>
                            <h3 class="text-lg font-bold">MacBook Pro 16"M3 Max</h3>
                            <ul class="space-y-3 text-sm text-[#535151] font-medium">
                                <li class="flex items-center gap-2">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="1.5"><path d="M4 12c0-3.771 0-5.657 1.172-6.828S8.229 4 12 4s5.657 0 6.828 1.172S20 8.229 20 12s0 5.657-1.172 6.828S15.771 20 12 20s-5.657 0-6.828-1.172S4 15.771 4 12Z"/><path d="M7.732 16.268C8.464 17 9.643 17 12 17c.79 0 1.447 0 2-.028L16.972 14c.028-.553.028-1.21.028-2c0-2.357 0-3.536-.732-4.268S14.357 7 12 7s-3.536 0-4.268.732S7 9.643 7 12s0 3.536.732 4.268Z"/><path stroke-linecap="round" d="M8 2v2m8-2v2m-4-2v2M8 20v2m4-2v2m4-2v2m6-6h-2M4 8H2m2 8H2m2-4H2m20-4h-2m2 4h-2"/></g></svg></span>
                                    <span>M3 Max Chip (16-core)</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="currentColor"><path d="M5 4a1 1 0 1 1-2 0a1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0a1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2a1 1 0 0 0 0 2m5-1a1 1 0 1 1-2 0a1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2a1 1 0 0 0 0 2M5 20a1 1 0 1 1-2 0a1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0a1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2a1 1 0 0 0 0 2m5-1a1 1 0 1 1-2 0a1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2a1 1 0 0 0 0 2M5 12a1 1 0 1 0 0-2a1 1 0 0 0 0 2m15 1a1 1 0 1 1-2 0a1 1 0 0 1 2 0"/><path fill-rule="evenodd" d="M0 9a3 3 0 0 1 3-3h18a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H3a3 3 0 0 1-3-3zm3-1h18a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" clip-rule="evenodd"/></g></svg></span>
                                    <span>64GB Unified Memory</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21.553 15.481L19 5.118C18.5 3.529 17.605 3 16.5 3h-9c-1.105 0-2 .53-2.5 2.118L2.447 15.48m19.106 0c-.6-1.13-1.742-1.893-3.053-1.893h-13c-1.311 0-2.454.764-3.053 1.893m19.106 0A3.86 3.86 0 0 1 22 17.294C22 19.341 20.433 21 18.5 21h-13C3.567 21 2 19.34 2 17.294c0-.658.162-1.277.447-1.813"/><path stroke-linecap="round" d="M18 17v1m-2.5-1v1M13 17v1m-2.5-1v1"/></g></svg></span>
                                    <span>1TB SSD Storage</span>
                                </li>
                            </ul>
                        </div>
                        <div class="flex items-center justify-between px-4 py-4 border-t-2 border-[#bbb]">
                            <span class="text-xl font-bold">$149 <span class="text-sm text-[#535151]">/mo</span></span>
                            <a href="#" class="bg-purple-700 text-white py-2 px-4 rounded-md hover:bg-purple-800 transition-colors text-sm font-medium">Rent Now</a>
                        </div>
                    </div>
                </li>

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