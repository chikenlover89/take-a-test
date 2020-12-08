<?php

namespace App\Repositories;

use App\Models\Test;
use App\Services\Convert;
use Carbon\Carbon;

class StatusRepository
{
    public function storeOneStatus(Test $test)
    {
        //izveido jaunu statusu uzsāktam testam
        //test_results satur jautājumu, ievadīto atbildi un pareizo atbildi
        query()
            ->insert('table_status')
            ->values([
                'subject_name' => ':subjectName',
                'test_name' => ':testName',
                'test_results' => ':testResults',
                'test_status' => ':testStatus',
                'test_final_result' => ':testFinalResult',
                'created_at' => ':createdAt',
                'updated_at' => ':updatedAt'
            ])
            ->setParameters([
                'subjectName' => $test->getSubject(),
                'testName' => $test->getName(),
                'testResults' => json_encode($test->getResults()),
                'testStatus' => $test->getStatus(),
                'testFinalResult' => Convert::toPercent($test->getCorrectAnswerCount(), $test->getQuestionCount()),
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ])
            ->execute();

        // atgriež id ko tālāk ierakstīt Test modelī sesijā, lai zinātu ko turpmāk apdeitot
        $id = query()
            ->select('id')
            ->from('table_status')
            ->execute()
            ->fetchAllAssociative();

        return max($id)['id'];
    }

    public function updateStoredStatus(Test $test): void
    {
        //apdeito statusu uzsāktam testam
        //test_results satur jautājumu, ievadīto atbildi un pareizo atbildi
        query()
            ->update('table_status')
            ->set('subject_name', ':subjectName')
            ->set('test_name', ':testName')
            ->set('test_results', ':testResults')
            ->set('test_status', ':testStatus')
            ->set('test_final_result', ':testFinalResult')
            ->set('updated_at', ':updatedAt')
            ->where('id = :id')
            ->setParameter(':id', $test->getStatusId())
            ->setParameter(':subjectName', $test->getSubject())
            ->setParameter(':testName', $test->getName())
            ->setParameter(':testResults', json_encode($test->getResults()))
            ->setParameter(':testStatus', $test->getStatus())
            ->setParameter(':testFinalResult', Convert::toPercent($test->getCorrectAnswerCount(), $test->getQuestionCount()))
            ->setParameter(':updatedAt', Carbon::now())
            ->execute();
    }
}