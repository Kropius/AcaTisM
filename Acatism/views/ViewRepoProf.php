<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">

    <meta name="autor" content="Rezmerita Mihnea, Cioata Matei Alexandru">
    <meta name = "description" content = "The teacher`s profile page where everyone can see his interests, studies and contact details">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Repository</title>
    <link rel = "shortcut icon" href = "wildcat.ico"  type = "image/x-icon">
    <link rel = "stylesheet" href = "\Acatism\views\Stylesheets\ViewRepoProf.css">
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
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="../LoginPage/login.html">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="content">
        <article>
            <br>
            <div id = "title">
                <?php
                echo $this->info['students'] . "<br>";
                echo $this->info['project'] . "<br>";
                ?>
            </div>

            <div id="repo">
                <?php if($this->info['project_link']!=null) {?>

                <a href=" <?php echo $this->info['project_link'] ?>">GitHub Repository</a>
                <?php }
                else echo "Acest student nu si-a incarcat linkul GitHub"?>
                <br>
                <?php if($this->info['documentation_link']!=null) {?>
                <a href=" <?php echo $this->info['documentation_link'] ?>">Documentatia</a>
                <?php }
                else echo "Acest student nu si-a incarcat link-ul de la documentatie"
                ?>

            </div>
            <div class="deadlines">
                <?php
                    if($this->info['project_link']!=null) {
                        if( count($this->oldinfo)>0) {
                            for ($i = 0; $i < count($this->oldinfo); $i++) {
                                if ($i == 0) {
                                    echo "<div class=nr_deadline>Primul Commit </div>";
                                    echo "<div class = info_deadline>Descriere: " . $this->oldinfo[$i]['description'] . "<br>";
                                    echo "<div class = info_deadline>Data adaugarii: " . $this->oldinfo[$i]['add_date'] . "<br>";
                                }
                                if ($i == 1) {
                                    echo "<div class=nr_deadline>Al 2-lea Commit </div>";
                                    echo "<div class = info_deadline>Descriere: " . $this->oldinfo[$i]['description'] . "<br>";
                                    echo "<div class = info_deadline>Data adaugarii: " . $this->oldinfo[$i]['add_date'] . "<br>";
                                }
                                if ($i == 2) {
                                    echo "<div class=nr_deadline>Al 3-lea Commit </div>";
                                    echo "<div class = info_deadline>Descriere: " . $this->oldinfo[$i]['description'] . "<br>";
                                    echo "<div class = info_deadline>Data adaugarii: " . $this->oldinfo[$i]['add_date'] . "<br>";
                                }
                                if ($i == 3) {
                                    echo "<div class=nr_deadline>Ultimul Commit </div>";
                                    echo "<div class = info_deadline>Descriere: " . $this->oldinfo[$i]['description'] . "<br>";
                                    echo "<div class = info_deadline>Data adaugarii: " . $this->oldinfo[$i]['add_date'] . "<br>";
                                }

                            }
                        }
                        else {
                            echo "<div class=no>Acest student nu a incarcat inca nimic</div>";
                        }
                    }
                    else {
                        echo "<div class=no>Acest student nu si-a incarcat linkul GitHub</div>";
                    }
                ?>
            </div>


        </article>

    </div>
</main>
</body>
</html>
