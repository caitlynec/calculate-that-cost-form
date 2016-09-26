<!--Coded by Caitlyn Christensen, Version 1.0, Calculate That Cost Form, Created 2016-->

<section class="content-wrap">
		<?php rewind_posts();?>
            <?php if(have_posts()): while(have_posts()): the_post();?>
                <div class="words">
                    <?php the_content();?>
                </div>

                <?php 
                	if($_GET["hidden_var"] == "Y") {
                		$business_name = $_GET['business_name'];
                		$contact_name = $_GET['contact_name'];
                		$website = $_GET['website'];
                		$email = $_GET['email'];
                		$phone = $_GET['phone'];
                		$nu_pages = intval($_GET[('nu_pages')]);
                		$premade = $_GET['premade'];
                		$responsive = $_GET['responsive'];

                		//add in the cost per page
                		if($nu_pages <= 10) {
							$page_cost = 95*$nu_pages;
							//echo "Cost per Page: $" . $page_cost;
						}
						else {
							$page_cost = 75*$nu_pages;
							//echo "Cost per Page: $" . $page_cost;
						}

                		//add the base price to the per page cost
                		if ($premade == "none") {
							$base_total = $page_cost + 3000; 
							//echo "Base cost, with selected pages:" . $base_total;
						} 
						elseif ($premade == "1" ) {
							$base_total = $page_cost + 1200; 
							//echo "Base cost, with selected pages:" . $base_total;
						} 	
						else {
							$base_total = $page_cost + 1800; 
							//echo "Base cost, with selected pages:" . $base_total;
						}

                		//add price for responsive design
						if($responsive == "yes") {
							$responsive_total = 800 + $base_total;
							//echo "Responsive: $" . $responsive_total;
						}
						else {
							$responsive_total = $base_total;
							//echo "Responsive: not selected";
						}

						echo "<p>Thank you for your interest, someone will be in contact with you sooon!</p>";


                		$content = "We have recived a quote request from $business_name. Please review the information below and contact $contact_name by $email or $phone to go over their full request. $business_name is interested in the following:\n\nwebsite: $website\n\nnumber of pages: $nu_pages\n\npremade: $premade\n\nresponisve: $responsive\n\ntotal: $responsive_total";

                		mail("caitlyn@nobleimage.com", "Request a Quote Form", $content, "From: Noble Image <caitlyn@nobleimage.com>");


                	}
                ?>

                

				<form name="respond" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="get">
					<div>
						<label for="name">Business Name:</label>
						<input type="text" id="business_name" name="business_name" value="<?php echo $business_name;?>" />
					</div>
					<div>
						<label for="name">Name:</label>
						<input type="text" id="contact_name" name="contact_name" value="<?php echo $contact_name;?>" />
					</div>
					<div>
						<label for="name">Website:</label>
						<input type="text" id="webiste" name="website" value="<?php echo $website;?>" />
					</div>
					<div>
						<label for="name">E-mail:</label>
						<input type="text" id="email" name="email" value="<?php echo $email;?>" />
					</div>
					<div>
						<label for="name">Phone:</label>
						<input type="text" id="phone" name="phone" value="<?php echo $phone;?>" />
					</div>
					<div>
						<label for="name">Number of Pages:</label>
						<input type="number" min="1" id="nu_pages" name="nu_pages" value="<?php echo $nu_pages;?>" />
					</div>
					<div>
						<input type="checkbox" name="responsive" value="yes" <?php if(isset($responsive)) { echo 'checked="checked"'; } ?>>Responisve Site<br>
					</div>
					<div>
						<select name="premade">
							<option value="none">----</option>
							<option value="1" <?php if($premade == '1') { echo 'selected="selected"'; } ?>>1</option>
							<option value="2" <?php if($premade == '2') { echo 'selected="selected"'; } ?>>2</option>
							<option value="3" <?php if($premade == '3') { echo 'selected="selected"'; } ?>>3</option>
							<option value="4" <?php if($premade == '4') { echo 'selected="selected"'; } ?>>4</option>
							<option value="5" <?php if($premade == '5') { echo 'selected="selected"'; } ?>>5</option>
							<option value="6" <?php if($premade == '6') { echo 'selected="selected"'; } ?>>6</option>
							<option value="7" <?php if($premade == '7') { echo 'selected="selected"'; } ?>>7</option>
							<option value="8" <?php if($premade == '8') { echo 'selected="selected"'; } ?>>8</option>
							<option value="9" <?php if($premade == '9') { echo 'selected="selected"'; } ?>>9</option>
						</select>
					</div>
					<input type="hidden" name="hidden_var" value="Y" />
					<div class="button">
						<input type="submit" name="submit" value="Submit"> 
		        		<!--<button type="submit">Send</button>-->
		    		</div>
				</form>
				

		<?php endwhile;?>
        <?php else: endif;?>
</section><!--/content-wrap-->
