<?php

require "helpers/helper-functions.php";

session_start();

$birthdate = $_POST['birthdate'];
$sex = $_POST['sex'];
$address = $_POST['address'];


$birthdate = date("F j, Y", strtotime($birthdate));
$year = (date('Y') - date('Y', strtotime($birthdate)));
$_SESSION['birthdate'] = $birthdate;
$_SESSION['sex'] = $sex;
$_SESSION['address'] = $address;
$_SESSION['age'] = $year;

dump_session();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #2</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />   
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <div class="p-section--shallow">
        <h1>
          Registration (Step 3/3)
        </h1>
      </div>
      <div class="p-section--shallow">


        <form action="thank-you.php" method="POST">

          <fieldset>
            <label>Contact Number</label>
            <input type="text" name="contact_number" required placeholder="+639123456789" />

            <label>Program</label>
            <select name="program" required>
              <option disabled="disabled" selected="">Select an option</option>
              <option value="Computer Science">Computer Science</option>
              <option value="Information Technology">Information Technology</option>
              <option value="Information Systems">Information Systems</option>
              <option value="Software Engineering">Software Engineering</option>
              <option value="Data Science">Data Science</option>
            </select>

            <label class="p-checkbox--inline">
            <input type="checkbox" name="agree" required>
            </label>
            I agree to the terms and conditions...
            
            <br />
            <br />

            <button type="submit" class="p-button--positive">Finish</button>
          </fieldset>

        </form>


      </div>

    </div>

    <div class="col">
      <div class="p-image-container--3-2 is-cover">
        <img class="p-image-container__image" src="https://www.auf.edu.ph/home/images/ittc.jpg" alt="">
      </div>
    </div>

  </div>
</section>

</body>
</html>
