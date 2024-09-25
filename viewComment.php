<?php
include('header.php');
include('Comment.php');
$comments = new Comment($db);
?>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Suject</th>
                <th>Descriptiont</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments->getPendingComment() as $comment) { ?>
                <tr>

                    <td><?php echo $comment['name']; ?></td>
                    <td><?php echo $comment['subject']; ?></td>
                    <td><?php echo $comment['description']; ?></td>
                    <td><?php echo date('Y-m-d', strtotime($comment['created_at'])); ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="approvedId" value="<?php echo $comment['id']; ?>">
                            <button type="submit" name="approvedComment" class="btn btn-outline-success btn-sm">Approve</button>
                        </form>
                        <form method="POST">
                            <input type="hidden" name="deleteId" value="<?php echo $comment['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-outline-primary btn-sm">Delete</button>
                        </form>
                    </td>

                    <?php
                    //approved the comments
                    if (isset($_POST['approvedComment'])) {
                        $result = $comments->update($_POST['approvedId']);
                        if ($result == TRUE) {
                            echo "Comments accepted successfully";
                        }
                    }

                    //delete non approved  comments
                    if (isset($_POST['deleteId'])) {
                        $result = $comments->delete($_POST['deleteId']);
                        if ($result == TRUE) {
                            echo "Comments deleted successfully";
                        }
                    }

                    ?>





                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>