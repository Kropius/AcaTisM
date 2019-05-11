<!DOCTYPE html>
<html lang = en-US>
<head>
    <meta charset = "utf-8">
    <meta name = "author" content = "Matei Cioata">
    <meta name = "description" content = "The page where the teacher can accept or decline students that applied for one of his/her projects.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Requests</title>
    <link rel = "shortcut icon" href = "/Acatism/views/images/wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "/Acatism/views/styleSheets/viewReq.css">
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
        <div class = "request">
            <a href = "../MyStudents/MyStud.html">Go Back</a>
        </div>
        <?php
            if($this->info != null)
                foreach($this->info as $request)
                {
                    echo '<article>';
                    echo '<div class = "headStudent"><h3 class = "name">';
                    echo $request['s_name'];
                    echo '</h3></div>';
                    echo '<p>Wanted project: '.$request['p_name'].'</p>';
                    echo '<h3 class = "view"><a href = "/Acatism/viewRequests/acceptStudent/'.$request['s_id'].'/'.$request['p_id'].'">Accept</a></h3>';
                    echo '<h3 class = "view"><a href = "/Acatism/viewRequests/declineStudent/'.$request['s_id'].'/'.$request['p_id'].'">Decline</a></h3>';
                    echo '</article>';
                }
        ?>
    </div>
</main>
</body>
</html>
