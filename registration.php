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

        if (is_numeric($phonenumber) 
           and preg_match('/[A-Za-z]/', $firstname)
           and preg_match('/[A-Za-z]/', $lastname)
           and strlen($firstname) <= 25 
           and strlen($lastname) <= 25
           and strlen(strval($phonenumber)) <= 12) {

            $sql = "INSERT INTO contact_information (firstname, lastname, phonenumber) VALUES(?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $lastname, $phonenumber]);
            
            if($result){
                echo 'successfully saved';
            }else{
                echo 'error, not saved';
            }
        }
        else 
        { 
            if (!is_numeric($phonenumber)) {
               echo 'Input numbers for phone number.';
            } 
            
            if (!preg_match('/[A-Za-z]/', $firstname)) {
            echo 'Input letters only for first name.';
            }

            if (!preg_match('/[A-Za-z]/', $lastname)) {
                echo 'Input letters only for last name.';
            }

            if (strlen($firstname) > 25){
                echo 'First Name can only be 25 characters.';
            } 

            if (strlen($lastname) > 25){
                echo 'Last Name can only be 25 characters.';
            }

            if (strlen(strval($phonenumber)) > 12) {
                echo 'Maximum length of phone number is 12.';
            }
        }

              
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--script type="text/javascript">
    $(function(){
        //alert('hello.');
        Swal.fire({
            'title': 'Hello World',
            'text':  'This is from Sweetalert2',
            'type':  'Successfully Saved'
        })
    });
</script-->    
</body>
</html>