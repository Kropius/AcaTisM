<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student's Main Page</title>

    <link rel="stylesheet" media="screen" href="\Acatism\views\Stylesheets\ApplyProject.css">
    <meta name="autor" content="Rezmerita Mihnea, Cercel Irina-Elena">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student's profile page where he can see his own profile">
</head>
<body>
<header role="banner">
    <div class="titleLogo">
        <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1></a>
        <a href="/Acatism/StudentHomePage"><img src="/Acatism/views/Images/wildcat.png" id="logo"></a>
        <div class="vertical"></div>
    </div>
    <div class="userMenu">
        <div class="userName">
            <?php
            echo Session::get('username');
            ?>
        </div>
        <div class="arrow">
            <div class="hoverbtn">^</div>
            <div class="hoverContent">
                <a href="/Acatism/StudentViewProfileStudent/execute" target="_blank">My Profile</a>
                <a href="../ViewRepo(Stud)/student.html">My Thesis</a>
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="../LoginPage/login.html">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <container>
        <?php
        if($this->info==1) echo "Felicitari ati aplicat cu succes!";
        else if($this->info==-2) echo "Dumneavoastra deja sunteti inscris la un proiect";
            else echo "Se pare ca nu va potriviti cu acest proiect!";
        ?>
            </container>
</main>
</body>
</html>

