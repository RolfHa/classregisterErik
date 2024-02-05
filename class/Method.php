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

    /**
     * @param int $id
     * @return Method[]
     */
    public static function getMethodsByLessonId(int $id) : Array
    {
        $methods = []; // für Array mit passendem index zum Namen
        $allMethodsArr = [];
        $dbh = Db::getConnection();
        $sql = "SELECT id, name FROM method";
        $sth = $dbh->prepare();
       // $sth->bindParam('calWeekId', $calWeekId, PDO::PARAM_INT);
        $sth->execute($sql);
        $methods = $sth->fetchAll(PDO::FETCH_CLASS, 'Method');

        return $methods;
    }
}