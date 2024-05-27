<?php
session_start();
if(isset($_SESSION['userid']) && $_SESSION['level'] == 2)
{
    if(isset($_POST['adduser']))
    {
        $u = $p = "";
        if(empty($_POST['username']))
        {
            echo "Vui lòng nhập username<br />";
        }
        else
        {
            $u = $_POST['username'];
        }
        if($_POST['password'] != $_POST['re-password'])
        {
            echo "Password và re-password không khớp<br />";
        }
        else
        {
            if(empty($_POST['password']))
            {
                echo "Vui lòng nhập password<br />";
            }
            else
            {
                $p = $_POST['password'];
            }
        }
        $l = $_POST['level'];
        if($u && $p && $l)
        {
            $conn = mysqli_connect("localhost", "root", "root", "project");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM user WHERE username='".$u."'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0)
            {
                echo "Username này đã tồn tại<br />";
            }
            else
            {
                $sql2 = "INSERT INTO user(username,password,level) VALUES ('$u','$p','$l')";
                if (mysqli_query($conn, $sql2)) {
                    echo "Thêm thành viên mới thành công";
                } else {
                    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                }
            }
            mysqli_close($conn);
        }
    }
}
?>
<form action='add_user.php' method='POST'>
Level: <select name='level'>
<option value='1'>Member</option>
<option value='2'>Admin</option>
</select><br />
Username: <input type='text' name='username' size='25' /><br />
Password: <input type='password' name='password' size='25' /> <br />
Re-Password: <input type='password' name='re-password' size='25' /><br />
<input type='submit' name='adduser' value='Add New User' />
</form>

