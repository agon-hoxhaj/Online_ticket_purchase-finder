<style>
  .sidebar {
    width: 250px;
    min-height: calc(100vh - 56px);
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
  .main-content {
    flex: 1;
    padding: 30px;
    background-color: #f8f9fa;
  }
</style>

<div class="sidebar">
  <div class="sidebar-header">Admin nav</div>
  <ul class="sidebar-nav">
    <li class="nav-item">
      <a href="?page=users" class="<?php echo ($_GET['page'] ?? 'users') === 'users' ? 'active' : ''; ?>">
        Users
      </a>
    </li>
    <li class="nav-item">
      <a href="?page=events" class="<?php echo ($_GET['page'] ?? 'users') === 'events' ? 'active' : ''; ?>">
        Events
      </a>
    </li>
  </ul>
</div>