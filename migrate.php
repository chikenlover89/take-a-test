<?php

use App\Models\Section;
use App\Repositories\SectionsRepository;
use App\Repositories\TestsRepository;
use App\Repositories\UserRepository;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Schema\Table;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function database(): Connection
{
    $connectionParams = [
        'dbname' => $_ENV['DB_DATABASE'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
        'host' => $_ENV['DB_HOST'],
        'driver' => 'pdo_mysql',
    ];

    $connection = DriverManager::getConnection($connectionParams);
    $connection->connect();

    return $connection;
}

function query(): QueryBuilder
{
    return database()->createQueryBuilder();
}

$schema = database()->getSchemaManager();

if (!$schema->tablesExist('table_status')) {
    $table = new Table('table_status');
    $table->addColumn('id', 'integer', array('autoincrement' => true));
    $table->setPrimaryKey(array('id'));
    $table->addColumn('subject_name', 'string');
    $table->addColumn('test_name', 'string');
    $table->addColumn('test_results', 'text');
    $table->addColumn('test_status', 'string');
    $table->addColumn('test_final_result', 'string');
    $table->addColumn('created_at', 'string');
    $table->addColumn('updated_at', 'string');
    $schema->createTable($table);

    echo "table_status table created\n";

} else {
    echo "table_status table exists\n";
}

if (!$schema->tablesExist('table_tests')) {
    $table = new Table('table_tests');
    $table->addColumn('id', 'integer', array('autoincrement' => true));
    $table->setPrimaryKey(array('id'));
    $table->addColumn('name', 'string');
    $table->addColumn('content', 'text');
    $schema->createTable($table);

    echo "table_tests table created\n";

} else {
    echo "table_tests table exists\n";
}

$repository = new TestsRepository();
$repository->storeOneTest(
    'Tests A',
    [
        [
            'question' => 'Kā sauc Latvijas galvaspilsētu?',
            'answers' => ['Valmiera', 'Cēsis', 'Ogre', 'Rīga'],
            'correctAnswer' => 'Rīga'
        ],
        [
            'question' => 'Kā sauc Rīgas galvaspilsētu?',
            'answers' => ['Valmiera', 'Cēsis', 'Rīga', 'Nepareizs jautājums'],
            'correctAnswer' => 'Nepareizs jautājums'
        ],
        [
            'question' => 'Uz kuru pusi kaķim ir spalvas?',
            'answers' => ['Uz āru', 'Uz aizmuguri'],
            'correctAnswer' => 'Uz āru'
        ]
    ]
);

$repository->storeOneTest(
    'Tests B',
    [
        [
            'question' => 'Jautājums 1?',
            'answers' => ['Atbilde 1', 'Atbilde 2', 'Atbilde 3'],
            'correctAnswer' => 'Atbilde 1'
        ],
        [
            'question' => 'Jautājums 2?',
            'answers' => ['Atbilde 1'],
            'correctAnswer' => 'Atbilde 1'
        ],
        [
            'question' => 'Jautājums 3?',
            'answers' => ['Atbilde 1', 'Atbilde 2', 'Atbilde 3', 'Atbilde 4', 'Atbilde 5'],
            'correctAnswer' => 'Atbilde 5'
        ],
        [
            'question' => 'Jautājums 4?',
            'answers' => ['Atbilde 1', 'Atbilde 2', 'Atbilde 3', 'Atbilde 4'],
            'correctAnswer' => 'Atbilde 1'
        ]
    ]
);


echo "All done!\n";