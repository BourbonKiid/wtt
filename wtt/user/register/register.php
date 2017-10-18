<?php include($_SERVER['DOCUMENT_ROOT'].'/wtt/css/link.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

<script type="text/javascript">
function validateForm() {
        var email = document.forms["myForm"]["email"].value;
        var username = document.forms["myForm"]["username"].value;
        var password = document.forms["myForm"]["password"].value;
        var password2 = document.forms["myForm"]["password2"].value;
        var reg =/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var usernamereg = /^[a-zA-Z0-9]+$/;

        if (!usernamereg.test(username)) {
            alert("Username only alphanumeric (A-Z and 1-9)");
            return false;
        }

        if(username.length < 6){
            alert("Username must have at least 6 charackters");
            return false;
        }
        
        if(password.length < 6){
            alert("password must have at least 6 characters");
            return false;
        }

        if (password2 != password) {
            alert("Passwords are different");
        }

        if (!reg.test(email)) {
            alert("Invalid email-address");
            return false;
        }

    }
</script>

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'].'/wtt/nav/user_nav.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="register">
                    <form name="myForm" action="/wtt/user/register/registersave.php" method="post" onsubmit="return validateForm()">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="firstname">Firstname: </label>
                                    <input type="text" name="firstname">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="lastname">Lastname: </label>
                                    <input type="text" name="lastname">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="email">*E-Mail: </label>
                                    <input type="email" name="email" required="required">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="username">*Username: </label>
                                    <input type="text" name="username" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="password">*Password: </label>
                                    <input type="password" name="password" required="required">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="password2">*Repeat password: </label>
                                    <input type="password" name="password2" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="country">*Kategorie:</label>
                                    <select name="country" id="dropdown_register" class="seleFirst" onchange="colorSet()" required="required">
                                        <option value="" disabled selected hidden>Kategorien</option>
                                        <?php
                                        require_once($_SERVER['DOCUMENT_ROOT'].'/wtt/db/database.php');           
                                            foreach($db->query('SELECT * FROM countries;') as $row) {
                                                $cat = $row["idcountry"];
                                                $country = $row["country_name"];
                                                $country_short = $row["country_code"];
                                                echo "<option value=" . $cat . ">$country_short - $country</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="bday">*Date of birth: </label>
                                    <input type="date" name="bday" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <button class="btn btn-default registerbtn" onclick="location.replace(document.referrer)">Abbrechen</button>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-default registerbtn" value="Submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div>
</body>
</html>