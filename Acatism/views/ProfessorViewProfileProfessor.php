<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">

    <meta name="autor" content="Rezmerita Mihnea, Cioata Matei Alexandru">
    <meta name = "description" content = "The teacher`s profile page where everyone can see his interests, studies and contact details">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <link rel = "shortcut icon" href = "wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "\Acatism\views\Stylesheets\ProfessorViewProfileProfessor.css">
</head>
<body>
<header>
    <div class="titleLogo">
        <a href="/Acatism/homePage"><div id="title"><b>TEACHER</b></div></a>
        <a href="/Acatism/homePage"><img src="\Acatism\views\Images\wildcats.png" id="logo"></a>
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
            <div id="button"><a href="\Acatism\EditProfileProfessor\execute">Edit Profile</a></div>
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