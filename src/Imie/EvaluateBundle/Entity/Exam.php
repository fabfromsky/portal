<?php

namespace Imie\EvaluateBundle\Entity;

use Imie\CoreBundle\Entity\Teacher;
use Imie\EvaluateBundle\Entity\Course;
use Imie\EvaluateBundle\Entity\Grade;
use Doctrine\ORM\Mapping as ORM;

/**
 * Exam entity
 * @ORM\Entity
 * @ORM\Table(name="exam")
 * @access public
 */
class Exam
{
    /**
     * id of the exam
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy = "AUTO")
     * @var int
     */
    private $id;

    /**
     * libele of the exam
     * @ORM\Column(type="string")
     * @var String
     */
    private $name;
    
    /**
     * coefficient of the exam
     * it's a multiplicator applicated on the grade
     * @ORM\Column(type="integer")
     * @var unknown
     */
    protected $coef;

    /**
     * maxvalue of the exam (ex: 20, 40...)
     * 
     * @ORM\Column(type="integer")
     * @var int
     */
    protected $maxval;
    
    /**
     * teacher affected to the exam 
     * @ORM\ManyToOne(targetEntity="Imie\CoreBundle\Entity\Teacher")
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     * 
     * @var Imie\CoreBundle\Entity\Teacher
     */
    protected $teacher;
    
    /**
     * the course linked to the exam
     * @ORM\ManyToOne(targetEntity="Imie\EvaluateBundle\Entity\Course", inversedBy="exams")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     */
    protected $course;
    
    /**
     * @ORM\OneToMany(targetEntity="Imie\EvaluateBundle\Entity\Grade", mappedBy="exam")
     */
    protected $grades;
    /**
     *
     * @return \Imie\EvaluateBundle\Entities\int
     */
    public function getId() {
    	return $this->id;
    }
    
    /**
     * 
     */
    public function setId() {
    	$this->id = $id;
    }
    
   	/**
   	 * 
   	 * @return \Imie\EvaluateBundle\Entities\String
   	 */
    public function getName() {
    	return $this->name;
    }
    
    /**
     * 
     */
    public function setName() {
    	$this->name = $name;
    }
    
    /**
     * 
     * @return \Imie\EvaluateBundle\Entities\unknown
     */
    public function getCoef() {
    	return $this->coef;
    }
    
    /**
     * 
     * 
     */
    public function setCoef() {
    	$this->coef = $coef;
    }

    /**
     * Set teacher
     *
     * @param \Imie\CoreBundle\Entity\Teacher $teacher
     * @return Exam
     */
    public function setTeacher(\Imie\CoreBundle\Entity\Teacher $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \Imie\CoreBundle\Entity\Teacher 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
    
    /**
     * 
     * @param \Imie\EvaluateBundle\Entity\Grade $grades
     * @return \Imie\EvaluateBundle\Entity\Exam
     */
    public function setGrades(\Imie\EvaluateBundle\Entity\Grade $grades = null)
    {
    	$this->grades = $grades;
    	
    	return $this;
    }
    
    /**
     * 
     * @return \Imie\EvaluateBundle\Entity\unknown
     */
    public function getGrades()
    {
    	return $this->grades;
    }
    
    /**
     * 
     * @param \Imie\EvaluateBundle\Entity\Course $course
     * @return \Imie\EvaluateBundle\Entity\Exam
     */
    public function setCourse(\Imie\EvaluateBundle\Entity\Course $course = null)
    {
    	$this->course = $course;
    	
    	return $this;
    }
    
    /**
     * 
     * @return \Imie\EvaluateBundle\Entity\unknown
     */
    public function getCourse()
    {
    	return $this->course;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set maxvalue
     *
     * @param integer $maxvalue
     * @return Exam
     */
    public function setMaxval($maxval)
    {
        $this->maxval = $maxval;

        return $this;
    }

    /**
     * Get maxvalue
     *
     * @return integer 
     */
    public function getMaxval()
    {
        return $this->maxval;
    }

    /**
     * Add grades
     *
     * @param \Imie\EvaluateBundle\Entity\Grade $grades
     * @return Exam
     */
    public function addGrade(\Imie\EvaluateBundle\Entity\Grade $grades)
    {
        $this->grades[] = $grades;

        return $this;
    }

    /**
     * Remove grades
     *
     * @param \Imie\EvaluateBundle\Entity\Grade $grades
     */
    public function removeGrade(\Imie\EvaluateBundle\Entity\Grade $grades)
    {
        $this->grades->removeElement($grades);
    }
}
