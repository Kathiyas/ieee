<?php 

    function find_all_admin(){
        global $db;

        $sql = "SELECT * FROM admin";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;

    }

    function find_all_user(){
        global $db;

        $sql = "SELECT * FROM user";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;

    }

    function add_user($first_name,$last_name,$email,$password)
    {
      global $db;
      $sql = "INSERT INTO user (first_name, last_name, email,password ) 
              VALUES ('$first_name', '$last_name', '$email', '$password')";
      $result = mysqli_query($db, $sql);
      var_dump($result);
      confirm_result_set($result);
      return $result;
    }

?>