<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student View</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <?php

  echo $_SERVER['REQUEST_METHOD'];
  
  include('database.php');

  if (isset($_GET['viewid'])) {
    $id = mysqli_real_escape_string($conn,$_GET['viewid']) ;
    $query="SELECT * FROM list WHERE id='$id' ";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        $student = mysqli_fetch_array($result);
        $all_sub = $student['subject'];
        $sub = explode(",",$all_sub);
    }
}
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
                <h6 style="text-decoration: underline">STUDENT VIEW</h6>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" class="row needs-validation g-3 py-3" method="post" novalidate>
                    <!-- first name -->
                    <div class="col-md-6">
                        <label for="inputfirstname" class="form-label">First name :</label>
                        <input type="text" name="first_name" class="form-control rounded-0 <?php if (!empty($first_name_error)) {
                                                                                                echo 'is-invalid';
                                                                                            } ?>" id="inputfirstname" placeholder="Enter Student's first name" disabled readonly value="<?php echo $student['firstname']; ?>" />
                  
                    </div>
                    <!-- last name -->
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Last Name :</label>
                        <input type="text" name="last_name" class="form-control rounded-0 <?php if (!empty($last_name_error)) {
                                                                                                echo 'is-invalid';
                                                                                            } ?>" id="inputlastname" placeholder="Enter Student's last name" disabled readonly value="<?php echo $student['lastname']; ?>" />
                        
                    </div>
                    <!-- mobile number -->
                    <div class="col-12 col-md-6">
                        <label for="inputmobile" class="form-label">Mobile :</label>
                        <input type="tel" pattern="[6-9]{1}[0-9]{9}" name="mobile_num" class="form-control rounded-0 <?php if (!empty($mobile_num_error)) {
                                                                                                                            echo 'is-invalid';
                                                                                                                        } ?>" id="inputmobile" placeholder="Enter your Mobile number" disabled readonly value="<?php echo $student['mobile'];  ?>" />
                      
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="inputemail" class="form-label">E-mail :</label>
                        <input type="email" name="inputemail" class="form-control rounded-0 <?php if (!empty($inputemail_error)) {
                                                                                                echo 'is-invalid';
                                                                                            } ?>" id="inputemail" placeholder="Enter your email " disabled readonly value="<?php echo $student['email']; ?>" />
                    
                    </div>
                    <!-- branch -->
                    <div class="col-md-6">
                        <label for="inputbranch" class="form-label">Branch</label>
                        <select id="inputbranch" class="form-select  rounded-0<?php
                                                                                if (!empty($branch_error)) {
                                                                                    echo "is-invalid";
                                                                                } ?>" name="branch" value="<?php echo $student['branch']; ?>" disabled readonly>
                            <option  disabled value="">Choose...</option>
                            <option <?php if($student['branch'] == 'mech'){echo 'selected';}else{'';}; ?>>mech</option>
                            <option <?php if($student['branch'] == 'civil'){echo 'selected';}else{'';}; ?>>civil</option>
                            <option <?php if($student['branch'] == 'cs'){echo 'selected';}else{'';}; ?>>cs</option>
                        </select>
                    </div>
                    <!-- hostel -->
                    <fieldset class="row col-md-6">
                        <legend class="col-form-label col-md-6 pt-3">
                            Do you need hostel facility:
                        </legend>
                        <div class="col-sm-10 d-flex">
                            <div class="form-check">
                                <input class="form-check-input <?php if (!empty($hostel_error)) {
                                                                    echo 'is-invalid';
                                                                } ?>" type="radio" name="hostel" id="gridRadios1" value="yes" disabled readonly <?php if($student['hostel'] == 'yes'){echo 'checked';}else{'';} ?> />
                                <label class="form-check-label" for="gridRadios1">
                                    yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input <?php if (!empty($hostel_error)) {
                                                                    echo 'is-invalid';
                                                                } ?>" type="radio" name="hostel" id="gridRadios2" value="no" disabled readonly <?php if($student['hostel'] == 'no'){echo 'checked';}else{'';} ?>/>
                                <label class="form-check-label" for="gridRadios2"> No </label>
                            </div>
                        </div>
                    </fieldset>
                    <!-- subject -->
                    <div>
                        <label for="inputemail" class="form-label">Choose branch you like :</label>
                    </div>
                    <div class="col-md-12 d-md-flex justify-content-between required">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name='subject[]' value="Cyber security" id="cybersecurity" onclick="return myfun()" <?php if(in_array('Cyber security',$sub)){echo 'checked';}else{'';} ?>  readonly/>
                            <label class="form-check-label" for="cybersecurity">
                                Cyber security
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name='subject[]' value="Artificial intelligence" id="artificialintelligence" onclick="return myfun()" <?php if(in_array('Artificial intelligence',$sub)){echo 'checked';}else{'';} ?> readonly/>
                            <label class="form-check-label" for="artificialintelligence">
                                Artificial intelligence
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name='subject[]' value="IOT" id="iot" onclick="return myfun()" <?php if(in_array('IOT',$sub)){echo 'checked';}else{'';} ?> readonly />
                            <label class="form-check-label" for="io">
                                IOT
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name='subject[]' value="Robotics" id="robotics" onclick="return myfun()" <?php if(in_array('Robotics',$sub)){echo 'checked';}else{'';} ?> readonly/>
                            <label class="form-check-label" for="robotics">
                                Robotics
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name='subject[]' value="Block chain" id="blockchain" onclick="return myfun()" <?php if(in_array('Block chain',$sub)){echo 'checked';}else{'';} ?> readonly/>
                            <label class="form-check-label" for="blockchain">
                                Block chain
                            </label>
                        </div>
                    </div>
                    <!-- address -->
                    <div class="form-group col-8">
                        <label for="exampleFormControlTextarea1">Premenent Address :</label>
                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" name="address" disabled readonly><?php echo $student['address']; ?></textarea>
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