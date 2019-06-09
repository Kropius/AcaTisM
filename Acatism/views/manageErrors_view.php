<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name = "author" content = "Matei Cioata">
    <meta name = "description" content = "A page that treats errors.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unauthorized</title>
    <link rel = "shortcut icon" href = "/Acatism/views/images/wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "/Acatism/views/styleSheets/error.css">
</head>
<body>
<header>
    <div class="titleLogo">
        <a href="/Acatism/homePage"><div id="title"><b>TEACHER</b></div></a>
        <a href="/Acatism/homePage"><img src="/Acatism/views/images/wildcats.png" id="logo" alt = "LOGO"></a>
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
                <a href="/Acatism/ProfessorViewProfileProfessor/execute" target="_blank">My Profile</a>
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="../LoginPage/login.html">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class = "mainBody">
        <?php
            if($this->info == -1)
                echo '<p>Error: you do not have access to edit this project!</p>';
            else if($this->info == -2)
                echo '<p>Error: you cannot make desicions for this student in this situation!</p>';
            else if($this->info == -3)
                echo '<p>Error: the first 3 rows are mandatory!</p>';
            else if($this->info == -4)
                echo '<p>Error: you cannot have more than 12 projects!</p>';
            else if($this->info == -5)
                echo '<p>Error: you cannot collaborate with more that 12 students!</p>';
        ?>
    </div>
</main>
</body>
</html>