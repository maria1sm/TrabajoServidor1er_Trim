<?php 

if(!($admin)){
    header("Location: ../controller/LoginFormController.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My css -->
    <link href="../view/css/style.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap -->
    
    <link rel="shortcut icon" href="" type="image/xpng">
    <title>VedruTech</title>
</head>
<body>
    <div id="update" class="container">
        <h3 class="card-title">Edit Service</h3>
        <form id="updateServiceForm" class="mb-5 mx-auto" action="../controller/ServiceCrudController.php?id=<?=$idServEdit?>" method="post">
            <fieldset class="form-row reset p-4 align-items-center border border-0 border-round rounded" id="update-service-card">

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="service_name" class="col-md-2 col-form-label">Service Name:</label>
                    <div class="col-sm-10">
                        <input type="text" id="service_name" class="form-control text-info" name="service_name" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="serv_description" class="col-md-2 col-form-label">Service Description:</label>
                    <div class="col-sm-10">
                        <textarea id="serv_description" class="form-control text-info" name="serv_description" required></textarea>
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="serv_price" class="col-md-2 col-form-label">Price:</label>
                    <div class="col-sm-10">
                        <input type="text" id="serv_price" class="form-control text-info" name="serv_price" required />
                    </div>
                </div>
                <div class="row g-3 mt-2 d-grid col-6 mx-auto">
                    <input class="btn btn-primary btn-lg button" type="submit" value="Edit Service" name="submit" />
                </div>
                

            </fieldset>
        </form>
    </div>
</body>
</html>