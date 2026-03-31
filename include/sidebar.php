<nav class="bg-gray-800 text-white w-64 sticky top-0 h-[calc(100vh-74px)] p-6 flex flex-col justify-between">
    <ul class="space-y-4 text-sm">
        <li><a href="/fabdul/admin/index.php">Dashboard</a></li>
        <li><a href="/fabdul/admin/users/index.php">Users</a></li>
        <li><a href="/fabdul/admin/users/add.php">Add User</a></li>
        <li><a href="/fabdul/admin/products/index.php">Products</a></li>
        <li><a href="/fabdul/admin/add-item.php">Add Item</a></li>
        <li><a href="/fabdul/admin/products/dued-rents.php">Due Rents</a></li>
        <li><a href="/fabdul/admin/message.php">Messages</a></li>
    </ul>
    <a href="/fabdul/controller/auth/logout.php" class="flex items-center gap-x-2 mt-10 text-red-500 hover:text-red-700">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M14 8V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2v-2"/><path d="M9 12h12l-3-3m0 6l3-3"/></g></svg>
        </span>
        <span>Logout</span>
    </a>
</nav>