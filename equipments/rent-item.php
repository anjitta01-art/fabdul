<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Item | Fabdul IT Solutions</title>
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
                    <h2 class="text-2xl font-bold" id="productName">Item name</h2>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-x-10">
                <div>
                    <img src="../images/hero.jpg" alt="Item image" id="product_image">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-600">Category</p>
                        <p id="category" class="font-medium text-gray-800">Loading...</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Price</p>
                        <p id="price" class="font-medium text-purple-700">0.00</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-600">Features</p>
                        <p id="features" class="font-medium text-gray-800">Loading...</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Quantity in stock</p>
                        <p id="quantity" class="font-medium text-gray-800">0</p>
                    </div>
                    <div>
                        <p class="text-gray-600">Last Updated</p>
                        <p id="last-updated" class="font-medium text-gray-800">Loading...</p>
                    </div>
                    <div class="col-span-2 flex justify-end">
                        <button type="button" id="open-rent-modal" class="bg-purple-700 text-white py-2 h-max px-4 rounded-md hover:bg-purple-800 transition-colors text-sm font-medium cursor-pointer">Continue Rent</button>
                    </div>
                </div>
            </div>
            <div>
                <p id="description" class="font-medium text-gray-800">Description...</p>
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

        <!-- checkout modal -->
        <div id="rent-modal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
            <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6 relative">
                <button id="close-rent-modal" class="absolute top-3 right-3 text-gray-500 hover:text-black text-xl">
                    &times;
                </button>
                <h2 class="text-xl font-bold mb-4">Confirm Rent</h2>
                <div class="flex gap-4 items-center mb-4">
                    <img id="modal-image" src="" class="w-20 h-20 object-cover rounded-md border">
                    <div>
                        <p id="modal-name" class="font-semibold"></p>
                        <p id="modal-price" class="text-purple-700 font-bold"></p>
                    </div>
                </div>
                <form id="rent-form" class="space-y-4">
                    <!-- STEP 1 -->
                    <div id="step-1" class="space-y-4">
                        <div>
                            <label>Rent Date</label>
                            <input type="date" id="rent-date" class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label>Return Date</label>
                            <input type="date" id="return-date" class="w-full border rounded-md px-3 py-2">
                        </div>
                        <div>
                            <label>Quantity <span id="stock_quantity" class="text-gray-600 text-xs font-medium"></span></label>
                            <input type="number" id="rent-quantity" min="1" class="w-full border rounded-md px-3 py-2">
                        </div>
                        <button type="button" id="to-payment" class="w-full bg-purple-700 text-white py-2 rounded-md">Continue to Payment</button>
                    </div>

                    <!-- STEP 2 -->
                    <div id="step-2" class="hidden space-y-4">
                        <div class="bg-yellow-100 text-yellow-800 p-2 rounded text-sm">Payment</div>
                        <div>
                            <label>Card Number</label>
                            <input type="text" id="card-number" required minlength="16" maxlength="19" inputmode="numeric" pattern="[0-9 ]+" class="w-full border rounded-md px-3 py-2"  placeholder="4242 4242 4242 4242">
                        </div>
                        <div class="flex gap-4">
                            <input type="text" id="expiry" required minlength="5" maxlength="5" pattern="^(0[1-9]|1[0-2])\/\d{2}$" placeholder="MM/YY"  class="w-1/2 border px-3 py-2 rounded-md">
                            <input type="password" id="cvv" required minlength="3" maxlength="4" inputmode="numeric" pattern="\d{3,4}" placeholder="CVV"  class="w-1/2 border px-3 py-2 rounded-md">
                        </div>
                        <div class="flex gap-2">
                            <button type="button" id="back-btn" class="w-1/2 border py-2 rounded-md">Back</button>
                            <button type="submit" id="rent-btn" class="w-1/2 bg-purple-700 text-white py-2 rounded-md">Pay & Rent</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="../public/js/util.js"></script>
    <script src="../public/js/equipment/view-details.js"></script>
</body>
</html>