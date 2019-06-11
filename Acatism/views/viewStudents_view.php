<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name = "author" content = "Matei Cioata">
    <meta name = "description" content = "The teacher can see information about his students, and also get to their repositories from this page.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Students</title>
    <link rel = "shortcut icon" href = "/Acatism/views/images/wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "/Acatism/views/styleSheets/viewStud.css">
</head>
<body>
<header>
    <div class="titleLogo">
        <a href="/Acatism/homePage"><div id="title"><b>TEACHER</b></div></a>
        <a href="/Acatism/homePage"><img src="/Acatism/views/images/wildcats.png" id="logo" alt = "LOGO"></a>
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
                <a href="/Acatism/messagesProfs/seeData">Messages</a>
                <a href="/Acatism/login/logout">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class = "mainBody">
        <div class = "request">
            <a href = "/Acatism/viewRequests/seeData">Student Requests</a>
        </div>
        <?php
        if($this->info != null)
            foreach($this->info as $request)
            {
                echo '<article>';
                echo '<div class = "headStudent"><h3 class = "name">';
                echo $request['s_name'];
                echo '</h3></div>';
                echo '<p>Chosen project: '.$request['p_name'].'</p>';
                echo '<h3 class = "view"><a href = "/Acatism/ViewRepoProf/execute/'.$request['s_id'].'/'.$request['p_id'].'">View Repo</a></h3>';//'.$request['s_id'].'/'.$request['p_id'].'">Accept</a></h3>';
                echo '<h3 class = "view"><a href = "/Acatism/ProfessorViewProfileStudent/execute/'.$request['s_id'].'">View Profile</a></h3>';//'.$request['s_id'].'/'.$request['p_id'].'">Decline</a></h3>';
                echo '<h3 class = "view"><a onclick = "return false" ondblclick = "location=this.href" href = "/Acatism/viewStudents/deleteStudent/'.$request['s_id'].'/'.$request['p_id'].'">Stop collaboration (Double click)</a></h3>';
                echo '</article>';
            }
        ?>
    </div>
</main>
</body>
</html>