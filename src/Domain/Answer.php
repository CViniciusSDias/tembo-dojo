<?php

namespace TemboSocial\Dojo\Domain;

class Answer
{
    private string $prompt;
    private Question $question;

    public function __construct(string $prompt, Question $question)
    {
        $this->prompt = $prompt;
        $this->question = $question;
    }

    public function prompt(): string
    {
        return $this->prompt;
    }

    public function question(): Question
    {
        return $this->question;
    }
}