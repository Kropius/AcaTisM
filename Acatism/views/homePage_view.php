<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name = "author" content = "Matei Cioata">
    <meta name = "description" content = "The teacher's main menu, where he can supervise the students under his guidance and/or add new projects.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher's Main Page</title>
    <link rel = "shortcut icon" href = "/Acatism/views/images/wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "/Acatism/views/styleSheets/homeProf.css">
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
                <a href="/Acatism/ProfessorViewProfileProfessor/execute">My Profile</a>
                <a href="/Acatism/messagesProfs/seeData">Messages</a>
                <a href="/Acatism/login/logout">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class = "mainBody">
        <div class = "projects">
            <a href = "/Acatism/viewProjects/seeData"><img src = "/Acatism/views/images/projects.jpg" alt = "LOGO"></a>
        </div>
        <div class = "students">
            <a href = "/Acatism/viewStudents/seeData"><img src = "/Acatism/views/images/students.jpg" alt = "LOGO"></a>
        </div>
    </div>
</main>
</body>
</html>
