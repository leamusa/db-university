<?php

require_once __DIR__ . '/helpers/function.php';

require_once __DIR__ . '/helpers/DB.php';
require_once __DIR__ . '/Models/Course.php';
require_once __DIR__ . '/Models/Department.php';


// Take all departments from the db
try {
    $mysqli = DB::connect();
  } catch (Exception $error) {
    dd($error->getMessage());
  }
  
  /* Login the user */
  
  if (isset($_POST['username']) && isset($_POST['password'])) {
    var_dump('check if the user exists in our db');
    //dd($_POST);
  
    Auth::check($mysqli, $_POST['username'], $_POST['password']);
    //dd($_SESSION);
  }
  
  
  
  
  
  
  $result = Department::all($mysqli);
  
  //dd($mysqli, $result);
  
  DB::disconnect($mysqli);
  
  ?>
  
  
  
  <!DOCTYPE html>
  <html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  
  <body>
  
  
  
    <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] !== 0) : ?>
  
  
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h1>Hi <?= $_SESSION['userName'] ?></h1>
          <form action="logout.php" method="post">
            <button type="submit" class="btn btn-primary">Logout</button>
          </form>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
  
          <?php if ($result && $result->num_rows > 0) :
            while ($row = $result->fetch_assoc()) : ?>
  
              <div class="col">
                <div class="card">
                  <div class="card-body">
                    <h4><?= $row['name'] ?></h4>
                    <p><?= $row['description'] ?></p>
                  </div>
                </div>
              </div>
  
          <?php
            endwhile;
          endif;
          ?>
  
        </div>
      </div>
    <?php else : ?>
  
      <div class="container">
        <h1 class="py-3">Restricted access</h1>
        <form action="" method="post">
  
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="usernameHelper" placeholder="admin" />
            <small id="usernameHelper" class="form-text text-muted">Type your username</small>
          </div>
  
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelper" placeholder="admin" />
            <small id="passwordHelper" class="form-text text-muted">Type your password</small>
          </div>
  
          <button type="submit" class="btn btn-primary">
            Log in
          </button>
  
        </form>
      </div>
  
  
    <?php endif ?>
  
  
  
  
  
  </body>
  
  </html>