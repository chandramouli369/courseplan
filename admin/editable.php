<?php include("../header/admin_header.php") ?>

<?php
// session_start();
if ($_SESSION['usertype']!="admin") header("Location:../login/index_login.php");

require "../db.php";

$qry = "SELECT distinct academic_year from subjects";
$ay = mysqli_query($db, $qry);

if (isset($_GET['get']))
{
  $acyear = $_GET['acyear'];

  $qry = "SELECT * from subjects s inner join users u on u.userid=s.fid where s.academic_year='$acyear' order by s.section ";
  $res = mysqli_query($db, $qry);
}
if (isset($_GET['del_sid']))
{
  $sid = $_GET['del_sid'];

  $qry = "DELETE from subjects where sid='$sid' ";
  mysqli_query($db, $qry);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin-left: 22%;
   border:1px solid #85144b;
}
body {
  margin: 0;
  font-family: "Lato", sans-serif;

}
th{
  background-color: #009879;
  color:#ffffff;
}
td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.sidebar {
  /*margin-top: -2%;*/
  margin-top: 0;
  padding: 0;
  width: 200px;
  background-color: #2c3e50;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 

.sidebar a.active {
  background-color: black;
  color: white;
}
.sidebar a.active2 {
  background-color: green;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #72587F;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
button
{
   /* #4CAF50 (or 0x4CAF50) named as Fruit Salad HEX triplet: 4C, AF and 50.rgb value is (76,175,80). */

/*position from left side*/
  width: 65px;
  padding-top: 6px;
  padding-bottom: 6px;
  font-size: 15px;
  padding-left: 7px;
  border-radius: 5px;
}
.btn{
  color: white;
  background-color: limegreen;
  border: none;
  outline: none;
}
.btn:hover{
background-color:  green;

}
.btn2{
  color: white;
  background-color:  #ff4000;
  border: none;
  outline: none;
}
.btn2:hover{
background-color: red;
}
select{
  margin-top: 30px; 
width: 300px;
padding: 12px 20px;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;

}
input[name="get"]
{
  height: 40px;
  width: 80px;
}

</style>
</head>
<body>


<form>
  <div align="center">
  <select name="acyear">
    <?php while($row = mysqli_fetch_assoc($ay)) { ?>
      <option value="<?php echo $row['academic_year'] ?>"><?php echo $row['academic_year'] ?></option>
    <?php } ?>
  </select>
  <input type="submit" name="get" value="Show">
</form>
</div>
<h1 style="text-align: center;font-family:sans-serif;"></h1>
<table>

  <tr>
    <th>Name</th>
      <th>Subject</th>
    <th>Year</th>
    <th>Semester</th>
    <th>Section</th>
    <th>View</th>
      <th>Modify</th>
       <th>Delete</th>
  </tr>

  <?php if (isset($_GET['get'])) while($row = mysqli_fetch_assoc($res)) { ?>
  <tr>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['subject_name'] ?></td>
    <td><?php echo $row['year'] ?></td>
    <td><?php echo $row['semester'] ?></td>
    <td><?php echo $row['section'] ?></td>
    <td><button onclick="window.location.href = '../dashboard/coursefile.php?sid=<?php echo $row['sid'] ?>'" class="btn">view</button></td>
     <td><button onclick="window.location.href = 'table.php?sid=<?php echo $row['sid'] ?>'" class="btn">Review</button></td>
      <td><button onclick="window.location.href = 'editable.php?del_sid=<?php echo $row['sid'] ?>&acyear=<?php echo $row['academic_year'] ?>&get=Show'" class="btn2">Delete</button></td>
  </tr>
  <?php } ?>
</table>
<br><br>



</body>
</html>
