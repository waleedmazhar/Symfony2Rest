<?php

namespace Nmpolo\RestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;

/**
 * Nmpolo\RestBundle\Entity\Organisation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nmpolo\RestBundle\Entity\OrganisationRepository")
 */
class Organisation
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     */
    private $name;

    /**
     * @var Doctrine\Common\Collections\Collection $users
     *
     * @ORM\OneToMany(targetEntity="User", mappedBy="organisation")
     */
    private $users;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Organisation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add users
     *
     * @param Nmpolo\RestBundle\Entity\User $users
     * @return Organisation
     */
    public function addUser(\Nmpolo\RestBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param Nmpolo\RestBundle\Entity\User $users
     */
    public function removeUser(\Nmpolo\RestBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
