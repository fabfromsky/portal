<?php
namespace Imie\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker\Factory;
use Doctrine\Common\Persistence\ObjectManager;
use Imie\DeliveryBundle\Entity\TargetDelivery;
use Imie\CoreBundle\Entity\Student;
use Imie\DeliveryBundle\Entity\ProjectDelivery;

class LoadBaseData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * The dependency injection container.
     * @var ContainerInterface
     */
    protected $container;

    protected $faker;

    protected $userManager;

    protected $manager;

    /**
     *
     * @see \Symfony\Component\DependencyInjection\ContainerAwareInterface::setContainer()
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->userManager = $this->container->get('fos_user.user_manager');

        $target = new TargetDelivery();
        $target->setComment('Créer un projet Android avec : ...');
        $target->setDueDate(new \DateTime('21-02-2015 23:59:00'));
        $target->setName('Projet Android');
        $target->setPromotion('CDPN (M1)');
        $target->setTeacher($this->getReference('ref-user-2'));
        $target->setVcsRessourceUrl('http://nothing');
        $target->setVcsRessourceRef('master');
        $this->manager->persist($target);

        // Make Students
        $student01 = $this->makeUser('Jean', 'Martelot', 'jeanmartelot@gmail.com', 'M', 'CDPN (M1)');
        $student02 = $this->makeUser('Quentin', 'Andrieu', 'quentinandrieumail@gmail.com', 'M', 'CDPN (M1)');
        $student03 = $this->makeUser('Luis', 'Alberto Pacheco', 'albertop182@gmail.com', 'M', 'CDPN (M1)');
        $student04 = $this->makeUser('Mickaël', 'Theraud', 'theraud.mickael@hotmail.fr', 'M', 'CDPN (M1)');
        $student05 = $this->makeUser('Christopher', 'Louët', 'christopher.louet@gmail.com', 'M', 'CDPN (M1)');
        $student06 = $this->makeUser('Axel', 'Avignon', 'a.avignon806@laposte.net', 'M', 'CDPN (M1)');
        $student07 = $this->makeUser('Anthony', 'Provini', 'provinianthony@gmail.com', 'M', 'CDPN (M1)');
        $student08 = $this->makeUser('Yoann', 'Bescher-Leblanc', 'y.bescher.leblanc@gmail.com', 'M', 'CDPN (M1)');
        $student09 = $this->makeUser('Clémence', 'Huvé', 'clemence.huve@gmail.com', 'F', 'CDPN (M1)');
        $student10 = $this->makeUser('Maxime', 'Lebastard', 'lebastardmaxime@gmail.com', 'M', 'CDPN (M1)');
        $student11 = $this->makeUser('Romain', 'Toma', 'romain.toma@bbox.fr', 'M', 'CDPN (M1)');
        $student12 = $this->makeUser('Damien', 'Le Pestipon', 'lepestipon.damien@gmail.com', 'M', 'CDPN (M1)');

        // Make Project delivery
        $project1 = $this->makeProject('SYLF', $target, 'https://github.com/JMartelot/SYLF.git', 'bd56e0339df0aa3dd209f3b2c66d0febef226cdf', '', '21-02-2015 18:42:00');
        $project2 = $this->makeProject('MagicBinder', $target, 'https://github.com/luis-alberto/magicBinder.git', '6a090ea5b57da0a43c1b2868f96ad855db737754', '', '20-02-2015 21:56:00');
        $project3 = $this->makeProject('GroupirFree', $target, 'https://bitbucket.org/Mykeur/groupirfree.git', '5a7781da0cdc26110e471a2d16214e2ede2652f5', '', '21-02-2015 16:53:00');
        $project4 = $this->makeProject('Projet Swtorelite2014', $target, 'https://bitbucket.org/Axel_A/projet-swtorelite2014.git', '4d719fafa2de7db7d50004c6ae0a9216cb93f00b', '', '21-02-2015 22:32:00');
        $project5 = $this->makeProject('DrinkNoMore', $target, 'https://github.com/Coyotealone/DrinkNoMore.git', '8b4f43a1c7df2ed5bbc5a9f27db70fd201d175d9', '', '21-02-2015 23:12:00');
        $project6 = $this->makeProject('bob', $target, 'https://github.com/maximelebastard/bob.git', '3c9bd2e7cda1d8c28665eb17a78e764edf3f1e65', '', '21-02-2015 23:34:00');
        $project7 = $this->makeProject('MyDrunkenDiaries', $target, 'https://github.com/SpO2/MyDrunkenDiaries.git', '401b8d6925a07efd4134ad8c6b9f424276b9e41b', '', '21-02-2015 23:22:00');

        // Link Student to project
        $this->linkUser($project1, $student01);
        $this->linkUser($project1, $student02);
        $this->linkUser($project2, $student03);
        $this->linkUser($project3, $student04);
        $this->linkUser($project4, $student05);
        $this->linkUser($project4, $student06);
        $this->linkUser($project5, $student07);
        $this->linkUser($project5, $student08);
        $this->linkUser($project6, $student09);
        $this->linkUser($project6, $student10);
        $this->linkUser($project7, $student11);
        $this->linkUser($project7, $student12);

        $this->manager->flush();
    }

    protected function linkUser(ProjectDelivery $project, Student $student)
    {
        $project->addStudent($student);
        $this->manager->persist($project);
    }

    protected function makeProject($name, $target, $vcsUrl, $vcsRef, $comment, $deliveryDate)
    {
        $project = new ProjectDelivery();
        $project->setName($name);
        $project->setTarget($target);
        $project->setVcsRef($vcsRef);
        $project->setVcsUrl($vcsUrl);
        $project->setComment($comment);
        $project->setDeliveryDate(new \DateTime($deliveryDate));
        $this->manager->persist($project);
        return $project;
    }

    protected function makeUser($firstname, $lastname, $email, $gender, $promo)
    {
        $user = new Student();
        $user->setUsername($email);
        $user->setEnabled(true);
        $user->setPlainPassword('tooruser');
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setRoles(array());
        $user->setEmail($email);
        //         $user->setDateOfBirth($birthday);
        //         $user->setWebsite($website);
        $user->setGender($gender);
        $user->setLocale('fr_FR');
        //         $user->setTimezone($timeZone);
        //         $user->setPhone($phone);
        $user->setPromotion($promo);
        $user->addGroup($this->getReference('grp-student'));
        $this->userManager->updateUser($user, true);

        return $user;
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1000;
    }
}