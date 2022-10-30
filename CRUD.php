<?php include 'Connection.php'; ?>

<?php 

    if (isset($_POST['ins'])) {

        $FileProp = $_FILES['Image'];
        $FileName = $_FILES['Image']['name'];
        $FileType = $_FILES['Image']['type'];
        $FileTempLoc = $_FILES['Image']['tmp_name'];
 
        $FileSize = $_FILES['Image']['size'];

        $folder = 'StudentImages/';
        $folder = $folder . $FileName;


        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Phone = $_POST['Phone'];
        $Gender = $_POST['Gender'];
        $BatchCode = $_POST['BatchCode'];
        $Year = $_POST['Year'];
        $Batch = $_POST['Batch'];

        $query = " insert into student(Image, Name, Email, Phone, Gender, BatchCode, Year, Batch) values ('$folder','$Name','$Email','$Phone','$Gender','$BatchCode','$Year','$Batch')";

        $res = mysqli_query($con, $query);
    
        if ($res) {
            echo "<script> alert('Data Inserted'); window.location.href='ManageStudent.php';</script>";
            move_uploaded_file($FileTempLoc, $Image);

        }
         else {
            echo "<script> alert('Data Insertion Failed');window.location.href='ManageStudent.php'; </script>";
        }
    }
 ?>


<?php 
if (isset($_POST['upd'])) 
{
    $Id = $_POST['StudentId'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Gender = $_POST['Gender'];
    $BatchCode = $_POST['BatchCode'];
    $Year = $_POST['Year'];
    $Batch = $_POST['Batch'];


    $FileProp = $_FILES['Image'];
    
    $FileName = $_FILES['Image']['name'];
    $FileType = $_FILES['Image']['type'];
    $FileTempLoc = $_FILES['Image']['tmp_name'];
    $FileSize = $_FILES['Image']['size'];

    $folder = 'StudentImages/';
    $folder = $folder . $FileName;

    if($FileName != "")
    {
        $query = "update student set 
        Name = '$Name',
        Phone = '$Phone',
        Email = '$Email',
        Gender = '$Gender',
        BatchCode = '$BatchCode',
        Year = '$Year',
        Batch = '$Batch',
        Image = '$folder'
        where StudentId = '$Id'";
    
        $res = mysqli_query($con, $query) or die("Query Failed");
    
        if ($res) {
            echo "<script> alert('Data Inserted');window.location.href='ManageStudent.php';</script>";
            move_uploaded_file($FileTempLoc, $folder);
        }
         else {
            echo "<script> alert('Data Insertion Failed');window.location.href='ManageStudent.php';</script>";
        }

    }
    else
    {

    $query = "update student set 
    Name = '$Name',
    Phone = '$Phone',
    Email = '$Email',
    Gender = '$Gender',
    BatchCode = '$BatchCode',
    Year = '$Year',
    Batch = '$Batch',
    Image = '$folder'
    where StudentId = '$Id'";

    $res = mysqli_query($con, $query) or die("Query Failed");

    if ($res) {
        echo "<script> alert('Data Updated');window.location.href='ManageStudent.php';</script>";
        move_uploaded_file($FileTempLoc, $folder);
    }
     else {
        echo "<script> alert('Data Insertion Failed');window.location.href='ManageStudent.php'; </script>";
    }
    }

} ?>