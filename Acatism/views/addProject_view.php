<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name = "author" content = "Matei Cioata">
    <meta name = "description" content = "The page where the teacher can add new projects or edit existing ones.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add/Edit project</title>
    <link rel = "shortcut icon" href = "/Acatism/views/images/wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "/Acatism/views/styleSheets/add.css">
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
        <form class = "add" method = "post" action = "/Acatism/addProject/execute">
            <p class = "note"> Fill out all the information in order for the project to be submitted! </p>
            <p class = "title"> Write the title of the project: </p>
            <input type = "text" name="name" class = "inputName"><br>
            <p class = "short"> A small description of the project: </p>
            <textarea name="short" rows="5" class = "inputSm"></textarea><br>
            <p class = "task"> Write a longer description of the project. The student must be able to understand all of the functionalities of his project:</p>
            <textarea name="task" rows="5" class = "inputSm"></textarea><br>
            <p class = "plan"> Set some deadlines so the student can constantly work and present his progress:</p>
            <table>
                <tr><td><label>Dates:</label></td><td><input type = "date" name="date1" class = "deadline"></td>
                    <td><input type = "date" name="date2" class = "deadline"></td>
                    <td><input type = "date" name="date3" class = "deadline"></td></tr>
                <tr><td><label>Extensions:</label></td><td><input type = "text" name = "ext1" class = "deadline" placeholder = ".*"></td>
                    <td><input type = "text" name = "ext2" class = "deadline" placeholder = ".*"></td>
                    <td><input type = "text" name = "ext3" class = "deadline" placeholder = ".*"></td></tr>
                <tr><td><label>Formats:</label></td><td><input type = "text" name = "for1" class = "deadline" placeholder = "Scholarly HTML, LTNS"></td>
                    <td><input type = "text" name = "for2" class = "deadline" placeholder = "Scholarly HTML, LTNS"></td>
                    <td><input type = "text" name = "for3" class = "deadline" placeholder = "Scholarly HTML, LTNS"></td></tr>
                <tr><td><label>Descriptions:</label></td><td><input type = "text" name = "desc1" class = "deadline"></td>
                    <td><input type = "text" name = "desc2" class = "deadline"></td>
                    <td><input type = "text" name = "desc3" class = "deadline"></td></tr>
            </table>
            <p class = "recom"> What would you recommend your students to do / use in this project?</p>
            <textarea name="recom" rows="5" class = "inputSm"></textarea><br>
            <input type = "submit" value = "Submit" class = "submit">
        </form>
        <form class = "add2" action = '#'>
            <input type = "submit" value = "Back to Projects" class = "submit">
        </form>
    </div>
</main>
</body>
</html>