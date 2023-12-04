<?php 
include_once("../connection/Connection.php");

//include_once("../index.php");


/*if(!isset($_SESSION["usuario"])){
    header("Location: ../controller/LoginFormController.php");
}*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My css -->
    <link href="../view/css/style.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap -->
    
    <!-- Icon -->
    <link rel="shortcut icon" href="" type="image/xpng">
    <title>VedruTech</title>
</head>
<body>
    <header>
        
    </header>
    <div class="container my-5" id="employees_container">
        <div class="d-flex flex-wrap gap-4 justify-content-around">
            <?php foreach($employees as $emp): ?>
                <div class="card h-100" style="width: 18rem;">
                    <div class="img-div">
                        <img src="data:image/jpeg;base64,<?=$emp->image; ?>" class="card-img-top" alt="Employee Image">
                    </div>
                    
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title"><?= $emp->emp_name; ?></h5>
                        <p class="card-text"><?= $emp->emp_description; ?></p>
                        <p class="card-text"><?= $emp->job_title; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="container my-5 contact">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="mt-4 mb-4">Contact Us</h3>
                <form action="../model/enviarCorreo.php" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" rows="4" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>