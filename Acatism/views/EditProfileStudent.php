

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit your profile</title>

    <link rel="stylesheet" media="screen" href="/Acatism/views/Stylesheets/EditProfileStudent.css">
    <meta name="autor" content="Rezmerita Mihnea, Cercel Irina-Elena">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edit profile page for the students. They will be redirected to this page in case they want to modify their profile pages.">
</head>
<body>
<header role="banner">
    <div class="titleLogo">
        <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1></a>
        <a href="/Acatism/StudentHomePage"><img src="/Acatism/views/Images/wildcat.png"  id="logo"></a>
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
            <form class = "add" method = "post" action="/Acatism/EditProfileStudent/edit">
                <article id="description">
                    <div class="title">Description:</div>
                    <br> <input type="text" name="description" placeholder="Your description..." id="descriptions" value="<?php echo $this->oldinfo['description']?>">
                </article>
                <article id="subjects">
                    <div class="title">Subjects:</div>
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
                        </select></div>

                    <br> <div class="subject"><select name="subjects2">
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
                                </select></div>

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
                                 </select></div>

                </article>
                <article id="experience">
                    <div class="title">Experience:</div>
                    <br><input type="text" name="experience" placeholder="Your experience..." id="reasearches" value="<?php echo $this->oldinfo['experience']?>">
                </article>
                <article id="study">
                    <div class="title">Studies:</div>
                    <br> <input type="text" name="Study" placeholder="Your studies..." id="studies" value="<?php echo $this->oldinfo['studies']?>">
                    <br>
                    <br> <input type="text" name="LastGrade" placeholder="Last grade..." id="studies" value="<?php echo $this->oldinfo['lastgrade']?>">
                </article>
                <article id="contact">
                    <div class="title">Contact:</div>
                    <br><input type="text" name="ContactEmail" placeholder="E-mail..." id="contacts" value="<?php echo $this->oldinfo['email']?>">
                    <br>
                    <br><input type="text" name="ContactPhone" placeholder="Phone..." id="contacts" value="<?php echo $this->oldinfo['phone']?>">
                </article>
                <input type = "submit" value = "Submit" class = "submit"  id ="submitbutton">
            </form>
        </div>
        <div id="backArrow"><a href="/Acatism/StudentViewProfileStudent/execute">Back &#8626;</a></div>
    </div>
</main>
</body>
</html>
