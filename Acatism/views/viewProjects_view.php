<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name = "author" content = "Matei Cioata">
    <meta name = "description" content = "This is the page where a teacher can read/edit his existing projects, and add new ones.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Projects</title>
    <link rel = "shortcut icon" href = "/Acatism/views/images/wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "/Acatism/views/styleSheets/viewProj.css">
</head>
<body>
<header>
    <div class="titleLogo">
        <a href="../ProfsHomePage/Profesori.html"><div id="title"><b>TEACHER</b></div></a>
        <a href="../ProfsHomePage/Profesori.html"><img src="/Acatism/views/images/wildcats.png" id="logo" alt = "LOGO"></a>
        <div class="vertical"></div>
    </div>
    <div class="searchBar">
        <input type="image" src="/Acatism/views/images/magnifier.png" alt="Submit" class="searchPhoto">
        <input type="text" size=35 class="textSearch" placeholder="Search...">
    </div>
    <div class="userMenu">
        <div class="userName">
            Username
        </div>
        <div class="arrow">
            <div class="hoverbtn">^</div>
            <div class="hoverContent">
                <a href="../ProfilePagePROFS(prof)/Profesori.html" target="_blank">My Profile</a>
                <a href="../LoginPage/login.html">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class = "mainBody">
        <div class = "add">
            <a href = "/Acatism/addProject">Add Project</a>
        </div>
        <?php
        if($this->info != null)
            foreach($this->info as $project) {
                echo '<article>';
                echo '<div class = "headProject">';
                echo '<h3 class = "title">';
                for($i=0; $i<=20 && $i<strlen($project['name']);$i=$i+1)
                    echo $project['name'][$i];
                if(strlen($project['name'])>$i)
                    echo '...';
                echo '</h3>';
                echo '<h3 class = "edit"> <a href = \"/Acatism/editProject/' .$project['id'].'\"> Edit Project </a> </h3>';
                echo '</div>';
                echo '<p>'.$project['short_description'].'</p>';
                echo '<ul class = "extra">';
                echo '<li class = "task"> Tasks <p class = "taskHover">'.$project['name'].': '.$project['long_description'].'</p></li>';
                echo '<li class = "plan"> Plan <p class = "planHover">';
                if(isset($project['deadlines']))
                    foreach($project['deadlines'] as $deadline)
                    {
                        echo 'For '.$deadline['mandatory_date'].': '.$deadline['description'].'; extensia fisierului/fisierelor: '.$deadline['extension'].', respectiv formatul: '.$deadline['format'];
                        echo '<br>';
                    }
                else echo 'Everything must be ready until the final date: 10-06-2019!';
                echo '</p></li>';
                echo '<li class = "req"> Domains <p class = "reqHover">';
                if(isset($project['domains']))
                    foreach($project['domains'] as $domain)
                    {
                        echo $domain['name'];
                        echo '<br>';
                    }
                else echo 'Nothing in particular';
                echo '</p></li>';
                echo '</ul>';
                echo '</article>';
            }
        ?>
    </div>
</main>
</body>
</html>
