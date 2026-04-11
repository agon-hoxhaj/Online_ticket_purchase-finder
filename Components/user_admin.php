<div class="main-content">
    <div class="card shadow">
      <div class="card-header bg-dark text-white">
        <h4 class="mb-0">All Users</h4>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Full Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Country</th>
              <th>User Type</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($users)): ?>
              <?php foreach ($users as $user): ?>
              <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['full_name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['country'] ?></td>
                <td>
                  <?php if(trim($user['user_type']) === 'admin'): ?>
                    <span class="badge badge-danger">Admin</span>
                  <?php else: ?>
                    <span class="badge badge-primary">User</span>
                  <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center text-muted py-4">No users found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-muted">
        Total users: <strong><?= count($users) ?></strong>
      </div>
    </div>
  </div>