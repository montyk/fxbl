<? $data['active_link'] = "active"; 
   $data['active'] ="3";	
?>

<?php $this->load->view('common/header', $data);?>
<!--	trading content -->
	<div class="contents">
		<div class="overlay_bg rel">
			<div class="fore_ca">
				<div class="fore_content">
    			   <div class="content_wrap">
						<h1>Open Demo</h1>
						<p>Please complete the form below to create your Free Demo trading account with ForexRay.						Once you have submitted your details, you will receive an email which contains a link to activate your account,and you can then begin trading with your practice account immediately.</p>
						
						<form action="#" method="post" class="open_form form">
						<div>
							<label for="first_name">First Name (required)</label>
							<input class="text" type="text" value="" name="firstname" class="input_field" id="first_name" />
						</div>
						<div>
							<label for="last_name">Last Name (required)</label>
							<input class="text" type="text" value="" name="lastname" class="input_field" id="last_name" />
						</div>
						<div>
							<label for="email">Email (required)</label>
							<input class="text" type="text" value="" name="email" class="input_field" id="email" />
						</div>
						<div>
							<label for="tel_no">Tele Phone Number (required)</label>
							<input  class="text" type="text" value="" name="telno" class="input_field" id="tel_no" />
						</div>
						<div>
							<label for="mob_no">Mobile Number (required)</label>
							<input  class="text" type="text" value="" name="mobno" class="input_field" id="mob_no" />
						</div>
						<div>
							<label for="country">Country (required)</label>
							<input class="text"  class="text" type="text" value="" name="country" class="input_field" id="country" />
						</div>
						<div>
							<label for="security">Security Code (required)</label>
							<input class="text" type="text" value="" name="security" class="input_field" id="security" />
						</div>
						<div>
							<input class="submit" type="submit" value="Open a Demo Account" id="open_demo" />
						</div>
						
						</form>
				   </div>	
				</div>
			</div>
		</div>
	</div>		
<!--	trading content -->	
<?php $this->load->view('common/footer');?>