<?php require('./includes/header.php'); ?>

<div class="card-header d-flex justify-content-between flex-wrap">
    <div class="header-title">
        <h4 class="card-title mb-0">Dashboard</h4>
    </div>
</div>
<div class="card-body">
    <div class="row" id="dashboardindex">
        <div class="card-body col-md-3">
            <div class="progress-widget">
                <div class="progress-detail">
                    <p class="mb-2">Total Dean</p>
                    <h4 class="counter dean" style="visibility: visible;"></h4>
                </div>
            </div>
        </div>
        <div class="card-body col-md-3">
            <div class="progress-widget">
                <div class="progress-detail">
                    <p class="mb-2">Total Instructor</p>
                    <h4 class="counter instructor" style="visibility: visible;"></h4>
                </div>
            </div>
        </div>
        <div class="card-body col-md-3">
            <div class="progress-widget">
                <div class="progress-detail">
                    <p class="mb-2">Total Student</p>
                    <h4 class="counter student" style="visibility: visible;"></h4>
                </div>
            </div>
        </div>
        <div class="card-body col-md-3">
            <div class="progress-widget">
                <div class="progress-detail">
                    <p class="mb-2">Total Subject</p>
                    <h4 class="counter subject" style="visibility: visible;"></h4>
                </div>
            </div>
        </div>
    </div> 
</div>

<?php require('./includes/footer.php'); ?>