<?php

class Method2Lesson
{
    private int $id;
    private int $lessonId;
    private int $methodId;

    /**
     * @param int $id
     * @param int $lessonId
     * @param int $methodId
     */
    public function __construct(int $id = null, int $lessonId = null, int $methodId = null)
    {
        if ($id === null) {

        } else {
            $this->id = $id;
            $this->lessonId = $lessonId;
            $this->methodId = $methodId;
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLessonId(): int
    {
        return $this->lessonId;
    }

    public function getMethodId(): int
    {
        return $this->methodId;
    }


    /**
     * @param int $lessonId
     * @return Method2Losson[]
     */
    public function getMethod2LessonsByLessonId(int $lessonId): array
    {
        $lessonIds = [];
        $dbh = Db::getConnection();
        $sql = "SELECT * FROM method2lesson WHERE lessonId=:lessonId";
        $sth = $dbh->prepare($sql);
        $sth->bindParam('lessonId', $lessonId, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, 'Method2Lesson');
    }

    /**
     * @param int $lessonId
     * @param Methods[] $methods
     * @return void
     */
    public function createMethod2Lessons(int $lessonId, array $methods)
    {
        $dbh = Db::getConnection();
        $sql = "INSERT INTO method2lesson VALUES (NULL, :lessonId, :methodId)";
        $sth = $dbh->prepare($sql);
        $sth->bindParam('lessonId', $lessonId, PDO::PARAM_INT);
        foreach ($methods as $method) {
            $sth->bindParam('methodId', $methods->getId(), PDO::PARAM_INT);
            $sth->execute();
        }
    }
}