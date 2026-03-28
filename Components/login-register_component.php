<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login / Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style> </style>
</head>
<body>

<div class="auth-card">
  <h2>Welcome</h2>
  <p class="subtitle">Sign in to your account or create one</p>

  <!-- Tabs -->
  <ul class="nav nav-pills nav-justified" id="authTabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="login-tab" data-toggle="pill" href="#pills-login" role="tab">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="register-tab" data-toggle="pill" href="#pills-register" role="tab">Register</a>
    </li>
  </ul>

  <div class="tab-content">

    <!-- LOGIN -->
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel">
      <form action="" method="POST">
        <div class="form-group">
          <label>Email or Username</label>
          <input type="text" name="login" class="form-control" placeholder="you@example.com" required />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" placeholder="••••••••" required />
        </div>
        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="rememberMe" />
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <a href="#" class="forgot-link">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        <p class="text-center mt-3 switch-link">
          No account? <a href="#pills-register" data-toggle="pill">Register here</a>
        </p>
      </form>
    </div>

    <!-- REGISTER -->
    <div class="tab-pane fade" id="pills-register" role="tabpanel">
      <form action="" method="POST">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" name="name" class="form-control" placeholder="John Doe" required />
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" placeholder="johndoe" required />
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" placeholder="you@example.com" required />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" placeholder="••••••••" required />
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control" placeholder="••••••••" required />
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="terms" required />
          <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
        <p class="text-center mt-3 switch-link">
          Have an account? <a href="#pills-login" data-toggle="pill">Login here</a>
        </p>
      </form>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>