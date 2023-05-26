<?php require('./includes/header.php'); ?>

<div class="card-header d-flex justify-content-between flex-wrap">
    <div class="header-title">
        <h4 class="card-title mb-0">Course Offered</h4>
    </div>
    <div>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target=".long-modal">New</button>
    </div>
</div>
<div class="card-body">
    <div>
        <table id="courseTabFetch_tbl" class="table" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th> 
                    <th>Start</th> 
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade" id="courseEditIdModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewInstructorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit Course</h5>
                </div>
            <form id="courseEditIdForm">
                <div class="modal-body">
                    <input type="hidden" name="data[id]" required> 
                    <div class="form-group">
                        <label class="form-label">Course Name</label>
                        <input type="text" class="form-control" name="data[course_offered]" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Start</label>
                        <input type="date" class="form-control" name="data[course_applied]" required>
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

<div class="modal fade long-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewInstructorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Course</h5>
            </div>
            <form id="CourseAddIdForm">
                <div class="modal-body"> 
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="data[course_offered]">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date Applied</label>
                        <input type="date" class="form-control" name="data[course_applied]">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require('./includes/footer.php'); ?>