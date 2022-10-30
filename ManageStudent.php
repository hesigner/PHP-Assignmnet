<?php include 'Connection.php'; ?>
<?php
$querys = 'select * from student';
($res = mysqli_query($con, $querys)) or die('incorrect Query!!');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="Assets/CSS/stylesheet.css">
</head>

<body>
  <?php
$querys = 'select * from student';
$res = mysqli_query($con, $querys) or die('incorrect Query!!');
$rowCount = mysqli_num_rows($res);
?>

  <div class="pageBody">
    <div class="sidebar">
      <img src="Assets/Images/Logo.png" alt="">
      <ul>
        <li><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-microsoft"
              viewBox="0 0 16 16">
              <path
                d="M7.462 0H0v7.19h7.462V0zM16 0H8.538v7.19H16V0zM7.462 8.211H0V16h7.462V8.211zm8.538 0H8.538V16H16V8.211z" />
            </svg>Create Student</a></li>
        <li><a href="ViewStudent.php"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              class="bi bi-person-workspace" viewBox="0 0 16 16">
              <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
              <path
                d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
            </svg>View Students</a></li>
        <li id="active"><a href="ManageStudent.php"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>Manage Students</a></li>
      </ul>
    </div>
    <div class="rightBody">
      <div class="searchBar">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
          viewBox="0 0 16 16">
          <path
            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg>
        <input type="text" placeholder="Search">
      </div>

      <div class="pageData">

        <div class="row">
          <div class="col-12 title">
            <h2> <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-house-fill"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                <path fill-rule="evenodd"
                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
              </svg><span><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-caret-right-fill"
                  viewBox="0 0 16 16">
                  <path
                    d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                </svg></span>DASHBOARD</h2>
            <h1>View Student</h1>
          </div>
        </div>
        <div class="section">
            <?php
          if($rowCount > 0)
          {
          ?>
          <div class="studentTable row m-0">
            <div class="col-2">
              <h1>Picture</h1>
            </div>
            <div class="col-2">
              <h1>Name</h1>
            </div>
            <div class="col-2">
              <h1>Email</h1>
            </div>
            <div class="col-2">
              <h1>Phone</h1>
            </div>
            <div class="col-1">
              <h1>Gender</h1>
            </div>
            <div class="col-1">
              <h1>Year </h1>
            </div>
            <div class="col-1">
              <h1>Batch</h1>
            </div>
            <div class="col-1">
              <h1>Action</h1>
            </div>
          </div>
          <?php while ($data = mysqli_fetch_assoc($res)) { ?>
          <div class="studentBody row m-0 mt-2">
            <div class="col-2">
              <div class="img" style="background-image: url('<?= $data['Image'] ?>');"></div>
            </div>
            <div class="col-2">
              <h1>
                <?= $data['Name'] ?>
              </h1>
            </div>
            <div class="col-2">
              <h1>
                <?= $data['Email'] ?>
              </h1>
            </div>
            <div class="col-2">
              <h1>
                <?= $data['Phone'] ?>
              </h1>
            </div>
            <div class="col-1">
              <h1>
                <?= $data['Gender'] ?>
              </h1>
            </div>
            <div class="col-1">
              <h1>
                <?= $data['Year'] ?>
              </h1>
            </div>
            <div class="col-1">
              <h1>
                <?= $data['Batch'] ?>
              </h1>
            </div>

            <div class="col-1">
              <a href="ManageStudent.php?Delid=<?= $data['StudentId'] ?>"
                onclick="return confirm('Are you sure you want to delete!!');return false;"> <svg
                  xmlns="http://www.w3.org/2000/svg" width="16" height="100%" fill="red" class="bi bi-trash3-fill"
                  viewBox="0 0 16 16">
                  <path
                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                </svg></a>&nbsp;</span>

                <span aria-hidden="true"><a href="Edit.php?id=<?= $data[
                                    'StudentId'] ?>" class="btn" 
                                   >                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="100%" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a>&nbsp;</span>
				          

            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php }
        else{
            echo '<p>No Records Found </p>';}
            
            error_reporting(0);
            $DelID = $_GET['Delid'];
            $quer = "delete from student where StudentId = $DelID";
            $res = mysqli_query($con, $quer);
            echo $res;
            if ($res) {
                echo "<script>alert('Data Deleted!!'); window.location.href = 'ManageStudent.php';</script>";
            }
            mysqli_close($con);
            ?>




    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="Assets/Script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>