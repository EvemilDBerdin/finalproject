<?php require('./includes/header.php'); ?>
<div class="card-body">
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h4 class="card-title">Profile</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="text-center">
                <div class="user-profile">
                    <img src="<?= $_SESSION['url'] ?>/public/assets/images/avatars/01.png" alt="profile-img" class="rounded-pill avatar-130 img-fluid">
                </div>
                <div class="mt-3">
                    <h3 class="d-inline-block">Austin Robertson</h3>
                    <p class="d-inline-block pl-3"> - Web developer</p>
                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="header-title">
                <h4 class="card-title">About User</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="user-bio">
                <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p>
            </div>
            <div class="mt-2">
                <h6 class="mb-1">Joined:</h6>
                <p>Feb 15, 2021</p>
            </div>
            <div class="mt-2">
                <h6 class="mb-1">Lives:</h6>
                <p>United States of America</p>
            </div>
            <div class="mt-2">
                <h6 class="mb-1">Email:</h6>
                <p><a href="#" class="text-body"> austin@gmail.com</a></p>
            </div>
            <div class="mt-2">
                <h6 class="mb-1">Url:</h6>
                <p><a href="#" class="text-body" target="_blank"> www.bootstrap.com </a></p>
            </div>
            <div class="mt-2">
                <h6 class="mb-1">Contact:</h6>
                <p><a href="#" class="text-body">(001) 4544 565 456</a></p>
            </div>
        </div>
    </div>
</div>

<?php require('./includes/footer.php'); ?>