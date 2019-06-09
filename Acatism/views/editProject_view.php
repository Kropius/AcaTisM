<!DOCTYPE html>
<html lang = "en-US">
<head>
    <meta charset = "utf-8">
    <meta name = "author" content = "Matei Cioata">
    <meta name = "description" content = "The page where the teacher can add new projects or edit existing ones.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit project</title>
    <link rel = "shortcut icon" href = "/Acatism/views/images/wildcat.ico" type = "image/x-icon">
    <link rel = "stylesheet" href = "/Acatism/views/styleSheets/edit.css">
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
                <a href="/Acatism/messagesStuds/seeData">Messages</a>
                <a href="../LoginPage/login.html">Logout</a>
            </div>
        </div>
    </div>
</header>
<main>
    <div class = "mainBody">
        <div class = "delete">
            <a onclick = "return false" ondblclick = "location=this.href" href = "/Acatism/editProject/delete/<?php echo $this->info['id'] ?>">Delete Project (double click)</a>
        </div>
        <form class = "add" method = "post" action = "/Acatism/editProject/execute/<?php echo $this->info['id'] ?>">
            <p class = "title"> Write the title of the project: </p>
            <input type = "text" name="name" class = "inputName" value = "<?php echo $this->info['name']; ?>"><br>
            <p class = "short"> A small description of the project: </p>
            <textarea name="short" rows="5" class = "inputSm"><?php echo $this->info['short_description']; ?></textarea><br>
            <p class = "task"> Write a longer description of the project. The student must be able to understand all of the functionalities of his project and what tools to use:</p>
            <textarea name="task" rows="5" class = "inputSm"><?php echo $this->info['long_description']; ?></textarea><br>
            <p class = "plan"> Set some deadlines so the student can constantly work and present his progress:</p>
            <table>
                <tr><td><label>Dates:</label></td><td><input type = "text" name="date1" class = "deadline" value = "<?php if(isset($this->info['deadlines'][0]['mandatory_date'])) echo $this->info['deadlines'][0]['mandatory_date']; ?>" placeholder = "DD-MM-YYYY"></td>
                    <td><input type = "text" name="date2" class = "deadline" value = "<?php if(isset($this->info['deadlines'][1]['mandatory_date'])) echo $this->info['deadlines'][1]['mandatory_date']; ?>" placeholder = "DD-MM-YYYY"></td>
                    <td><input type = "text" name="date3" class = "deadline" value = "<?php if(isset($this->info['deadlines'][2]['mandatory_date'])) echo $this->info['deadlines'][2]['mandatory_date']; ?>" placeholder = "DD-MM-YYYY"></td>
                    <td><input type = "text" name="date4" class = "deadline" value = "<?php if(isset($this->info['deadlines'][3]['mandatory_date'])) echo $this->info['deadlines'][3]['mandatory_date']; ?>" placeholder = "DD-MM-YYYY"></td></tr>
                <tr><td><label>Extensions:</label></td><td><input type = "text" name = "ext1" class = "deadline" value = "<?php if(isset($this->info['deadlines'][0]['extension'])) echo $this->info['deadlines'][0]['extension']; ?>" placeholder = ".*"></td>
                    <td><input type = "text" name = "ext2" class = "deadline" value = "<?php if(isset($this->info['deadlines'][1]['extension'])) echo $this->info['deadlines'][1]['extension']; ?>" placeholder = ".*"></td>
                    <td><input type = "text" name = "ext3" class = "deadline" value = "<?php if(isset($this->info['deadlines'][2]['extension'])) echo $this->info['deadlines'][2]['extension']; ?>" placeholder = ".*"></td>
                    <td><input type = "text" name = "ext4" class = "deadline" value = "<?php if(isset($this->info['deadlines'][3]['extension'])) echo $this->info['deadlines'][3]['extension']; ?>" placeholder = ".*"></td></tr>
                <tr><td><label>Formats:</label></td><td><input type = "text" name = "for1" class = "deadline" value = "<?php if(isset($this->info['deadlines'][0]['format'])) echo $this->info['deadlines'][0]['format']; ?>" placeholder = "Scholarly HTML, LTNS"></td>
                    <td><input type = "text" name = "for2" class = "deadline" value = "<?php if(isset($this->info['deadlines'][1]['format'])) echo $this->info['deadlines'][1]['format']; ?>" placeholder = "Scholarly HTML, LTNS"></td>
                    <td><input type = "text" name = "for3" class = "deadline" value = "<?php if(isset($this->info['deadlines'][2]['format'])) echo $this->info['deadlines'][2]['format']; ?>" placeholder = "Scholarly HTML, LTNS"></td>
                    <td><input type = "text" name = "for4" class = "deadline" value = "<?php if(isset($this->info['deadlines'][3]['format'])) echo $this->info['deadlines'][3]['format']; ?>" placeholder = "Scholarly HTML, LTNS"></td></tr>
                <tr><td><label>Descriptions:</label></td><td><input type = "text" name = "desc1" class = "deadline" value = "<?php if(isset($this->info['deadlines'][0]['description'])) echo $this->info['deadlines'][0]['description']; ?>"></td>
                    <td><input type = "text" name = "desc2" class = "deadline" value = "<?php if(isset($this->info['deadlines'][1]['description'])) echo $this->info['deadlines'][1]['description']; ?>"></td>
                    <td><input type = "text" name = "desc3" class = "deadline" value = "<?php if(isset($this->info['deadlines'][2]['description'])) echo $this->info['deadlines'][2]['description']; ?>"></td>
                    <td><input type = "text" name = "desc4" class = "deadline" value = "<?php if(isset($this->info['deadlines'][3]['description'])) echo $this->info['deadlines'][3]['description']; ?>"></td></tr>
            </table>
            <p class = "recom"> What are the main domains of this project?</p>
            <select name = "domain1" class = "domain">
                <option value = "null">Null</option>
                <option value = "graph theory">Graph Theory</option>
                <option value = "databases">Databases</option>
                <option value = "web technologies">Web Technologies</option>
                <option value = "data structures">Data Structures</option>
                <option value = "computer networks"> Computer Networks</option>
                <option value = "Information Security"> Information Security</option>
                <option value = "Functional Programming"> Functional Programming</option>
                <option value = "Object Oriented Programming"> Object Oriented Programming</option>
                <option value = "Natural Language Processing"> Natural Language Processing</option>
                <option value = "Compilers"> Compilers</option>
                <option value = "Optimisation Algorithms"> Optimisation Algorithms</option>
                <option value = "Game Development">  Game Development</option>
                <option value = "Multi-threading"> Multi-threading</option>
                <option value = "Operating Systems"> Operating Systems</option>
                <option selected="selected"><?php if(isset($this->info['domains'][0]['name'])) echo $this->info['domains'][0]['name']?></option>
            </select>
            <select name = "domain2" class = "domain">
                <option value = "null">Null</option>
                <option value = "graph theory">Graph Theory</option>
                <option value = "databases">Databases</option>
                <option value = "web technologies">Web Technologies</option>
                <option value = "data structures">Data Structures</option>
                <option value = "computer networks"> Computer Networks</option>
                <option value = "Information Security"> Information Security</option>
                <option value = "Functional Programming"> Functional Programming</option>
                <option value = "Object Oriented Programming"> Object Oriented Programming</option>
                <option value = "Natural Language Processing"> Natural Language Processing</option>
                <option value = "Compilers"> Compilers</option>
                <option value = "Optimisation Algorithms"> Optimisation Algorithms</option>
                <option value = "Game Development">  Game Development</option>
                <option value = "Multi-threading"> Multi-threading</option>
                <option value = "Operating Systems"> Operating Systems</option>
                <option selected="selected"><?php if(isset($this->info['domains'][1]['name'])) echo $this->info['domains'][1]['name']?></option>
            </select>
            <select name = "domain3" class = "domain">
                <option value = "null">Null</option>
                <option value = "graph theory">Graph Theory</option>
                <option value = "databases">Databases</option>
                <option value = "web technologies">Web Technologies</option>
                <option value = "data structures">Data Structures</option>
                <option value = "computer networks"> Computer Networks</option>
                <option value = "Information Security"> Information Security</option>
                <option value = "Functional Programming"> Functional Programming</option>
                <option value = "Object Oriented Programming"> Object Oriented Programming</option>
                <option value = "Natural Language Processing"> Natural Language Processing</option>
                <option value = "Compilers"> Compilers</option>
                <option value = "Optimisation Algorithms"> Optimisation Algorithms</option>
                <option value = "Game Development">  Game Development</option>
                <option value = "Multi-threading"> Multi-threading</option>
                <option value = "Operating Systems"> Operating Systems</option>
                <option selected="selected"><?php if(isset($this->info['domains'][2]['name'])) echo $this->info['domains'][2]['name']?></option>
            </select>
            <input type = "submit" value = "Submit" class = "submit">
        </form>
        <form class = "add2" action = "/Acatism/viewProjects/seeData">
            <input type = "submit" value = "Back" class = "submit">
        </form>
    </div>
</main>
</body>
</html>
