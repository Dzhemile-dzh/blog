<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('template\header.php'); ?>
    <title>Blogs</title>
</head>
<body>
<?php include_once('template\nav.php'); ?>
        <h1>All Blog details</h1>
        <?php foreach ($blogs as $blog) { ?> 
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">   
                            <img src=".\uploads\<?= $blog['i_filename']?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $blog['b_title'];?></h5>
                                <button class="btn btn-outline-dark"><?= $blog['b_type'];?></button>
                                <p class="card-text"><?= $blog['b_body'];?></p>
                                <p class="card-text"><small class="text-muted"><?=$blog['b_author'];?></small></p>
                                <p class="card-text"><small class="text-muted"><?=$blog['b_date'];?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>        
    <?php include_once('template\footer.php'); ?>
</body>
</html>