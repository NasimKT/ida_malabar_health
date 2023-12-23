<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational registration form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
        min-height: 100%;
        margin: 0;
        padding: 0;
        font-family: Roboto, Arial, sans-serif;
        font-size: 16px;
        color: #eee;
      }

      body {
        background-size: cover;
        margin: 0;
      }

      h1, h2 {
        text-transform: uppercase;
        font-weight: 400;
      }

      .main-block {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        padding: 25px;
        background: rgba(0, 0, 0, 0.5); 
      }

      .left-part, form {
        padding: 25px;
      }

      .left-part {
        text-align: center;
      }

      .fa-graduation-cap {
        font-size: 72px;
      }

      form {
        background: rgba(0, 0, 0, 0.7); 
        width: 100%;
        max-width: 400px;
      }

      .title {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
      }

      .info {
        display: flex;
        flex-direction: column;
        padding: 20px;
      }

      input, select {
        padding: 10px;
        margin-bottom: 20px;
        background: transparent;
        border: none;
        border-bottom: 1px solid #eee;
        width: 100%;
      }

      input::placeholder {
        color: #eee;
      }

      input.fname {
        color: white;
      }

      option:focus {
        border: none;
      }

      option {
        background: black; 
        border: none;
      }

      .checkbox input {
        margin: 0 10px 0 0;
        vertical-align: middle;
      }

      .checkbox a {
        color: #26a9e0;
      }

      .checkbox a:hover {
        color: #85d6de;
      }

      .btn-item, button {
        padding: 10px 5px;
        margin-top: 20px;
        border-radius: 5px; 
        border: none;
        background: #26a9e0; 
        text-decoration: none;
        font-size: 15px;
        font-weight: 400;
        color: #fff;
        cursor: pointer;
      }

      .btn-item {
        display: inline-block;
        margin: 20px 5px 0;
      }

      button {
        width: 100%;
      }

      button:hover, .btn-item:hover {
        background: #85d6de;
      }

      @media (min-width: 568px) {
        .main-block {
          flex-direction: row;
        }

        .left-part, form {
          flex: 1;
          height: auto;
        }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <!--<i class="fas fa-graduation-cap"></i>-->
        <h1>Registration</h1>
      </div>
      <form action="registrations.php" method="post" enctype="multipart/form-data">
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Register here</h2>
        </div>
        <div class="info">
          <input class="fname" type="text" name="name" placeholder="Name of the clinic" id="name">
          <input type="text" name="email" placeholder="Email" class="fname" id="email">
          <input type="text" name="phone" placeholder="Phone number" class="fname" id="phone">
          <input type="address" name="address" placeholder="Address of clinic" class="fname" id="address">
          <input type="number" name="fl_no" placeholder="Floor number of the clinic" class="fname" id="fl_no">
          <input type="url" name="web" placeholder="Clinic's website address" class="fname" id="web">
          <label for="ramp">Ramp available</label>
          <p>
            <input type="radio" id="rampYes" name="ramp" value="Yes">Yes
          </p>
          <p>
            <input type="radio" id="rampNo" name="ramp" value="No">No
          </p>
          <label for="lift">Lift available</label>
          <p>
            <input type="radio" id="liftYes" name="lift" value="Yes">Yes
          </p>
          <p>
            <input type="radio" id="liftNo" name="lift" value="No">No
          </p>
          </p>
          <input type="file" name="file" id="myFile">
        </div>
        <!--<div class="checkbox">
          <input type="checkbox" name="checkbox"><span>I agree to the <a href="https://www.w3docs.com/privacy-policy">Privacy Policy for W3Docs.</a></span>
        </div>-->
        <button type="submit">Submit</button>
      </form>
    </div>
  </body>
</html>
