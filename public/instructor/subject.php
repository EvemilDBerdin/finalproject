<?php require('./includes/header.php');  
$conn = new PDO("mysql:host=localhost;dbname=finalproject","root","");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<div class="card-header d-flex justify-content-between flex-wrap">
    <div class="header-title">
        <h4 class="card-title mb-0">Subject Offered</h4>
    </div>
    <div>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target=".long-modal">New</button>
    </div>
</div>
<div class="card-body">
    <div>
        <table id="subjectTabFetch_tbl" class="table" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade" id="subjectEditIdModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewInstructorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit Subject</h5>
            </div>
            <form id="subjectEditIdForm">
                <div class="modal-body">
                    <input type="hidden" name="data[id]" required>
                    <div class="form-group">
                        <label class="form-label">Subject Name</label>
                        <input type="text" class="form-control" name="data[name]">
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
                <h5 class="modal-title text-white">Add Subject</h5>
            </div>
            <form id="subjectAddIdForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Course</label>
                        <select class="form-control" name="data[course_id]">
                            <option value="">Choose</option>
                            <?php  
                                $filesubject['resultEmail'] = $conn->prepare("SELECT * FROM school_course WHERE flag=0");
                                $filesubject['resultEmail']->execute();
                                $filesubject['dataEmail'] = $filesubject['resultEmail']->fetchAll(PDO::FETCH_ASSOC);
                                if(!empty($filesubject['dataEmail'])):
                                    foreach($filesubject['dataEmail'] as $key => $value):
                            ?>
                                <option value="<?= $value['id']  ?>"><?= $value['course_offered'] ?></option>
                            <?php endforeach; else: ?>
                                <option value="">No Data Found</option>
                            <?php endif;  ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Subject Name</label>
                        <input type="text" class="form-control" name="data[name]">
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