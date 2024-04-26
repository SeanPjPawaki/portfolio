<?php
include('includes/conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link href="vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<nav class="navbar fixed-bottom bg-body-tertiary ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">NEAS.</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-calendar3-range-fill"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="processes/logout.php" style='color:red'><i class="bi bi-box-arrow-left"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>

  <div class="container-fluid" style='background-color: darkgrey; color:white;'>
    <div class="row">
      <main class="col text-center" style='margin-top: 50px'>
        <h1 style='text-decoration: overline' ;>Welcome, Sean!</h1>
        <h5 style='text-decoration: underline' ;>What are we looking to do today?</h5>
        <p>Looking to add more works to your portfolio?
          <a href="" data-bs-toggle="modal" data-bs-target="#workModal" style='text-decoration:underline; color:white;'>
            <br> <i class="bi bi-upload"></i> Let's add work here</a>
        </p>

        <div class="card mb-3">
          <div class="card-header">
            <i class="bi bi-easel"></i> Recent Works <i class="bi bi-easel"></i>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Name of Work</th>
                  <th scope="col">Picture of Work</th>
                  <th scope="col">Description of Work</th>
                  <th scope="col">Manage</th>
                </tr>
              </thead>
              <tbody>
                <?php
                try {
                  $stmt = $conn->prepare("SELECT * FROM artworks ORDER by id DESC");
                  $stmt->execute();
                  if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      echo "<td>" . $row['name'] . "</td>";
                      echo "<td><a href='external/uploads/" . $row['picture'] . "' target='_blank'>View Picture</a></td>";
                      echo "<td>" . $row['description'] . "</td>";
                      echo "<td>";
                      echo "<button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editModal" . $row['id'] . "'>Edit</button> &nbsp;";
                      echo "<button type='button' class='btn btn-danger' onclick='deleteWork(" . $row['id'] . ")'>Delete</button>";
                      echo "</td>";
                      echo "</tr>";

                 
                      echo "<div class='modal fade' id='editModal" . $row['id'] . "' tabindex='-1' role='dialog' aria-labelledby='editModalLabel" . $row['id'] . "' aria-hidden='true'>";
                      echo "<div class='modal-dialog' role='document'>";
                      echo "<div class='modal-content'>";
                      echo "<div class='modal-header'>";
                      echo "<h5 class='modal-title' id='editModalLabel" . $row['id'] . "'>Edit Artwork</h5>";
         
                      echo "</button>";
                      echo "</div>";
                      echo "<div class='modal-body'>";
                      echo "<form action='processes/edit_artwork.php' method='post' enctype='multipart/form-data'>";
                      echo "<input type='hidden' name='edit_id' value='" . $row['id'] . "'>";
                      echo "<div class='form-group'>";
                      echo "<label for='editName" . $row['id'] . "'>Name:</label>";
                      echo "<input type='text' class='form-control' id='editName" . $row['id'] . "' name='editName' value='" . $row['name'] . "'>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label for='editDescription" . $row['id'] . "'>Description:</label>";
                      echo "<textarea class='form-control' id='editDescription" . $row['id'] . "' name='editDescription'>" . $row['description'] . "</textarea>";
                      echo "</div>";
                      echo "<div class='form-group'>";
                      echo "<label for='uploadPic" . $row['id'] . "'>Image:</label>";
                      echo "<input type='file' class='form-control-file' name='uploadPic'>";
                      echo "</div> <br>";
                      echo "<button type='submit' class='btn btn-primary'>Save changes</button>";
                      echo "</form>";
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                    }
                  } else {
                    echo "<tr><td colspan='5'>No artworks found.</td></tr>";
                  }
                } catch (PDOException $e) {
                  echo "Error: " . $e->getMessage();
                }
                $conn = null;
                ?>
              </tbody>
            </table>
          </div>
        </div>

    </div>
  </div>
  <script>
    function deleteWork(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = 'processes/delete_artwork.php?id=' + id;
        }
      });
    }
  </script>


  <?php
  if (isset($_SESSION['STATUS']) && $_SESSION['STATUS'] == "DEL_SUCCESS") {
    unset($_SESSION['STATUS']);
    echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'The deletion was successful!',
                icon: 'success'
            });
          </script>";
  } elseif (isset($_SESSION['STATUS']) && $_SESSION['STATUS'] == "UPLOAD_SUCCESS") {
    unset($_SESSION['STATUS']);
    echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'The upload was successful!',
                icon: 'success'
            });
          </script>";
  }
  ?>


  <div class="modal fade" id="workModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add work</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="processes/add_artwork.php" method="POST" enctype="multipart/form-data">
            <div class="form-group" style='margin-bottom:20px'>
              <label for="workName">Name of Work:</label>
              <input type="text" class="form-control" name="workName" placeholder="Enter name of work" required>
            </div>
            <div class="form-group" style='margin-bottom:20px'>
              <label for="workPicture">Picture of Work:</label>
              <input type="file" class="form-control-file" name="workPicture" accept="image/*" required>
            </div>
            <div class="form-group" style='margin-bottom:20px'>
              <label for="workDescription">Description of Work:</label>
              <textarea class="form-control" name="workDescription" rows="5" placeholder="Enter description of work" required></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary"></button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>