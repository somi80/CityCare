<?php
include("../config/db.php");

$msg = "";

if(isset($_POST['submit'])){
    $message = $_POST['message'];

    mysqli_query($conn, "INSERT INTO notifications(message) VALUES('$message')");
    $msg = "Notification Sent!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Send Notification</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h3>Send Notification </h3>

<?php if($msg != ""){ ?>
<div class="alert alert-success"><?= $msg ?></div>
<?php } ?>

<form method="post">

<textarea name="message" class="form-control mb-3" required></textarea>

<button name="submit" class="btn btn-warning">Send</button>

</form>

</body>
</html>