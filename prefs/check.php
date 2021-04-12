<?php
session_start();

if(isset($_POST['userName']) && $_POST['username'] != '' && isset($_POST['pass']) && $_POST['pass'] != '') {
    $username = trim($_POST['userName']);
    $password = trim($_POST['pass']);
    if($username != "" && $password != "") {
      try {
        $query = "select * from `users` where `username`=:username and `password`=:password";
        $stmt = $db->prepare($query);
        $stmt->bindParam('username', $username, PDO::PARAM_STR);
        $stmt->bindValue('password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count == 1 && !empty($row)) {
          /******************** Your code ***********************/
          $_SESSION['sess_user_id']   = $row['id'];
          $_SESSION['sess_username'] = $row['username'];
        //   $_SESSION['sess_name'] = $row['name'];
          echo "home.php";
        } else {
          echo "invalid";
        }
      } catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
      }
    } else {
      echo "Both fields are required!";
    }
  } else {
    header('location:./');
  }