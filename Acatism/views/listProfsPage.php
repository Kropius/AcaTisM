<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Messages Studs</title>

    <link rel = "shortcut icon" href = "/AcaTisM/views/images/wildcat.ico" type = "image/x-icon">
    <link rel="stylesheet" media="screen" href="/AcaTisM/views/stylesheets/listProfsPage.css">

    <meta name="author" content="Halauca Andrei">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edit profile page for the students. They will be redirected to this page in case they want to modify their profile pages.">
</head>
<body>
<header role="banner">
    <div class="titleLogo">
        <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1></a>
        <a href="/Acatism/StudentHomePage"><img src="/AcaTisM/views/images/wildcat.png" id="logo"></a>
        <div class="vertical"></div>
    </div>
    <div class="searchBar">
        <input type="text" size=35 placeholder="Search..." >
        <input type="image" src="/AcaTisM/views/images/magnifier.png" alt="Submit">
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
                <a href="/Acatism/MyThesis/execute">My Thesis</a>
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="/Acatism/login/logout">Logout</a>
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