<?php


namespace CoolTravelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 */
class Admin
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column (type="integer")
     */
    public $Id_Admin;
    /**
     * @ORM\Column (type="string", length=255)
     */
    public $username;
    /**
     * @ORM\Column (type="string", length=255)
     */
    public $password;
    /**
     * @ORM\Column (type="string", length=255)
     */
    public $email;
    /**
     * @ORM\Column (type="integer")
     */
    public $tel;

    /**
     * @return mixed
     */

    public function getIdAdmin()
    {
        return $this->Id_Admin;
    }

    /**
     * @param mixed $Id_Admin
     */
    public function setIdAdmin($Id_Admin)
    {
        $this->Id_Admin = $Id_Admin;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }


}