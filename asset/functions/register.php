<?php
// Include config file
session_start();
if ($_SESSION["loggedIn"] = true) {
                    header("location: index.php");
                }
require_once "dbcon.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Хэрэглэгчийн нэрээ оруулна уу";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM member WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Хэрэглэгчийн нэр бүртгэлтэй байна.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Дахин оролдоно уу.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Нууц үгээ оруулна уу.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Нууц үг багадаа 6 тэмдэгт байна";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Нууц үгээ баталгаажуулна уу.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Нууц үг баталгаажуулалт зөрж байна.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO member (username, password) VALUES ( ?, ?)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                if ($_SESSION["loggedIn"] = false) {
                    header("location: content.php");
                }
                    header("location: login.php");
            } else{
                echo "Дараа дахин оролдоно уу";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
}
?>
 
<!DOCTYPE html>
<html lang="en">

<?php 
require_once 'header.php'; 
 ?>
<body>
    <div class="wrapper">
        <h2>Бүртгүүлэх</h2>
        <p>Доорх мэдээллийг заавал бөглөх шаардлагатай</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Хэрэглэгчийн нэр</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Нууц үг</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Нууц үг баталгаажуулалт</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Бүртгүүлэх">
                <input type="reset" class="btn btn-default" value="Шинэчлэх">
            </div>
            <p>Таньд хэрэглэгчийн эрх байгаа юу? <a href="login.php">Нэвтрэх</a>.</p>
        </form>
    </div>    
</body>
</html>