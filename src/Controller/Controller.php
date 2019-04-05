<?php

namespace App\Controller;

use App\Database\mysqlQuery;
use App\Repository\WinnerRepository;

/**
 * Post controller that will require requested front-office views
 */
class Controller
{

    /**
     * Url : ?p=post.index
     * provide every posts in one page
     *
     * @return void
     */
    public function index()
    {
        $winnerRepository = new WinnerRepository;
        
        
        $winnersNumber = $winnerRepository->getWinnerNumber();
        
        if ($winnersNumber >= 2){
            $this->ContestOver();
        } else {
            $this->questionForm();
        }

        
    }

    public function questionForm()
    {
        $title = "Concours des Zec";
        $header = '';
        $contestConfig = include(__DIR__."/../Config/ContestConfig.php");
        
        $goodAnswers = 0;
        $question = [
            $contestConfig["question1"], 
            $contestConfig["question2"], 
            $contestConfig["question3"], 
            $contestConfig["question4"]
        ];
        
        $inputCheck = [
            1 => "",
            2 => "",
            3 => "",
            4 => ""
        ];
        if ($_POST != []) {

            $rep = [
                "rep1" => $contestConfig["rep1"], 
                "rep2" => $contestConfig["rep2"], 
                "rep3" => $contestConfig["rep3"], 
                "rep4" => $contestConfig["rep4"]
            ];

            $postReps = $_POST;

            for ($i=1; $i < 5; $i++) { 
                if ($postReps['rep'.$i] == $rep['rep'.$i]){
                    $inputCheck[$i] = "bon";
                    $goodAnswers++;
                } else {
                    $inputCheck[$i] = "mauvais";
                }
            }

        }

        if ($goodAnswers == 4){
            
            $this->winnerForm();
        } else {
            require('../src/View/QuestionForm.php');
        }
    }

    public function winnerForm()
    {
        $title = "Concours des Zec";
        $header = '';
        $contestConfig = include(__DIR__."/../Config/ContestConfig.php");
        $password = $contestConfig["password"];

        require('../src/View/WinnerForm.php');
    }

    public function winner()
    {
        $winnerRepository = new WinnerRepository;
        
        $contestConfig = include(__DIR__."/../Config/ContestConfig.php");
        $password = $contestConfig["password"];

        if (isset($_GET["password"])){
            if ($_GET["password"] == $password){
                $winner = [
                    "nom" => $_POST["firstName"],
                    "prenom" => $_POST["lastName"],
                    "email" => $_POST["email"]
                ];

                $validated = $winnerRepository->checkWinnerEmail($_POST["email"]);
                if ($validated){
                    $winnerRepository->submitWinner($winner);
                }

                /*
                $to      = $_POST['email'];
                $subject = 'Sujet';
                $message = 'Message';
                $headers = 'From: webmaster@zec.com' . "\r\n" .
                'Reply-To: webmaster@zec.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);*/

            }
        }

        header("Location: /zec/public/?p=winnerScreen");
        die();
    }

    public function winnerScreen()
    {
        $title = "Concours des Z'ec";
        $header = '';
        require('../src/View/ContestWinner.php');
    }

    public function contestOver()
    {
        $title = "Concours des Zec";
        $header = '';

        require('../src/View/ContestOver.php');
    }
    
}
