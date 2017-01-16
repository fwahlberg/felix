<?php 
$pageTitle = "Home";
include "includes/header.php";
include "allpreps.php";
?>
<div class="section main">
    <div class="container animated bounce">
        <h1>Felix's Planner</h1>
        <h2>This is not a friendly place...</h2>
        <? if(!empty($search)){
                echo "<h2> You searched: " . $search . "</h2>";
            }
        ?>
		<div class="row">
			<div class="col-md-12">
				<?
					$Pangbourne = new PrepDiary("Pangbourne Lent Term Prep Diary");
					$Pangbourne->addPrep($Psychology1);
					$Pangbourne->addPrep($computing1);
					$Pangbourne->addPrep($photography1);
					
					foreach($Pangbourne->getPrep() as $prep){
						echo Render::displayPrep($prep);
						
					}
					$database = new DatabaseHandler();	
					$database->connect();
					foreach($Pangbourne->getPrep() as $prep){
						$database->insertPrep($prep);	
					}
					
					$database->closeConnection();

				?>
			</div>
		</div>
    </div>
</div>

<?php 
include"includes/footer.php";
?>