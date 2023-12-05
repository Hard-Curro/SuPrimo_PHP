<?php
class Employee
{
    public $employee_id;
    public $emp_name;
    public $job_title;
    public $emp_description;
    public $image;

    public function __construct($employee_id, $emp_name, $job_title, $emp_description, $image)
    {
        $this->employee_id = $employee_id;
        $this->emp_name = $emp_name;
        $this->job_title = $job_title;
        $this->emp_description = $emp_description;
        $this->image = $image;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }
}
?>