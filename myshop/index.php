<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Myshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
      body{
        background-color: #fcba03; 
      }
    </style>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <div class="cotnainer my-5">
    <h2>Lists of clients</h2>
    <a  class="btn btn-primary"href="/myshop/create.php " role="button">New Client</a>
    <br>
    <table class="table table-striped">
  <thead  class="table-dark">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th >Phone</th>
      <th>Address</th>
      <th>Created At</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody class=" table-warning">
    <?php
    $servername="localhost";
    $username = "root";
    $password="";
    $database = "myshop";
    //Create connection
    $connection = new mysqli($servername,$username,$password,$database);
    if($connection->connect_error){
       die("Connection Failed:".$connection->connect_error) ;
    }

    //read all the row from database Table
    $sql="SELECT * FROM client";
    $result = $connection->query($sql);
    
    if(!$result){
        die("Invalid query:".$connection->error);
    }

    //read data of each row
    while($row = $result->fetch_assoc()){
        echo" <tr>
        <td>$row[id]</td>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[phone]</td>
        <td>$row[address]</td>
        <td>$row[created_at]</td>
        <td>
        <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'> Edit </a>
        <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'> Delete </a>
        </td>";  
    }
    ?>
 
</tr>
  </tbody>
</table>
  </div>
</body>
</html>