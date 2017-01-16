<?
class Render{
	public static function displayPrep($prep)
	{
		$output = "";
		$output = "<div class=\"well\">";
		$output .=  $prep->getTaskName() . " set by " . $prep->getTeacher();
		$output .= "<br>";
		$output .=  $prep->getTaskDescription();
		$output .= "<br>";
		$output .= "<strong>" . implode(", ",$prep->getTags()) . "</strong>";
		$output .= "<br>";
		$output .= "Due in: " . $prep->getDueDate();  
		$output .= "<br></div>";
		return $output;
	}
}

  
  ?>