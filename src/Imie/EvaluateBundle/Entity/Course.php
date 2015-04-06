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
     * 
     */
    public function setName($name) {
    	$this->name = $name;
    }
    
    /**
     *
     * @return \Imie\EvaluateBundle\Entities\String
     */
    public function getName() {
    	return $this->name;
    }
    
    
/**
     * Add exams
     *
     * @param \Imie\EvaluateBundle\Entity\Exam $exams
     * @return Exam
     */
    public function addExams(\Imie\EvaluateBundle\Entity\Exam $exams)
    {
        $this->exams[] = $exams;

        return $this;
    }

    /**
     * Remove exams
     *
     * @param \Imie\EvaluateBundle\Entity\Exam $exams
     */
    public function removeExams(\Imie\EvaluateBundle\Entity\Exam $exams)
    {
        $this->exams->removeElement($exams);
    }

}
