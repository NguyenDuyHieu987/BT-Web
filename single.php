<title><?php
        echo $row['title'];
        ?></title>
<?php
include 'header.php';
include_once('connect.php');

$query = mysqli_query($conn, "SELECT * 
                              FROM posts 
                              WHERE url = '{$_GET['url']}' ");

if (mysqli_num_rows($query) == 0) {
    header('Location: main.php');
    die();
} else {
    $row = mysqli_fetch_assoc($query);
}

?>

<div class="row">
    <div class="col col-sm-9">
        <div class="main-content">
            <h1><?php echo $row['title']; ?></h1>
            <?php echo $row['content']; ?>
        </div>
    </div>
    <div class="col col-sm-3">
        <?php include 'sidebar.php'; ?>
    </div>
</div>
<?php include 'footer.php'; ?>