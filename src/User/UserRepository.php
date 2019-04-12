<?php
namespace User;
class UserRepository
{
    /**
     * @var \PDO
     */
    private $connection;

    /**
     * UserRepository constructor.
     * @param \PDO $connection
     */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function fetchAll()
    {
        $rows = $this->connection->query('SELECT * FROM "user"')->fetchAll(\PDO::FETCH_OBJ);

        $users = [];
        foreach ($rows as $row) {
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
}
