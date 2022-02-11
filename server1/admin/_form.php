<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
                <?php if ($user['id']): ?>
                    Update user <b><?php echo $user['name'] ?></b>
                <?php else: ?>
                    Create new User
                <?php endif ?>
            </h3>
        </div>
        <div class="card-body">

            <form method="POST" enctype="multipart/form-data"
                  action="">
                <div class="form-group">
                    <label>Name</label>
                    <input name="client_name" value="<?php echo $user['client_name'] ?>"
                           class="form-control <?php /*echo $errors['name'] ? 'is-invalid' : ''*/ ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="client_email" value="<?php echo $user['client_email'] ?>"
                           class="form-control <?php /*echo $errors['username'] ? 'is-invalid' : '' */?>">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" value="<?php echo $user['password'] ?>"
                    class="form-control  <?php /*echo $errors['email'] ? 'is-invalid' : ''*/ ?>">
                </div>
                <div class="form-group">
                    <label>sub_domain</label>
                    <input name="sub_domain" value="<?php echo $user['sub_domain'] ?>"
                           class="form-control <?php /*echo $errors['name'] ? 'is-invalid' : ''*/ ?>">
                    
                </div>
                <div class="form-group">
                    <label>db_name</label>
                    <input name="db_name" value="<?php echo $user['db_name'] ?>"
                           class="form-control <?php /*echo $errors['username'] ? 'is-invalid' : ''*/ ?>">
                </div>
                <div class="form-group">
                    <label>db_password</label>
                    <input name="db_password" value="<?php echo $user['db_password'] ?>"
                           class="form-control  <?php /* echo $errors['email'] ? 'is-invalid' : '' */?>">
                </div>
                <div class="form-group">
                    <label>server</label>
                    <input name="server" value="<?php echo $user['server'] ?>"
                           class="form-control <?php /*echo $errors['username'] ? 'is-invalid' : ''*/ ?>">
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
            </div>
    </div>
</div>
