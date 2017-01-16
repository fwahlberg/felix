<?php
include_once 'includes/register.inc.php';
$pageTitle = "Register";
include "includes/header.php";
?>

<div class="section main">
    <div class="container animated fadeIn">
        <h1>Register with us</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
		<strong>
        <ul style="list-style: none;">
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul style="list-style: none;">
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
		</strong>
		<div class="row">
		<div class="col-md-6 col-md-offset-3">
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" class="form-horizontal" method="post" name="registration_form">
			<div class="form-group">
				<label for="username">Username:</label> 
				<input type='text' name='username' id='username' class='form-control' />
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="text" name="email" id="email" class='form-control' />
			</div>
            <div class="form-group">
				<label for="password">Password: </label>
				<input type="password" name="password" id="password" class='form-control'/>
			</div>
			<div class="form-group">
				<label for="confirmpwd">Confirm password:</label>
				<input type="password" name="confirmpwd" id="confirmpwd" class='form-control' />
			</div>
            
            
            <input type="button" class="btn btn-default" value="Register" onclick="return regformhash(this.form,
																			   this.form.username,
																			   this.form.email,
																			   this.form.password,
																			   this.form.confirmpwd);" /> 
        </form>
		</div>
		</div>
		<div class="row">
        <p>Return to the <a href="login.php">login page</a>.</p>
		</div>
</div>
</div>
<? include "includes/footer.php";