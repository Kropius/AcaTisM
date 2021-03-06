<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Messages Studs</title>

    <link rel = "shortcut icon" href = "/AcaTisM/views/images/wildcat.ico" type = "image/x-icon">
    <link rel="stylesheet" media="screen" href="/AcaTisM/views/stylesheets/messagesPageStuds.css">

    <meta name="author" content="Halauca Andrei">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Edit profile page for the students. They will be redirected to this page in case they want to modify their profile pages.">
</head>
<body>
<header role="banner">
    <div class="titleLogo">
        <a href="/Acatism/StudentHomePage"><h1 id="title">STUDENT</h1></a>
        <a href="/Acatism/StudentHomePage"><img src="/AcaTisM/views/images/wildcat.png" id="logo" alt = "LOGO"></a>
        <div class="vertical"></div>
    </div>
    <div class="userMenu">
        <div class="userName">
            <?php
            $username = Session::get('username');
            echo $username;
            ?>
        </div>
        <div class="arrow">
            <div class="hoverbtn">^</div>
            <div class="hoverContent">
                <a href="/Acatism/StudentViewProfileStudent/execute">My Profile</a>
                <a href="\Acatism\MyThesis\execute">My Thesis</a>
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="/Acatism/login/logout">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="sendMessage">
        <form action="/AcaTisM/messagesStuds/sendMessage" method="post">
            <p>
                Select a teacher
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
                <th>Teacher's name</th>
                <th>Message content</th>
            </tr>
            <?php
            $i=1;
            foreach ($this->messages as $item){
                echo "<tr>";
                echo "<td>".($i++)."</td><td>".$item['id_teacher']."</td><td>".$item['content']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</main>
</body>
</html>
                    