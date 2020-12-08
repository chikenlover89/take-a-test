<?php

namespace App\Controllers;

use App\Repositories\StatusRepository;
use App\Repositories\TestsRepository;
use App\Services\UpdateTest;

class TestsController
{
    public function index()
    {
        $repository = new TestsRepository();;
        $allTestNames = $repository->getAllTestNames();

        return require_once __DIR__ . '/../Views/ChooseTestView.php';
    }

    public function sessionEnd()
    {
        // starpposms lai atgriežoties no neizpildīta testa iznīcina sesiju
        session_destroy();
        header('Location: /');
    }

    public function sessionStart()
    {
        // sagatvo testu ielādējot to no repozitorijas modelī un modeli ieliekot sesijā
        $repository = new TestsRepository();
        $test = $repository->getOneTest($_POST['test']);
        $test->setSubject($_POST['name']);

        $_SESSION['test'] = $test;

        header('Location: /test');
    }

    public function testStart()
    {
        $test = $_SESSION['test'];
        $statusRepository = new StatusRepository();
        $id = $statusRepository->storeOneStatus($test);
        $test->setStatusId($id);
        $_SESSION['test'] = $test;

        return require_once __DIR__ . '/../Views/TakeTestView.php';
    }

    public function testContinue()
    {
        $error = '';
        $test = $_SESSION['test'];

        if ($_POST != null) {
            // Updeito aktuālo testa modeli un pārraksta repozitoriju
            $test = UpdateTest::execute($_SESSION['test'], $_POST);

        } else {
            // Atdod erroru ko izvadīt
            $error = "Lūdzu atzīmē vienu atbildi!";
        }

        // pārbauda vai tests jau galā
        if ($test->getCurrentQuestion() >= $test->getQuestionCount()) {
            $test->setStatus('finished');
            (new StatusRepository())->updateStoredStatus($test);
            header('Location: /result');
        }

        $_SESSION['test'] = $test;
        return require_once __DIR__ . '/../Views/TakeTestView.php';
    }

    public function result()
    {
        $test = $_SESSION['test'];
        session_destroy();
        return require_once __DIR__ . '/../Views/ResultView.php';
    }

}