<?php require('./includes/header.php'); ?>

<div class="card-header d-flex justify-content-between flex-wrap">
    <div class="header-title">
        <h4 class="card-title mb-0">CPC Students Data</h4>
    </div>
</div>
<div class="card-body">
    <div>
        <table id="studentTabFetch_tbl" class="table" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>School ID</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade studentViewIdModal" tabindex="-1" aria-labelledby="addNewInstructorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Student Information</h5>
            </div> 
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">School ID</label>
                    <input type="text" class="form-control" name="school_id" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('./includes/footer.php'); ?>