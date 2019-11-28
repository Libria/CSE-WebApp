/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */

var loser = null;  // whether the user has hit a wall
window.onload = function() {
    // Boundary
    $$(".boundary").map(current => {
        current.observe("mousemove", overBoundary);
    })
    // End
    $('end').observe("mousemove", overEnd);
    // Start
    $('start').observe("mousemove", this.startClick);
    //overbody
    $('maze').observe("mouseleave", this.overBody);
};

// called when mouse enters the walls; 
// signals the end of the game with a loss
function overBoundary(event) {
    if (loser === null) {
        $$(".boundary").map(current => {
            current.style.backgroundColor = "rgb(255, 136, 136)";
        })
        $('status').innerHTML = "You lose! :(";
    }
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
    $$(".boundary").map(current => {
        current.style.backgroundColor = "#eeeeee";
    })
    $('status').innerHTML = "Click the \"S\" to begin."
    loser = null;
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
    var boundary = $$(".boundary")[0].style.backgroundColor;
    if ( boundary === "rgb(238, 238, 238)" ) {
        $('status').innerHTML = "You win! :)";
    }
    loser = 1;
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
    if (loser === null) {
        $$(".boundary").map(current => {
            current.style.backgroundColor = "rgb(255, 136, 136)";
        })
        $('status').innerHTML = "You lose! :(";
    }
}
