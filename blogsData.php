
<?php
include "./admin/connection/bd_connection.php";

$sql = $connection -> prepare("SELECT * FROM blogs");

if($sql->execute()) {
    $result = $sql->get_result();
    while($row = $result->fetch_assoc()) {
        $img = htmlspecialchars(str_replace("../../", "./", $row['image']));
        $title = htmlspecialchars(strtoupper($row['title']));
        $blog = htmlspecialchars($row['blog']);
        $dates = isset($row['date']) ? explode("-", $row['date']) : [];
        $year = $dates[0] ?? 'Unknown';
        $month = $dates[1] ?? 'Unknown';
        $day = $dates[2] ?? 'Unknown';

        $shortBlog = strlen($blog) > 10000 ? substr($blog, 0, 1000) . '...' : $blog;

        echo "<div class='card'>
            <img src='$img' alt='Image for blog'>
            <p class='dates'>
                <span>$day</span> <b>$month</b> <b>$year</b>
            </p>
            <a href='#'>$title</a>
            <p>$shortBlog</p>";
        
        if (strlen($blog) > 100) {
            $escapedBlog = htmlspecialchars($blog, ENT_QUOTES);
            $blogId = $row['id']; 
            echo "<a href='read_more.php?id=$blogId' target='_blank' class='read-more'>Read More</a>";
        }
        
        echo "</div>";
    }
}
$connection->close();

?>
