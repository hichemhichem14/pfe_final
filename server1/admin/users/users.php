<?php
/**
 * User: TheCodeholic
 * Date: 3/19/2019
 * Time: 9:27 AM
 */
//echo "we";
$user = "newuser";
$password = "password";
$database = "saas";
$table = "clients";
 $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
function getUsers()
{
global $db;
    $sth = $db->query("SELECT id,client_name,client_email,sub_domain,db_name,server FROM clients order by id DESC");
$result = $sth->fetchAll();
return $result;
}
//print_r(getUsers());
//echo  "yes";
function getUserById($id)
{
//return 1; 
global $db;
$sth = $db->query("SELECT id,client_name,client_email,sub_domain,db_name  FROM clients where id=$id");
//$sth = $db->prepare("select * from clients");
//    $users = getUsers()
$result = $sth->fetch();
//    foreach ($users as $user) {
        if (!empty($result)) {
            return $result;
        }
    ///}
  //  return [1,2];
}
//print_r(getUsers());
//getUserById(1);
//print_r(getUserById(1));
//print_r(getUserById(1));
function createUser($data)
{try{
     global $db;
//$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sth = $db->prepare('insert into clients(client_name,client_email,password,sub_domain,db_name,db_password,server) values(:client_name,:client_email,:password,:sub_domain,:db_name,:db_password,:server)');
//    $users = getUsers();
   //$sth->bind_param("ss", $data["password"], $data["db_password"]);
    //$data['id'] = rand(1000000, 2000000);
     $sth->execute(['client_name'=>$data["client_name"],'client_email'=>$data["client_email"],'password'=>$data["password"],'sub_domain'=>$data["sub_domain"],'db_name'=>$data["db_name"],'db_password'=>$data["db_password"],"server"=>$data["server"]]) or die(print_r($sth->errorInfo(), true));
     // $users[] = $data;
     /*$output=*/shell_exec("/home/hichem/Desktop/pfe_final/server2/app2/auto.sh {$data['client_name']} {$data['db_name']} {$data['sub_domain']} {$data['client_email']} {$data['password']} {$data['db_password']} 2>&1");
    //putJson($users);
 // return $output;
   
    return $data;}
catch(PDOException $e) { echo "Error: " . $e->getMessage(); }
}
//print_r(createUser(["client_name"=>"hichem","client_email"=>"nadir@gmail.com","password"=>"we","sub_domain"=>"client","db_name"=>"nadir","db_password"=>"we"]));
//createUser(["client_name"=>"hichem","client_email"=>"nadir@gmail.com","password"=>"we","sub_domain"=>"client","db_name"=>"nadir","db_password"=>"we"]);
function updateUser($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }

    putJson($users);

    return $updateUser;
}

function deleteUser($id)
{
    $users = getUsers();

    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            array_splice($users, $i, 1);
        }
    }

    putJson($users);
}

function uploadImage($file, $user)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . "/images")) {
            mkdir(__DIR__ . "/images");
        }
        // Get the file extension from the filename
        $fileName = $file['name'];
        // Search for the dot in the filename
        $dotPosition = strpos($fileName, '.');
        // Take the substring from the dot position till the end of the string
        $extension = substr($fileName, $dotPosition + 1);

        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/${user['id']}.$extension");

        $user['extension'] = $extension;
        updateUser($user, $user['id']);
    }
}

function putJson($users)
{
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors)
{
    $isValid = true;
    // Start of validation
    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    }
    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
        $isValid = false;
        $errors['username'] = 'Username is required and it must be more than 6 and less then 16 character';
    }
    if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'This must be a valid email address';
    }

    if (!filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['phone'] = 'This must be a valid phone number';
    }
    // End Of validation

    return $isValid;
}
