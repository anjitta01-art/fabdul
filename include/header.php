<header class="flex items-center py-5 px-20 border-b border-[#dfdfdf] justify-between">
    <div class="flex gap-x-8 items-center">
        <a href="/fabdul/" class="text-2xl text-purple-700 italic font-extrabold">FABDUL</a>
        <nav>
            <ul class="flex items-center space-x-4 text-sm font-medium text-[#333333]">
                <li>
                    <a href="#">Laptops</a>
                </li>
                <li>
                    <a href="#">Workstations</a>
                </li>
                <li>
                    <a href="#">Servers</a>
                </li>
                <li>
                    <a href="#">Pricing</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="flex items-center gap-x-4">
        <?php 
            session_start();
            if (isset($_SESSION['username'])) {
                $user = $_SESSION['username'];
                echo '<a href="/fabdul/profile.php" class="text-sm font-medium text-[#333333]">' . htmlspecialchars($user) . '</a>';
                echo '<a href="/fabdul/auth/logout.php" class="text-sm font-medium text-[#333333]">Logout</a>';
            } else {
                echo '<a href="/fabdul/auth/login.php" class="text-sm font-medium text-[#333333]">Login</a>';
                echo '<a href="/fabdul/auth/register.php" class="text-sm font-medium text-[#333333]">Register</a>';
            }
        ?>
    </div>
</header>