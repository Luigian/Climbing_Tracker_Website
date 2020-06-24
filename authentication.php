<?php
    function authentication()
    {
        $conn = mysqli_connect("localhost", "luis", "", "db_climb");
        if (isset($_COOKIE["userId"]) && isset($_COOKIE["token"]))
        {
            $q_auth = mysqli_query($conn, "SELECT token FROM users WHERE id = $_COOKIE[userId]");
            $row_auth = mysqli_fetch_array($q_auth);
            if (!$row_auth[0] == $_COOKIE["token"])
                unauthorized();
        }
        else
            unauthorized();
    }
        
    function unauthorized()
    {
        echo '<script language="javascript">';
        // echo 'alert("Authentication required. Please signup or login.")';
        echo 'document.cookie = "actualPage=; expires=Thu, 01 Jan 1970 00:00:00 UTC";';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    }
?>