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
                <?php 
                    $cols = array("#", "Title", "Body", "Author", "Status");
                    foreach ($cols as $col) {
                        echo "<th scope='col'>$col</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($blogs as $blog) { ?> 
            <tr>
                <th scope="row"><?= $blog['b_id']; ?></th>

                <td><?= $blog['b_title']; ?></td>
                <td><?= substr($blog['b_body'],0,120).'...'; ?></td>
                <td><?= $blog['b_author']; ?></td>
                <td><button class="btn <?= $blog['b_is_active'] ? 'btn-success' : 'btn-danger' ?>"><?= $blog['b_is_active'] ? 'active' : 'not active' ?>
                </button></td>
                <td>
                    <form action="?action=deleteBlog" method="POST">
                        <button type="submit" name="delete_blog" value="<?= $blog['b_id'];?>" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="?action=editBlog&id=<?=$blog['b_id']?>"><button class="btn btn-info">Edit</button></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </div>
    <?php include_once('..\view\template\footer.php'); ?>
</body>
</html>