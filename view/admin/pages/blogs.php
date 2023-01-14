<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('..\view\template\header.php'); ?>
    <title>Blogs</title>
</head>
<body>
<?php include_once('..\view\template\navigation.php'); ?>
    <div class="container">
        <a href="?action=addBlog"><button class="btn btn-success">Add Blog</button></a>
        <h1>All Blog details</h1>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">body</th>
                <th scope="col">author</th>
                <th scope="col">status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($blogs as $blog) { ?> 
            <tr>
                <th scope="row"><?php echo $blog['b_id']; ?></th>

                <td><?php echo $blog['b_title']; ?></td>
                <td><?php echo substr($blog['b_body'],0,120).'...'; ?></td>
                <td><?php echo $blog['b_author']; ?></td>
                <td><?php if ($blog['b_is_active']){?><button class="btn btn-success">active</button>
                    <?php }else{ ?><button class="btn btn-danger"> not active</button> <?php } ?>
                </td>
                <td>
                    <button type="submit" name="delete_blog" value="<?php echo $blog['b_id']?>" class="btn btn-danger">Delete</button>
                    <button type="submit" name="edit_blog" value="<?php echo $blog['b_id']?>" class="btn btn-warning">Edit</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </div>
    <?php include_once('..\view\template\footer.php'); ?>
</body>
</html>