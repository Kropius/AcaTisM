

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student's Main Page</title>

    <link rel="stylesheet" media="screen" href="\Acatism\views\Stylesheets\MyThesis.css">
    <meta name="author" content="Rezmerita Mihnea, Cercel Irina-Elena">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student's main page of license worksheets.">
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
                <a href="\Acatism\StudentViewProfileStudent\execute" target="_blank">My Profile</a>
                <a href="\Acatism\MyThesis\execute">My Thesis</a>
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="../LoginPage/login.html">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="content">
        <article>


            <?php  if($this->info!=null){ ?>
            <?php
            echo $this->info['name'] . "<br>";

            echo "<div id=long_description> ".$this->info['long_description'] . "</div>";
            if($this->info['project_link']==null)
            {
                echo "<div id=long_description><b> "."Nu ati incarcat linkul GitHub" . "</b></div>";
            }
            ?>
            <div id="deadline">
                <?php

                if ($this->oldinfo==null) {
                    echo 'Felicitari! Se pare ca v-ati terminat lucrarea de licenta!!';
                } else {
                    echo "<div class=minititle >Cerintele pentru deadline-ul curent:" . "</div>";
                    echo "<div class=minititle >Descrierea deadline-ulu: </div>" . $this->oldinfo['description'] . "<br>";
                    echo "<div class=minititle >Data limita: </div>" . $this->oldinfo['mandatory_date'] . "<br>";
                    echo "<div class=minititle >Extensia fisierului: </div>" . $this->oldinfo['extension'] . "<br>";
                    echo "<div class=minititle >Format: </div>" . $this->oldinfo['format'] . "<br>";

                }
                echo "</div>";
                }
                else{
                    echo "Este momentul sa va inscrieti la un proiect!!";
                }

                ?>


        </article>
        <article >
            <div id="repo"><a href=" ">GitHub Repository</a>
                <div id="hoverOver">Just another GitHub link. </div>
            </div>
            <form method="post" action="\Acatism\MyThesis\updateGit">
                <input type="text" name="git" >
                <br>
                <input type="submit"  value="Update" id="button">
            </form>
            <br>


            <?php
            if($this->oldinfo!=null&&$this->info['project_link']!=null) {


                echo "
                <form method=post action=\Acatism\Commit\commit>
                    <div class=fields>Descriere: <input type=text name=descriere><br></div>
                    <div class=fields>Extensia: <input type=text name=extensie><br></div>
                    <div class=fields>Format: <input type=text name=format><br></div>
                    <br>
                    <input type=submit value=Commit!! id=button>
                    <br>
                </form>
                ";
            }
            ?>
        </article>
        <article >
            <div id="documentatie"><a href=" ">Documentatia</a></div>
            <div id="docu">Just another licence worksheet</div>
            <form method="post" action="\Acatism\MyThesis\updateDoc">
                <input type="text" name="doc" >
                <br>
                <input type="submit"  value="Update" id="button">
            </form>

        </article>
    </div>
</main>
</body>
</html>
