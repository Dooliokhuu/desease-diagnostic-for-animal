<?php
require_once '../../header.php'; 
require __DIR__ . DIRECTORY_SEPARATOR . "dbcon.php";
require PATH_LIB . "admin_menu.php";
$menuLib = new Menu();
$menu = $menuLib->get();
?>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">KWYDK</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Хайх" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Холболтоос гарах</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <?php
            if (is_array($menu)) { foreach ($menu as $m) {
               printf("<li class='nav-item'><a href='%s' class='nav-link' target='_%s'>%s</a>", $m['link'], $m['target'], $m['label'],"</li>");
            }}
          ?>
        </ul>
      </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      
      <div id="table-responsive">
        
      </div>

    </main>
  </div>
</div>
<?php
require_once '../../footer.php';  
?>