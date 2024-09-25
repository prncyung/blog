<?php
include('session.php');
include('header.php');
include('post.php');
//include('functions/function.php');
include('Tag.php');

//get(instantiate) instance of the post class
$posts = new Post($db);
//instantiate the tags
$tags = new Tag($db);
//insert data from the form
if (isset($_POST['btnSubmit'])) {

    $date = date('Y-m-d');
    if (!empty($_POST['title']) && !empty($_POST['description'])) {

        $title = strip_tags($_POST['title']);
        $description = strip_tags($_POST['description']);

        //slug
        $slug = createSlug($title);
        //check the slug
        $checkSlug = mysqli_query($db, "SELECT * FROM post WHERE slug='$slug'");
        $result = mysqli_num_rows($checkSlug);
        if ($result > 0) {

            foreach ($checkSlug as $cslug) {
                $newSlug = $slug . uniqid();
            }
            $record = $posts->addPost($title, $description, uploadImage(), $date, $newSlug);
        } else {

            $record = $posts->addPost($title, $description, uploadImage(), $date, $slug);
        }
        if ($record == True) {
            echo "<div class='text-center alert alert-success'>Post Added Successfully</div>";
        } else {
            echo "failed";
        }
    } else {
        echo "<div class='text-center alert alert-danger'>Every field is required</div>";
    }
}
//echo $post->addPost();
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">Add Post</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title"> Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="description"> Description</label>
                            <textarea cols="10" id="editor" name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image"> Image</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="form-group form-check-inline">
                            <label for="tags"> <b>Choose Tags</b>&nbsp;&nbsp;</label>
                            <?php foreach ($tags->getAllTags() as $tag) { ?>
                                <input type="checkbox" name="tags[]" class="form-check-input" value="<?php echo $tag['id'] ?>"><?php echo $tag['tag'] . '&nbsp'; ?>

                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnSubmit" class="btn btn-primary">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>

</div>

<script>
    ClassicEditor
        .create(document.querySelector('#edtor'))
        .catch(error => {
            console.error(error);
        });
</script>