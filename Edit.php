<?php include 'connection.php'; ?>
<?php
$ID = $_GET['id'];
$query = "select * from student where StudentId = $ID";
$GetData = mysqli_query($con, $query);
$res = mysqli_fetch_assoc($GetData); 

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
  <div class="pageBody">
    <div class="sidebar">
      <img src="Assets/Images/Logo.png" alt="">
      <ul>
        <li ><a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
              class="bi bi-microsoft" viewBox="0 0 16 16">
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
            <h1>Create Student</h1>
          </div>
        </div>
      <form class="form-register" action="CRUD.php" method="post" enctype="multipart/form-data">
        <div class="section row m-0">
        <input type="hidden"  name="StudentId" value = "<?= $res['StudentId'] ?>">
          <div class="col-6 photoupload">
            <img src="<?= $res['Image']?>" value="<?= $res['Image']?>"  id="VisibleImage" alt="">
            <input type="file" class="choosefile" id="Image" name="Image">
          </div>
          <div class="col-6 p-0 pl-4">
            <h1 class="box_title">Personal Information</h1>
            <div class="block">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" value = "<?= $res['Name'] ?>" class="form-control" name="Name" id="Name" aria-describedby="emailHelp"
                    >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" value = "<?= $res['Email'] ?>" class="form-control" name="Email" id="Email" aria-describedby="emailHelp"
                    placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Phone</label>
                  <input type="text" value = "<?= $res['Phone'] ?>" class="form-control" name="Phone" id="Phone" aria-describedby="emailHelp"
                    placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Gender</label>
            
                  <select class="form-control" name="Gender" id="Gender">
                    <option value="">Select</option>
                    <option value="Male" <?php if ($res['Gender'] == 'Male') {echo 'selected';} ?>>Male</option>
                    <option value="Female" <?php if ($res['Gender'] == 'Female') {echo 'selected';} ?>>Female</option>
                    <option value="Others" <?php if ($res['Gender'] == 'Others') {echo 'selected';} ?> >Others</option>
                  </select>
                </div>
            </div>
          </div>

          <div class="col-12 m-0 p-0 mt-4">
            <h1 class="box_title">Educational Information</h1>
            <div class="block">
                <div class="form-group">
                  <label for="exampleInputEmail1">Batch Code</label>
                  <input type="text" value = "<?= $res['BatchCode'] ?>" class="form-control" name="BatchCode" id="BatchCode" aria-describedby="emailHelp"
                    >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Year</label>
                  <input type="text" class="form-control" value = "<?= $res['Year'] ?>" name="Year" id="Year" aria-describedby="emailHelp"
                    placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Batch</label>
                  <select class="form-control" name="Batch" id="Batch">
                
                    <option value="">Select</option>
                    <option value="2104B1" <?php if ($res['Batch'] == '2104B1') {echo 'selected';} ?>>2104B1</option>
                    <option value="2304F1" <?php if ($res['Batch'] == '2304F1') {echo 'selected';} ?>>2304F1</option>
                    <option value="2504D4" <?php if ($res['Batch'] == '2504D4') {echo 'selected';} ?>>2504D4</option>
                    <option value="2938H1" <?php if ($res['Batch'] == '2938H1') {echo 'selected';} ?>>2938H1</option>
                    <option value="8538D2" <?php if ($res['Batch'] == '8538D2') {echo 'selected';} ?>>8538D2</option>
                    <option value="9467H2" <?php if ($res['Batch'] == '9467H2') {echo 'selected';} ?>>9467H2</option>
                    <option value="2938H1" <?php if ($res['Batch'] == '2938H1') {echo 'selected';} ?>>2938H1</option>
                    <option value="2947Z2" <?php if ($res['Batch'] == '2947Z2') {echo 'selected';} ?>>2947Z2</option>
                    <option value="8912C2" <?php if ($res['Batch'] == '8912C2') {echo 'selected';} ?>>8912C2</option>
                  </select>
                </div>
            </div>
          </div>

        </div>
        <a href="ManageStudent.php"><input type="submit" value = "Update" class = "btn btn-primary mt-5 ml-5" style = "width:300px;" name = "upd">
</a> 
        </form>
      </div>
    </div>
  </div>





  <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
  <script src="Assets/Script/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"></script>
</body>

</html>