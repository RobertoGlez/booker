<script> alert("Cerrando Sesion..");</script>

<?

session_start();
session_destroy();
header('location: index.php');

?>