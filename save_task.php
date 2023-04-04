<?php

// Llamamos a la conexion a la base de datos mysql
include("db.php");

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO tasks (title,description) VALUES ('$title','$description')";

    $result = mysqli_query($conn,$query);

    if(!$result){
        die("Query Faild");
    }

    // Este mensage se guardara en la sesion 
    $_SESSION['message'] = 'Task created successfully.';
    $_SESSION['message_type'] = 'success';


    // Esto es para redireccionar cuando se guarte la tarea a otra pagina 
    header("Location:index.php");
}
?>