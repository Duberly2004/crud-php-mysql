<?php 
    include('db.php');
    
    // GET es para recibir datos 
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM tasks WHERE id = $id";
        $result = mysqli_query($conn,$query);

        if (!$result){
            die('Error to delete tasks');
        }
        
        $_SESSION['message'] = 'Task deleted successfully';
        $_SESSION['message_type'] = 'success';

        header('location: index.php');
    }
    echo 'no existe';
?>