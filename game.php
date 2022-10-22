<?php
require 'function.php';
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/game.css">
    <!-- <script src="game.js"></script> -->
</head>
<body>
    <div class="container" id="loby">
        <div class="nama-game">
            <h1>Box Game</h1>
        </div>

        <div class="card1">
            <p class="judul" id="id-p">PLAYER : <?php echo $user["name"]; ?>#<?php echo $user ["id"]?></p>
            <div class="warna"><p class="t-warna">pilih warna</p><input id="color" type="color"></div>
            <div class="btn"><button class="out" ><a href="logout.php">Logout</a></button><button onclick="mulai()" class="mulai">Start</button></div>
        </div>
    </div>
  
    <div id="game" style="display: none;">
        <p class="judul-game" id="id-p">player : <?php echo $user["name"]; ?>#<?php echo $user ["id"]?></p>
        <div id="area"></div>
        <div class="btn-game"  id="btn-g" style="display: none;">
        <button onclick="ulang()" class="ulang">ulang</button> <button onclick="kembali()" class="kembali">kembali</button>
        </div>
        </div>

        <footer>
            <h1>ARROTTTT</h1>
        </footer>
    <script>
      
var myGamePiece;
var myObstacles = [];
var myScore;

function mulai() {

    document.getElementById("loby").style.display="none"
    document.getElementById("game").style.display="block"

    var a = document.getElementById("color").value;
    myGamePiece = new component(30, 30, a, 10, 120);
    myScore = new component("30px", "Consolas", "black", 705, 40, "text");
    myGameArea.start();
    myObstacles = [];
}

var myGameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width = 1000;
        this.canvas.height = 550;
        this.context = this.canvas.getContext("2d");
        document.getElementById("area").insertBefore(this.canvas, document.getElementById("area").childNodes[0]);
        this.frameNo = 0;
        this.interval = setInterval(updateGameArea, 40);
        window.addEventListener("keydown", function(c){
            myGameArea.key = c.keyCode;
        })

        window.addEventListener("keyup", function(){
            myGameArea.key = false;
        })
        },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop : function() {
        clearInterval(this.interval);
    }
    
}

function component(width, height, color, x, y, type) {
    this.type = type;
    this.width = width;
    this.height = height;
    this.speedX = 0;
    this.speedY = 0;    
    this.x = x;
    this.y = y;    
    this.update = function() {
        ctx = myGameArea.context;
        if (this.type == "text") {
            ctx.font = this.width + " " + this.height;
            ctx.fillStyle = color;
            ctx.fillText(this.text, this.x, this.y);
        } else {
            ctx.fillStyle = color;
            ctx.fillRect(this.x, this.y, this.width, this.height);
        }
    }
    this.newPos = function() {
        this.x += this.speedX;
        this.y += this.speedY;        
    }
    this.crashWith = function(otherobj) {
        var myleft = this.x;
        var myright = this.x + (this.width);
        var mytop = this.y;
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
            crash = false;
        }
        return crash;
    }
}

function updateGameArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < myObstacles.length; i += 1) {
        if (myGamePiece.crashWith(myObstacles[i])) {
            myGameArea.stop();
            document.getElementById("btn-g").style.display="block"
            return;
        } 
    }
    myGamePiece.speedX = 0 ;
    myGamePiece.speedY = 0;
    myGameArea.clear();

    if(myGameArea.key  == 65){
        myGamePiece.speedX = -5;
    }
    if(myGameArea.key && myGameArea.key == 68){
        myGamePiece.speedX = 5;
    }
    if(myGameArea.key && myGameArea.key == 87){
        myGamePiece.speedY = -5;
    }
    if(myGameArea.key && myGameArea.key == 83){
        myGamePiece.speedY = 5;
    }

    myGameArea.frameNo += 1;
    if (myGameArea.frameNo == 1 || everyinterval(20)) {
        x = myGameArea.canvas.width;
        minHeight = 70;
        maxHeight = 180;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
        minGap = 70;
        maxGap = 180;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
        myObstacles.push(new component(40, height, "red", x, 0));
        myObstacles.push(new component(40, x - height - gap, "red", x, height + gap));
    }
    for (i = 0; i < myObstacles.length; i += 1) {
        myObstacles[i].speedX = -15;
        myObstacles[i].newPos();
        myObstacles[i].update();
    }
    myScore.text="SCORE: " + myGameArea.frameNo;
    myScore.update();
    myGamePiece.newPos();    
    myGamePiece.update();
}

function everyinterval(n) {
    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
    return false;
}

function moveup() {
    myGamePiece.speedY = -3; 
}

function movedown() {
    myGamePiece.speedY = 3; 
}

function moveleft() {
    myGamePiece.speedX = -5; 
}

function moveright() {
    myGamePiece.speedX = 5; 
}

function clearmove() {
    myGamePiece.speedX = 0; 
    myGamePiece.speedY = 0; 
} 

function ulang(){
    myGameArea.stop();
    myGameArea.clear();
    mulai();
    
}


function kembali(){
    location.reload();
}

 
   

    </script>
</body>
</html>