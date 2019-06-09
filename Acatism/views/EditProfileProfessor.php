
<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,height=device-height">

    <meta name="autor" content="Rezmerita Mihnea, Cioata Matei-Alexandru">
    <meta name = "description" content = "Edit profile page for the professors. They will be redirected to this page in case they want to modify their profile pages.">
    <title>Edit profile</title>
    <link rel = "shortcut icon" href = "wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "\Acatism\views\Stylesheets\EditProfileProfessor.css">
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
                <a href="/Acatism/ProfessorViewProfileProfessor/execute">My Profile</a>
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="/Acatism/login/logout">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="main-content">
        <h1>Edit your profile</h1>
        <div class="content">
            <form action="/Acatism/EditProfileProfessor/edit" method="post">
                <article id="description">
                    <div class="title">Description:</div>
                    <br> <input type="text" name="description" placeholder="Your description..." id="descriptions" value = "<?php echo $this->oldinfo['description']?>">
                </article>
                <article id="interest">
                    <div class="title">Interests:</div>
                    <br> <div class="subject"><select name="subjects1">
                            <option value="niciun interes">Select your interest</option>
                            <option value="Graph Theory">Graph Theory</option>
                            <option value="Databases">Databases</option>
                            <option value="Web Technologies">Web Technologies</option>
                            <option value="Data Structures">Data structures</option>
                            <option value="Computer Networks">Computer Networks</option>
                            <option value="Information Security">Information Security</option>
                            <option value="Functional Programming">Functional Programming</option>
                            <option value="Object Oriented Programming">Object Oriented Programming</option>
                            <option value="Compilers">Compilers</option>
                            <option value="Optimisation Algorithms">Optimisation Algorithms</option>
                            <option value="Game Development">Game Development</option>
                            <option value="Multi-threading">Multi-threading</option>
                            <option value="Operating Systems">Operating Systems</option>
                        </select>
                    </div>

                    <br> <div class="subject"><select name="subjects2" >
                            <option value="niciun interes">Select your interest</option>
                            <option value="Graph Theory">Graph Theory</option>
                            <option value="Databases">Databases</option>
                            <option value="Web Technologies">Web Technologies</option>
                            <option value="Data Structures">Data structures</option>
                            <option value="Computer Networks">Computer Networks</option>
                            <option value="Information Security">Information Security</option>
                            <option value="Functional Programming">Functional Programming</option>
                            <option value="Object Oriented Programming">Object Oriented Programming</option>
                            <option value="Compilers">Compilers</option>
                            <option value="Optimisation Algorithms">Optimisation Algorithms</option>
                            <option value="Game Development">Game Development</option>
                            <option value="Multi-threading">Multi-threading</option>
                            <option value="Operating Systems">Operating Systems</option>
                        </select>
                    </div>

                    <br> <div class="subject"><select name="subjects3">
                            <option value="niciun interes">Select your interest</option>
                            <option value="Graph Theory">Graph Theory</option>
                            <option value="Databases">Databases</option>
                            <option value="Web Technologies">Web Technologies</option>
                            <option value="Data Structures">Data structures</option>
                            <option value="Computer Networks">Computer Networks</option>
                            <option value="Information Security">Information Security</option>
                            <option value="Functional Programming">Functional Programming</option>
                            <option value="Object Oriented Programming">Object Oriented Programming</option>
                            <option value="Compilers">Compilers</option>
                            <option value="Optimisation Algorithms">Optimisation Algorithms</option>
                            <option value="Game Development">Game Development</option>
                            <option value="Multi-threading">Multi-threading</option>
                            <option value="Operating Systems">Operating Systems</option>
                        </select>
                    </div>

                </article>
                <article id="research">
                    <div class="title">Research:</div>
                    <br><input type="text" name="Research" placeholder="Your research..." id="reasearches" value="<?php echo $this->oldinfo['research']?>">

                </article>

                <article id="study">
                    <div class="title">Studies:</div>
                    <br><input type="text" name="Study" placeholder="Your studies..." id="studies" value="<?php echo $this->oldinfo['studies']?>">

                </article>
                <article id="contact">
                    <div class="title">Contact:</div>
                    <br><input type="text" name="phone" placeholder="Your phone" id="contacts" value="<?php echo $this->oldinfo['phone']?>">
                    <br><input typ="text" name="email" placeholder="Your e-mail" id="contacts" value="<?php echo $this->oldinfo['email']?>">

                </article>
                <article id = "profession">
                    <div class="title">Profession:</div>
                    <br><input type="text" name="profession" placeholder="Your profession..." id="contacts" value="<?php echo $this->oldinfo['profession']?>">
                </article>
                <input type="submit" value="submit" id ="submitbutton">
            </form>
        </div>
        <div id="backArrow"><a href="\Acatism\ProfessorViewProfileProfessor\execute">Back &#8626;</a></div>
    </div>
</main>
</body>
</html>