<?php

namespace TemboSocial\Dojo\Domain;

interface QuestionRepository
{
    public function add(Question $question);
    public function allQuestions(): array;
}
