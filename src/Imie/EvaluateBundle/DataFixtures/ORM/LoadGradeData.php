<?php
namespace Imie\EvaluateBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Imie\EvaluateBundle\Entity\Grade;
use Imie\EvaluateBundle\Entity\Imie\EvaluateBundle\Entity;

class LoadGradeData extends AbstractFixture implements OrderedFixtureInterface
{
  
  /**
   * Creates grades
   * (non-PHPdoc)
   * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
   */
  public function load(ObjectManager $em) {
    
    $Grade_qcm_java_1 = new Grade();
    $Grade_qcm_java_1->setExam($em->merge($this->getReference('qcm-java')));
    $Grade_qcm_java_1->setGradevalue(15);
    $Grade_qcm_java_1->setStudent($em->merge($this->getReference('student-1')));
    
    $Grade_qcm_java_2 = new Grade();
    $Grade_qcm_java_2->setExam($em->merge($this->getReference('qcm-java')));
    $Grade_qcm_java_2->setGradevalue(16);
    $Grade_qcm_java_2->setStudent($em->merge($this->getReference('student-2')));
    
    $Grade_qcm_java_3 = new Grade();
    $Grade_qcm_java_3->setExam($em->merge($this->getReference('qcm-java')));
    $Grade_qcm_java_3->setGradevalue(18);
    $Grade_qcm_java_3->setStudent($em->merge($this->getReference('student-3')));
    
    $Grade_qcm_java_4 = new Grade();
    $Grade_qcm_java_4->setExam($em->merge($this->getReference('qcm-java')));
    $Grade_qcm_java_4->setGradevalue(8);
    $Grade_qcm_java_4->setStudent($em->merge($this->getReference('student-4')));
    
    $Grade_tp_java_1 = new Grade();
    $Grade_tp_java_1->setExam($em->merge($this->getReference('tp-java')));
    $Grade_tp_java_1->setGradevalue(18);
    $Grade_tp_java_1->setStudent($em->merge($this->getReference('student-1')));
    
    $Grade_tp_java_2 = new Grade();
    $Grade_tp_java_2->setExam($em->merge($this->getReference('tp-java')));
    $Grade_tp_java_2->setGradevalue(12);
    $Grade_tp_java_2->setStudent($em->merge($this->getReference('student-2')));
    
    $Grade_tp_java_3 = new Grade();
    $Grade_tp_java_3->setExam($em->merge($this->getReference('tp-java')));
    $Grade_tp_java_3->setGradevalue(14);
    $Grade_tp_java_3->setStudent($em->merge($this->getReference('student-3')));
    
    $Grade_tp_java_4 = new Grade();
    $Grade_tp_java_4->setExam($em->merge($this->getReference('tp-java')));
    $Grade_tp_java_4->setGradevalue(2);
    $Grade_tp_java_4->setStudent($em->merge($this->getReference('student-4')));
    
    
    $em->persist($Grade_qcm_java_1);
    $em->persist($Grade_qcm_java_2);
    $em->persist($Grade_qcm_java_3);
    $em->persist($Grade_qcm_java_4);

    $em->persist($Grade_tp_java_1);
    $em->persist($Grade_tp_java_2);
    $em->persist($Grade_tp_java_3);
    $em->persist($Grade_tp_java_4);
    
    $em->flush();
  }
  
  public function getOrder() {
    return 1001;
    
    // the order in which fixtures will be loaded
    
    
  }
}
