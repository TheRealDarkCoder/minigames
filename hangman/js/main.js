$(document).ready(function(){

    /*
        On page load, query the backend for setting session and initial data, being length of random word, as well as turns the player gets. All parsed via JSON.
    */

    var gamedata = JSON.parse($.ajax({
        url:  'backend/game.php',
        datatype: 'json',
        async: false
    }).responseText);


for(var i = 0; i < gamedata.word_length; i++){
    $(".display").append("<span id='" + i + "'>_</span>"); //Append X numbers of dashes (_) in the display where X is the length of the word.
}

$("#turns").html(gamedata.turns); //Set turns remaining

})

function pressKey(d){

    /*
        Run this function on click of a keypad letter.
    */

    letter = d.getAttribute("data-letter"); //Get the data-letter value

    /*
        Send the letter via GET parameter ?check= to the backend and get JSON data of position where letter is present and remaining turns.
    */
    var check = JSON.parse($.ajax({
        url:  'backend/game.php?check=' + letter,
        async: false,
        datatype: 'json'
    }).responseText);

        var positions = check.positions; //Positions where the letter was found, empty if not found.
        
        positions.forEach(position => {
            if(positions.length > 0){
                dash = document.getElementById(position);
                dash.innerHTML = letter; 
                //Replace dash with letter where the letter was found.
            }
        });
        document.getElementById("turns").innerHTML = check.turns; //Update turns left
        d.classList.add("pressed"); //Set class "pressed" to the letter

        if(check.turns == 0){            
            //Endgame actions
            $(".keypad").hide(); //Hide the keypad
            $("#info-ul").append("<li>The word was <b>" + check.answer + "<b></li>"); //Show correct answer.
        }
}