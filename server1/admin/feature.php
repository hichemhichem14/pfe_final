<?php
include 'partials/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //  $user = array_merge($user, $_POST);

//    $isValid = validateUser($user, $errors);

    //if ($isValid) {
        print_r($_POST);
        //echo "we";
$user = "newuser";
$password = "password";
$database = "saas";
$table = "clients";
 $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
 {try{
     $db;
//$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sth = $db->prepare('insert into features(name,sql_query,arguments) values(?,?,?)');
   $name=$_POST["feature_name"];
   $sql_query=$_POST["sql"];
   $arguments=json_encode($_POST["faeture"]);
//    $users = getUsers();
  //$sth->bind_param("ss", $data["password"], $data["db_password"]);
   //$data['id'] = rand(1000000, 2000000);
    $sth->execute([$name,$sql_query,$arguments]) or die(print_r($sth->errorInfo(), true));
    // $users[] = $data;
    /*$output=*/shell_exec("/home/hichem/Desktop/pfe_final/server2/app2/auto.sh {$data['client_name']} {$data['db_name']} {$data['sub_domain']} {$data['client_email']} {$data['password']} {$data['db_password']} 2>&1");
   //putJson($users);
// return $output;
  
  }
catch(PDOException $e) { echo "Error: " . $e->getMessage(); }
}
       // echo $user ;
        //exit();
      //  uploadImage($_FILES['picture'], $user);

        header("Location: index.php");
    //}
}

?>