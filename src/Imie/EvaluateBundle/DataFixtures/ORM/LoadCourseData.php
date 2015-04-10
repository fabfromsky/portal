<?php

namespace Imie\EvaluateBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Imie\EvaluateBundle\Entity\Course;

class LoadCourseData extends AbstractFixture implements OrderedFixtureInterface {
	
	/**
	 * Creates courses
	 * (non-PHPdoc)
	 * 
	 * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
	 */
	public function load(ObjectManager $em) {
		$course_java = new Course ();
		$course_java->setName ( 'Java' );
		
		$course_php = new Course ();
		$course_php->setName ( 'Php' );
		
		$course_tests = new Course ();
		$course_tests->setName ( 'Tests unitaires' );
		
		$course_force = new Course ();
		$course_force->setName ( 'Force' );
		
		$em->persist ( $course_java );
		$em->persist ( $course_php );
		$em->persist ( $course_tests );
		$em->persist ( $course_force );
		
		$em->flush ();
		
		$this->addReference ( 'cours-java', $course_java );
		$this->addReference ( 'cours-php', $course_php );
		$this->addReference ( 'cours-tests', $course_tests );
		$this->addReference ( 'cours-force', $course_force );
	}
	public function getOrder() {
		return 1;
		
		// the order in which fixtures will be loaded
	}
}
