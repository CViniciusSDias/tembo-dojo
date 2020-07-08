<?php

namespace TemboSocial\Dojo\Infra;

use TemboSocial\Dojo\Domain\Question;
use TemboSocial\Dojo\Domain\QuestionRepository;

class InMemoryQuestionRepository implements QuestionRepository
{
    private array $questionList = [];

    public function add(Question $question)
    {
        $this->questionList[] = $question;
    }

    public function allQuestions(): array
    {
        return $this->questionList;
    }
}