<header class="header">
    <div class="header-content">
        <h5>Zan-tech Opportunities</h5>
        <div class="dropdown">
            <img src="../../assets/images/avatar.png" alt="Avatar" class="avatar" id="avatar">
            <div class="dropdown-menu" id="dropdown-menu">
                <a href="profile.php">My Profile</a>
                <a href="#" ><li href="#" id="logout-link" data-bs-toggle="modal" data-bs-target="#logoutModal" >Logout</li></a>
            </div>
        </div>
    </div>
</header>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="../../handler/logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>

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
