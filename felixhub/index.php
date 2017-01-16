<?php 
$pageTitle = "Home";
include "includes/header.php";?>

<div class="section main">
    <div class="container animated fadeIn">
<?
if(login_check($mysqli) == true) {
        ?>
		
        <h1>Are you lost?</h1>
        <h2>This is not a friendly place...</h2>
        <? if(!empty($search)){
                echo "<h2> You searched: " . $search . "</h2>";
            }
        ?>
		<div class="row">
			<div class="col-md-6">
				<a class="expand" href="shaun.php">
					<i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
					<h1>Shaun's Hub</h1>
				</a>
			</div>
			<div class="col-md-6">
				<a class="expand" href="felix.php">
					<i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
					<h1>Felix's Hub</h1>
				</a>
			</div>
		</div>

		<?
} else { 
        echo '<h1>You are not authorized to access this page, please login.</h1>';
}
?>

    </div>
</div>
<?php 
include"includes/footer.php";
?>