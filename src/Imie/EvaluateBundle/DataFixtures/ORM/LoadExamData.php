<?php
namespace Imie\EvaluateBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Imie\EvaluateBundle\Entity\Exam;

class LoadExamData extends AbstractFixture implements OrderedFixtureInterface
{

	/**
	 * Creates exam
	 * (non-PHPdoc)
	 * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
	 */
	public function load(ObjectManager $em) {

		$qcm_java = new Exam();
		$qcm_java->setName("qcm java");
		$qcm_java->setCoef(2);
		$qcm_java->setCourse($em->merge($this->getReference('cours-java')));
		$qcm_java->setMaxval(40);
		$qcm_java->setTeacher($em->merge($this->getReference('teacher-1')));
		
		$tp_java = new Exam();
		$tp_java->setName("tp java");
		$tp_java->setCoef(4);
		$tp_java->setCourse($em->merge($this->getReference('cours-java')));
		$tp_java->setMaxval(20);
		$tp_java->setTeacher($em->merge($this->getReference('teacher-2')));
		
		$tp_php = new Exam();
		$tp_php->setName("tp php");
		$tp_php->setCoef(4);
		$tp_php->setCourse($em->merge($this->getReference('cours-php')));
		$tp_php->setMaxval(20);
		$tp_php->setTeacher($em->merge($this->getReference('teacher-3')));

		$em->persist($tp_java);
		$em->persist($qcm_java);
		$em->persist($tp_php);

		$em->flush();
		
		$this->addReference('tp-java', $tp_java);
		$this->addReference("qcm-java", $qcm_java);
		$this->addReference("tp-php", $tp_php);
	}

	public function getOrder() {
		return 201;

		// the order in which fixtures will be loaded


	}
}
