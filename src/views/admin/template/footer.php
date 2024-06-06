    </div>
    <div class="kanan">
        <div class="navbar">
            <button class="btnnav acc"><p class="namesidebar">Hello, <?= $_SESSION['name'] ?></p></button>
            <button onclick="location.href='<?= BASEURL . '/admin/dashboard' ?>'" type="button" class="btnnav"><span class="material-symbols-outlined">home</span>Dashboard</button>
            <button onclick="location.href='<?= BASEURL . '/admin/book' ?>'" type="button" class="btnnav"><span class="material-symbols-outlined">book_2</span>Book</button>
            <button onclick="location.href='<?= BASEURL . '/admin/librarian' ?>'" type="button" class="btnnav"><span class="material-symbols-outlined">supervisor_account</span>Librarian</button>
            <button onclick="location.href='<?= BASEURL . '/admin/customer' ?>'" type="button" class="btnnav"><span class="material-symbols-outlined">person</span>Customer</button>
            <button onclick="location.href='<?= BASEURL . '/admin/history' ?>'" type="button" class="btnnav"><span class="material-symbols-outlined">history</span>History</button>
            <button onclick="location.href='<?= BASEURL . '/logout' ?>'" type="button" class="btnnavlo"><span class="material-symbols-outlined">logout</span>Logout</button>
        </div>
    </div>
    <script src="<?= BASEURL . '/js/script.js' ?> "></script>
</body>
</html>