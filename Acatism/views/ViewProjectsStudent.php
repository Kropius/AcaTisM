<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Projects</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="\Acatism\views\Stylesheets\student.css">
    <link rel="stylesheet" type="text/css" media="screen" href="\Acatism\views\Stylesheets\projectsStudPage.css">
    <script src="main.js"></script>
</head>
<body>
<header role="banner">
    <div class="titleLogo">
        <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1>
        </a>
        <a href="/Acatism/StudentHomePage"><img
                    src="\Acatism\views\Images\wildcat.png" id="logo"></a>
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
                <a href="/Acatism/login/logout">Logout</a>

            </div>
        </div>
    </div>
</header>

<div class="container">
    <?php


    for($i= 0; $i<$this->oldinfo;$i++)
    {

        echo "<div class= \"project1\">";
        echo $this->info[$i]['numeproiect'];
        echo "<p>" . $this->info[$i]['long_description'] . "</p>";
        echo "<span>" . "Profesor coordonator: <a href = /Acatism/StudentViewProfileProfessor/execute/" .$this->info[$i]['id_prof'].">".$this->info[$i]['nume_prof']. "</a></span>";
        echo "<div class = deadlines>";

        if(isset($this->info[$i]['mandatory_date']))
        {
            $dead=1;
            echo "<b>Deadline " .$dead, ": </b><br>";

            echo "<ul>";
            echo "<li>Descriere:" . $this->info[$i]['description'] . "</li>";
            echo "<li>Data limita: " . $this->info[$i]['mandatory_date'] . "</li>";
            echo "<li>Format: " . $this->info[$i]['format'] . "</li>";
            echo "<li>Extensie: " . $this->info[$i]['extension'] . "</li>";
            echo "</ul>";
            if(isset($this->info[$i+1]['numeproiect']))
            {
                if(strcmp($this->info[$i]['numeproiect'],$this->info[$i+1]['numeproiect'])==0)
                {
                    $i=$i+1;
                    $dead=$dead+1;
                    echo "<b>Deadline " .$dead, ": </b><br>";

                    echo "<ul>";
                    echo "<li>Descriere:" . $this->info[$i]['description'] . "</li>";
                    echo "<li>Data limita: " . $this->info[$i]['mandatory_date'] . "</li>";
                    echo "<li>Format: " . $this->info[$i]['format'] . "</li>";
                    echo "<li>Extensie: " . $this->info[$i]['extension'] . "</li>";
                    echo "</ul>";
                }
            }
            if(isset($this->info[$i+1]['numeproiect']))
            {
                if(strcmp($this->info[$i]['numeproiect'],$this->info[$i+1]['numeproiect'])==0)
                {
                    $i=$i+1;
                    $dead=$dead+1;

                    echo "<b>Deadline " .$dead, ": </b><br>";

                    echo "<ul>";
                    echo "<li>Descriere:" . $this->info[$i]['description'] . "</li>";
                    echo "<li>Data limita: " . $this->info[$i]['mandatory_date'] . "</li>";
                    echo "<li>Format: " . $this->info[$i]['format'] . "</li>";
                    echo "<li>Extensie: " . $this->info[$i]['extension'] . "</li>";
                    echo "</ul>";
                }
            }
            if(isset($this->info[$i+1]['numeproiect']))
            {
                if(strcmp($this->info[$i]['numeproiect'],$this->info[$i+1]['numeproiect'])==0)
                {
                    $i=$i+1;
                    $dead=$dead+1;

                    echo "<b>Deadline " .$dead, ": </b><br>";
                    echo "<ul>";
                    echo "<li>Descriere: " . $this->info[$i]['description'] . "</li>";
                    echo "<li>Data limita: " . $this->info[$i]['mandatory_date'] . "</li>";
                    echo "<li>Format: " . $this->info[$i]['format'] . "</li>";
                    echo "<li>Extensie:" . $this->info[$i]['extension'] . "</li>";
                    echo "</ul>";
                }
            }

        }
            $id = Session::get('idUser');

            echo "<center><form method=post " . "action=/Acatism/ApplyProject/execute/" . $this->info[$i]['project_id'] ."/".$id.">";
            echo "<input type='submit' value='Apply' class=\"apply\">";
            echo "</form></center>";

        echo "</div>";
        echo "</div>";
    }
    echo  "</div>";


    ?>
</div>
</body>
</html>