<?
	$Psychology1 = new Prep("psychology", "holiday work");
	$Psychology1->setTaskDescription("Please complete all pages over the holiday break");
	$Psychology1->setDueDate('05,01,2017');
	$Psychology1->setTeacher('1');
	$Psychology1->addTag("Not Complete");
	
	$computing1 = new Prep("computing", "catchup work");
	$computing1->setTaskDescription("Please complete all outstanding work");
	$computing1->setDueDate('10,01,2017');
	$computing1->setTeacher('2');
	$computing1->addTag("Not Complete");
	
	$photography1 = new Prep("photography", "coursework");
	$photography1->setTaskDescription("Please continue to take delightful pictures");
	$photography1->setDueDate('15,02,2017');
	$photography1->setTeacher('3');
	$photography1->addTag("In Progress");
?>