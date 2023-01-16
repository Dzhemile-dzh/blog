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
                <?php 
                    $cols = array("#", "Image", "Date", "Type");
                    foreach ($cols as $col) {
                        echo "<th scope='col'>$col</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($images as $image) { ?> 
            <tr>
                <th scope="row"><?= $image['i_id']; ?></th>
                <td>    
                    <div id="display-image">
                        <img src=".\uploads\<?= $image['i_filename']?>">
                    </div>
                </td>
                <td><?= $image['i_uploaded']; ?></td>
                <td><?= $image['i_type']; ?></td>
                <td>
                    <form action="?action=deleteImage" method="POST">
                        <button type="submit" name="delete_image" value="<?= $image['i_id'];?>" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
                <td>
                    <a href="?action=editImage&id=<?=$image['i_id']?>"><button class="btn btn-info">Edit</button></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </div>
    <?php include_once('..\view\template\footer.php'); ?>
</body>
</html>