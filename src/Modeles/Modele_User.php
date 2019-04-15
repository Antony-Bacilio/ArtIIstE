<?php
namespace Modeles;

class User{

    private $BdD;

    private $artiste;

    private $id;

    private $firstname;

    private $lastname;

    private $mail;

    private $mdp;

    private $sexe;

    private $art;

    private $birthday;

    public function  __construct(){

        require_once('Modele_Connexion.php');

        /*$connexion = new Connexion();
        $this->BdD = $connexion;*/
        
        $this->BdD = new \Modeles\Connexion();

        //$this->BdD = new Connexion(); 
    }

    public function getArtistes(){

        try{
            $requete = 'SELECT * FROM user';
            printf("TEST");
            $reponse = $this->BdD->query($requete);
            $ligne = $reponse->fetchAll(\PDO::FETCH_OBJ);
            $this->artiste = $ligne;
            return $this->artiste;
        }
        catch (Exception $excep) {
            die($excep->getMessage());
        }
    }

    public function fetchAll(){
        $lignes = $this->BdD->query('SELECT * FROM "user"')->fetchAll(\PDO::FETCH_OBJ);

        $users = [];
        foreach ($lignes as $row) {
            $user = new User();
            $user
                ->setId($row->id)
                ->setFirstname($row->firstname)
                ->setLastname($row->lastname)
                ->setEmail($row->mail)
                ->setMdp($row->mdp)
                ->setBirthday($row->birthday)
                ->setSex($row->sexe)
                ->setArt($row->art);

            $users[] = $user;
        }
        return $users;
    }

    /**
     * @return Identifiant
     */

    public function getId(){
        return $this->id;
    }

    /**
     * @param Identifiant $id
     * @return User
     */
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(){
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname){
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(){
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname){
        $this->lastname = $lastname;
        return $this;
    }

    public function getEmail(){
        return $this->mail;
    }

    public function setEmail($mail){
        $this->mail = $mail;
        return $this;
    }

    public function getMdp(){
        return $this->mdp;
    }

    public function setMdp($mdp){
        $this->mdp = $mdp;
        return $this;
    }

    public function getSex(){
        return $this->sexe;
    }

    public function setSex($sexe){
        $this->sexe = $sexe;
        return $this;
    }

    public function getArt(){
        return $this->art;
    }

    public function setArt($art){
        $this->art = $art;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getBirthday(){
        return $this->birthday;
    }

    /**
     * @param \DateTimeInterface $birthday
     * @return User
     */
    public function setBirthday($birthday){
        $this->birthday = $birthday;
        return $this;
    }


    /**
     * @return int
     * @throws \OutOfRangeException
     */
    /*public function getAge(): int
    {
        $now = new \DateTime();

        if ($now < $this->getBirthday()) {
            throw new \OutOfRangeException('Birthday in the future');
        }

       return $now->diff($this->getBirthday())->y;
    }*/
}

