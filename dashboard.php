<?php
include('session.php');
include('header.php');
include('post.php');
?>
<?php
$posts = new Post($db);
?>
<div class="container">
    <h2>All Post</h2>
    <a href="viewComment.php" style="float:right;">Comments</a>
    <?php
    //check if who is logged in, using the session variable created.
    if (!empty($_SESSION['username'])) {
        echo "Hello, {$_SESSION['username']}";
    } else {
        echo " You 're not logged in!";
    }
    ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts->getPost() as $post) { ?>
                <tr>
                    <td><?php echo $post['title']; ?></td>
                    <td><?php echo substr($post['description'], 0, 20) ?></td>
                    <td><?php echo date('Y-m-d', strtotime($post['created_at'])); ?></td>
                    <td>
                        <a href="view.php?slug=<?php echo $post['slug']; ?>"><button type="submit" class="btn
                                                            btn-outline-success btn-sm">View</button></a>
                        <a href="edit.php?slug=<?php echo $post['slug']; ?>"><button type="submit" class="btn
                                                            btn-outline-primary btn-sm">Edit</button></a>
                        <a href="delete.php?slug=<?php echo $post['slug']; ?>"><button type="submit" name="deleteButton" class="btn
                                                            btn-outline-danger btn-sm">Delete</button></a>
                    </td>
                    </td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>