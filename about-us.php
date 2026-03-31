<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Fabdul Rental</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="images/laptop_ic.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <?php include 'include/header.php'; ?>
        <main>
            <div style="background-image: url('images/keyboard.jpg');" class="h-[50vh]">
                <div class="bg-black/70 h-full w-full flex flex-col items-center gap-y-2 justify-center text-white">
                    <h1 class="text-4xl font-bold">About Us</h1>
                    <p class="">Get to know more about us.</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-x-10 px-20 pt-16 pb-10">
                <div>
                    <img src="images/developer.jpg" alt="Programer on a system" class="w-xl rounded-xl">
                </div>
                <div class="space-y-4">
                    <span class="text-xs font-medium text-gray-700">About Us</span>
                    <h2 class="text-2xl font-bold">We Always Make The Best</h2>
                    <p class="text-gray-700 w-2/3 font-medium">
                        To provide affordable, reliable and easy access to technology through a secure and user-friendly rental platform.
                        <br>
                        <br>
                        To also become a leading technology rental service, bridging the gap between innovation and accessibility across diverse comunities
                    </p>
                    <div class="pt-4">
                        <a href="contact-us.php" class="border border-purple-700 bg-purple-700 text-white text-sm font-medium py-2 px-4 rounded-full">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="bg-purple-200/50 py-16 px-20 grid grid-cols-2 gap-x-10">
                <div class="space-y-4 pr-10">
                    <h3 class="text-3xl text-purple-700 font-semibold">Our Skills</h3>
                    <p class="text-gray-700 text-sm font-medium">Reliable and easy access to technology through a secure and user-friendly rental platform.</p>
                    <div class="space-y-6">
                        <div>
                            <div class="flex items-center justify-between text-sm font-medium pr-20 text-gray-700">
                                <span>Fast Delivery</span>
                                <span>98%</span>
                            </div>
                            <div>
                                <div class="border border-purple-700 mr-20"></div>
                                <div class="border border-purple-200"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-sm font-medium pr-28 text-gray-700">
                                <span>Equipment Quality</span>
                                <span>95%</span>
                            </div>
                            <div>
                                <div class="border border-purple-700 mr-28"></div>
                                <div class="border border-purple-200"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center justify-between text-sm font-medium pr-14 text-gray-700">
                                <span>Insurance Policy</span>
                                <span>99%</span>
                            </div>
                            <div>
                                <div class="border border-purple-700 mr-14"></div>
                                <div class="border border-purple-200"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-10 grid grid-cols-2 gap-10">
                    <div class="text-center flex flex-col">
                        <span class="font-bold text-2xl text-gray-700">20+</span>
                        <span class="text-gray-700 text-sm fonmt-medium">Years of Experience</span>
                    </div>
                    <div class="text-center flex flex-col">
                        <span class="font-bold text-2xl text-gray-700">1,500+</span>
                        <span class="text-gray-700 text-sm fonmt-medium">Standard Equipmenst</span>
                    </div>
                    <div class="text-center flex flex-col">
                        <span class="font-bold text-2xl text-gray-700">300+</span>
                        <span class="text-gray-700 text-sm fonmt-medium">Satisfied Client</span>
                    </div>
                    <div class="text-center flex flex-col">
                        <span class="font-bold text-2xl text-gray-700">34</span>
                        <span class="text-gray-700 text-sm fonmt-medium">Certified Award</span>
                    </div>
                </div>
            </div>
            <div class="px-20 py-20">
                <div class="bg-no-repeat bg-cover bg-center h-[60vh]" style="background-image: url('images/servers.jpg');">
                    <div class="bg-black/50 h-full flex justify-center items-center py-20">
                        <div class="text-white space-y-4">
                            <p class="text-center text-sm font-medium">Rent With Us Now</p>
                            <h3 class="text-4xl font-semibold text-center">We Are Always Ready To<br>Take A Perfect Shot</h3>
                            <div class="flex justify-center">
                                <a href="auth/register.php" class="py-2 px-4 rounded-full text-sm font-medium bg-white text-black border border-white">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'include/footer.php'; ?>
    </div>
</body>
</html>