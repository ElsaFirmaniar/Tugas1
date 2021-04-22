
<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?> 
    <br>
    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action ="success.php">
        <div class="container-md">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <br>
        <div class="container-md">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <br>
        <div class="container-md">
            <label for="dob">Date of Birth</label>
            <input required type="text" class="form-control" id="dob" name="dob">
        </div>
        <br>
        <div class="container-md">
            <label for="specialty">Area of Experties</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){?>
                    <option value="<?php echo $r ['specialty_id'] ?>"<?php echo $r['name'];  ?></option>
                <?php }?>
                <option value="2">Database Admin</option>
                <option value="3">Software Developer</option>
                <option value="4">Web Administrator</option>
                <option value="5">Other</option>
            </select>
        </div>
        <br>
        <div class="container-md">
            <label for="email" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" >
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <br>
        <div class="container-md">
            <label for="phone" class="form-label">Contact Number</label>
            <input requiered type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" >
            <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
        </div>
        <br>
        <div class="custom-file container-md">
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="avatar"></label>
            <small id="avatar" class="form-text text-danger"><br>File upload is optional</small>
        </div>
        <br>
        <div class = "container-md">
        <button type="submit" name="submit" class="btn btn-primary btn-md">Submit</button>
        </div>
    </form>
    <br>
    <br>
    <br>
<?php require_once 'includes/footer.php';?> 