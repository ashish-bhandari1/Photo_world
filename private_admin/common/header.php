<?php 
session_start();
if(!isset($_SESSION ["user"] )){
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Dashboard / Admin Panel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body class="sidebar-is-reduced">
  <header class="l-header">
    <div class="l-header__inner clearfix">
      <div class="c-header-icon js-hamburger">
        <div class="hamburger-toggle"><span class="bar-top"></span><span class="bar-mid"></span><span class="bar-bot"></span></div>
      </div>
      <div class="c-header-icon has-dropdown"><i class="fa fa-bell"></i>
        <div class="c-dropdown c-dropdown--notifications">
          <div class="c-dropdown__header"></div>
          <div class="c-dropdown__content"></div>
        </div>
      </div>
      <div class="c-search">
        <input class="c-search__input u-input" placeholder="Search..." type="text"/>
      </div>
      <div class="header-icons-group">
        <div class="c-header-icon logout">  <a href = "php/logout.php" onclick ="return confirm('Are you sure you want to Logout?');" > <i class="fa fa-power-off"></i></a></div>
      </div>

    </div>
  </header>
  <div class="l-sidebar">
    <div class="logo">
      <div class="logo__txt">D</div>
    </div>
    <div class="l-sidebar__content">
      <nav class="c-menu js-menu">
        <ul class="u-list">
        <li class="c-menu__item is-active" data-toggle="tooltip" title="Add New">
            <div class="c-menu__item__inner"><i class="fas fa-user-friends"></i>
              <div class="c-menu-item__title"><span><a href="AddPhotographer.php" style="color:#fff; text-decoration:none;">Add Photographer</a></span></div>
            </div>
          </li>
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Photographer">
            <div class="c-menu__item__inner"><i class="fas fa-bars"></i>
              <div class="c-menu-item__title"><span><a href="photographer.php" style="color:#fff; text-decoration:none;">Photographer</a></span></div>
            </div>
          </li>
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Home">
            <div class="c-menu__item__inner"><i class="fas fa-home"></i></i>
              <div class="c-menu-item__title"><span><a href="body.php" style="color:#fff; text-decoration:none;">Home</a></span></div>
            </div>

          </li>
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Menu">
            <div class="c-menu__item__inner"><i class="fas fa-bars"></i>
              <div class="c-menu-item__title"><span><a href="menu.php" style="color:#fff; text-decoration:none;">Menu</a></span></div>
            </div>
          </li>
 
          <li class="c-menu__item has-submenu" data-toggle="tooltip" title="Settings">
            <div class="c-menu__item__inner"><i class="fa fa-cogs"></i>
              <div class="c-menu-item__title"><span><a href="setting.php" style="color:#fff; text-decoration:none;">Settings</a></span></div>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</body>
