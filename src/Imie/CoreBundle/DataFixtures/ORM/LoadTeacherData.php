<?php
/**************************************************************************
 * LoadTeacherData.php, IMIE core
 *
 * Mickael Gaillard Copyright 2015
 * Description :
 * Author(s) : Mickael Gaillard <mickael.gaillard@tactfactory.com>
 * Licence : All right reserved.
 * Last update : Mar 6, 2015
 *
 **************************************************************************/
namespace Imie\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Imie\CoreBundle\Entity\Teacher;
use Sonata\UserBundle\Model\UserInterface;
use Imie\CoreBundle\Entity\User;

class LoadTeacherData extends UserAbstractFicture
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        parent::load($manager);
        $admin = array( User::ROLE_DEFAULT, User::ROLE_API );

        $this->userManager->updateUser(
            $teacher1 = $this->makeTeacher(
                "Mickael",
                "Gaillard",
                "mickael.gaillard@tactfactory.com",
                "toor",
                UserInterface::GENDER_MALE,
                $admin,
                1), true);

        $this->userManager->updateUser(
            $teacher2 = $this->makeTeacher(
                "Yoan",
                "Pintas",
                "yoan.pintas@tactfactory.com",
                "toor",
                UserInterface::GENDER_MALE,
                $admin,
                2), true);

        $this->userManager->updateUser(
            $teacher3 = $this->makeTeacher(
                "Denis",
                "",
                "denis@imie-rennes.com",
                "toor",
                UserInterface::GENDER_MALE,
                $admin,
                3), true);

        $this->userManager->updateUser(
            $teacher4 = $this->makeTeacher(
                "Serge",
                "",
                "serge@imie-rennes.com",
                "toor",
                UserInterface::GENDER_MALE,
                $admin,
                4), true);

        $this->userManager->updateUser(
            $teacher5 =$this->makeTeacher(
                "Celia",
                "",
                "celia@imie-rennes.com",
                "toor",
                UserInterface::GENDER_FEMALE,
                $admin,
                5), true);

        $this->userManager->updateUser(
            $teacher6 = $this->makeTeacher(
                "Sophie",
                "",
                "sophie@imie-rennes.com",
                "toor",
                UserInterface::GENDER_FEMALE,
                $admin,
                6), true);
        
        
        $this->addReference('teacher-1', $teacher1);
        $this->addReference('teacher-2', $teacher2);
        $this->addReference('teacher-3', $teacher3);
        $this->addReference('teacher-4', $teacher4);
        $this->addReference('teacher-5', $teacher5);
        $this->addReference('teacher-6', $teacher6);
    }

    /**
     * {@inheritDoc}
     */
    protected function makeTeacher($firstname, $lastname, $email, $password, $gender, $roles, $refUser)
    {
        $entity = $this->makeUser(new Teacher(), $firstname, $lastname, $email, $password, $gender, $roles, $refUser, "grp-admin");
        return $entity;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 200;
    }
}