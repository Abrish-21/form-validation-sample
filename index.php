<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" href="form.css">
  <style>
.error {color: #FF0000;}
  </style>
</head>

<body>
  <?php
  // define variables and set to empty values
  $nameErr = $emailErr = $genderErr = $countryErr = $birthdateErr = $biographyErr = "";
  $fullname = $email = $gender = $country = $birthdate = $biography = "";
  //name validation=====================================================
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $fullname = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
        $nameErr = "Only letters and white space allowed";
      }
    }

    //Birthdate validation/user should be above 18=======================
//Birthdate validation/user should be above 18=======================
function CalculateAge($birthdate)
{
  $birthdate = DateTime::createFromFormat('Y-m-d', $birthdate); // Corrected date format
  $currentDate = new DateTime();
  $age = $currentDate->diff($birthdate)->y;
  return $age;
}
if (empty($_POST["date"])) {
  $birthdateErr = "Please enter your birthdate";
} else {
  $birthdate = test_input($_POST["date"]);
  // Calculate age and check if user is 18 or older
  $age = CalculateAge($birthdate);
  if ($age < 18) {
    $birthdateErr = "Only users aged 18 and above are allowed!";
  }
 }


    //Email validation=========================================================
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
    //Gender validation=====================================================
    if (empty($_POST["gen"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gen"]);
    }
    //Country validation =====================================================
   
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/", $country)) {
        $countryErr = "Only letters and white space allowed";
      }
      else 
      {
      $country = test_input($_POST["cou"]);
      }
    
    //validation of biography============================================
    if (empty($_POST["bio"])) {
      $biographyErr = "Name is required";
    } else {
      $biography = test_input($_POST["bio"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/", $biography)) {
        $biographyErr = "Only letters and white space allowed";
      }
    }
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>

  <div class="banner">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <h2>user registration</h2>
      <!--Name input format========================================= -->
      <div>
        <label for="name">Full Name*:</label>
        <input minlength="1" maxlength="12" type="text" id="name" name="name">
        <div class="error">* <?php echo $nameErr; ?></div>
      </div>
      <!-- Birthdate input format========================================= -->
      <div>
        <label for="date">Birthdate*:</label>
        <input type="date" id="date" name="date">
        <div class="error"><?php echo $birthdateErr; ?></div>
      </div>
      <!-- Gender input format========================================= -->
      <div>
        <label for="gen">Gender*:</label>
        <div class="gender">
          <label for="gen">Female</label>
          <input class="radio-box" value="female" type="radio" id="gen" name="gen">
          <label for="gen">Male</label>
          <input class="radio-box" value="male" type="radio" id="gen" name="gen">
        </div>
      </div>
      <!-- Country input format========================================= -->
      <div>
        <label for="cou">Country:</label>
        <input maxlength="15" type="text" id="cou" name="cou">
      </div>
      <!--Email input format========================================= -->
      <div>
        <label for="email">Email*:</label>
        <input type="text" id="email" name="email">
        <div class="error">* <?php echo $emailErr; ?></div>
      </div>

      <!-- Biography input format========================================= -->
      <div>
        <label for="bio">Biography:</label>
        <textarea id="bio" name="bio" rows="6" cols="50">enter your biography here</textarea>
      </div>

      <button type="submit">Register</button>
  </form>
  </div>

  <div class="display">
    <?php
      //diplaying the form back to the server=================================
      echo "<p><strong>Full Name:</strong> " . $fullname . "</p>";
      echo "<p><strong>Birthdate:</strong> " . $birthdate . "</p>";
      echo "<p><strong>Gender:</strong> " . $gender . "</p>";
      echo "<p><strong>Country:</strong> " . $country . "</p>";
      echo "<p><strong>Email Address:</strong> " . $email . "</p>";
      echo "<p><strong>Biography:</strong> " . $biography . "</p>";
    
    ?>
  </div>
</body>
  </html>
