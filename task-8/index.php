<?php
include("database.php");
$query = "select * from list";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <header class="border-bottom border-dark col-12">
    <nav class="navbar">
      <a href="#" class="navbar-brand px-3">
        <img src="images/logo.png" width="30" height="40" class="" alt="" />
        one school
      </a>
      <img src="images/avatar-11c4b36e81a589c82189b293c33bde43.jpg" width="40" height="40" class="rounded-circle" alt="profile" />
    </nav>
  </header>
  <div class="container-fluid main-container">
    <div class="row main-row">
      <div class="col-md-2 border-end border-dark p-3 ">
        <ul class="d-flex flex-column">
          <a href="#" class="py-3" style="text-decoration: none; color: black"><i class="bi bi-file-person-fill"></i>STUDENT</a>
          <a href="#" class="py-3" style="text-decoration: none; color: black"><i class="bi bi-person-video3"></i>STAFF</a>
          <a href="#" class="py-3" style="text-decoration: none; color: black"><i class="bi bi-card-checklist"></i>EXAM</a>
        </ul>
      </div>
      <div class="col-10 pt-4">
        <div class="col-12 d-flex justify-content-between pb-4">
          <span style="text-decoration: underline">STUDENT</span>
          <a href="form.php"><button class="btn btn-success btn-sm" style="text-decoration: underline">
              Add Student
            </button></a>
        </div>
        <table class="table table-bordered">

          <!-- db_table -->

          <table class="table table-striped table-bordered">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">FIRST NAME</th>
              <th scope="col">LAST NAME</th>
              <th scope="col">MOBILE</th>
              <th scope="col">E-MAIL</th>
              <th scope="col">BRANCH</th>
              <th scope="col">Hostel</th>
              <th scope="col">SUJECT</th>
              <th scope="col">ADDRESS</th>
              <th scope="col">operation</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['firstname'] ?></td>
                  <td><?php echo $row['lastname'] ?></td>
                  <td><?php echo $row['mobile'] ?></td>
                  <td><?php echo $row['email'] ?></td>
                  <td><?php echo $row['branch'] ?></td>
                  <td><?php echo $row['hostel'] ?></td>
                  <td><?php echo $row['subject'] ?></td>
                  <td><?php echo $row['address'] ?></td>
                  <td>
                    <button class="btn btn-success btn-sm"><a class="text-white text-decoration-none" href="view.php?viewid=<?= $row['id'] ?>">view</a></button>
                    <button class="btn btn-success btn-sm"><a class="text-white text-decoration-none" href="update.php?updateid=<?= $row['id'] ?>">update</a></button>
                    <button class="btn btn-danger btn-sm"><a class="text-white text-decoration-none" onclick="return customConfirm('Are you sure you want to delete this item?')" href="delete.php?deleteid=<?= $row['id'] ?>"> Delete</a></button>
                  </td>
                </tr>
              <?php }
            } else { ?>
              <tr>
                <td colspan="9">No Records Found</td>
              </tr>
            <?php
            }
            mysqli_close($conn);
            ?>
          </table>
      </div>
    </div>
  </div>
  <script>
    function customConfirm(message) {
      var result = confirm(message);
      return result;
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>

</html>