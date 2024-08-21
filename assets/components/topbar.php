<header class="header">
    <div class="header-content">
        <h5>Zan-tech Opportunities</h5>
        <div class="dropdown">
            <img src="../../assets/images/avatar.png" alt="Avatar" class="avatar" id="avatar">
            <div class="dropdown-menu" id="dropdown-menu">
                <a href="profile.php">My Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</header>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatar = document.getElementById('avatar');
        const dropdownMenu = document.getElementById('dropdown-menu');

        avatar.addEventListener('click', function() {
            dropdownMenu.classList.toggle('show');
        });

        // Close dropdown if clicking outside of it
        window.addEventListener('click', function(event) {
            if (!avatar.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>