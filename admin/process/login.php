
<?php
require_once('../private/init.php') ;

  $result = find_all_admin();
  $login = false;
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            if($row['email'] == $email && $password == $row['password'])
            {
               $login = true;
               $_SESSION['email'] = $email;
                $_SESSION['id'] = $row['id'];
            }
          
        }
    }
    
  }

?>