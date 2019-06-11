<?php

class Login_Model extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function run(){
        $userType = $_POST['type'];
        if ($userType!="-1"){
            $sth = $this->db->prepare("SELECT id from $userType 
                                    where username = :username and password = :password");

            $sth->execute(array(
                ':username'=>$_POST['username'],
                ':password'=>md5($_POST['password'])
            ));

            Session::set('loggedIn',false);
            $count = $sth->rowCount();
            $result = $sth->fetch();

            $id = $result['id'];

            if($count>0){
                //login user
                if ($userType == "teachers"){//teacher

                    $statement = $this->db->prepare("SELECT name from teachers where id =$id");
                    $statement->execute();
                    $result = $statement->fetch();
                    $user = $result['name'];

                    Session::set('loggedIn',true);
                    Session::set('user',$userType);
                    Session::set('idUser',$id);
                    Session::set('username',$user);
                    header("location:../loginPage");
                }
                else if ($userType == "students"){//student

                    $statement = $this->db->prepare("SELECT name from students where id =$id");
                    $statement->execute();
                    $result = $statement->fetch();
                    $user = $result['name'];

                    Session::set('loggedIn',true);
                    Session::set('user',$userType);
                    Session::set('idUser',$id);
                    Session::set('username',$user);
                    header("location:../loginPage");
                }
            }
            else{
                //failed to login, going back to login page
                Session::destroy();
                header('location:../login');
            }
        }
        else{
            header('location:../login');
        }
    }

    public function logout(){
        Session::destroy();
    }
}