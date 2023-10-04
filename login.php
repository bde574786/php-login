 <?php
session_start();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// 사용자가 이미 로그인된 상태인지 확인
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    if (isset($_GET['username']) && isset($_GET['password'])) {
        $username = $_GET['username'];
        $password = $_GET['password'];

        $validUsername = "admin";
        $validPassword = "password";

        if ($username == $validUsername && $password == $validPassword) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo "Welcome! but this site has NOT data :( just Enjoy!";
        } else {
            echo "Login Failed";
        }
    } else {
        echo '<form action="login.php" method="get">
                Username: <input type="text" name="username" required><br>
                Password: <input type="password" name="password" required><br>
                <input type="submit" value="Login">
              </form>';
    }
} else {
    echo "이미 로그인 되어 있습니다. <a href='login.php?action=logout'>로그아웃</a>";
}
?>
