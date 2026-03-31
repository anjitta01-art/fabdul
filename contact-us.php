<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Fabdul Rental</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="images/laptop_ic.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        .lobsterWrite {
            font-family: "Caveat", sans-serif;
        }
    </style>
</head>
<body>
    <div>
        <?php include 'include/header.php'; ?>
        <main>
            <section class="h-[calc(100vh-79px)] bg-purple-200/50 py-10 px-20 flex items-cenmter">
                <div class="grid grid-cols-2 gap-x-6 items-center">
                    <div class="space-y-4">
                        <h1 class="text-6xl font-extrabold pt-2 lobsterWrite">
                            <span class="text-purple-700">Contact</span>
                            <span>Us</span>
                        </h1>
                        <p class="text-gray-700 font-medium">Let's Build Something Great Together</p>
                        <p class="w-2/3 text-sm text-gray-700 font-medium">Have a project in mind, a question about our service, or need expert guidance? We're here to help. Reach out to us and let's discuss how we can upscale your development or production.</p>
                    </div>
                    <div>
                        <img src="images/workspace.jpg" alt="Coding Workspace" class="border-4 border-white rounded-2xl object-cover">
                    </div>
                </div>
            </section>
            <section class="px-20 py-20 space-y-14">
                <div class="px-20">
                    <div class="bg-purple-900/40 backdrop-blur-lg border border-white/20 rounded-2xl shadow-lg py-10 px-14 w-3xl mx-auto">
                        <form class="space-y-10 text-gray-800" id="contactForm">
                            <div class="text-center flex flex-col justify-center items-center">
                                <p class="flex items-center">
                                    <span class="text-lg font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 10a2 2 0 0 0-2 2a2 2 0 0 0 2 2c1.11 0 2-.89 2-2a2 2 0 0 0-2-2"/></svg>
                                    </span>
                                    <span class="uppercase font-medium text-xs">Contact Us</span>
                                </p>
                                <h3 class="text-xl font-bold text-center">Get in Touch</h3>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="flex flex-col">
                                    <label for="fullname" class="flex text-sm font-medium gap-x-2">
                                        <span>Full Name</span>
                                        <span>*</span>
                                    </label>
                                    <input type="text" placeholder="Name" id="fullname" class="bg-gray-300/50 border border-gray-400 rounded-md font-medium px-2 py-2 focus:outline-none">
                                </div>
                                <div class="flex flex-col">
                                    <label for="email" class="flex text-sm font-medium gap-x-2">
                                        <span>Email</span>
                                        <span>*</span>
                                    </label>
                                    <input type="text" placeholder="Email" id="email" class="bg-gray-300/50 border border-gray-400 rounded-md font-medium px-2 py-2 focus:outline-none">
                                    <div id="email-error" class="text-red-500 text-xs mt-1"></div>
                                </div>
                                <div class="flex flex-col">
                                    <label for="phone" class="flex text-sm font-medium gap-x-2">
                                        <span>Phone Number</span>
                                        <span>*</span>
                                    </label>
                                    <input type="text" placeholder="Phone Number" id="phone" class="bg-gray-300/50 border border-gray-400 rounded-md font-medium px-2 py-2 focus:outline-none">
                                    <div id="phone-error" class="text-red-500 text-xs mt-1"></div>
                                </div>
                                <div class="flex flex-col">
                                    <label for="equipmentType" class="flex text-sm font-medium gap-x-2">
                                        <span>Equipment</span>
                                    </label>
                                    <input type="text" placeholder="Equipment" id="equipmentType" class="bg-gray-300/50 border border-gray-400 rounded-md font-medium px-2 py-2 focus:outline-none">
                                </div>
                                <div class="col-span-2 flex flex-col">
                                    <label for="message" class="flex text-sm font-medium gap-x-2">
                                        <span>Message</span>
                                        <span>*</span>
                                    </label>
                                    <textarea name="message" id="message" placeholder="Message" class="h-40 border border-gray-400 bg-gray-300/50 rounded-md font-medium px-2 py-2 focus:outline-none"></textarea>
                                </div>
                                <div class="flex justify-center items-center col-span-2">
                                    <button id="submit-btn" class="border border-gray-400 rounded-lg py-2 px-6 text-sm flex items-center gap-x-4 font-semibold cursor-pointer hover:bg-gray-200/50">
                                        <span id="btn-text-space">Send Message</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024"><path fill="currentColor" d="M754.8 480H160a32 32 0 1 0 0 64h594.8L521.3 777.3a32 32 0 0 0 45.4 45.4l288-288a32 32 0 0 0 0-45.4l-288-288a32 32 0 1 0-45.4 45.4z"/></svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="px-20 grid grid-cols-3 items-center gap-x-5">
                    <div class="text-center flex flex-col justify-center space-y-2">
                        <span class="p-2 flex items-center justify-center w-max m-auto rounded-full bg-pink-200/30 text-pink-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.28-.28.67-.36 1.02-.25c1.12.37 2.32.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57c.11.35.03.74-.25 1.02z"/></svg>
                        </span>
                        <h3 class="text-lg font-semibold pt-4">Call Us</h3>
                        <p class="text-sm font-medium text-gray-700">Mon-Sat from 08:00am to 22:00pm</p>
                        <p class="font-semibold">+44 7344 058934</p>
                    </div>
                    <div class="text-center flex flex-col justify-center space-y-2 border-l border-r border-gray-300 px-10">
                        <span class="p-2 flex items-center justify-center w-max m-auto rounded-full bg-purple-200/30 text-purple-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10.115 21.811c.606.5 1.238.957 1.885 1.403a27 27 0 0 0 1.885-1.403a28 28 0 0 0 2.853-2.699C18.782 16.877 21 13.637 21 10a9 9 0 1 0-18 0c0 3.637 2.218 6.876 4.262 9.112a28 28 0 0 0 2.853 2.7M12 13.25a3.25 3.25 0 1 1 0-6.5a3.25 3.25 0 0 1 0 6.5"/></svg>
                        </span>
                        <h3 class="text-lg font-semibold pt-4">Our Office</h3>
                        <p class="text-sm font-medium text-gray-700">Come say hello at our office.</p>
                        <p class="font-semibold">10 Carigravier Gardens, Aberdeen, Scotland, United Kingdom. AB10 6GP</p>
                    </div>
                    <div class="text-center flex flex-col justify-center space-y-2">
                        <span class="p-2 flex items-center justify-center w-max m-auto rounded-full bg-blue-200/30 text-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m20 8l-8 5l-8-5V6l8 5l8-5m0-2H4c-1.11 0-2 .89-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2"/></svg>
                        </span>
                        <h3 class="text-lg font-semibold pt-4">Email Us</h3>
                        <p class="text-sm font-medium text-gray-700">Drop us an email anytime</p>
                        <p class="font-semibold">support@fabdul.com</p>
                    </div>
                </div>
            </section>
        </main>
        <?php include 'include/footer.php'; ?>

        <!-- Toast Notification -->
        <div id="toast" class="hidden fixed top-5 right-5 z-50">
            <div id="toast-box" class="bg-gray-800 text-white px-4 py-3 rounded shadow-lg flex items-center gap-3">
                <div id="toast-message" class="text-sm"></div>
            </div>
        </div>
    </div>


    <script src="public/js/util.js"></script>
    <script src="public/js/contact-us.js"></script>
</body>
</html>