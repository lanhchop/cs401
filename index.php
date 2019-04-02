<html>

<head>
    <link href="index.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Hanalei Fill">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="shortcut icon" src="favicon.ico" />
</head>


<body class="body">
    <header>
        <title>Meeple Like Us</title>
        <div class="navbar">
            <a href="index.php" class="title"><img src="logo.png" class="logo">Meeple Like Us</a>
            <span class="username">
                <?php
                    session_start();
                    if (isset($_SESSION["username"])){
                        echo "hi " . $_SESSION["username"];
                        echo '<a href="logout.php"> Logout </a>';
                        echo '<div>' . phpversion() . '</div';
                    } else{
                        echo '<a href="login.php">Sign In</a>';
                    }
                ?>
            </span>
            
        </div>
    </header>
    <div class="gameListCard gameContainer">
        <div class="profile">
            <span class="avatar"></span>
            <p>Lanh Nguyen</p>
        </div>
        <div class="gameInfo">
            <span class="gameTitle">Dominion</span>
            <p>123 E. Idaho St.</p>
            <p>2/28/2019</p>
            <p>2-8 Players</p>
        </div>
        <div class="seating">
            <div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            <button class="join">Join</button>
        </div>
    </div>

    <a href="newGame.php">
        <img src="img/add.png" class="addGame">
    </a>

    <footer>
        <div class="footerbar">
            Meeple Like Us 	&copy; by Lanh Nguyen
            </button>
        </div>
    </footer>

</body>

</html>