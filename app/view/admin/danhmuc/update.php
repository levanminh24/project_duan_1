<?php if(is_array($dm)){
    extract($dm);
} ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cập nhật danh mục</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            // Check if there are errors and display them
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
            ?>
            <form action="index.php?act=updatedm" method="post" class="form" enctype="multipart/form-data" id="updateForm">
               
                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" name="tenloai" id="tendm" class="form-control" placeholder="Nhập tên danh mục..." value="<?php if(isset($name)) echo $name; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Hình danh mục</label>
                    <input type="file" name="hinh" id="hinh" class="form-control">
                    Ảnh cũ:<br>
                    <img style="width: 100px;" src="../../images/<?= $img ?>" alt="Ảnh cũ">
                </div>
                <div>
                    <!-- Hidden field to store the old image value -->
                    <input type="hidden" name="old_img" value="<?php if(isset($img)) echo $img; ?>">
                    <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>">
                    <input type="submit" value="Cập Nhật" class="btn btn-success" name="capnhat" id="submitButton" disabled>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // JavaScript to enable/disable the submit button based on changes in the form
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("updateForm");
        const submitButton = document.getElementById("submitButton");
        const originalName = "<?php echo isset($name) ? $name : ''; ?>";
        const originalImg = "<?php echo isset($img) ? $img : ''; ?>";

        // Track changes on the name field and file input
        const nameField = document.getElementById("tendm");
        const fileInput = document.getElementById("hinh");

        function checkChanges() {
            // Check if the name or image has changed
            const nameChanged = nameField.value !== originalName;
            const fileChanged = fileInput.files.length > 0;
            // Enable the submit button if any change is detected
            submitButton.disabled = !(nameChanged || fileChanged);
        }

        // Attach event listeners to detect changes
        nameField.addEventListener("input", checkChanges);
        fileInput.addEventListener("change", checkChanges);
    });
</script>

