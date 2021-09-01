<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store/Retrieve Data Using PHP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"
</head>
<body>
<div>
    <?php
    if(isset($_POST['create'])){
       /* TODO -- error checking */
        $firstname   = $_POST['firstname'];
        $lastname    = $_POST['lastname'];
        $phonenumber = $_POST['phonenumber'];

        $sql = "INSERT INTO contact_information (firstname, lastname, phonenumber) VALUES(?,?,?)";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$firstname, $lastname, $phonenumber]);

        if($result){
            echo 'successfully saved';
        }else{
            echo 'error, not saved';
        }
        /* TESTING 
        echo $firstname. " " . $lastname . " " . $phonenumber ;
        echo 'successfully saved';
        */
        /* TODO -- I want this echo to be a message by the save button */
    }
    
    /* TODO -- RETRIEVE FROM DATABASE */

    ?>
</div>
<div>
    <form action="registration.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Store/Retrieve Contacts
                    </h1>
                    <p>This data will be stored in a database.</p>
                    <hr class="mb-3">
                    
                    <label for="firstname"><b>First Name</b></label>
                    <input class="form-control" type="text" name="firstname" required>

                    <label for="lastname"><b>Last Name</b></label>
                    <input class="form-control" type="text" name="lastname" required>

                    <label for="phonenumber"><b>Phone Number</b></label>
                    <input class="form-control" type="text" name="phonenumber" required>
                    <hr class="mb-3">
                    <input class="btn btn-primary" class type="submit" name="create" value="Save">
                    <!-- TODO -- input class="btn btn-primary" class type="submit" name="create" value="Retrieve"-->
                </div>    
            </div>
        </div>
    </form>

</div>

</body>
</html>