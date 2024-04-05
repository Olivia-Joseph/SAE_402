let player;
let backgroundImg;
let gameOver, gameOverImg;
let playAgain, playAgainImg;
let mySound;

var score;
let lastIncrementTime = 0;
let incrementInterval = 1000;

var timerValue = 60, TimerConsumptionRate = 0.1;

let PLAY = 1;
let END = 0;
let gameState = PLAY;

let lanes = [{lines: [], speed: 1}, {lines: [], speed: 1}]; 
let lineSpacing =34; 
let horizonY = 96; 
let roadWidthTop = 50; 
let roadWidthBottom = 800; 


let enemyData = {
    tronc: {
        img: 'assets/sprites/tronc_sprite.png',
        scale: 0.1,
        speed: 1.51,
        width: 20,
        height: 30,
    },
    tronc2: {
        img: 'assets/sprites/tronc_sprite2.png',
        scale: 0.1,
        speed: 1,
        width: 30,
        height: 15,
    },
};

let stopWatchData = {
    chrono: {
        img: 'assets/sprites/chrono_sprite.png',
        scale: 0.1,
        speed: .9,
        width: 20,
        height: 30,
    }
};

let enemyList = [];

let stopWatchList = [];

function preload() {
    backgroundImg = loadImage('assets/backgrounds/foret_decor.png');
    gameOverImg = loadImage('assets/backgrounds/game_over.png');
    playAgainImg = loadImage('assets/backgrounds/play_again.png');

    soundFormats('mp3');
    mySound = loadSound('assets/sounds/game_music');
}


function setup() {
	new Canvas(1000, 400);

    setInterval(timeIt, 1000);

	player = createPlayer();

    gameOver= new Sprite(canvas.w/2,canvas.h/2)
    gameOver.addImage(gameOverImg);
    gameOver.scale= 1;
  
    playAgain= new Sprite(canvas.w/2,canvas.h/2+130)
    playAgain.addImage(playAgainImg);
    playAgain.scale= 0.5;

    for (let lane of lanes) {
        for (let y = height; y > horizonY; y -= lineSpacing) {
        lane.lines.push(y);
        }
    }

    score = 0;
}


function createPlayer() {
    let player;
    player = new Sprite();
	player.img = 'assets/sprites/car_sprite.png';
    player.scale = 0.3;
	player.width = 90;
	player.height = 70;
    player.x = canvas.w / 2;
	player.y = canvas.h - player.height;
    player.rotationLock = true;
    return player;
}

function createEnemies(type) {
    let enemy;
    enemy = new Sprite();
    enemy.img = enemyData[type].img;
    enemy.scale = enemyData[type].scale;
    enemy.width = enemyData[type].width;
    enemy.height = enemyData[type].height;
    enemy.x = Math.random() * 50 - 25 + canvas.w / 2;
    enemy.y = 100;
    enemy.vel.y = enemyData[type].speed;
    if (enemy.x > canvas.w / 2) {
        enemy.vel.x = ((canvas.w / 2 - enemy.x) / 50) * (Math.random() * 2 - 1);
    }else{
        enemy.vel.x = ((enemy.x - canvas.w / 2) / 50) * (Math.random() * 2 - 1);
    }
    enemy.collider = 'kinetic';
    return enemy;
    
}

function createStopwatch(type) {

    let stopWatch;
    stopWatch = new Sprite();
    stopWatch.img = stopWatchData[type].img;
    stopWatch.scale = stopWatchData[type].scale;
    stopWatch.width = stopWatchData[type].width;
    stopWatch.height = stopWatchData[type].height;
    stopWatch.x = Math.random() * 50 - 25 + canvas.w / 2;
    stopWatch.y = 100;
    stopWatch.vel.y = stopWatchData[type].speed;
    if (stopWatch.x > canvas.w / 2) {
        stopWatch.vel.x = ((canvas.w / 2 - stopWatch.x) / 50) * (Math.random() * 2 - 1);
    }else{
        stopWatch.vel.x = ((stopWatch.x - canvas.w / 2) / 50) * (Math.random() * 2 - 1);
    }
    stop.collider = 'kinetic';
    return stopWatch;
}



function draw() {

    clear()
    background(backgroundImg);

    fill(50); 
    noStroke();
    beginShape();
    vertex(width / 2 - roadWidthTop / 2, horizonY); // Top left
    vertex(width / 2 + roadWidthTop / 2, horizonY); // Top right
    vertex(width / 2 + roadWidthBottom / 2, height); // Bottom right
    vertex(width / 2 - roadWidthBottom / 2, height); // Bottom left
    endShape(CLOSE);

	if (gameState === PLAY) {

        player.y = canvas.h - player.height;

        mySound.play();

        
        let currentTime = millis();

        
        if (currentTime - lastIncrementTime > incrementInterval) {
            score += 1; 
            lastIncrementTime = currentTime; 
        }

        handleEnemy();
        handleStopwatch();


        stroke(255); 
        strokeWeight(2);

        for (let i = 0; i < lanes.length; i++) {

            let lane = lanes[i];

            for (let j = lane.lines.length - 1; j >= 0; j--) {
                let lineY = lane.lines[j];
                let progress = (lineY - horizonY) / ((height - horizonY)*1.5); 
                let laneWidth = lerp(roadWidthTop / lanes.length, roadWidthBottom / lanes.length, progress); 
                let laneCenter = width / 2 + (i - 1) * laneWidth + laneWidth / 2; 
                let lineX = laneCenter;

            

                if (lineX < width / 2) {
                    line(lineX, lineY, lineX - 4, lineY + 10);
                } 
                else {
                    line(lineX, lineY, lineX + 4, lineY + 10);
                }
                
                lane.lines[j] += lane.speed; 

                if (lineY > height) {
                    lane.lines.splice(j, 1);
                
                    lane.lines.unshift(horizonY + 1); 
                }
            }
            
        }
        
        if (player.x < 800) {

            if (keyIsDown(39)) {
                player.x += 3;
            }
        }

        if (player.x > 200) {

            if (keyIsDown(37)) {
                player.x -= 3;
            }
        }

   
            gameOver.visible=false;
            playAgain.visible=false;

            gameOver.collider = 'none';
            playAgain.collider = 'none';
            

            if(frameCount%250===0){
                createRandomEnemy(enemyData);
            }

            if(frameCount%350===0){
                createRandomStopwatch(stopWatchData);
            }

            fill("red");
            textFont("Orbitron")
            textSize(20);
            text("Score: "+ score, 400,50);
            text("Time: "+ timerValue, 500,50);

            if (timerValue == 0) {
                gameState = END;
            }

            

    }  

    if(gameState===END){

        mySound.stop();
        
        player.remove();
        for (let enemy of enemyList) {
            enemy.remove();
        }
        for (let stopWatch of stopWatchList) {
            stopWatch.remove();
        }
        gameOver.visible=true;
        playAgain.visible=true;
        lanes = [{lines: [], speed: 1}, {lines: [], speed: 1}];
        timerValue = 60;
        
        
        if(kb.pressed('space')) {
            reset();
        }
    }
   
}


function reset() {
    gameState=PLAY;
    gameOver.visible=false;
    playAgain.visible=false;
    player.y =  canvas.h - player.height + 10;
    setup();
    enemyList = []; 
    score = 0;
}

function createRandomEnemy(enemyData) {
    let keys = Object.keys(enemyData);
    let key = keys[Math.floor(Math.random() * keys.length)];
    let enemy = createEnemies(key);
    enemyList.push(enemy);
    console.log(enemyList);
    return enemy;
}

function deleteEnemy(enemy) {
    let index = enemyList.indexOf(enemy);
    enemyList.splice(index, 1);
}

function handleEnemy (){
    for (let enemy of enemyList) {
        if (enemy.y > canvas.h) {
            deleteEnemy(enemy);
        }
        enemy.scale = 0.1 * (enemy.y / 100);
        if (player.collides(enemy)) {
        enemy.remove();
        gameState=END;
        }
    }
}

function createRandomStopwatch(stopWatchData) {
    let keys = Object.keys(stopWatchData);
    let key = keys[Math.floor(Math.random() * keys.length)];
    let stopWatch = createStopwatch(key);
    stopWatchList.push(stopWatch);
    console.log(stopWatchList);
    return stopWatch;
}

function deleteStopwatch(stopWatch) {
    let index = stopWatchList.indexOf(stopWatch);
    stopWatchList.splice(index, 1);
}

function handleStopwatch (){
    for (let stopWatch of stopWatchList) {
        if (stopWatch.y > canvas.h) {
            deleteStopwatch(stopWatch);
        }
        stopWatch.scale = 0.1 * (stopWatch.y / 100);
        if (player.collides(stopWatch)) {
        stopWatch.remove();
        timerValue += 10;
        }
    }
}

function timeIt() {
    if (timerValue > 0) {
      timerValue--;
    }
}


