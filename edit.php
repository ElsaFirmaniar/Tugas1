
<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    //require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php") ;
    }else{
        $id = $_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
?> 

    <h1 class="text-center">Edit Record</h1>
    
    <form method="post" action ="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>" />
        <div class="container-md">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname']?>" id="firstname" name="firstname">
        </div>
        <div class="container-md">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname']?>" id="lastname" name="lastname">
        </div>
        <div class="container-md">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']?>" id="dob" name="dob">
        </div>
        <div class="container-md">
            <label for="specialty">Area of Experties</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                    <option value="<?php echo $r ['specialty_id'] ?>" <?php if($r['specialty_id'] == 
                    $attendee['specialty_id']) echo 'selected'?>>
                        <?php echo $r['name']; ?>
                    </option>
                <?php }?>
                <option value="2">Database Admin</option>
                <option value="3">Software Developer</option>
                <option value="4">Web Administrator</option>
                <option value="5">Other</option>
            </select>
        </div>
        <div class="container-md">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['email']?>" id="email" name="email" aria-describedby="emailHelp" >
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="container-md">
            <label for="phone" class="form-label">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber']?>" id="phone" name="phone" aria-describedby="phoneHelp" >
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <div class="container-md">
        <a href = "viewrecords.php" class="btn btn-default btn">Back to list</a>
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
        </div>
        </form>
    <?php } ?>
    <br>
    <br>
    <br>
<?php require_once 'includes/footer.php';?> 