<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<head>
  <style>
    /* Add some styles for the form */
    .section-form {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    /* Da acabados a inputs con border redodeados*/
    .inputs-style-principal {
      display: block;
      width: 100%;
      padding: 0.375rem 0.75rem;
      font-size: 0.75rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    /*resalta el input en que se escribe con sombreado */
    .inputs-style-principal:focus {
      color: #495057;
      background-color: #fff;
      border-color: #5439b6;
      outline: 0;
      box-shadow: 0 0 0 0.25rem rgba(67, 14, 190, 0.25);
    }

    #video {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 105%;
      min-height: 100%;
      transform: translateX(calc((100% - 100vw) / 2));
      z-index: -2;
    }

    form {
      /* padding: 20px;*/
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 2px 2px 10px #ccc;
      background-color: #f2f2f2;
    }

    form h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    form label {
      display: block;
      margin-bottom: 10px;
    }

    form input[type="text"],
    form input[type="email"],
    form input[type="tel"] {
      width: 100%;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    form input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #5439b6;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    form input[type="submit"]:hover {
      background-color: #412d8a;
    }

    form span {
      color: red;
      font-weight: bold;
    }

    .custom-select {
      appearance: none;
      margin-bottom: 20px;
      background-color: #fff;

      font-size: 16px;
    }

    /*Ajustes para responsividad en form*/
    @media (max-width: 575.98px) {
      form {
        width: 60%;
        height: auto;
        padding: 30px;
      }
    }

    @media (min-width: 576px) and (max-width: 767.98px) {
      form {
        padding: 35px;
        width: 50%;
        height: auto;


      }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
      form {
        padding: 35px;
        width: 50%;
        height: auto;
      }
    }

    @media (min-width: 992px) and (max-width: 1399.98px) {
      form {
        padding: 35px;
        width: 30%;
        height: auto;
      }
    }

    @media (min-width: 1400px) {
      form {
        padding: 35px;
        width: 20%;
        height: auto; 
      }
    }

    .grid-form {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-gap: 10px;
    }

    .grid-btn {
      display: grid;
      grid-template-columns: 1fr;
      grid-gap: 10px;
    }

    .content-btn {
      width: 100%;
    }

    .alert-danger {
      padding: 20px;
      background-color: #f44336;
      color: white;
    }

    .alert-succes {
      padding: 20px;
      background-color: #04AA6D;
      color: white;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }

    .footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #333;
      text-align: center;
    }

    .footer p {
      margin: 0;
      text-align: center;
      color: white;
    }

    .footer-links li {
      display: inline-block;

    }

    .footer-div {
      margin: 20px;
    }

    .footer-links li a {
      color: #fff;
      text-decoration: none;
    }
  </style>
  <script>
    // JavaScript function to validate the form fields
    function validateForm() {
      const name = document.forms["subscriptionForm"]["name"].value;
      const surname = document.forms["subscriptionForm"]["surname"].value;
      const email = document.forms["subscriptionForm"]["email"].value;
      const tel = document.forms["subscriptionForm"]["tel"].value;
      const genre = document.forms["subscriptionForm"]["genre"].value;
      const status = document.forms["subscriptionForm"]["status"].value;
      const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      const telRegex = /^\d{10}$/;
      const alertzone = document.getElementById("alertzone");

      if (name == "" || surname == "") {
        alert("Please enter your name and surname");
        return false;
      }

      if (!emailRegex.test(email)) {
        alert("Please enter a valid email address");
        return false;
      }

      if (!telRegex.test(tel)) {
        alert("Please enter a 10-digit phone number");
        return false;
      }

      if (genre == "" || status == "") {
        alert("Please select an option for gender and employee status");
        return false;
      }

      return true;
    }
  </script>
</head>

<body>
  <section class="section-form">
    <div class="video-background">
      <div class="video-foreground">
        <video id="video" autoplay loop muted>
          <source src="videoplayback.mp4" type="video/mp4">
        </video>
      </div>
    </div>
    <!-- Create the form -->

    <form name="subscriptionForm" action="submit.php" method="post" onsubmit="return validateForm()">
      <div id="alertzone">
        <?php if (isset($_GET["e"])) {

        ?>
          <div class="alert-danger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Danger!</strong> I'm sorry, there was an error sending your subscription later.
          </div>
        <?php
        }
        ?>
        <?php if (isset($_GET["s"])) {
        ?>
          <div class="alert-succes">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Success!</strong> Thanks for subscribing
          </div>
        <?php
        }
        ?>

        <?php if (isset($_GET["v"])) {
        ?>

          <div class="alert-succes">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Please Check!</strong> <?php echo base64_decode($_GET["v"]); ?>
          </div>

        <?php
        }
        ?>

      </div>
      <h2>Fill Form and start with ShollTrading</h2>

      <div class="0">
        <div>
          <label for="name">Name:</label>
          <input class="inputs-style-principal" type="text" id="name" name="name" required>
        </div>

        <div>
          <label for="surname">Surname:</label>
          <input class="inputs-style-principal" type="text" id="surname" name="surname" required>
        </div>

      </div>

      <div class="0">
        <div>
          <label for="email">Email:</label>
          <input class="inputs-style-principal" placeholder="example@email.com" type="email" id="email" name="email" required>
        </div>

        <div>

          <label for="email">Phone number:</label>
          <input class="inputs-style-principal" placeholder="" type="tel" id="tel" name="tel" required>
        </div>

      </div>

      <div class="0">
        <div>

          <label for="Genre">Gender:</label>
          <select class="custom-select inputs-style-principal" id="genre" name="genre">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>

        <div>
          <label for="Genre">Employee status:</label>
          <select class="custom-select inputs-style-principal" id="status" name="status">
            <option value="Employee">Employee</option>
            <option value="Unemployed">Unemployed</option>
            <option value="Business Owner">Business Owner</option>
            <option value="Retired">Retired </option>
          </select>
        </div>

      </div>

      <div class="grid-btn">
        <input type="submit" name="submit" value="Subscribe">
      </div>

    </form>
    </div>
  </section>

  <footer class="footer ">
    <div class="">
      <div class="footer-div">
        <p>© 2023 Website</p>
      </div>
    </div>
  </footer>

</body>

</html>