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

    <div class="row">
      <div class="col-lg-4 d-flex">
        <div class="card mb-4 flex-fill">
          <div class="card-body text-center">
            <br>
            <img src="../Public/kanye.jpg" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
              <br><br>
            <h5 class="my-3"><?= $_SESSION["username"] ?></h5>
            <div class="d-flex justify-content-center mb-2">
              <a href="../Pages/my_tickets.php"><button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">My Events</button></a>
              <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Log Out</button>
            </div>
          </div>
        </div>
       
      </div>
      <div class="col-lg-8 d-flex">
        <div class="card mb-4 flex-fill">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION["full-name"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION["email"] ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Country</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $_SESSION["country"] ?></p>
              </div>
            </div>
            <hr>
            </div>
          </div>
        </div>
        <div class="row">

      </div>
    </div>
  </div>
</section>