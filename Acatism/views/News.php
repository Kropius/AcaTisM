<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student - Last Projects</title>
    
    <link rel="stylesheet" media="screen" href="/Acatism/views/styleSheets/News.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student's main page of license worksheets.">
</head>
<body>
    <header role="banner">
        <div class="titleLogo">
            <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1></a>
            <a href="/Acatism/StudentHomePage"><img src="/Acatism/views/images/wildcat.png"  alt="Logo" id="logo"></a>
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
                    <a href="/Acatism/StudentViewProfileStudent">My Profile</a>
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
                <h1>News</h1>
            </article>
            <article>
                <h2 class="titleN"> <a href="https://www.codingdojo.com/blog/7-most-in-demand-programming-languages-of-2018" target=_blank>The most popular programming langauges</a></h2>
                <section>
                    <ol>
                        <li>Java - decreased in popularity by about 6,000 job postings in 2018 compared to 2017, but is still extremely well-established</li>
                        <li>Python - grew in popularity by about 5,000 job postings over 2017</li>
                        <li>JavaScript - the grandfather of programming languages</li>
                        <li>C++ - changed very little in popularity from early 2017 to now</li>
                        <li>C# - went down slightly in demand this year</li>
                        <li>PHP -  a scripting language used on the server side, moved up to number six in our ranking over number nine last year</li>
                    </ol>
                </section>
                
            </article>
            
            <article>
                <h2 class="titleN">Thesis selection and registration</h2>
                <section>
                    <p>The thesis selection statistics can be found here:
                        <a href="https://docs.google.com/spreadsheets/d/e/2PACX-1vSUzCVoKSctvUpPT87xPt4V1onE7Gk6yLrDuacMXfag_V6LGw8e0ZHhWebKm6brukYlurwIduA1yyFH/pubhtml?gid=1968135121&single=true" target=_blank>PROJECT SELECTION STATISTICS</a>.</p>
                        <p>Registration deadline: Monday, 18 March 2019, 12:00 GMT+2.</p>
                    </section>
                </article>
                
                <article>
                    <h2 class="titleN">Resources for Java</h2>
                    <section>
                        <ul>
                            <li><a href="https://profs.info.uaic.ro/~acf/java/Cristian_Frasinaru-Curs_practic_de_Java.pdf" target=_blank>Course support (ro): "Curs practic de Java", Cristian Frasinaru </a></li>
                            <li><a href="https://docs.oracle.com/javase/tutorial/" target=_blank>The Java Tutorials</a></li>
                            <li><a href="https://docs.oracle.com/javase/specs/" target=_blank>Java Language and Virtual Machine Specifications </a></li>
                            <li><a href="http://greenteapress.com/thinkapjava/thinkapjava.pdf" target=_blank>Think Java (How to Think Like a Computer Scientist), by Allen B. Downey </a></li>
                        </ul>
                    </section>
                </article>
            </div>
        </main>
    </body>