<?php
$msg = "";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // simple response (no email sending for now)
    $msg = "Message sent successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Contact - CityCare</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
    font-family:Arial;
}

.header{
    background:#2e7d32;
    color:white;
    padding:15px;
    text-align:center;
    font-size:22px;
}

.card{
    margin-top:30px;
    padding:20px;
    border-radius:12px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}
</style>

</head>

<body>

<div class="header">
Contact Us 📞
</div>

<div class="container">

<div class="card">

<h4>Get in Touch</h4>

<p><b>Email:</b> support@citycare.com</p>
<p><b>Helpline:</b> 1800-123-456</p>

<?php if($msg != ""){ ?>
<div class="alert alert-success"><?= $msg ?></div>
<?php } ?>

<form method="post">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Message</label>
<textarea name="message" class="form-control" required></textarea>
</div>

<button type="submit" name="submit" class="btn btn-success">
Send Message
</button>

</form>

</div>

</div>

</body>
</html>