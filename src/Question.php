<?php

namespace TemboSocial\Dojo;

class Question extends DatabaseObject
{
    public string $prompt;
    public bool $required;
    /** @var Answer[] $answers */
    public array $answers;

    public function save(): void
    {
        $stm = $this->conn->prepare('INSERT INTO question (prompt, required) VALUES (?, ?);');
        $stm->bindValue(1, $this->prompt);
        $stm->bindValue(2, $this->required, \PDO::PARAM_BOOL);

        $stm->execute();

        $this->id = $this->conn->lastInsertId();

        if (count($this->answers) > 5) {
            throw new \DomainException('A question can have 5 answers at most');
        }

        /** @var Answer $answer */
        foreach ($this->answers as $answer) {
            $answer->save($this);
        }
    }
}
