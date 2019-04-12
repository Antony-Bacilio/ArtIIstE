<?php
namespace User;

class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    private $mail;

    private $mdp;

    private $sexe;

    private $art;

    /**
     * @var \DateTimeInterface
     */
    private $birthday;

    /**
     * @return int
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail()
    {
        return $this->mail;
    }

    public function setEmail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
        return $this;
    }

    public function getSex()
    {
        return $this->sexe;
    }

    public function setSex($sexe)
    {
        $this->sexe = $sexe;
        return $this;
    }

    public function getArt()
    {
        return $this->art;
    }

    public function setArt($art)
    {
        $this->art = $art;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param \DateTimeInterface $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
        return $this;
    }


    /**
     * @return int
     * @throws \OutOfRangeException
     */
    public function getAge(): int
    {
        $now = new \DateTime();

        if ($now < $this->getBirthday()) {
            throw new \OutOfRangeException('Birthday in the future');
        }

        return $now->diff($this->getBirthday())->y;
    }
}

