<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Misd\PhoneNumberBundle\Validator\Constraints\PhoneNumber as AssertPhoneNumber;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @var string
     * @ORM\Column(type="string",name="name")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 30,
     *      minMessage = "Minimalna liczba znaków to {{ limit }}",
     *      maxMessage = "Maksymalna liczba znaków to {{ limit }}"
     * )
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(type="string",name="surname")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 30,
     *      minMessage = "Minimalna liczba znaków to {{ limit }}",
     *      maxMessage = "Maksymalna liczba znaków to {{ limit }}"
     * )
     */
    private $surname;

    /**
     * @ORM\Column(type="phone_number")
     * @AssertPhoneNumber(defaultRegion="PL")
     */
    private $phonenumber;

    /**
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set phonenumber
     *
     * @param phone_number $phonenumber
     * @return User
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return phone_number 
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }
}
