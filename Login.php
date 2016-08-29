<?php
$con = mysqli_connect("mysql4.000webhost.com", "a7561257_MyApp", "MyApplication123", "a7561257_MyApp");

$username = $_POST["username"];
$password = $_POST["password"];

$statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
mysqli_stmt_bind_param($statement, "ss", $username, $password);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statment, $userID, $name, $age, $username, $password);

$response = array();
$response["success"] = false;

whhile(mysqli_stmt_fetch($statment)){
      $response["success"] = true;
      $response["name"] = $name;
      $response["age"] = $age;
      $response["username"] = $username;
      $response["password"] = $password;
  
}
echo json_encode($response);
?>
