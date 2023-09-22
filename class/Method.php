<?php

class Method
{
    private int $id;
    private string $name;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id = null, string $name = null)
    {
        if ($id === null) {

        } else {
            $this->id = $id;
            $this->name = $name;
        }
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
        $sth->bindParam('id', $Id, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchObject('Method');
    }

    /**
     * @param int $lessonId
     * @return Methods[]
     */
    public function getMethodsBylessionId(int $lessonId): array
    {
        $lessonDatas = (new Method2Lesson())->getMethod2LessonsByLessonId($lessonId);
        return $lessonDatas;
    }



    public function getMethodsByLessonId(int $lessonId): array
    {

    }

}