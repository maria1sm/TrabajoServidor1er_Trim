<?php 

if(!isset($user)){
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
    <title>Edit Profile</title>
</head>
<body>
    <div id="update" class="container">
        <h3 class="card-title">Edit User</h3>
        <form id="updateForm" class="mb-5 mx-auto" action="../controller/EditUserController.php" method="post">
            <fieldset class="form-row reset p-4 align-items-center border border-0 border-round rounded"
                id="register-card">
                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="username" class="col-md-2 col-form-label">Username:</label>
                    <div class="col-sm-10">
                        <input type="text" id="username" class="form-control text-info" name="username" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="mail" class="col-md-2 col-form-label">Email:</label>
                    <div class="col input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="email" id="mail" class="form-control text-info" name="mail"
                            pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="password" class="col-md-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" id="password" class="form-control text-info" name="password" required
                            title="Debe contener al menos un número y una mayúscula y una minúscula, y al menos 8 o más carácteres" />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="address" class="col-md-2 col-form-label">Address:</label>
                    <div class="col-sm-10">
                        <input type="text" id="address" class="form-control text-info" name="address" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="country" class="col-md-2 col-form-label">Country:</label>
                    <div class="col-sm-10">
                        <input type="text" id="country" class="form-control text-info" name="country" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="phone" class="col-md-2 col-form-label">Phone:</label>
                    <div class="col-sm-10">
                        <input type="tel" id="phone" class="form-control text-info" name="phone" required />
                    </div>
                </div>

                <div class="row g-3 mt-2  d-grid col-6 mx-auto">
                    <input  class="btn btn-primary btn-lg button" type="submit" value="Edit User" name="submit"/>
                </div>

            </fieldset>
        </form>
    </div>
</body>
</html>