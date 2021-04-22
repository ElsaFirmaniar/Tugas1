<?php 
    $title = 'Success';
    require_once 'includes/header.php';
    //require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    // require_once 'sendemail.php';

    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty);
        $specialtyName = $crud->getSpecialtyById($specialty);
        //$orig_file = $_FILES["avatar"]["tmp_name"];
        //$ext = pathinfo($_FILES["avatar"]["tmp_name"], PATHINFO_EXTENSION);
        //$target_dir = 'uploads/';
        //$destination = "$target_dir$contact.$ext";
        //move_uploaded_file($orig_file, $destination);
        
        //exit();

        if ($isSuccess){
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?> 
    <!--
    <h1 class = "text-center text-success">You Have Been Registered! </h1>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstname'] . ' ' .  $_GET['lastname']?></h5>
            <h6 class = "card-subtitle mb-2 text-muted">
                <?php //echo $_GET['specialty'];?>
            </h6>
            <p class="card-text">
                Date of Birth: <?php //echo $_GET['dob']; ?>
            </p>
            <p class="card-text">
                Email: <?php //echo $_GET['email']; ?>
            </p>
            <p class="card-text">
                Contact: <?php //echo $_GET['phone']; ?>
            </p>
            
        </div>
    </div> -->
    <div class="container-md">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . ' ' .  $_POST['lastname']?></h5>
            <h6 class = "card-subtitle mb-2 text-muted">
                <?php echo $specialtyName['name'];?>
            </h6>
            <p class="card-text">
                Date of Birth: <?php echo $_POST['dob']; ?>
            </p>
            <p class="card-text">
                Email: <?php echo $_POST['email']; ?>
            </p>
            <p class="card-text">
                Contact: <?php echo $_POST['phone']; ?>
            </p>
            
        </div>
    </div>
    <!--
    <?php
        //echo $_GET['firstname'];
        //echo $_GET['lastname'];
        //echo $_GET['dob'];
        //echo $_GET['specialty'];
        //echo $_GET['email'];
        //echo $_GET['phone'];
    ?>
    -->
<br>
<br>
<br>
<?php require_once 'includes/footer.php';?> 