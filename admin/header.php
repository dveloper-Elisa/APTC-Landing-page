<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="header">
            <img src="../img/image.png" alt="logo">
            <nav class="navigation">
                <button class="toggler" onclick="toggleNav()">☰</button>
                <ul id="nav-list">
                    <li class="menu-active" style="color: white;"><a href="./dashboard.php">Home</a></li>
                    <li><a href="#">About Us</a>
                        <ol>
                            <li><a href="#">Who we are</a></li>
                            <li><a href="./updates/team.php">Update Team</a></li>
                        </ol>
                    </li>
                    <li><a href="#">Projects  <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                        <ol>
                            <li><a href="poutry.php">APTC Poultry Farming</a></li>
                            <li><a href="./gako.php">GAKO Livestock Farm</a></li>
                            <li><a href="./fatilizer.php">Fertilizers and Seeds Distribution</a></li>
                        </ol>
                    </li>
                    <li><a href="#">Subsidiaries <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                        <ol>
                            <li><a href="./meat.php">Rugali Meat Processing Industries</a></li>
                            <li><a href="./milk.php">Nyanza Milk Industries</a></li>
                            <li><a href="./agroindustrie.php">Agro Processing Industries</a></li>
                        </ol>
                    </li>
                    <li><a href="#">Media <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                        <ol>
                            <li><a href="./updates/gallery.php">Update Gallery</a></li>
                            <li><a href="./updates/blogs.php">Blogs</a></li>
                        </ol>
                    </li>
                    <li><a href="#">Resources <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                        <ol>
                            <li><a href="./updates/announcement.php">Update Career</a></li>
                        </ol>
                    </li>
                    <li><a href="#"><?php echo $_SESSION['email'] ?></a>
                    <ol>
                        <li><a href="./uploads/logout.php">Logout</a></li>
                        </ol>
                    </li>
                </ul>
                <ol class="social-media">
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                </ol>
            </nav>
        </div>
</div>




<script src="../multipledata/data.js"></script>

</body>
</html>