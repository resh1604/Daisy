<?php
session_start();
echo "<pre>";
print_r($_SESSION['user']);

?>


<html>
<body>
    <a href="../view/loginregister/logout.php">logout</a>
</body>

</html>