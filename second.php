<?php
include('header.php');
include('post.php');
include('Tag.php');
?>
<?php
$post = new Post($db);
$tags = new Tag($db);
?>
<div class="container">
    <h2>All Post</h2>
    <div class="row">
        <div class="col-md-9">
            <?php foreach ($post->getPost() as $post) { ?>
                <div class="media">
                    <div class="media-left media-top">
                        <img src="images/<?php echo $post['image']; ?>" class="media-object" width="200px" />
                        <P>
                            Author: Admin<br>
                            Created: <?php echo date('Y-m-d', strtotime($post['created_at'])); ?>
                        </P>
                    </div>
                    <div class="media-body">
                        <h4 class=media-heading><a href="view.php?slug=<?php echo $post['slug']; ?>"><?php echo $post['title'];?></a></h4>
                        <?php echo htmlspecialchars_decode($post['description']);?>
                    </div>
                    <div class="media-right media-top">
                        <h4> <a href="view.php?slug=<?php echo $post['slug']; ?>"><button class="btn btn-outline-success btn-sm">View</button></a>
                            <a href="edit.php?slug=<?php echo $post['slug']; ?>"><button class="btn btn-outline-primary btn-sm">Edit</button></a>
                            <a href="delete.php?slug=<?php echo $post['slug']; ?>"><button class="btn btn-outline-danger btn-sm">Delete</button></a>
                        </h4>
                    </div>

                </div>
            <?php } ?>
        </div>

        <div class="col-md-3">
            <h4>Browse by Tags</h4>
            <p>
                <?php
                foreach ($tags->getAllTags() as $tag) { ?>
                    <a href="index.php?tag=<?php echo $tag['tag']; ?>"><button type="
                                                                                                                                                                button" class="btn btn-outline-warning btn-sm tag">
                            <?php echo $tag['tag']; ?>
                        </button></a>

                <?php } ?>
            </p>
        </div>

    </div>
</div>