<?php

namespace App\Repositories;

use App\Models\Test;

class TestsRepository
{
    // atgriež visu testu nosaukumu priekš saraksta
    public function getAllTestNames(): array
    {
        $allTests = query()
            ->select('name')
            ->from('table_tests')
            ->execute()
            ->fetchAllAssociative();

        return $allTests;
    }

    // saglabā vienu testu, saturs tiek pārveidots uz json
    public function storeOneTest(string $name, array $test): void
    {
        query()
            ->insert('table_tests')
            ->values([
                'name' => ':name',
                'content' => ':content',
            ])
            ->setParameters([
                'name' => $name,
                'content' => json_encode($test),
            ])
            ->execute();
    }

    // atgriež testu jau ierakstītu modelī
    public function getOneTest(string $name): Test
    {
        $test = query()
            ->select('*')
            ->from('table_tests')
            ->where('name = :name')
            ->setParameter(':name', $name)
            ->execute()
            ->fetchAssociative();

        return (new Test($test['id'], $test['name'], json_decode($test['content']), count(json_decode($test['content']))));
    }

}