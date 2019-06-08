<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,height=device-height">
    <meta name="author" content="Halauca Andrei">
    <meta name = "description" content = "Edit profile page for the professors. They will be redirected to this page in case they want to modify their profile pages.">
    <title>Messages Profs</title>
    <link rel = "shortcut icon" href = "/AcaTisM/views/images/wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "/AcaTisM/views/stylesheets/listProfsPage.css">
</head>
<body>
<header>
    <div class="titleLogo">
        <a href="../ProfsHomePage/Profesori.html"><div id="title"><b>TEACHER</b></div></a>
        <a href="../ProfsHomePage/Profesori.html"><img src="/AcaTisM/views/images/wildcats.png" id="logo"></a>
        <div class="vertical"></div>
    </div>
    <div class="searchBar">
        <input type="image" src="/AcaTisM/views/images/magnifier.png" alt="Submit" class="searchPhoto">
        <input type="text" size=35 class="textSearch" placeholder="Search...">
    </div>
    <div class="userMenu">
        <div class="userName">
            <?php
//            $username = Session::get('username');
//            echo $username;
            //TODO:get username from session
            ?>
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
    <?php
    foreach ($this->profs as $prof){
        $id = $prof['id'];
        echo "<p>".$prof['name'].', '.$prof['profession'].", Profile:"."<a href='$id'>LINK</a></p>";
    }
    ?>
</main>
</body>
</html>