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
        <h3 class="card-title">Edit Product</h3>
        <form id="updateProductForm" class="mb-5 mx-auto" action="../controller/ProductCrudController.php?id=<?=$idProdEdit?>" method="post">
            <fieldset class="form-row reset p-4 align-items-center border border-0 border-round rounded" id="update-product-card">

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="product_name" class="col-md-2 col-form-label">Product Name:</label>
                    <div class="col-sm-10">
                        <input type="text" id="product_name" class="form-control text-info" name="product_name" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="pro_description" class="col-md-2 col-form-label">Product Description:</label>
                    <div class="col-sm-10">
                        <textarea id="pro_description" class="form-control text-info" name="pro_description" required></textarea>
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="price" class="col-md-2 col-form-label">Price:</label>
                    <div class="col-sm-10">
                        <input type="text" id="price" class="form-control text-info" name="price" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="stock" class="col-md-2 col-form-label">Stock:</label>
                    <div class="col-sm-10">
                        <input type="text" id="stock" class="form-control text-info" name="stock"  required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="x_category_id" class="col-md-2 col-form-label">Category ID:</label>
                    <div class="col-sm-10">
                        <input type="text" id="x_category_id" class="form-control text-info" name="x_category_id" required />
                    </div>
                </div>

                <div class="row g-3 mt-2 d-grid col-6 mx-auto">
                    <input class="btn btn-primary btn-lg button" type="submit" value="Edit Product" name="submit" />
                </div>
                

            </fieldset>
        </form>
    </div>
</body>
</html>