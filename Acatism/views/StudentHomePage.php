<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student's Main Page</title>
    
    <link rel="stylesheet" media="screen" href="\Acatism\views\styleSheets\StudentHomePage.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student's main page of license worksheets.">
</head>
<body>
    <header role="banner">
        <div class="titleLogo">
            <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1></a>
            <a href="/Acatism/StudentHomePage"><img src=" \Acatism\views\images\wildcat.png" alt="Logo" id="logo"></a>
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
                    <a href="\Acatism\StudentViewProfileStudent\execute" target="_blank">My Profile</a>
                    <a href="/Acatism/MyThesis/execute">My Thesis</a>
                    <a href="../../../../Desktop/AcaTisM-master/Final/AcaTisM-master/LoginPage/login.html">Logout</a>
                </div>
            </div> 
        </div> 
    </header>
    <main>
        <div class="menu">
            
            <div id="projects"><h1><a href="/Acatism/ViewProjectsStudent/execute">PROJECTS</a></h1></div>
            <div id="professors"><h1><a href="../../../../Desktop/AcaTisM-master/Final/AcaTisM-master/TeachersStudPage/teachersStudPage.html">PROFESSORS</a></h1></div>
            <div id="news"><h1><a href="../../../../Desktop/AcaTisM-master/Final/AcaTisM-master/proiect/News.html" >NEWS</a></h1></div>
            <div id="tips"><h1><a href="../../../../Desktop/AcaTisM-master/Final/AcaTisM-master/proiect/Tips.html">TIPS AND TRICKS</a></h1></div>
            <div id="newProjects"><h1><a href="../../../../Desktop/AcaTisM-master/Final/AcaTisM-master/proiect/TheLastProjects.html">THE LATEST PROJECTS</a></h1></div>
            <div id="apps"><h1><a href="../../../../Desktop/AcaTisM-master/Final/AcaTisM-master/UsefulAppsStudents/usefulApps.html">APPS TO USE</a></h1></div>
            
        </div>
    </main>
</body>