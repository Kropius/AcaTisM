<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student - The Latest Projects</title>
    
    <link rel="stylesheet" media="screen" href="/Acatism/views/styleSheets/TheLastProjects.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student's main page of license worksheets.">
</head>
<body>
    <header role="banner">
        <div class="titleLogo">
            <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1></a>
            <a href="/Acatism/StudentHomePage"><img src="../views/images/wildcat.png" alt="Logo" id="logo"></a>
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
    <main>
        <div class="menu">
            <article id="head">
                <h1>The Latest Projects</h1>
            </article>
            
            <article>
                <h2 class="titleProj"><abbr title="Academic Thesis Manager">AcaTisM</abbr></h2>
                <section>
                    <p>Short description:</p>
                    <p>Sa se realizeze o aplicatie Web privind managementul tezelor de licenta/master la nivelul unei facultati. 
                        Din punctul de vedere al profesorului, sistemul va oferi posibilitatea gestionarii temelor propuse si a studentilor arondati. 
                        Pentru studenti, aplicatia va fi capabila sa listeze/filtreze subiectele de interes pentru fiecare profesor in parte si sa permita inscrierea unei persoane in vederea indrumarii, eventual conform unor cerinte prelabile.</p>
                        <p>For more informations visit the page: <a href="../ProjectsStudPage/projectsStudPage.html" target=_blank>Projects</a>. </p>
                    </section>
                    
                </article>
                
                <article>
                    <h2 class="titleProj"><abbr title="Web App Security Alerter">ASA</abbr></h2>
                    <section>
                        <p>Short description:</p>
                        <p>Folosind datele publice referitoare la incidente de securitate sa se realizeze un sistem capabil sa trimita 
                            alerte in timp-real despre noile vulnerabilitati software pentru o clasa de aplicatii (e.g., CMS, framework, modul, biblioteca etc.). </p>                   
                            <p>For more informations visit the page: <a href="../ProjectsStudPage/projectsStudPage.html" target=_blank>Projects</a>. </p>
                        </section>
                    </article>
                    
                    <article>
                        <h2 class="titleProj"> SpringCinema</h2>
                        <section>
                            <p>Short description:</p>
                            <p>An application for the management of a cinema in Java, using the Spring framework.
                                The application must be able to organize the cinema as follows: everyday, there is a program.</p>
                                <p>For more informations visit the page: <a href="../ProjectsStudPage/projectsStudPage.html" target=_blank>Projects</a>. </p>
                            </section>
                        </article>
                        
                        
                    </div>
                </main>
            </body>