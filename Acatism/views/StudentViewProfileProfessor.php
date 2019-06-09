<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Professor`s page </title>

    <link rel="stylesheet" media="screen" href="\Acatism\views\Stylesheets\StudentViewProfileProfessor.css">
    <meta name="autor" content="Rezmerita Mihnea, Cercel Irina-Elena">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Profesor`s profile page from a student`s point of view.">
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
<div class="profile">
    <div class="bloc-principal">
        <div class="header-name">
            <div id="name"><strong><?php echo $this->info['name']?></strong></div>
            <div id="profesie">Profession:<?php  echo $this->info['profession']?></div>

        </div>
        <div class="content">
            <article class="my-description" id="description">
                <h2 id="titled">About me...</h2>
                <p id="shortDescription"><?php  echo $this->info['description']?></p>
            </article>
            <article class="domains-of-interest" id="interest">
                <h2>Domains of interest</h2>

                <dl id="interests">
                    <?php
                    if(is_array($this->interests)) {
                        foreach ($this->interests as $interest) {
                            echo "<dt>" . $interest['name'] . "</dt>";

                        }
                    }
                    ?>
                </dl>

            </article>
            <article class="my-research" id="research">
                <h2>Research</h2>
                <div id="researches">
                    <?php echo $this->info['research'];
                    ?>
                </div>
            </article>
            <article class="my-studies" id="study">
                <h2>Studies
                </h2>
                <p id="studies">
                    <?php
                    echo $this->info['studies'];
                    ?>

                </p>
            </article>
            <article class="my-contact" id="contact">
                <h2>Contact</h2>
                <ul id="contacts">
                    <li><strong>E-mail:<br><?php  echo $this->info['email']?></strong></li>
                    <li><strong>Tel:<?php  echo $this->info['phone']?></strong></li>

                </ul>
            </article>

        </div>
        <aside id="tableOfContents">
            <h4 id="titlu">Table of contents</h4>
            <ul>
                <li>
                    <a href="#description"><strong> About me</strong></a>
                </li>
                <li>
                    <a href="#interest"><strong>Domains of interest</strong></a>
                </li>
                <li>
                    <a href="#research"><strong>Research</strong></a>
                </li>
                <li>
                    <a href="#study"><strong>Studies</strong></a>
                </li>
                <li>
                    <a href="#contact"><strong>Contact</strong></a>
                </li>
            </ul>

        </aside>

    </div>

</div>
</main>

</body>
</html>