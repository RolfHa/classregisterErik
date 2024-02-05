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
        if (isset($id)) {
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

    public function getMethods2Lesson(int $lessonId): array {
        $methodIds = [];
        $dbh = Db::getConnection();
        $sql = "SELECT lessonId FROM method2lesson WHERE lessonId=:lessonId";
        $sth = $dbh->prepare($sql);
        $sth->bindParam('lessonId', $calWeekId, PDO::PARAM_INT);
        $sth->execute();
        $methodIds = $sth->fetchAll(PDO::FETCH_CLASS,'Lesson');
        return $methodIds;
    }
}