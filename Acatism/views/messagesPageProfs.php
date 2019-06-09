<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,height=device-height">
    <meta name="author" content="Halauca Andrei">
    <meta name = "description" content = "Edit profile page for the professors. They will be redirected to this page in case they want to modify their profile pages.">
    <title>Messages Profs</title>
    <link rel = "shortcut icon" href = "/AcaTisM/views/images/wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "/AcaTisM/views/stylesheets/messagesPageProfs.css">
</head>
<body>
<header>
    <div class="titleLogo">
        <a href="/Acatism/homePage"><div id="title"><b>TEACHER</b></div></a>
        <a href="/Acatism/homePage"><img src="/AcaTisM/views/images/wildcats.png" id="logo"></a>
        <div class="vertical"></div>
    </div>
    <div class="searchBar">
        <input type="image" src="/AcaTisM/views/images/magnifier.png" alt="Submit" class="searchPhoto">
        <input type="text" size=35 class="textSearch" placeholder="Search...">
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
                <a href="../ProfilePagePROFS(prof)/Profesori.html" target="_blank">My Profile</a>
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="../LoginPage/login.html">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="sendMessage">
        <form action="/AcaTisM/messagesProfs/sendMessage" method="post">
            <p>
                Select a student
            </p>
            <select name="selectName">
                <?php
                foreach ($this->names as $item){
                    echo "<option name='$item'>". $item."</option>";
                }
                ?>
            </select>
            <input type="text" name="mesaj" placeholder="Insert your message here">
            <input type="submit" name="send" value="SEND">
        </form>
    </div>

    <div class="messagesTable">
        <p align="center">
            Received messages
        </p>
        <table align="center">
            <tr>
                <th>Nr.</th>
                <th>Student's name</th>
                <th>Message content</th>
            </tr>
            <?php
            $i=1;
            foreach ($this->messages as $item){
                echo "<tr>";
                echo "<td>".($i++)."</td><td>".$item['id_sender']."</td><td>".$item['content']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</main>
</body>
</html>