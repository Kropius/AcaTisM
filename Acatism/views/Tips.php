<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student- Tips and tricks</title>
    
    <link rel="stylesheet" media="screen" href="/Acatism/views/styleSheets/Tips.css">
    
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
        <div class="titleTips"><h1>Tips and tricks for a good thesis</h1></div>
        <dl class="tips">
            <dt>
                <h3>Start working today!</h3>
                <dd>
                    I do really mean today! Before you go to bed tonight. Tomorrow is too late!
                </dd>
            </dt>
            <dt>
                <h3>Establish a working plan!</h3>
                <dd>The plan should include all phases of work on the thesis, from searching for a topic to submitting your work.
                    <ul>
                        <li> Do not think too detailed</li>
                        <li>Fix clear deadlines</li>
                        <li> You should plan extra time as a buffer</li>
                    </ul>
                </dd>
            </dt>
            <dt>
                <h3>Use apps!</h3>
                <dd><a href="https://trello.com" target=_blank>Trello</a> is a project management tool (available as a smartphone app) which allows you to create ‘boards’
                    on which to pin all of your outstanding tasks, deadlines, and ideas.
                    It allows you to make checklists too so you know that all of your important stuff
                    is listed and to-hand, meaning you can focus on one thing at a time. It’s satisfying to move notes into
                    the <strong>done</strong> column too.</dd>
                </dt>
                <dt>
                    <h3> Address the unanswered questions!</h3>
                    <dd>There will always be unanswered questions – don’t try to ignore or, even worse, obfuscate them.
                        On the contrary, actively draw attention to them; identify them in your conclusion as areas for further investigation.</dd>
                    </dt>
                    <dt>
                        <h3>Get feedback on the whole thesis!</h3>
                        <dd>We often get feedback on individual chapters but plan to get feedback from your supervisor to make sure it all hangs together nicely.</dd>
                    </dt>
                </dl>
                
            </div>
        </main>
    </body>