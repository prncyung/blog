<?php
include('header.php');
include('post.php');
include('Tag.php');
?>
<?php
$posts = new Post($db);
$tags = new Tag($db);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            Search for: <?php if (isset($_GET['keyword'])) {
                            echo '<i>' . $_GET['keyword'] . '</i>';
                        } ?>
            <?php foreach ($posts->getPost() as $post) { ?>
                <div class="media">
                    <div class="media-left media-top">
                        <img src="images/<?php echo $post['image']; ?>" class="media-object" width="200px" />
                        <P>
                            Author: Admin<br>
                            Created: <?php echo date('Y-m-d', strtotime($post['created_at'])); ?>
                        </P>
                    </div>

                    <div class="media-body">
                        <h4 class=media-heading><a href="view.php?slug=<?php echo $post['slug']; ?>"><?php echo $post['title']; ?></a></h4>
                        <?php echo htmlspecialchars_decode($post['description']); ?>
                    </div>
                </div>
            <?php } ?>
            <!--pagination-->
            <?php
            //count the post in the database using the id in post table
            $sql = "SELECT count(id) from post";
            $result = mysqli_query($db, $sql);
            //get the result
            $row = mysqli_fetch_row($result);
            //get the total record
            $totalRecords = $row[0];
            //total pages
            $totalPages = ceil($totalRecords / 2);
            //set page link
            $pageLink = "<ul class='pagination'>";

            //Check if the current page is greater than one
            //display this 
            /*if(!isset($_GET['tag'])){
            $page = $_GET['page'];
            if ($page > 1) {
                $pageLink .= "<a class='page-link'href='index.php?page=1'>First</a>";
                //previous link
                $pageLink .= "<a class='page-link'href='index.php?page=" . ($page - 1) . "'><<< </a>";
            }

            //display page link
            for ($i = 1; $i <= $totalPages; $i++) {
                $pageLink .= "<a class='page-link'href='index.php?page=" . $i . "'>" . $i . "</a>";
            }

            //next link
            if ($page <= $totalPages) {

                //previous link
                $pageLink .= "<a class='page-link'href='index.php?page=" . ($page + 1) . "'>>>> </a>";
            }
            //echo the page link
            echo $pageLink . "</ul>";*/

            //Check if the current page is greater than one
            //display this 
            if (!isset($_GET['tag'])) {
                //if there is tag we don't show pagination
                if (!isset($_GET['page'])) {
                    //is there is no page we make $_GET=1 to remove error in index.php
                    $_GET['page'] = 1;
                }
                $page = $_GET['page'];

                if ($page > 1) {
                    $pageLink .= "<a class='page-link'href='index.php?page=1'>First</a>";
                    //previous link
                    $pageLink .= "<a class='page-link'href='index.php?page=" . ($page - 1) . "'><<<</a>";
                }
                //display page link
                for ($i = 1; $i <= $totalPages; $i++) {
                    $pageLink .= "<a class='page-link'href='index.php?page=" . $i . "'>" . $i . "</a>  ";
                }
                //next link
                if ($page <= $totalPages) {
                    //previous link
                    $pageLink .= "<a class='page-link'href='index.php?page=" . ($page + 1) . "'>>>></a>";
                    $pageLink .= "<a class='page-link'href='index.php?page=" . $totalPages . "'>Last</a>";
                }
                echo $pageLink . "</ul>";
            }
            ?>
        </div>

        <div class="col-md-4">
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
            <p>
                <h4>Search Posts</h4>
                <form action="" method="GET">
                    <input type="text" name="keyword" class="form" placeholder="search" />
                </form>
            </p>

            <h4>Popular Post</h4>
            <p>
                <?php foreach ($posts->getPopularPost() as $popular) { ?>
                    <a href="view.php?slug=<?php echo $popular['slug']; ?>" style="color:black; border-bottom: 1px dashed 
                                                                                                                green;"><?php echo $popular['title']; ?></a></p>
            <?php } ?>

        </div>

    </div>
</div>