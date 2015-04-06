<?php

namespace Imie\EvaluateBundle\Entity;

use Imie\CoreBundle\Entity\Student;
use Imie\EvaluateBundle\Entity\Exam;
use Doctrine\ORM\Mapping as ORM;
/**
 * entity grade
 * @ORM\Entity
 * @ORM\Table(name="grade")
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Grade
{

    /**
     * Short description of attribute id
     * @ORM\Id
     * @ORM\GeneratedValue(strategy = "AUTO")
     * @ORM\Column(type = "integer", nullable = false)
     * @var int
     */
    protected $id;

    /**
     * Short description of attribute gradevalue
     * @ORM\Column(type = "decimal")
     * @var decimal
     */
    protected $gradevalue;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Imie\CoreBundle\Entity\Student")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     * @var Imie\CoreBundle\Entity\Student
     */
    protected $student;
    
    /**
     * @ORM\ManyToOne(targetEntity="Imie\EvaluateBundle\Entity\Exam", inversedBy="grades")
     * @ORM\JoinColumn(name="exam_id", referencedColumnName="id")
     * @var unknown
     */
    protected $exam;

    /**
     *
     */
    public function setId($id) {
    	$this->id = $id;
    }
    
    /**
     * 
     * @return \Imie\EvaluateBundle\Entities\int
     */
    public function getId() {
    	return $this->id;
    }

    
    /**
     * Set gradevalue
     *
     * @param \double $gradevalue
     * @return Grade
     */
    public function setGradevalue($gradevalue)
    {
        $this->gradevalue = $gradevalue;

        return $this;
    }

    /**
     *
     * @return \Imie\EvaluateBundle\Entities\decimal
     */
    public function getGradevalue() {
    	return $this->gradevalue;
    }
    
    /**
     * Set student
     *
     * @param \Imie\CoreBundle\Entity\Student $student
     * @return Grade
     */
    public function setStudent(\Imie\CoreBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Imie\CoreBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }
    
    public function setExam(\Imie\EvaluateBundle\Entity $exam = null)
    {
    	$this->exam = $exam;
    	
    	return $this;
    }

    /**
     * Get exam
     *
     * @return \Imie\EvaluateBundle\Entity\Exam 
     */
    public function getExam()
    {
        return $this->exam;
    }
}
