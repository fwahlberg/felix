<?php

class Prep
{
	private $subject;
	private $teacher;
	private $taskName;
	private $taskDescription;
	private $dueDate;
	private $tag = array();
	
	public function __construct($subject = null, $taskName = null)
	{
		$this->setSubject($subject);
		$this->setTaskName($taskName);
	}
	
	public function __toString()
	{
		$output = "";
		$output .= "\nThe following methods are available for " . __CLASS__ . " object: \n";
		$output .= implode("\n", get_class_methods(__CLASS__));
		return $output;
	}
	
	public function getSubject()
	{
		return $this->subject;
	}
	
	public function setSubject($subject)
	{
		$this->subject = ucwords($subject);
	}
	
	public function getTeacher()
	{
		return $this->teacher;
	}
	
	public function setTeacher($teacher)
	{
		$this->teacher = ucwords($teacher);
	}
	
	public function getTaskName()
	{
		return $this->taskName;
	}
	
	public function setTaskName($taskName)
	{
		$this->taskName = ucwords($taskName);
	}
	
	public function getTaskDescription()
	{
		return $this->taskDescription;
	}
	
	public function setTaskDescription($taskDescription)
	{
		$this->taskDescription = $taskDescription;
	}
	
	public function getDueDate()
	{
		$date = $this->dueDate;
		return $date->format('y-m-d');
	}
	
	public function setDueDate($dueDate)
	{
		$format = 'd,m,Y';
		$date = DateTime::createFromFormat($format, $dueDate);
		$this->dueDate = $date;
	}
	public function addTag($tag)
	{
		$this->tags[] = strtolower($tag);
	}
  
	public function getTags()
	{
		return $this->tags;
	}
}