<?php

namespace App\Services;

use App\Models\Test;
use App\Repositories\StatusRepository;

class UpdateTest
{
    // Updeito aktuālo testa modeli un pārraksta repozitoriju
    public static function execute(Test $test, array $post): Test
    {
        $results = $test->getResults();
        $results[] = [
            'question' => $test->getContent()->question,
            'answer' => $post['answer'],
            'correctAnswer' => $test->getContent()->correctAnswer
        ];
        $test->setResults($results);

        if ($post['answer'] == $test->getContent()->correctAnswer) {
            $test->addToCorrectAnswerCount();
        }

        $test->addCurrentQuestion();

        (new StatusRepository())->updateStoredStatus($test);

        return $test;
    }
}