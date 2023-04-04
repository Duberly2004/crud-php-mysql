<?php include("db.php")?>

<?php include('./include/header.php')?>

<div class="container p-4">
    <div class="row d-flex">
        <div class="col col-md-4 col-lg-6 col-sm-12 col-12">

        <?php if(isset($_SESSION['message'])){ ?>

            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php session_unset();}?>
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group mb-3">
                        <input class="form-control" name="title" type="text" placeholder="Task title" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="description" rows="2" placeholder="Task description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success col-12" name="save_task" value="Save Task">
                </form>
            </div>
        </div>

        <div class="col">
            <?php
            $query = "SELECT * FROM tasks";
            // Le paso la variable de la conexion y la consulta
            $result_tasks = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($result_tasks)){ ?>
                <div class="card mt-4 border border-primary text-primary ">
                    <div class="card-header bg-primary">
                        <div class="card-title">
                            <h6 class="text-white">Title: <span><?php echo $row['title']?></span></h6>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h6 class="text-start text-dark">Description: <span class="text-primary"><?php echo $row['description']?></span></h6>
                        <h6 class="text-start text-dark">Created At: <span class="text-primary"><?php echo $row['created_at']?></span></h6>

                        <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-primary">
                            <i class="fas fa-marker"></i>
                        </a>
                        <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>
    
<?php include('./include/footer.php')?>
