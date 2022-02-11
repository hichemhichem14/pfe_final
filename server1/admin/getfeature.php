<?php
        //echo "we";
        $user = "newuser";
        $password = "password";
        $database = "saas";
        $table = "clients";
         $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
        
         
         try{
            
       
        //$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $sth = $db->query("select name,sql_query,arguments from features ");
           $result = $sth->fetchAll();
          // print_r($result);
        //    $users = getUsers();
          //$sth->bind_param("ss", $data["password"], $data["db_password"]);
           //$data['id'] = rand(1000000, 2000000);
          echo json_encode($result);
          }
        catch(PDOException $e) { echo "Error: " . $e->getMessage(); }
        
?>

