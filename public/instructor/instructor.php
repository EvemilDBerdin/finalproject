<?php require('./includes/header.php'); ?>

<div class="card-header d-flex justify-content-between flex-wrap">
    <div class="header-title">
        <h4 class="card-title mb-0">CPC Instructors Data</h4>
    </div>
    <div>
        <a href="#" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3" data-bs-toggle="modal" data-bs-target=".long-modal">
            <span>New Instructor</span>
        </a>
    </div>
</div>
<div class="card-body">
    <div>
        <table id="instructorTabFetch_tbl" class="table" width="100%">
            <thead>
                <tr>
                    <th>School ID</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade long-modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewInstructorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addNewInstructorForm">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">New instructor</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="data[email]">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="data[password]">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade editInstructor"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewInstructorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="EditNewInstructorForm">
                <input type="hidden" name="data[id]">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit instructor</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">School ID</label>
                        <input type="text" class="form-control" name="data[school_id]" readonly>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="data[email]">
                    </div>
                    <div class="form-group">
                        <input class="checkbox" type="checkbox" id="password">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control" name="data[password]" disabled required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Role</label>
                        <select class="form-control" name="data[role]" required>
                            <option value="">Choose</option>
                            <option value="dean">Dean</option>
                            <option value="instructor">Instructor</option>
                        </select>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require('./includes/footer.php'); ?>