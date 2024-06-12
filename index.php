<?php
include_once('head.php');
include_once('header.php');
?>

<h1 id="bbdm">Les Bonbons du Moment</h1>
    <div class="carousel">
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/bonbon1.jpg" alt="Bonbon 1">
            </div>
            <div class="carousel-item">
                <img src="img/bonbon2.jpg" alt="Bonbon 2">
            </div>
            <div class="carousel-item">
                <img src="img/bonbon3.jpg" alt="Bonbon 3">
            </div>
        </div>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>
    <script src="script.js"></script>
    <h2></h2>
<?php
include_once('footer.php');
?>