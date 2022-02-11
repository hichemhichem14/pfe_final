<?php
require 'users/users.php';
//echo "2";

//shell_exec("/home/hichem/Desktop/php_final/server2/app2/auto.sh {$data['client_name']} {$data['db_name']} {$data['sub_domain']} {$data['client_email']} {$data['password']} {$data['db_password']}");$users = getUsers();
//$output = shell_exec(" /home/hichem/Desktop/pfe_final/server2/app2/auto.sh ll7 ll1 pp.test ll1 ll1 ll1 2>&1");
$users = getUsers();
//echo $output;
//$a=shell_exec("docker run hello-world 2>&1");
//echo $a;
include 'partials/header.php';
?>

<div class="container">
    <p>
        <a class="btn btn-success" href="feature_form.php">create new feature</a>
    </p>
    <br>
<div class="container">
    <p>
        <a class="btn btn-success" href="create.php">Create new Client</a>
    </p>

    <table class="table">
        <thead>
        <tr>
           
            <th>NAME</th>
            <th>Email</th>
             <th>subdomain</th>
            <th>db_name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
       
                <td><?php  echo $user['client_name'] ?></td>
                <td><?php echo $user['client_email'] ?></td>
                <td><?php echo $user['sub_domain'] ?></td>
                <td><?php echo $user['db_name'] ?></td>
                <td><?php echo $user['server'] ?></td>
                <td>
                    <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                    <a href="update.php?id=<?php echo $user['id'] ?>"
                       class="btn btn-sm btn-outline-secondary">Update</a>
                       <a href="addfeature.php?id=<?php echo $user['id'] ?>"
                       class="btn btn-sm btn-outline-secondary">add a feature</a>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>

<?php include 'partials/footer.php' ?>

