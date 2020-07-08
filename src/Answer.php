<?php

namespace TemboSocial\Dojo;

class Answer extends DatabaseObject
{
    public string $prompt;

    public function save(Question $question): void
    {
        $stm = $this->conn->prepare('INSERT INTO answer (prompt, question_id) VALUES (?, ?);');
        $stm->bindValue(1, $this->prompt);
        $stm->bindValue(2, $question->id);
        $stm->execute();
    }
}
