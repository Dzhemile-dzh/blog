<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('../view/template/header.php'); ?>
    <title>Edit Blog Details</title>
</head>
<body>
<?php include_once('../view/template/navigation.php'); ?>
    <div class="container">
        <div class="alert alert-primary" role="alert" id="msg" <?= !empty($message) ?: 'style="display:none"' ?>> 
           <?= $message?>
        </div>
        <form class="row g-3" action="?action=editBlog&id=<?= $blog['b_id']; ?>" method="POST">
        <input type="hidden" name="b_id" value="<?= $blog['b_id']; ?>">
            <div class="col-12">
                <div class="card mt-2 mb-3">
                    <div class="card-header"> Edit Blog</div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <label for="b_title">title</label>
                                <input type="text" class="form-control" name="b_title" id="b_title" value="<?= $blog['b_title']; ?>" required>
                                
                                <label for="b_body">body</label>
                                <input type="textarea"  class="form-control" name="b_body" id="b_body" value="<?= $blog['b_body']; ?>" required>
                            </div>
                            <div class="row">
                                <label for="b_is_active">is active</label>
                                <input type="checkbox" name="b_is_active" value="1" class="form-check-input" <?= $blog['b_is_active']==1 ? 'checked' : ''; ?>>
            
                                <label for="b_type">type</label>
                                <select name="b_type" class="form-control">
                                    <?php 
                                        $types = array("home-decor", "business", "art");
                                        foreach ($types as $type) {
                                            $selected = $type == $blog['b_type'] ? 'selected' : '';
                                            echo "<option value='$type' $selected>$type</option>";
                                        }
                                    ?>
                                </select>

                                <label for="b_author">author</label>
                                <input type="text"  class="form-control" name="b_author" id="b_author" value="<?= $blog['b_author']; ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <input type="submit" value="Save changes" name="submit" class="btn btn-success submit float right" id="submit">
            </div>
        </form>
    </div>
    <?php include_once('../view/template/footer.php'); ?>
</body>
</html>


