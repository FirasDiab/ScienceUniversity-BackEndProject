<?php
session_start();
include('../entity/menu.php');
include('../entity/logo.php');
include('../entity/site_setting.php');

$menu = new Menu();
$logo = new Logo();
$site = new SiteSet();
$gLogo = $logo->getLogo();
$gCopy = $site->getCopy();
$gFav = $site->getFav();

?>

<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Sciences University for design, We are One of the top 10 best universities in design, to learn design in Jordan you find the right place, Contact-us and apply for register now">
      <meta name="keywords" content="Design, Art, Sciences University">
      <meta name="author" content="Sciences University">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sciences University</title>
      <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
      <link rel="stylesheet" href="style/header.css" />
      <link rel="stylesheet" href="style/index.css" />
      <link rel="stylesheet" href="style/titles.css" />
      <link rel="stylesheet" href="style/buttons.css" />
      <link rel="stylesheet" href="style/footer.css" />
      <link rel="stylesheet" href="bootstrap-4.6.0-dist/css/bootstrap.min.css"/>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link rel="icon" type="image/png" href="<?php echo $gFav[0]['config_value'] ?>">
  </head>
  <body>
    <header>
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-2 logo-row">
              <a href="index.php"><img src="<?php echo $gLogo[0]['logo_image']; ?>" alt="<?php echo $gLogo[0]['alt_image']; ?>" class="logo" title="Sciences University"/></a>
            </div>
              <div class="open-menu">
                <i class="fas fa-bars"></i>
              </div>
              <div class="close-menu">
                <i class="fas fa-window-close"></i>
              </div>
            <div class="col-10 social-media">
              <span class="icons align-middle" id="icons">
                <a href="https://www.linkedin.com/" title="linkedin"><i class="fab fa-linkedin"></i></a>
                <a href="https://www.youtube.com/" title="youtube"><i class="fab fa-youtube-square"></i></a>
                <a href="https://www.instagram.com/" title="instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://www.twitter.com/" title="twitter"><i class="fab fa-twitter-square"></i></a>
                <a href="https://www.facebook.com/" title="facebook"><i class="fab fa-facebook-square fb"></i></a>
                <i class="fas fa-search search" id="search" onclick="openSearchBar()"></i>
              </span>
              <form class="form-inline my-2 my-lg-0 float-right d-none mr-2" id="searchForm"> 
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">       
                <button class="btn btn-outline my-2 my-sm-0 btn-search" type="submit">Search</button>  
                <i class="fas fa-times ml-2" id="close" onclick="closeSearchBar()"></i>
             </form>
            </div>
          </div> 
        </div>           
      </div>
    <div class="cont-bk">
      <div class="container navbar-container">
        <div class="row">
          <div class="col-1"></div>
          <div class="col-11">
            <nav class="navbar navbar-expand-lg navbar-light navbar-grid">
              <div class="container-fluid content-nav navbar-section">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-section1" id="navbarNav">
                  <ul class="navbar-nav">
                  <?php
                        foreach($menu->getMenuHeaderPublic() as $gMenuH){
                      ?>
                    <li class="nav-item active About">
                      <a class="nav-link" aria-current="page" href="inner_page.php?id=<?php echo $gMenuH['id'] ?>" style="letter-spacing: 0.2px;"><?php echo $gMenuH['title'] ?></a>
                    </li>
                    <?php
                        }
                    ?>    
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light  d-none nav-small">
          <div class="container-fluid content-nav navbar-section">
            <div class="logo-row">
              <a href="/index.html"><img src="img/footer-logo.png" alt="Science University Logo" class="logo" title="Sciences University"/></a>
            </div>
            <button class="navbar-toggler" id="toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <!-- <span class="navbar-toggler-icon"></span> -->
              <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse navbar-section1 text-center" id="navbarNav">
              <ul class="navbar-nav">
              <?php
                        foreach($menu->getMenuHeader() as $gMenuH){
                      ?>
                    <li class="nav-item active About">
                      <a class="nav-link" aria-current="page" href="<?php echo $gMenuH['path'] ?>"><?php echo $gMenuH['title'] ?></a>
                    </li>
                    <?php
                        }
                    ?> 
                <span class="icons-for-sm align-middle" id="iconsSm">
                  <a href="https://www.linkedin.com/" title="linkedin"><i class="fab fa-linkedin"></i></a>
                  <a href="https://www.youtube.com/" title="youtube"><i class="fab fa-youtube-square"></i></a>
                  <a href="https://www.instagram.com/" title="instagram"><i class="fab fa-instagram"></i></a>
                  <a href="https://www.twitter.com/" title="twitter"><i class="fab fa-twitter-square"></i></a>
                  <a href="https://www.facebook.com/" title="facebook"><i class="fab fa-facebook-square fb"></i></a>
                  <i class="fas fa-search search" id="searchSm" onclick="openSearchBarSm()"></i>
                </span>
                <form class="form-inline my-2 my-lg-0 float-right d-none align-self-center" id="searchFormSm"> 
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search">       
                  <button class="btn btn-outline my-2 my-sm-0 btn-search ml-2 btn-light" type="submit">Search</button>  
                  <i class="fas fa-times ml-2" id="closeSm" onclick="closeSearchBarSm()"></i>
               </form>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    </header>