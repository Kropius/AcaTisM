<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name="autor" content="Rezmerita Mihnea, Cioata Matei Alexandru">
    <meta name = "description" content = "The student`s profile from a professor point of view">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student`s profile</title>
    <link rel = "shortcut icon" href = "wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "\Acatism\views\Stylesheets\ProfessorViewProfilePageStudent.css">
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
                <a href="\Acatism\ProfessorViewProfileProfessor\execute" target="_blank">My Profile</a>
                <a href="../LoginPage/login.html">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="profile">
        <div class="bloc-principal">
            <div class="header-name">
                <div id="name"><strong><?php echo $this->info['name'] ?></strong></div>
                <div id="facultate">Faculty:<strong><a href="http://www.info.uaic.ro/bin/Main/"><?php echo $this->info['faculty']?></a></strong></div>
                <div id="ultimaMedie">Ultima Medie: <?php echo $this->info['lastgrade']?></div>
                <!--                <img src="profile.jpeg" alt="profile Picture" id="profilePicture">-->

                <!--                <a  href="https://www.facebook.com/"  ><img src="pin-twitter-logo-png-images-22.png" alt="linkFacebook" id="linkTwitter"></a>-->
                <!--                <a href="https://www.facebook.com/"><img src="photos-facebook-logo-png-transparent-background-13.png" alt="linkTwitter" id="linkFacebook"></a>-->
                <!--                <a href="https://www.instagram.com/accounts/login/?hl=ro"><img src="instagram-logo-png-transparent-background-1024x1024.png" alt="linkInsta" id="linkInsta"></a>-->
            </div>
            <div class="content">
                <article class="my-description" id="description">
                    <h2 id="titles">About me...</h2>
                    <p id="shortDescription"><?php echo $this->info['description']?></p>
                </article>
                <article class="favourite-subjects" id="subjects">
                    <h2>Favourite Subjects</h2>
                    <dl id="subject">

                        <?php


                        if(is_array($this->interests)) {
                            foreach ($this->interests as $interest) {

                                echo "<dt>" . $interest['name'] . "</dt>";

                            }
                        }
                        ?>

                    </dl>
                </article>
                <article class="my-experience" id="experiece">
                    <h2>Working experience</h2>
                    <ul id="experiences">
                        <p><?php echo $this->info['experience']?></p>
                    </ul>
                </article>
                <article class="my-studies" id="study">
                    <h2>Studies
                    </h2>
                    <ul id="studies">
                        <p><?php echo $this->info['studies'] ?></p>
                    </ul>
                </article>
                <article class="my-contact" id="contact">
                    <h2>Contact</h2>
                    <ul id="contacts">
                        <li><strong>E-mail:<br><?php echo $this->info['email']?></strong></li>
                        <li><strong><?php echo $this->info['phone']?></strong></li>
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
                        <a href="#subjects"><strong>Favourite Subjects</strong></a>
                    </li>
                    <li>
                        <a href="#experiece"><strong>Working experience</strong></a>
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