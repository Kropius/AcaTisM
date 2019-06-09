<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student's Main Page</title>

    <link rel="stylesheet" media="screen" href="\Acatism\views\Stylesheets\ApplyProject.css">
    <meta name="author" content="Rezmerita Mihnea, Cercel Irina-Elena">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student's main page of license worksheets.">
</head>
<body>
<header role="banner">
    <div class="titleLogo">
        <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1></a>
        <a href="/Acatism/StudentHomePage"><img src="\Acatism\views\Images\wildcat.png" id="logo"></a>
        <div class="vertical"></div>
    </div>

    <div class="userMenu">
        <div class="userName">
            Username
        </div>
        <div class="arrow">
            <div class="hoverbtn">^</div>
            <div class="hoverContent">
                <a href="\Acatism\StudentViewProfileStudent\execute">My Profile</a>
                <a href="\Acatism\MyThesis\execute">My Thesis</a>
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="/Acatism/login/logout">Logout</a>
            </div>
        </div>
    </div>
</header>
<container>
    <?php
    if ($this->info == -1) echo "Se pare ca exista o problema la extensia dumneavoastra!";
    else if($this->info==-2)echo "Se pare ca exisita o problema la formatul dumneavostra!";
    else if($this->info==1) echo "Commit inregistrat cu succes!";
    ?>
</container>
</main>
</body>
</html>
