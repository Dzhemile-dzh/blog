<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('..\view\template\header.php'); ?>
    <title>Image upload</title>
</head>
<body>
<?php include_once('..\view\template\navigation.php'); ?>
    <div class="container">
        <a href="?action=fileUpload"><button class="btn btn-success">Add Image</button></a>
        <h1>All Images</h1>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Date</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($images as $image) { ?> 
            <tr>
                <th scope="row"><?php echo $image['i_id']; ?></th>
                <td>    
                    <div id="display-image">
                        <img src=".\uploads\<?php echo $image['i_filename']?>">
                    </div>
                </td>
                <td><?php echo $image['i_uploaded']; ?></td>
                <td><?php echo $image['i_type']; ?></td>
                <td>
                    <button type="submit" name="delete_image" value="<?php echo $image['i_id']?>" class="btn btn-danger">Delete</button>
                    <button type="submit" name="edit_image" value="<?php echo $image['i_id']?>" class="btn btn-warning">Edit</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </div>
    <?php include_once('..\view\template\footer.php'); ?>
</body>
</html>