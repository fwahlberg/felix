<?php 
$pageTitle = "Signup";
include "includes/header.php";
?>
    <div class="section main">
        <div class="container">
            <h1>So you want to be part of us?</h1>
            <h2>Bad decision...</h2>
            <? if(!empty($search)){
                echo "<h2> You searched: " . $search . "</h2>";
            }
        ?>
                <form>
                    <div class="form-group">
                        <label for="email">Name:</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Confirm Password:</label>
                        <input type="password" class="form-control" id="pwd2">
                    </div>
                    <button type="submit" class="btn btn-default">Sign Up!</button>
                </form>
        </div>
    </div>

    <?php 
include"includes/footer.php";
?>