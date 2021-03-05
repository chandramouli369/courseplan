<?php include("../header/admin_header.php") ?>
<?php
if ($_SESSION['usertype']!="admin") header("Location:../login/index_login.php");

// session_start();

require "../db.php";

if (isset($_POST['Submit']))
{
  $acyear = $_POST['acyear'];
  $acyear_new = $_POST['acyear_new'];
  if($acyear_new!="") $acyear = $acyear_new;

  $branch = $_POST['branch'];
  $fid = $_POST['fid'];

  $subject = $_POST['subject'];
  $subject_new = $_POST['subject_new'];
  if($subject_new!="") $subject = $subject_new;

  $year = $_POST['year'];
  $semester = $_POST['semester'];
  $section = $_POST['section'];

  $section = $branch."-".$section;

  $qry = "INSERT INTO `subjects`(`fid`, `academic_year`, `subject_name`, `year`, `semester`, `section`) VALUES ('$fid', '$acyear', '$subject', '$year', '$semester', '$section')";
  mysqli_query($db, $qry);

  $qry = "SELECT sid from subjects where fid='$fid' and academic_year='$acyear' and subject_name='$subject' and year='$year' and semester='$semester' and section='$section' ";
  $sid = mysqli_fetch_assoc(mysqli_query($db, $qry))['sid'];

  $qry = "INSERT INTO `status`(`sid`) VALUES ('$sid') ";
  mysqli_query($db, $qry);

}

$qry = "SELECT distinct academic_year from subjects order by academic_year desc";
$ay = mysqli_query($db, $qry);

$qry = "SELECT distinct subject_name from subjects";
$sb = mysqli_query($db, $qry);

$qry = "SELECT userid, name from users where usertype='faculty' ";
$fac = mysqli_query($db, $qry);

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<head>
<style>
  #sidebar
  {
      padding-left: 10px;
      margin-left: 0px;
  }
  #sidebar.active {
    margin-left: -280px;
  }
  ul
  {
      list-style: none;
  }
body {
  margin: 0;
  font-family: "Lato", sans-serif;

}
.sidebar {
  margin-top: 0;
}

.contact{
max-width: 350px;
margin: auto;
border-radius: 5px;

background-color: rgba(0,0,0,0.6);
padding: 20px;
}
select{
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;

}
input[type=submit]
{
width: 100%;
background-color: #ff4000;
color:white;
padding:14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;
}
input[type=submit]: hover{
background: crimson;
}
.acyear
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.subject
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
<body>


<h1 style="text-align: center;font-family:sans-serif;color: black">Assign Lecturer</h1>
<div class="contact">
<form method="post" >
  Academic Year: <input type="radio" value="existing" name="acyear_radio" checked>Existing <input type="radio" value="new" name="acyear_radio">New
  <select name="acyear" id="acyear_select">
    <?php while($row = mysqli_fetch_assoc($ay)) { ?>
    <option value="<?php echo $row['academic_year'] ?>"><?php echo $row['academic_year'] ?></option>
  <?php } ?>
  <input id="acyear_text" class="acyear" type="text" name="acyear_new" placeholder="New Acedemic Year!">
  </select>
<br>
Branch:
<select name="branch">
  <option value="CSE">CSE</option>
  <option value="ECE">ECE</option>
  <option value="CHEM">CHEM</option>
  <option value="MECH">MECHANICAL</option>
  <option value="IT">IT</option>
  <option value="CIVIL">CIVIL</option>
</select>
<br>
Lecturer:
<select name="fid">
  <?php while($row = mysqli_fetch_assoc($fac)) { ?>
    <option value="<?php echo $row['userid'] ?>"><?php echo $row['name'] ?></option>
  <?php } ?>
</select>
<br>
Subject: <input type="radio" value="existing" name="subject_radio" checked>Existing <input type="radio" value="new" name="subject_radio">New
<select id="subject_select" name="subject">
  <?php while($row = mysqli_fetch_assoc($sb)) { ?>
    <option value="<?php echo $row['subject_name'] ?>"><?php echo $row['subject_name'] ?></option>
  <?php } ?>
</select>
  <input id="subject_text" class="subject" type="text" name="subject_new" placeholder="New Subject!">
Year:
<select name="year">
  <option value="1">1st year</option>
  <option value="2">2nd year</option>
  <option value="3">3rd year</option>
  <option value="4">4th year</option>
</select>
Semester:
<select name="semester">
  <option value="1">1st semester</option>
  <option value="2">2nd semester</option>
</select>
Section:
<select name="section">
  <option value="A">A</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select>
<input type="submit"  name="Submit" value="Submit">        
</form>

</body>
</html>

<script>
  $('input[name="subject_radio"]').change(()=>
  {
    if ($('input[name="subject_radio"]:checked').val() == "new")
    {
      $('#subject_text').val("");
      $('#subject_select').hide();
      $('#subject_text').show();
    }
    else
    {
      $('#subject_text').val("");
      $('#subject_select').show();
      $('#subject_text').hide();
    }
  });
  $('input[name="acyear_radio"]').change(()=>
  {
    if ($('input[name="acyear_radio"]:checked').val() == "new")
    {
      $('#acyear_text').val("");
      $('#acyear_select').hide();
      $('#acyear_text').show();
    }
    else
    {
      $('#acyear_text').val("");
      $('#acyear_select').show();
      $('#acyear_text').hide();
    }
  });
</script>