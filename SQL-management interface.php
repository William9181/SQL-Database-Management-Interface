<!DOCTYPE HTML>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$table_name = $table_inst = $table_rename = $record_id = $record_inst = $field_name = $value = $field_rename = "";

function input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<h2>SQL_training</h2>
<table style="width:100%"></table>
<table>
    <tr>
      <th></th>
      <th>Table</th>
      <th>Record</th>
      <th>Field</th>
    </tr>
    <tr>
        <td>New</td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                <input type="submit" name="btnnewtable" value="Create a new table">
                </form>                
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                Record Id: <input type="text" name="record_id"><br>
                <input type="submit" name="btnnewrecord" value="Create a new record">
                </form>
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                Field Name: <input type="text" name="field_name"><br>
                Datatype: <input type="text" name="value"><br>
                <input type="submit" name="btnnewfield" value="Create a new field"><br>
                Datatype Ex. INT() VARCHAR()
                </form>
        </td>
    </tr>
    <tr>
        <td>Delete</td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                <input type="submit" name="btndeltable" value="delete the table">
                </form>
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                Record Id: <input type="text" name="record_id"><br>
                <input type="submit" name="btndelrecord" value="delete the record">
                </form>
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                Field Name: <input type="text" name="field_name"><br>
                <input type="submit" name="btndelfield" value="delete the field">
                </form>
        </td>
      </tr>    
    <tr>
        <td>Read</td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                <input type="submit" name="btnreadtable" value="read">
                </form>
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                Record Id: <input type="text" name="record_id"><br>
                <input type="submit" name="btnreadrecord" value="read">
                </form>
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                Field Name: <input type="text" name="field_name"><br>
                <input type="submit" name="btnreadfield" value="read">
                </form> 
        </td>
    </tr>
    <tr>
        <td>Write</td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Please enter the whole SQL instruction: <br>
                <input type="text" name="table_inst"><br>
                <input type="submit" name="btnwtetable" value="write"><br>
                format :<br>
                CREATE TABLE table_name (colum1 type1,cloum2 type2)<br>
                example :<br>
                CREATE TABLE Persons (ID int,Name varchar(255))
                </form>
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Please enter the whole SQL instruction: <br>
                <input type="text" name="record_inst"><br>
                <input type="submit" name="btnwterecord" value="write"><br>
                format :<br>
                INSERT INTO table_name (column1, column2) VALUES (value1, value2)<br>
                example :<br>
                INSERT INTO test (id, firstname, lastname) VALUES (32, 'william', 'chen')
                </form>
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                Field Name: <input type="text" name="field_name"><br>
                <input type="submit" name="btnwtefield" value="write a field"><br>
                Datatype VARCHAR(30)
                </form>
        </td>
    </tr>          
    <tr>
        <td>Update</td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                New Table Name: <input type="text" name="table_rename"><br>
                <input type="submit" name="btnupdtable" value="update">
                </form>
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                Record ID: <input type="text" name="record_id"><br>
                field Name: <input type="text" name="field_name"><br>
                update value: <input type="text" name="value"><br>
                <input type="submit" name="btnupdrecord" value="update">
                </form>
        </td>
        <td>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Table Name: <input type="text" name="table_name"><br>
                Record ID: <input type="text" name="record_id"><br>
                field Name: <input type="text" name="field_name"><br>
                update value: <input type="text" name="value"><br>
                <input type="submit" name="btnupdfield" value="update">
                </form>
        </td>
    </tr>        
  </table>



<?php
$servername = "localhost";
$username = "william9181";
$password = "mars1819";
$dbname = "sql_training";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
  die("Connection failed: " . $conn->connect_error);
echo "狀態欄:<br>";

//create table
if(isset($_GET['btnnewtable'])){
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
      $table_name = input($_GET["table_name"]);
    }
    $sql = "CREATE TABLE "."$table_name"." (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table "."$table_name"." created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }  
}

//delete table
elseif(isset($_GET['btndeltable'])){
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
      $table_name = input($_GET["table_name"]);
    }
    $sql = "DROP TABLE "."$table_name";
    if ($conn->query($sql) === TRUE) {
      echo "Table "."$table_name"." deleted successfully";
    } else {
      echo "Error deleting table: " . $conn->error;
    } 
}

//read table
elseif(isset($_GET['btnreadtable'])){
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
      $table_name = input($_GET["table_name"]);
    } 
    $result = mysqli_query($conn,"SELECT * FROM "."$table_name");
    while($row = mysqli_fetch_array($result))
    {
    echo "id: ".$row['id'] . " firstname:" . $row['firstname'] . " lastname:" . $row['lastname'] . " email:" . $row['email'] . " reg_date:" . $row['reg_date']; 
    echo "<br />";
    }
}

//write table
elseif(isset($_GET['btnwtetable'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_inst = input($_GET["table_inst"]);
  }
  $sql = "$table_inst";
    if ($conn->query($sql) === TRUE) {
      echo "Table wrote successfully";
    } else {
      echo "Error writing table: " . $conn->error;
    } 
    $table_inst="";
}

//update table
elseif(isset($_GET['btnupdtable'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $table_rename = input($_GET["table_rename"]);
  }
  $sql = "ALTER TABLE "."$table_name "."RENAME "."$table_rename";
    if ($conn->query($sql) === TRUE) {
      echo "Table updated successfully";
    } else {
      echo "Error updating table: " . $conn->error;
    } 
}

//new record
elseif(isset($_GET['btnnewrecord'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $record_id = input($_GET["record_id"]);
  }
  //INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...)
  $sql = "INSERT INTO "."$table_name"." (id) VALUES ("."$record_id".")";
    if ($conn->query($sql) === TRUE) {
      echo "Record ID "."$record_id"." created successfully";
    } else {
      echo "Error creating Record: " . $conn->error;
    } 
}

//delete record
elseif(isset($_GET['btndelrecord'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $record_id = input($_GET["record_id"]);
  }
  //DELETE FROM table_name WHERE some_column = some_value
  $sql = "DELETE FROM "."$table_name"." WHERE id = "."$record_id";
    if ($conn->query($sql) === TRUE) {
      echo "Record ID "."$record_id"." deleted successfully";
    } else {
      echo "Error creating Record: " . $conn->error;
    } 
}

//read record
elseif(isset($_GET['btnreadrecord'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $record_id = input($_GET["record_id"]);
  } 
  $result = mysqli_query($conn,"SELECT * FROM "."$table_name"." WHERE id = "."$record_id");
  while($row = mysqli_fetch_array($result))
  {
  echo "id: ".$row['id'] . " firstname:" . $row['firstname'] . " lastname:" . $row['lastname'] . " email:" . $row['email'] . " reg_date:" . $row['reg_date']; 
  echo "<br />";
  }
}

//write record
elseif(isset($_GET['btnwterecord'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    //$record_inst = input($_GET["record_inst"]);
    $record_inst =trim($_GET["record_inst"]);
  }
  $sql = "$record_inst";
    if ($conn->query($sql) === TRUE) {
      echo "Record wrote successfully";
    } else {
      echo "Error writing record: " . $conn->error;
    }    
}

//update record
elseif(isset($_GET['btnupdrecord'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $record_id = input($_GET["record_id"]);
    $field_name = input($_GET["field_name"]);
    $value = input($_GET["value"]);
  }
  $sql = "UPDATE "."$table_name "."SET "."$field_name"."="."'$value'"." WHERE id="."$record_id";
    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating Record: " . $conn->error;
    } 
}

//new field
elseif(isset($_GET['btnnewfield'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $field_name = input($_GET["field_name"]);
    $value = input($_GET["value"]);
  }
  //ALTER TABLE table_name ADD column_name datatype;
  $sql = "ALTER TABLE "."$table_name"." ADD "."$field_name"." "."$value";
    if ($conn->query($sql) === TRUE) {
      echo "Field "."$field_name"." created successfully";
    } else {
      echo "Error creating Field: " . $conn->error;
    } 
}

//delete field
elseif(isset($_GET['btndelfield'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $field_name = input($_GET["field_name"]);
  }
  //ALTER TABLE table_name DROP COLUMN column_name;
  $sql = "ALTER TABLE "."$table_name"." DROP COLUMN "."$field_name";
    if ($conn->query($sql) === TRUE) {
      echo "Field Name "."$field_name"." deleted successfully";
    } else {
      echo "Error creating Field: " . $conn->error;
    } 
}

//read field
elseif(isset($_GET['btnreadfield'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $field_name = trim($_GET["field_name"]);
  } 
  $result = mysqli_query($conn,"SELECT * FROM "."$table_name");
  while($row = mysqli_fetch_array($result))
  {
  echo "id: ".$row['id'].""."$field_name".": ".$row[$field_name]; 
  echo "<br />";
  }
}

//write field
elseif(isset($_GET['btnwtefield'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $field_name = input($_GET["field_name"]);
  }
  //ALTER TABLE table_name ADD column_name datatype;
  $sql = "ALTER TABLE "."$table_name"." ADD "."$field_name"." VARCHAR(30)";
    if ($conn->query($sql) === TRUE) {
      echo "Field "."$field_name"." wrote successfully";
    } else {
      echo "Error writing Field: " . $conn->error;
    } 
}

//update field
elseif(isset($_GET['btnupdfield'])){
  if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $table_name = input($_GET["table_name"]);
    $record_id = input($_GET["record_id"]);
    $field_name = input($_GET["field_name"]);
    $value = input($_GET["value"]);
  }
  $sql = "UPDATE "."$table_name "."SET "."$field_name"."="."'$value'"." WHERE id="."$record_id";
    if ($conn->query($sql) === TRUE) {
      echo "Field updated successfully";
    } else {
      echo "Error updating Field: " . $conn->error;
    } 
  }

//disconnect
$conn->close();

?>

</body>
</html>