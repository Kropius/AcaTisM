<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Useful Apps</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/Acatism/views/styleSheets/usefulApps.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/Acatism/views/styleSheets/student.css">
</head>
<body>
    <header role="banner">
        <div class="titleLogo">
            <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1></a>
            <a href="/Acatism/StudentHomePage"><img src="../views/images/wildcat.png" id="logo"></a>
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
                    <a href="/Acatism/StudentViewProfileStudent/execute">My Profile</a>
                    <a href="/Acatism/MyThesis/execute">My Thesis</a>
                    <a href="/Acatism/messagesStuds/seeData">Messages</a>
                    <a href="/Acatism/login/logout">Logout</a>
                </div>
            </div> 
        </div> 
    </header>
    <div class="container">
        <div class="cLanguage">
            <p>
                Recommended applications for C/C++ development:
            </p>
            <div class="appBox">
                <a href="https://visualstudio.microsoft.com/" target="_blank" title="Visual Studio" class="vs"><img src="../views/images/vs.jpg" alt="Visual Studio" class="vs"></a>
                <a href="https://www.jetbrains.com/clion/?fromMenu" target="_blank" title="Clion" class="clion"><img src="../views/images/clion.jpg" alt="Clion" class="clion"></a>
            </div>
        </div>
        <div class="javaLanguage">
            <p>
                Recommended applications for Java development:
            </p>
            <div class="appBox">
                <a href="https://www.jetbrains.com/idea/" target="_blank" title="IntelliJ" class="intellij"><img src="../views/images/intellij.png" alt="IntelliJ" class="intellij"></a>
                <a href="https://www.eclipse.org/downloads/" target="_blank" title="Eclipse" class="eclipse"><img src="../views/images/eclipse.png" alt="Eclipse" class="eclipse"></a>
            </div>
        </div>
        <div class="theory">
            <p>
                Recommended applications for theoretical projects:
            </p>
            <div class="appBox">
                <a href="https://www.texstudio.org/" target="_blank" title="TeXstudio" class="latex"><img src="../views/images/texstudio.jpg" alt="TeXstudio" class="latex"></a>
                <a href="https://www.overleaf.com/" target="_blank" title="Overleaf" class="overleaf"><img src="../views/images/overleaf.png" alt="Overleaf" class="overleaf"></a>
            </div>
        </div>
        <div class="frontend">
            <p>
                Recommended applications for frontend development:
            </p>
            <div class="appBox">
                <a href="https://code.visualstudio.com/" target="_blank" title="Visual Studio Code" class="vscode"><img src="../views/images/vs.jpg" alt="Visual Studio Code" class="vscode"></a>
                <a href="http://brackets.io/" target="_blank" title="Brackets" class="brackets"><img src="../views/images/brackets.jpg" alt="Brackets" class="brackets"></a>
            </div>
        </div>
    </div>
</body>
</html>