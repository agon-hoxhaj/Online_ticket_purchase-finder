
<?php ?>
 <style>
    body { display: flex; min-height: 100vh; }

    .sidebar {
      width: 250px;
      min-height: 100vh;
      background-color: #343a40;
      color: white;
      flex-shrink: 0;
    }

    .sidebar-header {
      padding: 20px;
      font-size: 22px;
      font-weight: bold;
      border-bottom: 1px solid #444;
    }

    .sidebar-nav {
      list-style: none;
      padding: 10px 0;
      margin: 0;
    }

    .sidebar-nav .nav-title {
      padding: 10px 20px;
      font-size: 11px;
      text-transform: uppercase;
      color: #aaa;
    }

    .sidebar-nav .nav-item a {
      display: flex;
      align-items: center;
      padding: 10px 20px;
      color: #ccc;
      text-decoration: none;
    }

    .sidebar-nav .nav-item a:hover,
    .sidebar-nav .nav-item a.active {
      background-color: #495057;
      color: white;
    }

    .sidebar-footer {
      padding: 10px 20px;
      border-top: 1px solid #444;
      margin-top: auto;
    }

    .main-content {
      flex: 1;
      padding: 30px;
      background-color: #f8f9fa;
    }
  </style>
<div class="sidebar border-end">
  <div class="sidebar-header border-bottom">
    <div class="sidebar-brand">Admin nav</div>
  </div>
  <ul class="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link active" href="#">
        <i class="nav-icon cil-speedometer"></i> Users
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="nav-icon cil-speedometer"></i> Events
      </a>
    </li>
    <li class="nav-item nav-group show">
      <a class="nav-link nav-group-toggle" href="#">
        <i class="nav-icon cil-puzzle"></i> Nav dropdown
      </a>
      <ul class="nav-group-items">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Nav dropdown item
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-icon"><span class="nav-icon-bullet"></span></span> Nav dropdown item
          </a>
        </li>
      </ul>
    </li>
  </ul>
</div> 