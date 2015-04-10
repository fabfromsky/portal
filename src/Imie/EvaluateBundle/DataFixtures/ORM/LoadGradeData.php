<?php

namespace Imie\EvaluateBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Imie\EvaluateBundle\Entity\Grade;
use Imie\EvaluateBundle\Entity\Imie\EvaluateBundle\Entity;

class LoadGradeData extends AbstractFixture implements OrderedFixtureInterface {
	
	/**
	 * Creates grades
	 * (non-PHPdoc)
	 *
	 * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
	 */
	public function load(ObjectManager $em) {
		$Grade_qcm_java_1 = $this->makeGrade ( $em->merge ( $this->getReference ( 'qcm-java' ) ), 15, $em->merge ( $this->getReference ( 'student-1' ) ) );
		$Grade_qcm_java_2 = $this->makeGrade ( $em->merge ( $this->getReference ( 'qcm-java' ) ), 16, $em->merge ( $this->getReference ( 'student-2' ) ) );
		$Grade_qcm_java_3 = $this->makeGrade ( $em->merge ( $this->getReference ( 'qcm-java' ) ), 18, $em->merge ( $this->getReference ( 'student-3' ) ) );
		$Grade_qcm_java_4 = $this->makeGrade ( $em->merge ( $this->getReference ( 'qcm-java' ) ), 8, $em->merge ( $this->getReference ( 'student-4' ) ) );
		
		$Grade_tp_java_1 = $this->makeGrade ( $em->merge ( $this->getReference ( 'tp-java' ) ), 18, $em->merge ( $this->getReference ( 'student-1' ) ) );
		$Grade_tp_java_2 = $this->makeGrade ( $em->merge ( $this->getReference ( 'tp-java' ) ), 12, $em->merge ( $this->getReference ( 'student-2' ) ) );
		$Grade_tp_java_3 = $this->makeGrade ( $em->merge ( $this->getReference ( 'tp-java' ) ), 14, $em->merge ( $this->getReference ( 'student-3' ) ) );
		$Grade_tp_java_4 = $this->makeGrade ( $em->merge ( $this->getReference ( 'tp-java' ) ), 2, $em->merge ( $this->getReference ( 'student-4' ) ) );
		
		$em->persist ( $Grade_qcm_java_1 );
		$em->persist ( $Grade_qcm_java_2 );
		$em->persist ( $Grade_qcm_java_3 );
		$em->persist ( $Grade_qcm_java_4 );
		
		$em->persist ( $Grade_tp_java_1 );
		$em->persist ( $Grade_tp_java_2 );
		$em->persist ( $Grade_tp_java_3 );
		$em->persist ( $Grade_tp_java_4 );
		
		$em->flush ();
	}
	protected function makeGrade($exam, $gradevalue, $student) {
		$grade = new Grade ();
		$grade->setExam ( $exam );
		$grade->setGradevalue ( $gradevalue );
		$grade->setStudent ( $student );
		
		return $grade;
	}
	public function getOrder() {
		return 1001;
		
		// the order in which fixtures will be loaded
	}
}
