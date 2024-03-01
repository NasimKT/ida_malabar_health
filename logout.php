<?php
session_start();

unset($_SESSION['user']);

echo '
<script>
function redirect(){
window.location.href = "index.php";
}
redirect();
</script>
';

?>