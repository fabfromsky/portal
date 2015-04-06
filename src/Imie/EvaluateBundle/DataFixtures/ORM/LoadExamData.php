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

		$em->persist($qcm_java);

		$em->flush();
		
		$this->addReference("qcm-java", $qcm_java);
	}

	public function getOrder() {
		return 2;

		// the order in which fixtures will be loaded


	}
}
