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
      const country = document.forms["subscriptionForm"]["country"].value;

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

      if (country == "") {
        alert("Please select an option for country");
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

          <div class="alert-danger">
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

      <div class="0">
        <div>
          <label for="Genre">Country:</label>
          <select name="country" id="country" required class="custom-select inputs-style-principal">
              <option value="Afghanistan">Afghanistan</option>
              <option value="Albania">Albania</option>
              <option value="Algeria">Algeria</option>
              <option value="Andorra">Andorra</option>
              <option value="Angola">Angola</option>
              <option value="Antigua and Barbuda">Antigua and Barbuda</option>
              <option value="Argentina">Argentina</option>
              <option value="Armenia">Armenia</option>
              <option value="Australia">Australia</option>
              <option value="Austria">Austria</option>
              <option value="Azerbaijan">Azerbaijan</option>
              <option value="Bahamas">Bahamas</option>
              <option value="Bahrain">Bahrain</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Barbados">Barbados</option>
              <option value="Belarus">Belarus</option>
              <option value="Belgium">Belgium</option>
              <option value="Belize">Belize</option>
              <option value="Benin">Benin</option>
              <option value="Bhutan">Bhutan</option>
              <option value="Bolivia">Bolivia</option>
              <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
              <option value="Botswana">Botswana</option>
              <option value="Brazil">Brazil</option>
              <option value="Brunei">Brunei</option>
              <option value="Bulgaria">Bulgaria</option>
              <option value="Burkina Faso">Burkina Faso</option>
              <option value="Burundi">Burundi</option>
              <option value="Cabo Verde">Cabo Verde</option>
              <option value="Cambodia">Cambodia</option>
              <option value="Cameroon">Cameroon</option>
              <option value="Canada">Canada</option>
              <option value="Central African Republic">Central African Republic</option>
              <option value="Chad">Chad</option>
              <option value="Chile">Chile</option>
              <option value="China">China</option>
              <option value="Colombia">Colombia</option>
              <option value="Comoros">Comoros</option>
              <option value="Congo, Republic of the">Congo, Republic of the</option>
              <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
              <option value="Costa Rica">Costa Rica</option>
              <option value="Cote d'Ivoire">Cote d'Ivoire</option>
              <option value="Croatia">Croatia</option>
              <option value="Cuba">Cuba</option>
              <option value="Cyprus">Cyprus</option>
              <option value="Czech Republic">Czech Republic</option>
              <option value="Denmark">Denmark</option>
              <option value="Djibouti">Djibouti</option>
              <option value="Dominican Republic">Dominican Republic</option>
              <option value="Ecuador">Ecuador</option>
              <option value="Egypt">Egypt</option>
              <option value="El Salvador">El Salvador</option>
              <option value="Equatorial Guinea">Equatorial Guinea</option>
              <option value="Eritrea">Eritrea</option>
              <option value="Estonia">Estonia</option>
              <option value="Eswatini">Eswatini</option>
              <option value="Ethiopia">Ethiopia</option>
              <option value="Fiji">Fiji</option>
              <option value="Finland">Finland</option>
              <option value="France">France</option>
              <option value="Gabon">Gabon</option>
              <option value="Gambia">Gambia</option>
              <option value="Georgia">Georgia</option>
              <option value="Germany">Germany</option>
              <option value="Ghana">Ghana</option>
              <option value="Greece">Greece</option>
              <option value="Grenada">Grenada</option>
              <option value="Guatemala">Guatemala</option>
              <option value="Guinea">Guinea</option>
              <option value="Guinea-Bissau">Guinea-Bissau</option>
              <option value="Guyana">Guyana</option>
              <option value="Haiti">Haiti</option>
              <option value="Honduras">Honduras</option>
              <option value="Hungary">Hungary</option>
              <option value="Iceland">Iceland</option>
              <option value="India">India</option>
              <option value="Indonesia">Indonesia</option>
              <option value="Iran">Iran</option>
              <option value="Iraq">Iraq</option>
              <option value="Ireland">Ireland</option>
              <option value="Israel">Israel</option>
              <option value="Italy">Italy</option>
              <option value="Jamaica">Jamaica</option>
              <option value="Japan">Japan</option>
              <option value="Jordan">Jordan</option>
              <option value="Kazakhstan">Kazakhstan</option>
              <option value="Kenya">Kenya</option>
              <option value="Kiribati">Kiribati</option>
              <option value="Kosovo">Kosovo</option>
              <option value="Kuwait">Kuwait</option>
              <option value="Kyrgyzstan">Kyrgyzstan</option>
              <option value="Laos">Laos</option>
              <option value="Latvia">Latvia</option>
              <option value="Lebanon">Lebanon</option>
              <option value="Lesotho">Lesotho</option>
              <option value="Liberia">Liberia</option>
              <option value="Libya">Libya</option>
              <option value="Liechtenstein">Liechtenstein</option>
              <option value="Lithuania">Lithuania</option>
              <option value="Luxembourg">Luxembourg</option>
              <option value="Madagascar">Madagascar</option>
              <option value="Malawi">Malawi</option>
              <option value="Malaysia">Malaysia</option>
              <option value="Maldives">Maldives</option>
              <option value="Mali">Mali</option>
              <option value="Malta">Malta</option>
              <option value="Marshall Islands">Marshall Islands</option>
              <option value="Mauritania">Mauritania</option>
              <option value="Mauritius">Mauritius</option>
              <option value="Mexico">Mexico</option>
              <option value="Micronesia">Micronesia</option>
              <option value="Moldova">Moldova</option>
              <option value="Monaco">Monaco</option>
              <option value="Mongolia">Mongolia</option>
              <option value="Montenegro">Montenegro</option>
              <option value="Morocco">Morocco</option>
              <option value="Mozambique">Mozambique</option>
              <option value="Myanmar (Burma)">Myanmar (Burma)</option>
              <option value="Namibia">Namibia</option>
              <option value="Nauru">Nauru</option>
              <option value="Nepal">Nepal</option>
              <option value="Netherlands">Netherlands</option>
              <option value="New Zealand">New Zealand</option>
              <option value="Nicaragua">Nicaragua</option>
              <option value="Niger">Niger</option>
              <option value="Nigeria">Nigeria</option>
              <option value="North Korea">North Korea</option>
              <option value="North Macedonia">North Macedonia</option>
              <option value="Norway">Norway</option>
              <option value="Oman">Oman</option>
              <option value="Pakistan">Pakistan</option>
              <option value="Palau">Palau</option>
              <option value="Panama">Panama</option>
              <option value="Papua New Guinea">Papua New Guinea</option>
              <option value="Paraguay">Paraguay</option>
              <option value="Peru">Peru</option>
              <option value="Philippines">Philippines</option>
              <option value="Poland">Poland</option>
              <option value="Portugal">Portugal</option>
              <option value="Qatar">Qatar</option>
              <option value="Romania">Romania</option>
              <option value="Russia">Russia</option>
              <option value="Rwanda">Rwanda</option>
              <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
              <option value="Saint Lucia">Saint Lucia</option>
              <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
              <option value="Samoa">Samoa</option>
              <option value="San Marino">San Marino</option>
              <option value="Sao Tome and Principe">Sao Tome and Principe</option>
              <option value="Saudi Arabia">Saudi Arabia</option>
              <option value="Senegal">Senegal</option>
              <option value="Serbia">Serbia</option>
              <option value="Seychelles">Seychelles</option>
              <option value="Sierra Leone">Sierra Leone</option>
              <option value="Singapore">Singapore</option>
              <option value="Slovakia">Slovakia</option>  
              <option value="Slovenia">Slovenia</option>
              <option value="Solomon Islands">Solomon Islands</option>
              <option value="Somalia">Somalia</option>
              <option value="South Africa">South Africa</option>
              <option value="South Korea">South Korea</option>
              <option value="South Sudan">South Sudan</option>
              <option value="Spain">Spain</option>
              <option value="Sri Lanka">Sri Lanka</option>
              <option value="Sudan">Sudan</option>
              <option value="Suriname">Suriname</option>
              <option value="Sweden">Sweden</option>
              <option value="Switzerland">Switzerland</option>
              <option value="Syria">Syria</option>
              <option value="Taiwan">Taiwan</option>
              <option value="Tajikistan">Tajikistan</option>
              <option value="Tanzania">Tanzania</option>
              <option value="Thailand">Thailand</option>
              <option value="Timor-Leste">Timor-Leste</option>
              <option value="Togo">Togo</option>
              <option value="Tonga">Tonga</option>
              <option value="Trinidad and Tobago">Trinidad and Tobago</option>
              <option value="Tunisia">Tunisia</option>
              <option value="Turkey">Turkey</option>
              <option value="Turkmenistan">Turkmenistan</option>
              <option value="Tuvalu">Tuvalu</option>
              <option value="Uganda">Uganda</option>
              <option value="Ukraine">Ukraine</option>
              <option value="United Arab Emirates">United Arab Emirates</option>
              <option value="United Kingdom (UK)">United Kingdom (UK)</option>
              <option value="United States of America (USA)">United States of America (USA)</option>
              <option value="Uruguay">Uruguay</option>
              <option value="Uzbekistan">Uzbekistan</option>
              <option value="Vanuatu">Vanuatu</option>
              <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
              <option value="Venezuela">Venezuela</option>
              <option value="Vietnam">Vietnam</option>
              <option value="Yemen">Yemen</option>
              <option value="Zambia">Zambia</option>
              <option value="Zimbabwe">Zimbabwe</option>
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