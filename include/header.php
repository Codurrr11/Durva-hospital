<?php
  $current_page = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Durva Hospital — Orthopaedics &amp; Joint Care</title>
  <meta name="description" content="Durva Hospital: specialist knee and shoulder arthroscopy, joint replacement and rehabilitation, delivered by experienced orthopaedic surgeons.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Playfair+Display:wght@400;500&display=swap">

  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

  <header class="site-header" data-header>

    <a class="brand u-rise" href="index.php" aria-label="Durva Hospital — home">
      <img class="brand__img" src="assets/images/logo.png" alt="Durva Hospital" width="858" height="250">
    </a>

    <nav class="nav" id="primary-nav" aria-label="Primary">
      <ul class="nav__list capsule u-rise u-d1">

        <li class="nav__item">
          <a class="nav__link <?= ($current_page === 'index.php' || $current_page === '') ? 'is-active' : '' ?>" href="index.php">Home</a>
        </li>

        <li class="nav__item">
          <a class="nav__link <?= ($current_page === 'about.php') ? 'is-active' : '' ?>" href="about.php">About Us</a>
        </li>

        <li class="nav__item" data-dropdown>
          <a class="nav__link" href="#knee-arthroscopy" aria-expanded="false" aria-controls="menu-knee">
            Knee Arthroscopy
            <svg class="nav__caret" viewBox="0 0 10 6" fill="none" aria-hidden="true">
              <path d="m1 1 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <div class="menu" id="menu-knee">
            <ul class="menu__panel">
              <li><a class="menu__link" href="#acl-reconstruction">ACL Reconstruction</a></li>
              <li><a class="menu__link" href="#acl-avulsion">ACL Avulsion</a></li>
              <li><a class="menu__link" href="#mcl-tear">MCL Tear</a></li>
              <li><a class="menu__link" href="#pcl-reconstruction">PCL Reconstruction</a></li>
              <li><a class="menu__link" href="#meniscus-tears">Meniscus Tears</a></li>
              <li><a class="menu__link" href="#synovitis">Synovitis</a></li>
              <li><a class="menu__link" href="#patella-dislocation">Patella (Knee Cap) Dislocation</a></li>
            </ul>
          </div>
        </li>

        <li class="nav__item" data-dropdown>
          <a class="nav__link" href="#shoulder-arthroscopy" aria-expanded="false" aria-controls="menu-shoulder">
            Shoulder Arthroscopy
            <svg class="nav__caret" viewBox="0 0 10 6" fill="none" aria-hidden="true">
              <path d="m1 1 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <div class="menu" id="menu-shoulder">
            <ul class="menu__panel">
              <li><a class="menu__link" href="#frozen-shoulder">Frozen Shoulder</a></li>
              <li><a class="menu__link" href="#rotator-cuff">Rotator Cuff</a></li>
              <li><a class="menu__link" href="#ac-joint-dislocation">AC Joint Dislocation</a></li>
            </ul>
          </div>
        </li>

        <li class="nav__item">
          <a class="nav__link" href="#joint-replacement">Joint Replacement</a>
        </li>

      </ul>
    </nav>

    <div class="actions capsule u-rise u-d2">
      <a class="btn btn--ghost" href="#contact">Contact</a>
      <a class="btn btn--light" href="#appointment">Book Appointment</a>
      <button class="nav-toggle" type="button" data-nav-toggle aria-controls="primary-nav" aria-expanded="false">
        <span class="nav-toggle__bars" aria-hidden="true"></span>
        <span class="u-visually-hidden">Menu</span>
      </button>
    </div>

  </header>
