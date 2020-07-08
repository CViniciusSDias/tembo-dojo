<?php

use TemboSocial\Dojo\App\CreateQuestion;
use TemboSocial\Dojo\App\CreateQuestionCommand;
use TemboSocial\Dojo\Infra\InMemoryQuestionRepository;

require_once 'vendor/autoload.php';

$dto = new CreateQuestionCommand();
$dto->prompt = 'Single Question';
$dto->required = false;
$dto->answerPrompts = [
    'Answer One',
    'Answer Two',
    'Answer Three',
    'Answer Four',
    'Answer Five',
    'Answer Six',
];

$repository = new InMemoryQuestionRepository();
$useCase = new CreateQuestion($repository);

try {
    $useCase->execute($dto);
} finally {
    var_dump($repository->allQuestions());
}
