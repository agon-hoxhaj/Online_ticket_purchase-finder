<?php ?>
<!DOCTYPE html>
<html>
<head>
    <style>
          body {
      min-height: 100vh;
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }
 
    .auth-card {
      background: #fff;
      border-radius: 8px;
      padding: 2rem;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    }
 
    .auth-card h2 {
      font-weight: 700;
      font-size: 1.5rem;
      margin-bottom: 0.2rem;
    }
 
    .auth-card p.subtitle {
      color: #6c757d;
      font-size: 0.9rem;
      margin-bottom: 1.5rem;
    }
 
    .nav-pills {
      background: #f8f9fa;
      border-radius: 6px;
      padding: 4px;
      margin-bottom: 1.5rem;
    }
 
    .nav-pills .nav-item { flex: 1; }
 
    .nav-pills .nav-link {
      color: #6c757d;
      text-align: center;
      border-radius: 4px;
      font-weight: 500;
      padding: 0.45rem;
    }
 
    .nav-pills .nav-link.active {
      background: #dc3545;
      color: #fff;
    }
 
    .form-control {
      border-radius: 6px;
      font-size: 0.95rem;
    }
 
    .form-control:focus {
      border-color: #dc3545;
      box-shadow: 0 0 0 0.2rem rgba(220,53,69,0.2);
    }
 
    label {
      font-size: 0.85rem;
      font-weight: 600;
      color: #343a40;
    }
 
    .btn-danger {
      border-radius: 6px;
      font-weight: 600;
      letter-spacing: 0.3px;
    }
 
    .form-check-label,
    .small-link {
      font-size: 0.85rem;
      color: #6c757d;
    }
 
    .small-link a, .forgot {
      color: #dc3545;
      text-decoration: none;
      font-size: 0.85rem;
    }
 
    .small-link a:hover, .forgot:hover { text-decoration: underline; }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script></head>
<body>
<?php include __DIR__ . '/../Components/login-register_component.php';?>
</body>
</html>