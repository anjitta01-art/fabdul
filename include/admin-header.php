<header class="fixed top-0 left-0 right-0 z-20 bg-white flex items-center py-2 px-20 border-b border-[#dfdfdf] justify-between">
    <div class="flex gap-x-8 items-center">
        <h2 class="text-xl font-extrabold text-purple-700 lobsterWrite flex flex-col lobsterWrite">
            <span>Fabdul</span>
            <span>Tech Rentals</span>
        </h2>
        <h2 class="text-xl font-bold">Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Admin'; ?></h2>
    </div>
    <div class="flex items-center gap-x-4"></div>
</header>