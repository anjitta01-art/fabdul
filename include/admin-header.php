<header class="fixed top-0 left-0 right-0 z-20 bg-white flex items-center py-5 px-20 border-b border-[#dfdfdf] justify-between">
    <div class="flex gap-x-8 items-center">
        <a href="/fabdul/" class="text-2xl text-purple-700 italic font-extrabold">FABDUL</a>
        <h2 class="text-xl font-bold">Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Admin'; ?></h2>
    </div>
    <div class="flex items-center gap-x-4"></div>
</header>