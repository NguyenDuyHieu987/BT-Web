<?php require_once 'header.php' ?>

<div class="container">

    <div class="row">

        <div class="col-sm-8">
            <?php
            include 'connect.php';
            if (isset($_REQUEST['url']) and $_REQUEST['url'] != "") {
                $url = $_GET['url'];
                $sql = "SELECT * FROM posts WHERE url = '$url' ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<img src='admin/photo/$row[image]' width='100%'/>";
                    echo "
<h2>" . $row['title'] . "</h2>
 
";
                    echo "
 
" . $row['content'] . "
 
";
                }
            }
            ?>
        </div>


        <div class="col-sm-4">
            <?php require_once 'sidebar.php' ?>
        </div>

    </div>

    <!-- /.Row-->
</div>

<!-- /.Container-->
<?php require_once 'footer.php' ?>