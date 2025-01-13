<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gallery</title>
        <link rel="stylesheet" href="./styles/gallery.css">
        <link rel="stylesheet" href="./styles/aptc.css">
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            rel="stylesheet">
    </head>
    <body>

        <!-- header -->
        <div class="header">
            <img src="img/image.png" alt="logo">
            <nav class="navigation">
                <button class="toggler" onclick="toggleNav()">☰</button>
                <ul id="nav-list">
                    <li class="menu-active" style="color: white;"><a href="./">Home</a></li>
                    <li><a href="#">About Us</a>
                        <ol>
                            <li><a href="./whoweare.php">Who we are</a></li>
                            <li><a href="./team.php">Team</a></li>
                        </ol>
                    </li>
                    <li><a href="#">Projects</a>
                        <ol>
                            <li><a href="poutry.php">APTC Poultry Farming</a></li>
                            <li><a href="./gako.php">GAKO Livestock Farm</a></li>
                            <li><a href="./fatilizer.php">Fertilizers and Seeds Distribution</a></li>
                        </ol>
                    </li>
                    <li><a href="#">Subsidiaries</a>
                        <ol>
                            <li><a href="./meat.php">Rugali Meat Processing Industries</a></li>
                            <li><a href="./milk.php">Nyanza Milk Industries</a></li>
                            <li><a href="./agroindustrie.php">Agro Processing Industries</a></li>
                        </ol>
                    </li>
                    <li><a href="#">Media</a>
                        <ol>
                            <li><a href="./gallery.php">Gallery</a></li>
                            <li><a href="./blog.php">Blogs</a></li>
                        </ol>
                    </li>
                    <li><a href="#">Resources</a>
                        <ol>
                            <li><a href="./career.php">Career</a></li>
                        </ol>
                    </li>
                    <li><a href="./contact.php">Contacts</a></li>
                </ul>
                <ol class="social-media">
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                </ol>
            </nav>
        </div>

        <section class="hero">
            <div class="hero-content">
                <h1>Nyanza Milk industries Products</h1>
                <p><a href="./">Home</a> <span>/ Gallery</span></p>
            </div>
        </section>


        <!-- meat-bgs -->
        <section class="meats">
            <div class="container">
                <h2>Our products pictures</h2>
                <div class="gridss">
                    <div class="typemeat">
                        <!-- data are camming from Javascript -->
                    </div>
                    
                    </div>
                </div>
            </div>
        </section>

        <!-- location -->
        
        <footer>
            <div class="cotainer">
                <div class="locations">
                    <img src="./img/Logo_white.png" alt>
                    <p>Location: Kigali/Rwanda</p>
                    <p>P.o.Box: 6129 Kigali/Rwanda</p>
                    <p>Tel: (+250) 789 303 811</p>
                    <p>Website:www.aptc.rw</p>
                    <p>Email: info@aptc.rw</p>
                </div>

                <!--  Links-->
                <div class="usefulLink">
                    <h2>Useful Links</h2>
                    <hr>
                    <ol>
                        <li>> <a href="#">Home</a></li>
                        <li>> <a href="#">Who we are</a></li>
                        <li>> <a href="#">Projects</a></li>
                        <li>> <a href="#">Rugali Meat Processing
                                Industries</a></li>
                        <li>> <a href="#">Nyanza Milk Industries</a></li>
                        <li>> <a href="#">Agro Processing
                                Industries</a></li>
                    </ol>
                </div>
                <!-- stay connected -->
                <div class="contected">
                    <h2>Stay connected</h2>
                    <hr>
                    <div class="connects">
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-facebook"
                                aria-hidden="true"></i></a>
                        <a href="#"><i class="fa-brands fa-instagram"
                                aria-hidden="true"></i></a>
                        <a href="#"><i
                                class="fa-brands fa-google-plus"></i></a>
                        <a href="#"><i
                                class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
            </div>


<!-- Popup Modal -->
<div class="popup" id="popup">
    <span class="close" onclick="closePopup()">×</span>
    <div class="popup-content">
        <button class="prev" onclick="showPrev()">❮</button>
        <img id="popup-image" src="" alt="">
        <button class="next" onclick="showNext()">❯</button>
    </div>
</div>



        </footer>
        <!-- copy right -->
        <div class="copy">
            <p>All Rights Reserved &copy; 2025 - Agro Processing Trust
                Corporation</p>
        </div>

        <script src="./multipledata/data.js"></script>
        <script src="./multipledata/gallery.js"></script>
    </body>
</html>