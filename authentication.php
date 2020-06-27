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
    
    function admin_authentication()
    {
        $conn = mysqli_connect("localhost", "luis", "", "db_climb");
        if (isset($_COOKIE["userId"]) && isset($_COOKIE["gymAdmId"]) && isset($_COOKIE["token"]))
        {
            $q_adm_auth = mysqli_query($conn, "SELECT users.token FROM users LEFT JOIN gyms ON gyms.userId = users.id WHERE gyms.id = $_COOKIE[gymAdmId]");
            $row_adm_auth = mysqli_fetch_array($q_adm_auth);
            if (!$row_adm_auth[0] == $_COOKIE["token"])
                admin_unauthorized();
        }
        else
            admin_unauthorized();
    }
    
    function new_admin_authentication()
    {
        $conn = mysqli_connect("localhost", "luis", "", "db_climb");
        if (isset($_COOKIE["userId"]))
        {
            $q_new_adm_auth = mysqli_query($conn, "SELECT COUNT(*) FROM gyms WHERE userId = $_COOKIE[userId]");
            $row_new_adm_auth = mysqli_fetch_array($q_new_adm_auth);
            if ($row_new_adm_auth[0] != "0")
                new_admin_unauthorized();
        }
        else
            new_admin_unauthorized();
    }
        
    function unauthorized()
    {
        echo '<script language="javascript">';
        echo 'document.cookie = "actualPage=; expires=Thu, 01 Jan 1970 00:00:00 UTC";';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    }
    
    function admin_unauthorized()
    {
        echo '<script language="javascript">';
        echo 'window.location.href = "gym_signup.php";';
        echo '</script>';
    }
    
    function new_admin_unauthorized()
    {
        echo '<script language="javascript">';
        echo 'window.location.href = "routes.php";';
        echo '</script>';
    }
?>