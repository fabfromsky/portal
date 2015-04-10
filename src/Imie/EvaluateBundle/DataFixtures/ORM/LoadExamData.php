<?php

namespace Imie\EvaluateBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Imie\EvaluateBundle\Entity\Exam;

class LoadExamData extends AbstractFixture implements OrderedFixtureInterface {
	
	/**
	 * Creates exam
	 * (non-PHPdoc)
	 *
	 * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
	 */
	public function load(ObjectManager $em) {
		$qcm_java = $this->makeExam ( "qcm java", 2, $em->merge ( $this->getReference ( 'cours-java' ) ), 30, $em->merge ( $this->getReference ( 'teacher-1' ) ) );
		
		$tp_java = $this->makeExam ( "tp java", 4, $em->merge ( $this->getReference ( 'cours-java' ) ), 20, $em->merge ( $this->getReference ( 'teacher-2' ) ) );
		
		$tp_php = $this->makeExam ( "tp php", 4, $em->merge ( $this->getReference ( 'cours-php' ) ), 20, $em->merge ( $this->getReference ( 'teacher-3' ) ) );
		
		$em->persist ( $tp_java );
		$em->persist ( $qcm_java );
		$em->persist ( $tp_php );
		
		$em->flush ();
		
		$this->addReference ( 'tp-java', $tp_java );
		$this->addReference ( "qcm-java", $qcm_java );
		$this->addReference ( "tp-php", $tp_php );
	}
	protected function makeExam($name, $coef, $course, $maxval, $teacher) {
		$exam = new Exam ();
		$exam->setName ( $name );
		$exam->setCourse ( $course );
		$exam->setCoef ( $coef );
		$exam->setMaxval ( $maxval );
		$exam->setTeacher ( $teacher );
		
		return $exam;
	}
	public function getOrder() {
		return 201;
		
		// the order in which fixtures will be loaded
	}
}
