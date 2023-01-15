<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('../view/template/header.php'); ?>
    <title>Image upload</title>
</head>
<body>
<?php include_once('../view/template/navigation.php'); ?>
    <div class="container">
        <div class="alert alert-primary" role="alert" id="msg" <?php echo !empty($message) ?: 'style="display:none"' ?>> 
           <?php echo $message?>
        </div>
        <form class="row g-3" action="?action=fileUpload" method="POST" enctype="multipart/form-data" id="form_file_data">
            <div class="col-12">
                <div class="card mt-2 mb-3">
                    <div class="card-header">
                        Upload Image
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="uploadFile">Select type</label>
                            <select name="type">
                                <option value="main">Main</option>
                                <option value="secondary">Secondary</option>
                            </select>
                            <label for="uploadFile">Select image</label>
                            <input type="file" name="uploadFile" id="uploadFile" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <input type="submit" value="File Upload" name="submit" class="btn btn-success submit float right" id="submit">     
            </div>
        </form>
    </div>
<?php include_once('../view/template/footer.php'); ?>
</body>
</html>