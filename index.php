<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SEAN!</title>
  <link href="vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/aos-master/dist/aos.css" rel="stylesheet">
  <link href="vendor/splide-4.1.3/dist/css/splide.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendor/bootstrap-icons-1.11.3/font/bootstrap-icons.css">

  <link href="external/css/styles.css" rel="stylesheet">



</head>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="mx-auto d-flex nav-item">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active text-item" aria-current="page" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Socials</a>
        </li>
      </ul>
    </div>
    </ul>
    <div class="mx-auto nav-item">
      <h5 class="spj">Sean Pj Pawaki</h5>
    </div>
    <div class="mx-auto d-flex nav-item">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active text-item" aria-current="page" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Pages</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>
  <div class="container-fluid hero-section">
    <img src="wp-content/h1-img-1.jpg" class="img-fluid imagery">
    <h1 class="hero-section-text">SEAN PATRICK JEROME PAWAKI</h1>
  </div>
  <div class="container-fluid work-section">
    <div class="row two-work-section-content">
      <div class="col-md-4 first-image" data-aos="fade-up">
        <img class="img-fluid" src="external/works/QUAGO T-SHIRT.png">

      </div>
      <div class="col-md-7 second-image" data-aos="fade-down">
        <img class="img-fluid second-image-content" src="external/works/Stationaries.png">

      </div>
    </div>
  </div>
  <div class="spacer" style="margin-top:500px"></div>
  <div class="container-fluid content-artist">
    <div class="row ">
      <div class="col-md-10 content-about-left">
        <p>//01</p>
        <h1 class="header-content-artist">INSPIRED BY MY DAILY SURROUNDINGS, I ASPIRE TO CREATE SIMPLISTIC PIECES WITH <br> INTRICATE MEANINGS</h1>
      </div>
      <div class="col-md-2">
        <img src="wp-content/star-h1.png" class="img-fluid">
        <img src="wp-content/star-h1 - Copy.png" class="img-fluid">
      </div>
    </div>
  </div>

  <?php
  try {

    $pdo = new PDO("mysql:host=localhost;dbname=sean", "root", "");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $pdo->prepare("SELECT * FROM artworks");


    $stmt->execute();


    if ($stmt->rowCount() > 0) {
      echo '<div class="container-fluid best-works-gallery">';
      echo '<h1 class="left-my-works">MY WORKS</h1>';
      echo '<section class="splide" aria-labelledby="carousel-heading">';
      echo '<div class="splide__track">';
      echo '<ul class="splide__list">';
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<li class="splide__slide">';
        echo '<div class="col-md-10 view-content">';
        echo '<img src="admin/external/uploads/' . $row['picture'] . '" class="img-fluid">';
        echo '<div class="overlay" data-bs-toggle="modal"  data-bs-target="#exampleModal' . $row['id'] . '">';
        echo '<h3> View</h3>';
        echo '</div>';
        echo '</div>';
        echo '</li>';
      }

      echo '</ul>';
      echo '</div>';
      echo '</section>';
      echo '<h1 class="right-my-works">MY WORKS</h1>';
      echo '</div>';
    } else {
      echo "";
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  $pdo = null;
  ?>
  <div class="container-fluid techniques-marquee">
    <div class="marquee-container">
      <div class="marquee-content">
        <span>
          <h1 class="marquee-rtl">
            Capturing
            Composition
            Moment
            Perspective
            Lens
            Exposure
            Focus
            Light
            Story
            Frame </h1>
        </span>
      </div>
    </div>
    <div class="marquee-container">
      <div class="marquee-content-ltr">
        <span>
          <h1 class="marquee-rtl"> Pixel
            Rendering
            Layers
            Creativity
            Virtual
            Texture
            Brushwork
            Imagination
            Render
            Innovation </h1>
        </span>
      </div>
    </div>
    <div class="marquee-container">
      <div class="marquee-content-1">
        <span>
          <h1 class="marquee-rtl"> Layout
            Typography
            Branding
            Color
            Vector
            Balance
            Logo
            Illustration
            Visual
            Communication </h1>
        </span>
      </div>
    </div>
  </div>

  <div class="container-fluid container-profile">
    <div class="container-fluid container-body">
      <h1 class="first-header">Hello, my name is Sean, and I
        am a creative graphic designer
        passionate about transforming ideas into
        visually compelling experiences.</h1>

      <div class="row gx-5 text-center some-works-row">
        <div class="col-md-4">

          <img src="external/works/Studio Signage.png" class="img-fluid">
        </div>
        <div class="col-md-4">
          <img src="external/works/TEAM ESPORTS.png" class="img-fluid">

        </div>
        <div class="col-md-4">

          <img src="external/works/Studio Signage.png" class="img-fluid">

        </div>
      </div>

      <h3 class="second-header">With a keen eye for detail and a commitment to innovative design solutions,
        I specialize in crafting engaging visuals that leave a lasting impact.
        From concept to execution, I take pride in my ability to bring concepts to life,
        ensuring that each design not only meets but exceeds expectations. </h3>


      <div class="liner"></div>
      <div class="liner"></div>

      <div class="middle-part container-fluid">
        <h3 class="middle">Let's collaborate and bring your ideas to vibrant fruition through the power of graphic design!</h3>
        <br>
        <a href="mailto:seanpjpawaki@gmail.com" class="hit-me-up"><i class="bi bi-envelope-arrow-up"></i> &nbsp; HIT ME UP!</a>
      </div>

    </div>
  </div>
</body>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
  </div>
  <div class="offcanvas-body body-linker">
    <H1 class='side-link'><a href="about_me.php" class="linker">ABOUT ME</a></H1>
    <H1 class='side-link'><a href="" class="linker" data-bs-toggle="modal" data-bs-target="#loginModal">LOGIN</a></H1>
  </div>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title left-linker-offcanvas" id="offcanvasExampleLabel">SOCIAL LINKS</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <img src="wp-content/fb-link.png" class="img-fluid">
    <hr>
    <img src="wp-content/yt-link.png" class="img-fluid">
  </div>
</div>
<section name="footer">
  <script src="vendor/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
  <script src="vendor/splide-4.1.3/dist/js/splide.min.js"></script>
  <script src="vendor/aos-master/dist/aos.js"></script>
  <script>
    AOS.init();
    document.addEventListener('DOMContentLoaded', function() {
      var splide = new Splide('.splide', {
        pagination: false,
        arrows: false,
        type: 'loop',
        perPage: 3,
        focus: 'center',
      });
      splide.mount();
    });
  </script>
</section>
<footer>
  <div class="footer-container container-fluid">
    <img src="wp-content/star-h2.png" class="img-fluid">
    <div class="row">
      <div class="col-md-6">
        <h1 class="footer-first">SEAN PATRICK JEROME PAWAKI</h1>
      </div>
      <div class="col-md-2">
        <h1 class="footer-content">ABOUT</h1>
        <p class="footer-content-below link-below" onclick="about()">About Me</p>
        <p></p>
        <p class="footer-content-below link-below">Contact/Inquiry</p>
      </div>
      <div class="col-md-2">
        <h1 class="footer-content">FOLLOW</h1>
        <p class="footer-content-below link-below">Facebook</p>
      </div>
      <div class="col-md-2">
        <h1 class="footer-content">WORKS</h1>
        <p class="footer-content-below link-below">Gallery</p>
        <p></p>
        <p class="footer-content-below link-below">Portfolio</p>
      </div>
    </div>
  </div>
</footer>

<?php
try {
  $pdo = new PDO("mysql:host=localhost;dbname=sean", "root", "");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare("SELECT * FROM artworks");
  $stmt->execute();

  if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="modal fade" id="exampleModal' . $row['id'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
      echo '<div class="modal-dialog">';
      echo '<div class="modal-content">';
      echo '<div class="modal-body text-center">';
      echo '<h1 class="modal-title fs-5" id="exampleModalLabel">' . $row['name'] . '</h1>';
      echo '<br>';
      echo '<img src="admin/external/uploads/' . $row['picture'] . '" alt="' . $row['name'] . '" class="img-fluid">';
      echo '<br>';
      echo '<br>';
      echo '<p>' . $row['description'] . '</p>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo "No artworks found.";
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$pdo = null;
?>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

      </div>
      <div class="modal-body text-center">
        <h1 class="modal-title fs-5" id="loginModalLabel">ADMIN LOGIN</h1>
        <form action="proceses/login.php" method="POST">
          <label for="username"> Username <br></label>
          <Input type="text" name="username" class='input-form'>
          <Br>
          <label for="password"> Password <br> </label>
          <Input type="password" name="password" class='input-form'>

          <Br>
          <input type="submit" name="Login" value="Login" class="login-btn">
        </form>
      </div>

    </div>
  </div>
</div>

<script>
  function about() {
    window.location.href = "about_me.html"
  }
</script>


</html>