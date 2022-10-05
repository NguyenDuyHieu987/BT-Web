<?php
require 'connect.php';
$query = mysqli_query($conn, "SELECT * 
                              FROM posts WHERE url = '' ");

while ($row = mysqli_fetch_assoc($query)) {

    $new_friendly_url = $vl_url_string = friendly_seo_string($row['title']);

    $counter = 1;
    $intial_friendly_url = $new_friendly_url;

    while (mysqli_num_rows(mysqli_query($conn, "SELECT * 
                                               FROM posts 
                                               WHERE url = '$new_friendly_url' "))) {

        $counter++;

        $new_friendly_url = "{$intial_friendly_url}-{$counter}";
    }

    mysqli_query($conn, "UPDATE posts
                         SET url = '{$new_friendly_url}' 
                         WHERE id = '{$row['id']}' ");
}

function friendly_seo_string($vp_string)
{

    $vp_string = trim($vp_string);

    $vp_string = html_entity_decode($vp_string);

    $vp_string = strip_tags($vp_string);

    $vp_string = strtolower($vp_string);

    $vp_string = preg_replace('~[^ a-z0-9_.]~', ' ', $vp_string);

    $vp_string = preg_replace('~ ~', '-', $vp_string);

    $vp_string = preg_replace('~-+~', '-', $vp_string);

    return $vp_string;
}