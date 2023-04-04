<?php 
    include('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM tasks WHERE id = $id";

        $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_array($result);
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
        }
    }

    // Aqui validamos si existe el nombre update para actualizar
    if (isset($_POST['update'])){
        $newid = $_GET['id'];
        $newtitle = $_POST['title'];
        $newdescription = $_POST['description'];


        $query = "UPDATE tasks SET title = '$newtitle',description = '$newdescription' WHERE id = $newid";

        $result2 = mysqli_query($conn, $query);

        if (!$result2){
            die ("Error updatind task");
        }
        $_SESSION['message'] = "Task updated successfully";
        $_SESSION['message_type'] = 'success';
        header('location:index.php');

    }
?>

<?php include('include/header.php')?>

<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title?>" placeholder="Update Title">
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" placeholder="Update Description"><?php echo $description?></textarea>
                    </div>

                    <!-- El nombre del button es para luego validar
                         si existe update y actualizar 
                 -->

                    <button class="btn btn-success" name="update" type="submit">Update Tasks</button>

                </form>
            </div>
        </div>
    </div>
</div>


<?php include('include/footer.php')?>