<?php
   //session_start();
   if(!$_GET["action"] == "salir"){
       header("location: index.php?action=ingresar");
   }
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="index.php?action=tablero"><i class="fas fa-bars"></i></a>
    </li>
</ul>
</nav>
<!-- /.Navbar -->

<!-- Main Sidebar Cantainer -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
<!-- Brand Logo -->
<a href="index.php?action=tablero" class="bews/assets/dist/img/UPV.pngrand-link nav-success">
<img src="vi" alt="Practica 5 | TAW | UPV" class="brand-image img-square" style="opacity: .8">
<span class="brand-text font-weight-light"> Inventarios</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
   <!-- Sidebar user panel (optional)-->
   <div class="user-panel mt-3 pb-3 nb-3 d-flex">
   <div class="image">
        <img src="Views/assets/dist/img/user-2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>