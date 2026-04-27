<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="../Pages/landing.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <?php if (!empty($_SESSION["errors"])): ?>
      <div class="alert alert-danger">
        <ul class="mb-0">
          <?php foreach ($_SESSION["errors"] as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
          <?php endforeach; unset($_SESSION["errors"]); ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if (!empty($_SESSION["success"])): ?>
      <div class="alert alert-success">
        <?= htmlspecialchars($_SESSION["success"]); unset($_SESSION["success"]); ?>
      </div>
    <?php endif; ?>

    <div class="row">
      <div class="col-lg-4 d-flex">
        <div class="card mb-4 flex-fill">
          <div class="card-body text-center">
            <br>
            <img src="../Public/kanye.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <br><br>
            <h5 class="my-3"><?= htmlspecialchars($_SESSION["username"]) ?></h5>
            <div class="d-flex justify-content-center mb-2">
              <a href="../Pages/my_tickets.php"><button type="button" class="btn btn-primary">My Events</button></a>
              <a href="../Handlers/logout_handler.php"><button type="button" class="btn btn-outline-primary ms-1">Log Out</button></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8 d-flex">
        <div class="card mb-4 flex-fill">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3"><p class="mb-0">Full Name</p></div>
              <div class="col-sm-9"><p class="text-muted mb-0"><?= htmlspecialchars($_SESSION["full-name"]) ?></p></div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3"><p class="mb-0">Email</p></div>
              <div class="col-sm-9"><p class="text-muted mb-0"><?= htmlspecialchars($_SESSION["email"]) ?></p></div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3"><p class="mb-0">Country</p></div>
              <div class="col-sm-9"><p class="text-muted mb-0"><?= htmlspecialchars($_SESSION["country"]) ?></p></div>
            </div>
            <hr>
            <div class="text-right">
              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#editProfileModal">
                Edit Profile
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <form action="../Handlers/update_profile_handler.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($_SESSION["full-name"]) ?>">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($_SESSION["email"]) ?>">
          </div>
          <div class="form-group">
            <label>Country</label>
            <input type="text" name="country" class="form-control" value="<?= htmlspecialchars($_SESSION["country"]) ?>">
          </div>
          <hr>
          <p class="text-muted" style="font-size:0.85rem;">Leave password fields empty to keep current password.</p>
          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="new_password" class="form-control" placeholder="Leave blank to keep current">
          </div>
          <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Leave blank to keep current">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>