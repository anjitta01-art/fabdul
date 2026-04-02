<header class="flex items-center py-5 px-20 border-b border-[#dfdfdf] justify-between">
    <div class="flex gap-x-8 items-center">
        <div href="/fabdul/" class="flex items-center gap-x-2">
            <span class="text-2xl text-purple-700 italic font-extrabold lobsterWrite flex flex-col leading-none">
                <span class="leading-none">Fabdul</span>
                <span class="leading-none">Tech Rentals</span>
            </span>
        </div>
        <nav>
            <ul class="flex items-center space-x-4 text-sm font-medium text-[#333333]">
                <li>
                    <a href="/fabdul/index.php">Home</a>
                </li>
                <li>
                    <a href="/fabdul/equipments/index.php">Browse Rentals</a>
                </li>
                <?php 
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    if (isset($_SESSION['user_id'])) {
                        echo '<li>
                                <a href="/fabdul/equipments/rent-history.php">All Rents</a>
                            </li>';
                    }
                ?>
                <?php 
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    if (isset($_SESSION['user_id'])) {
                        echo '<li>
                                <a href="/fabdul/equipments/returned-items.php">Returned Items</a>
                            </li>';
                    }
                ?>
                <li>
                    <a href="/fabdul/about-us.php">About Us</a>
                </li>
                <li>
                    <a href="/fabdul/contact-us.php">Contact Us</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="flex items-center gap-x-4">
        <?php 
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['user_id'])) {
            $name = $_SESSION['name'] ?? 'User';
            $email = $_SESSION['email'] ?? '';
            $initials = implode('', array_map(function($part) { return strtoupper($part[0]); }, explode(' ', $name)));
            echo '
                <div class="flex items-center gap-x-3">
                    <div>
                        <button class="bg-purple-200/50 hover:bg-purple-300/50 text-purple-700 font-bold p-4 rounded-full cursor-pointer">
                            ' . $initials . '
                        </button>
                    </div>
                    <div class="hidden">
                        <div>
                            <span>' . $name . '</span>
                            <span>' . $email . '</span>
                        </div>
                    </div>
                </div>
                <div>
                    <a class="border border-red-500 bg-red-500 text-white hover:bg-red-600 hover:text-white px-4 py-2 rounded text-sm font-medium" href="/fabdul/controller/auth/logout.php">
                        Logout
                    </a>
                </div>
            ';

        } else {

            echo '<a href="/fabdul/auth/login.php" class="text-sm font-medium text-[#333333]">Login</a>';
            echo '<a href="/fabdul/auth/register.php" class="text-sm font-semibold text-white bg-purple-700 border border-purple-700 py-2 px-4 rounded-md hover:bg-purple-800">Create Account</a>';

        }
        ?>
    </div>
</header>