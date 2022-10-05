<div class="row">
    <div class="col col-sm-9">
        <div class="main-content">
            <?php
            include_once('connect.php');
            //include_once('articles_seo_friendly.php');
            include_once('seo_friendly.php');
            $query = mysqli_query($conn, "SELECT * FROM posts");

            if (mysqli_num_rows($query) == 0) {
                echo "No articles found";
            } else {
                while ($row = mysqli_fetch_assoc($query)) {
                    echo "<div class='item-post'>";
                    echo "<img src='./admin/photo/$row[image]' width='100%'/>";
                    echo "<a href=./post/{$row['url']}.html>{$row['title']}</a><br>";
                    $readmore = '<a href="./post/' . $row['url'] . '">
            Đọc thêm...</a>';
                    echo "
             
            " . substr($row['content'], 0, 150) . $readmore . "
             
            ";
                    echo "</div>
             
            ";
                }
            }

            ?>

        </div>
    </div><!-- Close Col -->

    <div class="col col-sm-3">
        <?php include 'sidebar.php'; ?>
    </div>

</div>