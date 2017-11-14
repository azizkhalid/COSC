<?php
require_once('../app/core/utils.php');

if (isset($_SESSION['auth']) == 1) {
    header('Location: /home');
}
?>

<!DOCTYPE html>
<html lang="en">
    <link href= "<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <title>COSC 4806</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    



<link rel="stylesheet" href="../../../public/w3css.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Oswald:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
<link href="../../../public/w3css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="login">
<div align="center">
<p>public header<img src="../../../public/images/logo1.png"  style="margin-left:10; margin-top:5px; width:250px; height:100px" /></p>
                </div>
      
 <br />
 
 </div>
</body>
</html>