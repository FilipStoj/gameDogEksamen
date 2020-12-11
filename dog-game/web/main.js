// Henter spillet fra index og displayer context
let canvas = document.querySelector("#canvas"); 
let ctx = canvas.getContext('2d'); 



// Billede variabler til spillet 

let dog = new Image(); 
dog.src= 'images/dog.png'; 

let road = new Image(); 
road.src= 'images/road.jpg'

let wall = new Image(); 
wall.src= 'images/vej.png'

let bone = new Image(); 
bone.src= 'images/bone.png'

let goal = new Image(); 
goal.src = 'images/nextlevel.png'

let goalmaze2 = new Image(); 
goalmaze2.src = 'images/nextlevel.png'

let enemie = new Image(); 
enemie.src = 'images/enemie.png'

let enemieRight = new Image(); 
enemieRight.src = 'images/enemieRight.png';

let finalgoal = new Image(); 
finalgoal.src = 'images/goal.png';





// Maze pattern som er tegnet/drawet ud fra tiles 

// Level 1 første leve
let maze = 

[
    [6,1,1,1,1,1,1,1,1,1,1,1,1,3],
    [0,1,0,0,0,0,0,0,0,0,1,1,5,0],
    [0,1,0,1,1,1,0,0,1,0,0,0,0,0],
    [0,1,0,0,1,0,0,1,1,1,0,4,5,0],
    [0,1,1,1,1,1,1,1,0,0,0,1,1,1],
    [0,1,0,1,0,0,0,1,5,1,0,0,0,1],
    [0,1,6,1,1,1,0,1,0,0,0,0,0,1],
    [4,1,0,1,0,1,0,1,1,1,1,1,1,1],
    [0,0,0,0,0,1,0,0,1,0,0,0,0,0],
    [0,1,1,1,1,1,0,0,1,0,0,0,0,0],
    [0,1,0,0,0,1,0,0,1,0,0,0,0,0],
    [0,1,0,0,0,1,0,0,1,0,0,0,0,0],
    [0,4,0,0,0,1,0,0,1,0,0,0,0,0],
    [0,0,0,0,0,0,0,6,1,1,1,1,1,2],
]

// Level 2 anden sidste level 
let maze2 = 

[
    [0,1,1,1,1,1,1,1,1,1,1,1,1,8],
    [0,1,0,0,0,0,0,0,0,0,1,1,1,5],
    [0,1,0,6,4,5,0,0,1,0,0,0,0,0],
    [0,1,0,0,1,0,0,0,1,1,0,4,0,0],
    [0,1,1,1,1,5,1,0,0,0,6,1,1,1],
    [0,0,1,1,0,0,0,0,1,1,0,0,0,1],
    [0,0,0,1,1,5,0,0,0,0,0,0,0,1],
    [0,0,0,1,0,1,0,4,1,1,1,1,1,1],
    [0,0,0,1,0,1,0,1,0,0,0,0,0,1],
    [0,1,1,1,1,1,0,1,1,5,0,0,6,1],
    [0,1,0,1,0,1,0,1,0,0,0,0,0,1],
    [0,1,5,1,0,1,1,1,1,1,1,0,0,1],
    [0,4,0,4,0,0,0,0,0,0,1,0,0,1],
    [0,0,0,0,0,0,0,0,0,0,1,1,1,2],
]

// Level 3 sidste level 
let maze3 = 

[
    [0,0,0,0,0,0,0,0,0,0,0,0,1,7],
    [0,4,1,1,1,1,1,1,1,1,1,1,1,5],
    [0,1,5,1,1,6,1,0,0,0,0,0,1,0],
    [6,1,0,0,0,0,4,0,4,1,5,0,0,0],
    [0,1,0,4,1,5,0,0,0,1,1,0,0,0],
    [0,1,0,0,1,0,1,1,4,0,1,1,1,0],
    [0,1,5,0,1,6,1,0,0,0,0,0,1,0],
    [0,1,1,1,1,1,1,1,1,1,1,0,1,0],
    [0,1,0,0,0,0,0,0,0,0,4,6,1,0],
    [0,1,0,0,0,4,1,5,0,0,1,0,1,0],
    [0,1,5,0,0,0,1,0,4,0,1,0,1,0],
    [0,1,0,0,0,0,1,0,1,0,1,0,1,0],
    [0,4,1,1,1,1,1,1,1,1,1,1,1,1],
    [0,0,0,0,0,0,0,0,0,0,0,0,1,2],
]
// Størrelse på tiles & player position 

let tileSize = 50; 
let playerPosition = {x:9, y:9};


// De forskellige tiles 

let walls = 0; 
let roads = 1;
let dogpimp = 2;
let goals = 3;
let bones = 4; 
let enemies = 5; 
let enemiesR = 6; 
let finalgoals = 7; 
let goalmaze2s = 8; 

// Maze Drawing med if & else sætninger 

function drawMaze(){

    for(let y= 0; y < maze.length; y++){

      for(let x = 0; x < maze[y].length; x++){

        if(maze[y][x] === walls){
            ctx.drawImage(wall,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === roads){
            ctx.drawImage(road,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === dogpimp){
            playerPosition.x = x; 
            playerPosition.y = y; 
            ctx.drawImage(dog,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === goals){
            ctx.drawImage(goal,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === bones){
            ctx.drawImage(bone,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === enemies){
            ctx.drawImage(enemie,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === enemiesR){
        ctx.drawImage(enemieRight,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === finalgoals){
            ctx.drawImage(finalgoal,x*tileSize,y*tileSize,tileSize,tileSize);
        }else if(maze[y][x] === goalmaze2s){
        ctx.drawImage(goal,x*tileSize,y*tileSize,tileSize,tileSize);
    }
   }
  }
}

// STYLE.DISPLAY = "NONE" gør at i dette tilfælde resultater ikke vises 
resultater.style.display ="none";


// Gør at canvas/spillet ikke vises når man kommer ind på siden før man starter 
canvas.style.display="none"; 

// Timer, altså hvor lang tid man har til at gennemføre spillet 
let seconds = 50;
document.querySelector('#time-showing').innerText = seconds;
let time;

let spilnavn = document.querySelector('#spilnavn');


// Starter spillet når man trykker på startgame 
startgame.addEventListener('click', playgame);
function playgame(){

    // Viser spillet når man trykker på knappen 
    canvas.style.display = "block";
    resultater.style.display = "block";

    // Fjerner knappen når spillet starter 
    startgame.style.display ="none";
    

    // Starter timeren med en function som siger at min innerText skal gå 1 ned hver sekund
    time = setInterval(function () {
        seconds -= 1;
        document.querySelector('#time-showing').innerText = seconds;
        
        // Når tiden er udløbet så kommer gameover functionen frem 
        if(seconds == 0){
            gameover();
        };
    
    }, 1000);
};



// Game over teksten som kommer efter man har tabt
function gameover(){
    canvas.style.display = "none";
    rulesGame.style.display = "none";
    spilnavn.innerHTML="Game Over";

    //gameover teksten vises ikke 
    let gameover = document.querySelector('#gameover');


    clearInterval(time);   
    
    setTimeout(function(){
        location.href = "index.php";
    }, 2000);
};


// Dette er en function så vores player kan miste liv hvis han går ind i bjørnen. 
// Han har 3 liv og mister 1 liv hver gang han går ind i en bjørn. 
let liv = 3; 
let damage = 1; 
let livText = document.querySelector('#liv'); 
livText.innerHTML = liv; 

function playerLife() {
    liv -= damage;
    livText.innerHTML = liv;

    if(liv == 0){
        gameover();
    };
};

// En function til når man vinder spillet, samt en vindertext som displayer når man vinder 
function wintext(){

    canvas.style.display = "none";
    rulesGame.style.display = "none";

    vindertext.innerHTML="Congratulations you won the game";
    let wintext = document.querySelector('#vindertext');

    clearInterval(time);

    setTimeout(function(){
        location.href = "index.php";
    }, 6000);

}

// En function til når man taber samt en tabertext 
function lostext(){
    
    canvas.style.display = "none"; 
    rulesGame.style.display = "none";
    resultater.style.display = "none";

    tabertext.innerHTML="Remember all the bones";
    let lostext = document.querySelector('#tabertext'); 


    clearInterval(time);

    // SetTimeout functionen gør at når man taber i dette tilfælde går der 2 sekunder og så relorder siden så man kan starte forfra 
    setTimeout(function(){
        location.href = "index.php";
    }, 2000);
    
}

// En function lyd til når man picker bones op 
function pickup(){
    let gameSound = new Audio('gamesounds/pickup.wav');
    gameSound.play(); 
}

// En function lyd til når man vinder samt level up 
function sejr(){
    let gameSound = new Audio('gamesounds/sejr.wav')
    gameSound.play();
}

// Lyd function når man går 
function walk(){
    let gameSound = new Audio('gamesounds/walk.wav');
    gameSound.play();
}

// Lyd function til når man går ind i en enemie 

function bear(){
    let gameSound = new Audio('gamesounds/bear.wav');
    gameSound.play();
}

// Level up function fra level 1 til level 2 til level 3, samt at man mindst skal have 3 bones i hver level får at kunne level op 
function levelTwo() {
    if (score ==3)
    maze = maze2;
    if (score >=6)
    maze = maze3
    sejr(); 
}


// Denne winner function gør at man mindst skal have 14 bones for at gå ind i hundehuset som er målet 
function winner() {
    if (score >= 14)
    wintext(); 
}


// Gør at man kan collect kødben samt gå ind i hundehuset, nextlevel og enemie tile 
function dogwalk(targetTile) {
    if (targetTile === bones || targetTile === roads || targetTile === goals || targetTile === enemiesR || targetTile === enemies || targetTile === finalgoals || targetTile === goalmaze2s) {
        return true;
    } else {
        return false;
    }
}


// Defination af scoren, som er = 0 
let score = 0; 

window.addEventListener('keydown', (e) => {
    let targetTile;
    switch (e.keyCode) {
        case 37: //left
            targetTile = maze[playerPosition.y][playerPosition.x - 1];
            if (dogwalk(targetTile)) {
                maze[playerPosition.y][playerPosition.x - 1] = dogpimp; //players nye position
                maze[playerPosition.y][playerPosition.x] = roads;
                drawMaze();
                walk();
                if (targetTile === bones) {
                    score++;
                    pickup();
                    document.getElementById("boxscore").innerHTML = "Bones: " + score;
                }
                else if (targetTile === enemiesR || targetTile === enemies){
                    playerLife(); 
                    bear();
                    document.getElementById("liv").innerHTML = "" + liv; 
                }
            }
            break;
        case 39: //Right
            targetTile = maze[playerPosition.y][playerPosition.x + 1];
            if (dogwalk(targetTile)) {
                maze[playerPosition.y][playerPosition.x + 1] = dogpimp; //players nye position
                maze[playerPosition.y][playerPosition.x] = roads;
                if (targetTile === bones) {
                    score++;
                    pickup();
                    document.getElementById("boxscore").innerHTML = "Bones: " + score;
                }
                    if (targetTile === goals || targetTile === goalmaze2s) {
                        levelTwo();
                    
                    if (targetTile === goals && score <3){
                        lostext();
                    } 
                    if (targetTile === goalmaze2s && score <6){
                        lostext();
                    }
                    if (targetTile === finalgoals && score <14){
                        lostext();
                    } 
                }
                else if (targetTile === enemiesR || targetTile === enemies){
                    playerLife(); 
                    bear(); 
                    document.getElementById("liv").innerHTML = "" + liv; 
                }
                else if (targetTile === finalgoals) {
                    winner();
                    sejr(); 
                }
                drawMaze();
                walk();
                
            }
            break;
        case 38: //Up
            targetTile = maze[playerPosition.y - 1][playerPosition.x];
            if (dogwalk(targetTile)) {
                maze[playerPosition.y - 1][playerPosition.x] = dogpimp; //players nye position
                maze[playerPosition.y][playerPosition.x] = roads;
                drawMaze();
                walk();
                if (targetTile === bones) {
                    score++;
                    pickup();
                    document.getElementById("boxscore").innerHTML = "Bones: " + score;
                }
                else if (targetTile === enemiesR || targetTile === enemies){
                    playerLife(); 
                    bear();
                    document.getElementById("liv").innerHTML = "" + liv; 
                }
            }
            break;
        case 40: //down
            targetTile = maze[playerPosition.y + 1][playerPosition.x];
            if (dogwalk(targetTile)) {
                maze[playerPosition.y + 1][playerPosition.x] = dogpimp; //players nye position
                maze[playerPosition.y][playerPosition.x] = roads;
                drawMaze();
                walk();
                if (targetTile === bones) {
                    score++;
                    pickup();
                    document.getElementById("boxscore").innerHTML = "Bones: " + score;
                }
                else if (targetTile === enemiesR || targetTile === enemies){
                    playerLife(); 
                    bear(); 
                    document.getElementById("liv").innerHTML = "" + liv; 
                }
            }
            break;
    }
    console.log(score);
})

// Denne EventListener gør at skærmen/spillet ikke bevæger sig op og ned når man trykker på piltasterne 
window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if([32, 37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);

window.addEventListener("load", drawMaze);
