<?php

namespace Imie\EvaluateBundle\Entity;
use Imie\EvaluateBundle\Entity\Exam;
use Doctrine\ORM\Mapping as ORM;
/**
 * Entity Course
 * @ORM\Entity
 * @ORM\Table(name="course")
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Course
{    /**
     * Id of the course
     * @ORM\Id
     * @ORM\Column(type = "integer", nullable = false)
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * libelle of the course
     * @ORM\Column(type="string")
     * @var String
     */
    protected $name;

    /**
     * ORM\OneToMany(TargetEntity="Imie\EvaluateBundle\Entity\Exam", mappedBy="course")
     * @var unknown
     */
    protected $exams;
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
     * @param Imie\EvaluateBundle\Entity\Exam $exams
     * @return \Imie\EvaluateBundle\Entity\Course
     */
    public function setExams(Imie\EvaluateBundle\Entity\Exam $exams = null) {
    	$this->exams = $exams;
    	
    	return $this;
    }
    
    /**
     * 
     * @return \Imie\EvaluateBundle\Entity\unknown
     */
    public function getExams()
    {
    	return $this->exams;
    }

}
