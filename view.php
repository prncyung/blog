<?php
include('header.php');
include('post.php');
include('Comment.php');

//get(instantiate) instance of the post class
$post = new Post($db);
//instantiate the comment class
$comments = new Comment($db);

//echo $posts->getSinglePost($_GET['slug']);
?>
<div class="container">
    <div class="row">
        <?php foreach ($post->getSinglePost($_GET['slug']) as $post) { ?>
            <div class="card">
                <img class="card-img-top" src="images/<?php echo $post['image']; ?>" />
            </div>
            <div class="card-body">
                <h4 class=card-title><?php echo $post['title']; ?></h4>
                <p class="card-text"><?php echo $post['description']; ?></p>
            </div>
        </div>
    <?php } ?>


    <div class="row">
        <div>
            <h4>Comments (<?php echo $comments->countComment($_GET['slug']); ?>)</h4>

            <!--Get dynamic comment data from the database-->

            <?php foreach ($comments->getCommentBySlug($_GET['slug']) as $comment) { ?>
                <div class="media">
                    <div class="media-left media-top">
                        <img src="images/avatar.png" class="media-object" width="50px" />
                    </div>

                    <div class="media-body">
                        <strong><?php echo $comment['name']; ?></strong>
                        <p><?php echo $comment['description']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

    <?php
    //for the comment form
    //add comment to database
    if (isset($_POST['btnComment'])) {
        $date = date('Y-m-d');
        $status = 0;
        if (!empty($_POST['name']) && !empty(['email']) && !empty(['description'])) {
            $result = $comments->comment(
                strip_tags($_POST['name']),
                strip_tags($_POST['email']),
                strip_tags($_POST['subject']),
                strip_tags($_POST['description']),
                strip_tags($_GET['slug']),
                $date,
                $status
            );
            if ($result == True) {
                echo "Comment added successfully";
            }
        } else {
            echo "Name, Email and description are compulsory";
        }
    }
    ?>
    <div class="row">
        <div>
            <h4>Add new comments</h4>
            <form action="" method="POST">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="" name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btnComment" class="btn btn-outline-success">Post your view</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>