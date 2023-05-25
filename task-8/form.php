<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php
  echo $_SERVER['REQUEST_METHOD'];
  // variable for storing form data
  $first_name = "";
  $last_name = "";
  $mobile_num = "";
  $inputemail = "";
  $hostel = "";
  $branch = "";
  $all_subject = "";
  $address = "";

  //fuction to sanitize data
  function sanitize($field)
  {
    $field = htmlspecialchars($field);
    $field = trim($field);
    $field = stripslashes($field);
    return $field;
  }

  // Execute this code on form submit
  if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $first_name = sanitize($_POST['first_name']);
    $last_name = sanitize($_POST['last_name']);
    $mobile_num = sanitize($_POST['mobile_num']);
    $inputemail = sanitize($_POST['inputemail']);
    $branch = sanitize($_POST['branch']);
    $hostel = ($_POST['hostel']);
    $address = sanitize($_POST['address']);
    $subject = ($_POST['subject']);
    if($subject ==''){
      $subject = $all_subject='No additional subject needed';
    }else{
      $all_subject = implode(',', $subject);
    }

    //validate data
    if (empty($first_name)) {
      $first_name_error = 'first name is needed';
    }

    if (empty($last_name)) {
      $last_name_error = 'last name is needed';
    }

    if (empty($mobile_num)) {
      $mobile_num_error = 'mobile number is needed';
    }

    if (empty($inputemail)) {
      $inputemail_error = 'email is needed';
    }

    if (empty($branch)) {
      $branch_error = 'select branch you like';
    }

    if($hostel === 'yes'){
      $hostel='yes';
    }else if($hostel === 'no'){
      $hostel = 'no';
    }else{
      $hostel =  false;
    }

    if (empty($hostel)) {
      $hostel_error = 'selection needed';
    }

    if (empty($address)) {
      $address_error = 'Address is needed';
    }
  }
  

  //connecting to database
  include('database.php');

  //insert data into database after validate
  if(!empty($first_name && $last_name && $mobile_num  && $inputemail && $branch && $hostel && $address)){
    $sql = "INSERT INTO list (firstname,lastname,mobile,email,branch,hostel,subject,address)   
        VALUES ('$first_name','$last_name','$mobile_num','$inputemail','$branch','$hostel','$all_subject','$address')";

  $result= mysqli_query($conn, $sql);

  //redirecting to display page after successful creation
  if($result){
      header('location:index.php');
      exit();
  }else{
    echo "failed to add student";
  }
  }

  // Close database connection after use
  mysqli_close($conn);

  ?>
  <header class="border-bottom border-dark col-12">
    <nav class="navbar">
      <a href="#" class="navbar-brand px-3">
        <img src="images/logo.png" width="30" height="40" class="" alt="" />
        one school
      </a>
      <img src="images/avatar-11c4b36e81a589c82189b293c33bde43.jpg" width="40" height="40" class="rounded-circle" alt="profile" />
    </nav>
  </header>
  <div class="container-fluid main-container">
    <div class="row main-row">
      <div class="col-md-2 border-end border-dark p-3">
        <ul class="d-flex flex-column ">
          <a href="#" class="py-3" style="text-decoration: none;color: black;"><i class="bi bi-file-person-fill"></i>STUDENT</a>
          <a href="#" class="py-3" style="text-decoration: none;color: black;"><i class="bi bi-person-video3"></i>STAFF</a>
          <a href="#" class="py-3" style="text-decoration: none;color: black;"><i class="bi bi-card-checklist"></i>EXAM</a>
        </ul>
      </div>
      <!-- form container -->
      <div class="col-10 pt-4">
        <h6 style="text-decoration: underline">STUDENT REGISTRATION</h6>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="row needs-validation g-3 py-3" method="post" novalidate>
        <!-- first name -->
          <div class="col-md-6"> 
            <label for="inputfirstname" class="form-label">First name<span class="text-danger">*</span></label>
            <input type="text" name="first_name" class="form-control rounded-0 <?php if (!empty($first_name_error)) {
                                                                        echo 'is-invalid';
                                                                      } ?>" id="inputfirstname" placeholder="Enter Student's first name" required value="<?php echo $first_name; ?>" />
            <div class="invalid-feedback">
              <?php
              if (!empty($first_name_error)) {
                echo $first_name_error;
              } else {
                echo 'first name is required';
              }
              ?>
            </div>
          </div>
          <!-- last name -->
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Last Name <span class="text-danger">*</span></label>
            <input type="text" name="last_name" class="form-control rounded-0 <?php if (!empty($last_name_error)) {
                                                                      echo 'is-invalid';
                                                                    } ?>" id="inputlastname" placeholder="Enter Student's last name" required value="<?php echo $last_name; ?>" />
            <div class="invalid-feedback">
              <?php if (!empty($last_name_error)) {
                echo 'last name is needed';
              } else {
                echo 'last name is required';
              } ?></div>
          </div>
          <!-- mobile number -->
          <div class="col-12 col-md-6">
            <label for="inputmobile" class="form-label">Mobile<span class="text-danger">*</span></label>
            <input type="tel" pattern="[6-9]{1}[0-9]{9}" name="mobile_num" class="form-control rounded-0 <?php if (!empty($mobile_num_error)) {
                                                                      echo 'is-invalid';
                                                                    } ?>" id="inputmobile" placeholder="Enter your Mobile number" required value="<?php echo $mobile_num; ?>" />
            <div class="invalid-feedback">
              <?php if (!empty($mobile_num_error)) {
                echo ' mobile number is needed';
              } else {
                echo 'mobile number is required';
              }
              ?>
            </div>
          </div>
          <!-- email -->
          <div class="col-12 col-md-6">
            <label for="inputemail" class="form-label">E-mail<span class="text-danger">*</span></label>
            <input type="email" name="inputemail" class="form-control rounded-0 <?php if (!empty($inputemail_error)) {
                                                                        echo 'is-invalid';
                                                                      } ?>" id="inputemail" placeholder="Enter your email " required value="<?php echo $inputemail; ?>" />
            <div class="invalid-feedback">
              <?php
              if (!empty($inputemail_error)) {
                echo $inputemail_error;
              } else {
                echo 'email is required';
              }
              ?>
            </div>
          </div>
          <!-- branch -->
          <div class="col-md-6">
            <label for="inputbranch" class="form-label">Branch</label>
            <select id="inputbranch" class="form-select  rounded-0<?php
                                                        if (!empty($branch_error)) {
                                                          echo "is-invalid";
                                                        } ?>" name="branch" value="<?php echo $branch; ?>" required>
              <option selected disabled value="">Choose...</option>
              <option>mech</option>
              <option>civil</option>
              <option>cs</option>
            </select>
            <div class="invalid-feedback">
              <?php
              if (!empty($branch_error)) {
                echo $branch_error;
              } else {
                echo 'branch is required';
              }
              ?>
            </div>
          </div>
          <!-- hostel -->
          <fieldset class="row col-md-6">
            <legend class="col-form-label col-md-6 pt-3">
              Do you need hostel facility:
            </legend>
            <div class="col-sm-10 d-flex">
              <div class="form-check">
                <input class="form-check-input <?php if(!empty($hostel_error)){ echo 'is-invalid'; } ?>" type="radio" name="hostel" id="gridRadios1" value="yes" required />
                <label class="form-check-label" for="gridRadios1">
                  yes
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input <?php if(!empty($hostel_error)){ echo 'is-invalid'; } ?>" type="radio" name="hostel" id="gridRadios2" value="no" required />
                <label class="form-check-label" for="gridRadios2"> No </label>
              </div>
            </div>
          </fieldset>
           <!-- subject  -->
          <div>
            <label for="inputemail" class="form-label">Choose branch you like :</label>
          </div>
          <div class="col-md-12 d-md-flex justify-content-between required">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name='subject[]' value="Cyber security" id="cybersecurity" onclick="return myfun()" />
              <label class="form-check-label" for="cybersecurity">
                Cyber security
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name='subject[]' value="Artificial intelligence" id="artificialintelligence" onclick="return myfun()" />
              <label class="form-check-label" for="artificialintelligence">
                Artificial intelligence
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name='subject[]' value=" IOT" id="iot" onclick="return myfun()" />
              <label class="form-check-label" for="io">
                IOT
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name='subject[]' value="Robotics" id="robotics" onclick="return myfun()" />
              <label class="form-check-label" for="robotics">
                Robotics
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name='subject[]' value="Block chain" id="blockchain" onclick="return myfun()" />
              <label class="form-check-label" for="blockchain">
                Block chain
              </label>
            </div>
          </div>
          <div><span id="notvalid" class="text-danger"></span></div>
          <!-- text-area -->
          <div class="form-group col-8">
            <label for="exampleFormControlTextarea1">Premenent Address<span style="color: red" ;>*</span></label>
            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" name="address"  required><?php echo $address; ?></textarea>
          </div>
          <!-- submit -->
          <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-danger btn-sm">Clear</button>
            <button type="submit" class="btn btn-success btn-sm">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script>
    (function() {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
  </script>
  <script src="data.js"></script>
</body>

</html>