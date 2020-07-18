<?php
    function user_authentication()
    {
        if (isset($_COOKIE["userId"]) && isset($_COOKIE["token"]))
        {
            $conn = mysqli_connect("localhost", "luis", "", "db_climb");
            $q_auth = mysqli_query($conn, "SELECT token FROM users WHERE id = $_COOKIE[userId]");
            $row_auth = mysqli_fetch_array($q_auth);
            if ($row_auth[0] == $_COOKIE["token"])
                return 1;
            else
                return 0;
        }
        else
            return 0;
    }
    
    function gym_climb_authentication()
    {
        if (isset($_COOKIE["gymClimbId"]))
        {
            $conn = mysqli_connect("localhost", "luis", "", "db_climb");
            $q_gym_climb_auth = mysqli_query($conn, "SELECT COUNT(*) FROM gyms WHERE id = $_COOKIE[gymClimbId]");
            $row_gym_climb_auth = mysqli_fetch_array($q_gym_climb_auth);
            if ($row_gym_climb_auth[0] != "0")
                return 1;
            else
                return 0;
        }
        else
            return 0;        
    }

    function admin_authentication()
    {
        if (isset($_COOKIE["userId"]) && isset($_COOKIE["gymAdmId"]) && isset($_COOKIE["token"]))
        {
            $conn = mysqli_connect("localhost", "luis", "", "db_climb");
            $q_adm_auth = mysqli_query($conn, "SELECT users.token FROM users LEFT JOIN gyms ON gyms.userId = users.id WHERE gyms.id = $_COOKIE[gymAdmId]");
            $row_adm_auth = mysqli_fetch_array($q_adm_auth);
            if ($row_adm_auth[0] == $_COOKIE["token"])
                return 1;
            else
                return 0;
        }
        else
            return 0;
    }

    function new_admin_authentication()
    {
        if (isset($_COOKIE["userId"]))
        {
            $conn = mysqli_connect("localhost", "luis", "", "db_climb");
            $q_new_adm_auth = mysqli_query($conn, "SELECT COUNT(*) FROM gyms WHERE userId = $_COOKIE[userId]");
            $row_new_adm_auth = mysqli_fetch_array($q_new_adm_auth);
            if ($row_new_adm_auth[0] == "0")
                return 1;
            else
                return 0;
        }
        else
            return 0;
    }

    function logout()
    {
        if (user_authentication())
        {
            $token = rand(1000, 9999);
		    $conn = mysqli_connect("localhost", "luis", "", "db_climb");
		    mysqli_query($conn, "UPDATE users SET token = '$token' WHERE id = '$_COOKIE[userId]'");
            // setcookie("userId", "", time() - 3600);
        }

        echo '<script language="javascript">
			document.cookie = "userId=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "userName=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "gymAdmId=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "gymAdmName=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "gymClimbId=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "gymClimbName=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "displayAllRoutes=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "removeClimb=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "removeRoute=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "activateRoute=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "inactivateRoute=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "logout=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "actualPage=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
			document.cookie = "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
            </script>';
    }
    
    function relocate($page)
    {
        echo "<script language='javascript'>
        window.location.href = '$page';
        </script>";
    }
?>