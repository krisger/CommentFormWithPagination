<?php include('/includes/widgets/CheckForm.php'); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Žinutės</title>
        <link rel="stylesheet" media="screen" type="text/css" href="css/screen.css" />
        <script src="js/main.js"></script>
	</head>
    <body>
        <div id="wrapper">
            <h1>Palikite žinute</h1>
            <form name="comment" action="" method="post" onsubmit="return ValidateForm()">
                <p class="<?php echo(strlen($firstNameErr) > 0 ? "err" : "") ?>">
                    <label for="fullname">Vardas, pavardė *</label><br/>
                    <input id="fullname" class="validate" data-type="text" data-name="Full Name" data-type="text" name="fullname" />
                </p>
                 <?php echo(strlen($firstNameErr) > 0 ? "<p>$firstNameErr</p>" : "") ?>
                
                <p class="<?php echo(strlen($birthErr) > 0 ? "err" : "") ?>">
                    <label for="birthdate">Gimimo data *</label><br/>
                    <input id="birthdate" class="validate" data-type="date" data-name="Birth date" name="birthdate"  />
                </p>
                <?php echo(strlen($birthErr) > 0 ? "<p>$birthErr</p>" : "") ?>
                
                <p  class="<?php echo(strlen($emailErr) > 0 ? "err" : "") ?>">
                    <label for="email">El.pašto adresas</label><br/>
                    <input id="email" class="validate" data-type="email" data-name="Email" name="email"/>
                </p>
                <?php echo(strlen($emailErr) > 0 ? "<p>$emailErr</p>" : "") ?>
                
                <p class="<?php echo(strlen($messageErr) > 0 ? "err" : "") ?>">
                    <label for="message">Jūsų žinutė *</label><br/>
                    <textarea name="message" class="validate" data-type="text" data-name="Message" id="message"></textarea>
                </p>
                 <?php echo(strlen($messageErr) > 0 ? "<p>$messageErr</p>" : "") ?>
                
                <p>
                    <span>* - privalomi laukai</span>
                    <button id="submit" type="submit"  >Skelbti</button>
                    <img style="display:none;" id="submit-loader" src="img/ajax-loader.gif" alt="" />
                </p>
            </form>
            <?php include('/includes/widgets/Messages.php'); ?>
        </div>
    </body>
</html>
