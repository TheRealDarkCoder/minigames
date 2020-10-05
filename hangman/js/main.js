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

createLetterButtons();
})

/**
 * Create buttons for each letter
 * 
 * @returns {void}
 */
function createLetterButtons() {
    var lettersContainer = document.querySelector('.keypad');

    // The ASCII code for A to Z is represented by the range 65 - 90
    for (i = 65; i <= 90; i++) {
        var letter = String.fromCharCode(i),
            span = document.createElement('span');

        span.className = 'letter';
        span.innerHTML = letter;
        span.setAttribute('data-letter', letter);
        span.addEventListener('click', pressKey);

        lettersContainer.appendChild(span);
    }
}

function pressKey(){

    /*
        Run this function onclick of a keypad letter.
    */

    letter = this.getAttribute("data-letter"); //Get the data-letter value

    /*
        Send the letter via get parameter ?check= to the backend and get JSON data of position where letter is present and remaining turns.
    */
    var check = JSON.parse($.ajax({
        url:  'backend/game.php?check='+letter,
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
        this.classList.add("pressed"); //Set class "pressed" to the letter

        if(check.turns == 0){            
            //Endgame actions
            $(".keypad").hide(); //Hide the keypad
            $("#info-ul").append("<li>The word was <b>" + check.answer + "<b></li>"); //Show correct answer.
        }
}