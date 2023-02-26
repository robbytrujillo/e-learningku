<?php
session_unset();
session_destroy();
echo "<meta http-equiv='refresh' content='0; irl=../?open'>";
exit;
?>