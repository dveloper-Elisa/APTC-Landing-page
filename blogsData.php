
<?php


include "./admin/connection/bd_connection.php";

$sql = $connection -> prepare("SELECT * FROM blogs");

if($sql->execute()){

    $result = $sql->get_result();
   while( $row = $result->fetch_assoc()){
    $img = $row['image']; 
    $image = str_replace("../../", "./", $img);
    $title = strtoupper($row['title']);
    $blog = $row['blog'];
    $dates = explode("-",$row['date']);
    $year = $dates['0'];
    $month = $dates['1'];
    $day = $dates['2'];

    echo "<div class='card'>
    <img src=$image alt='Image for blog' >
    <p class='dates'>
        <span>$day</span> <b>$month</b><b>$year</b>
    </p>
    <a href='#'>$title</a>
    <p>$blog</p>
    <p>Read More...</p>
</div>";
   }

}



?>
