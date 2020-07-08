<?php

namespace TemboSocial\Dojo\App;

use TemboSocial\Dojo\Domain\Question;
use TemboSocial\Dojo\Domain\QuestionRepository;

class CreateQuestion
{
    private QuestionRepository $repository;

    public function __construct(QuestionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(CreateQuestionCommand $command)
    {
        $question = new Question($command->prompt, $command->required);

        foreach ($command->answerPrompts as $answerPrompt) {
            $question->addAnswer($answerPrompt);
        }

        $this->repository->add($question);
    }
}
