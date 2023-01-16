<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('../view/template/header.php'); ?>
    <title>Edit Image</title>
</head>
<body>
<?php include_once('../view/template/navigation.php'); ?>
    <div class="container">
        <div class="alert alert-primary" role="alert" id="msg" <?php echo !empty($message) ?: 'style="display:none"' ?>> 
           <?php echo $message?>
        </div>
        <form class="row g-3" action="?action=editImage&id=<?= $image['i_id'] ?>" method="POST" enctype="multipart/form-data" id="form_file_data">
            <input type="hidden" name="i_id" value="<?= $image['i_id'] ?>">
            <div class="col-12">
                <div class="card mt-2 mb-3">
                    <div class="card-header">
                        Edit Image
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div id="display-image">
                                <img src=".\uploads\<?= $image['i_filename']?>">
                            </div>
                            <label for="uploadFile">Select type</label>
                            <select name="type">
                                <option value="main" <?= $image['i_type'] == 'main' ? 'selected' : '' ?>>Main</option>
                                <option value="secondary" <?= $image['i_type'] == 'secondary' ? 'selected' : '' ?>>Secondary</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <input type="submit" value="Edit Image" name="submit" class="btn btn-success submit float right" id="submit">     
            </div>
        </form>
    </div>
<?php include_once('../view/template/footer.php'); ?>
</body>
</html>