<?php

class Method
{
    private int $id;
    private string $name;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMethodById(int $id): Mtheod
    {
        $dbh = Db::getConnection();
        $sql = "SELECT * FROM method WHERE id=:id";
        $sth = $dbh->prepare($sql);
        $sth->bindParam('Id', $Id, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchObject('Method');
    }

}