<?php
session_start(); //Start session for user

$cURLConnection = curl_init(); //Initialize a new session and return a cURL handle.

curl_setopt($cURLConnection, CURLOPT_URL, 'https://random-word-api.herokuapp.com/word?number=1'); //Pass URL as a parameter. This is the target server website address.

curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, 1); //Return the transfer as a string of the return value of curl_exec() instead of outputting it directly. 

$wordList = curl_exec($cURLConnection); //Execute the predefined CURL session. 

curl_close($cURLConnection); //Close curl resource to free up system resources.

$words = json_decode($wordList); //Convert it to PHP array from JSON format.


if(!isset($_GET['check'])){ //Check if a get variable is set.\
    
    $_SESSION['word'] = strtoupper($words[rand(0,sizeof($words) - 1)]); //Get random word from wordlist
    $_SESSION['turns'] = 7; //Number of turns user gets
    $_SESSION['pressed'] = []; //Keep track of letters already pressed by user

    $game = new \stdClass(); //Create an empty object
    $game->word_length = strlen($_SESSION['word']); //Set word length in the object
    $game->turns = $_SESSION['turns']; //Set turns in the object

    echo json_encode($game); //Jsonify the object and echo it
} else {
    if(!in_array($_GET['check'], $_SESSION['pressed'])){ //Check if key is already not pressed
        $word = $_SESSION['word']; 
        $needle = $_GET['check'];
        $lastPos = 0;
        $positions = array();

        /*
            We find all occurences of $needle in $word
        */

    while (($lastPos = strpos($word, $needle, $lastPos))!== false) {
        $positions[] = $lastPos;
        $lastPos = $lastPos + strlen($needle);
    }

    $found = [];
    foreach ($positions as $value) {
        array_push($found, $value); //$found is an array containing positions of occurences of $needle in $word
    }

    
    if(sizeof($found) == 0){
        $_SESSION['turns'] = $_SESSION['turns'] - 1; //Subtract a turn
    }
    array_push($_SESSION['pressed'], $needle); //Push key into already pressed arrays

    $game = new \stdClass(); //Create new game object
    $game->positions = $found; //Set positions of $needle into game object
    $game->turns = $_SESSION['turns']; //Set remaining turns into game objects

    if($_SESSION['turns'] == 0){
        $game->answer = $_SESSION['word']; //If turns is 0, also set the actual word in game object
    }

    echo json_encode($game); //Jsonify the object and echo it.
    } else{

        /*
            If a check is sent for a letter which is already pressed, return empty game object with remaining turns only.
        */

        $game = new \stdClass();
        $game->positions = [];
        $game->turns = $_SESSION['turns'];
        echo json_encode($game);
    }
}

?>