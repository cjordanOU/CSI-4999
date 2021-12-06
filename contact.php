<!DOCTYPE html>
<html lang="en">
    <head>
		<?php
            require_once('Includes/metadata.php');
            require_once('Includes/dbConnection.php');
        ?>

        <title>Contact Us - GrizzChat</title>
        <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">

        <!-- Styles -->
        <link href="Styles/style.css" rel="stylesheet">
    </head>
    <body onload="startSlideshow()">
        <section id="background-gradient"></section>
        
        <?php
            require_once('Includes/page_elements.php');
            displayHeader();
            displaySidebarNavigation();
        ?>

        

        <section id="page-content">
            
            <section id="page-container">

                <section id="slideshowContainer-small">
                    <div id="slideshowImage" class="parallaxBG-large"></div>
                    <div class="parallaxText1-small">
                        <h2>Contact Us</h2>
                    </div>
                </section>
                
                <main>
					<br class="compatability-margin">
                    <form id="contactForm" action="contactProcess.php" method="post">

				<!-- Personal Information -->
				
				<fieldset>
					<legend> Personal Information </legend>
					<table>
						<tr>
							<td>First Name: </td>
							<td colspan="3"><input type="text" name="firstName" size="40"
							title="Initail captial, then lowercase and no spaces"
							pattern="^[A-Z][a-z]*$" required></td>
						</tr>

						<tr>
							<td>Last Name: </td>
							<td colspan="3"><input type="text" name="lastName" size="40"
							title="Initail captial, then lowercase and no spaces"
							pattern="^[A-Z[a-z]*$" required></td>
						</tr>

					</table>
				</fieldset>

				<!-- Contact Information -->
				<fieldset>
					<legend> Contact Information </legend>
					<table>
						<tr>
							<td>E-mail Address: </td>
							<td colspan="3"><input type="text" name="email" size="40"
							title="Hint: llgrestaurant@gmail.com"
							pattern="^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$" required></td>
						</tr>

						<tr>
							<td>Phone Number: </td>
							<td><input type="radio" name="phoneType">Work</td>
							<td><input type="radio" name="phoneType">Personal</td>
						</tr>

						<tr>
							<td></td>
							<td colspan="3"><input type="text" name="phoneNumber" size="40"
							title="Hint: 012-345-6789"
							pattern="^(\d{3}-)?\d{3}-\d{4}$" required></td>
						</tr>

					</table>
				</fieldset>

				<!-- Contact Reason -->
				<fieldset>
					<legend>Contact Reason: </legend>
					<table>
						<tr>
							<td>Reason: 
								<select name="reason">
									<option> --- </option>
									<option> Complaint </option>
									<option> Feedback </option>
									<option> Inquiry </option>
									<option> Report Bug </option>
									<option> Other </option>
								</select>
							</td>
						</tr>

						<!-- Message Input Box-->
						<tr>
							<td colspan="3">
								<label>Message:</label>
								<textarea name="message" rows="6" cols="38"></textarea>
							</td>
						</tr>

						<!-- Submit Button -->
						<tr>
							<td colspan="3"><input type="submit" name="sub" value="Submit"></td>
						</tr>
					</table>
				</fieldset>
			</form>
                </main>
            </section>
            

            <?php displayFooter(); ?>
        </section>
    </body>
</html>
