<?php
namespace Classes;


class Task {

 private $task_id;
 private $title;
 private $start_date;
 private $due_date;
 private $status;
 private $priority;
 private $description;
    
public function __construct( 
$title, $start_date, $due_date,
$status, $priority, $description){
$this -> task_id = $task_id;
$this -> title = $title;
$this -> start_date = $start_date;
$this -> due_date = $due_date;
$this -> status = $status;
$this -> priority = $priority;
$this -> description = $description;
}



 /**
  * Get the value of task_id
  */ 
 public function getTask_id()
 {
  return $this->task_id;
 }

 /**
  * Set the value of task_id
  *
  * @return  self
  */ 
 public function setTask_id($task_id)
 {
  $this->task_id = $task_id;

  return $this;
 }

 /**
  * Get the value of title
  */ 
 public function getTitle()
 {
  return $this->title;
 }

 /**
  * Set the value of title
  *
  * @return  self
  */ 
 public function setTitle($title)
 {
  $this->title = $title;

  return $this;
 }

 /**
  * Get the value of start_date
  */ 
 public function getStart_date()
 {
  return $this->start_date;
 }

 /**
  * Set the value of start_date
  *
  * @return  self
  */ 
 public function setStart_date($start_date)
 {
  $this->start_date = $start_date;

  return $this;
 }

 /**
  * Get the value of due_date
  */ 
 public function getDue_date()
 {
  return $this->due_date;
 }

 /**
  * Set the value of due_date
  *
  * @return  self
  */ 
 public function setDue_date($due_date)
 {
  $this->due_date = $due_date;

  return $this;
 }

 /**
  * Get the value of status
  */ 
 public function getStatus()
 {
        switch($this->priority){
                case 1: {
                    return "<p class = 'priority_medium'>Under Work</p>";
                }
                case 2:{
                    return "<p class = 'priority_low'>Ready</p>";
                }
                default: {
                    return "ValueCorrupted";
                }
            }
 }

 /**
  * Set the value of status
  *
  * @return  self
  */ 
 public function setStatus($status)
 {
  $this->status = $status;

  return $this;
 }

 /**
  * Get the value of priority
  */ 
 public function getPriority()
 {
        switch($this->priority){
                case 1: {
                    return "<p class = 'priority_high'>HIGH</p>";
                }
                case 2: {
                    return "<p class = 'priority_medium'>MEDIUM</p>";
                }
                case 3:{
                    return "<p class = 'priority_low'>LOW</p>";
                }
                default: {
                    return "ValueCorrupted";
                }
            }
 }

 /**
  * Set the value of priority
  *
  * @return  self
  */ 
 public function setPriority($priority)
 {
  $this->priority = $priority;

  return $this;
 }

 /**
  * Get the value of description
  */ 
 public function getDescription()
 {
  return $this->description;
 }

 /**
  * Set the value of description
  *
  * @return  self
  */ 
 public function setDescription($description)
 {
  $this->description = $description;

  return $this;
 }
 
 
 public function RowPrint(){
          return("<tr>"
                  . "<td>".$this -> task_id."</td>"
                  . "<td>".$this -> title."</td>"
                  . "<td>".$this -> start_date."</td>"
                  . "<td>".$this -> due_date."</td>"
                  . "<td>".$this -> getPriority()."</td>"
                  . "<td>".$this -> getStatus()."</td>"
                  . "<td>".$this -> description."</td>"
                  . "</tr>");
 }
}
