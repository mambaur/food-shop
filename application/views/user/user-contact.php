<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		

				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Hubungi Kami</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form action="<?php echo base_url('Contact/tambah_contact'); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-12">
				                <input type="text" name="judul" class="form-control" required="required" placeholder="Judul">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="pesan" id="message" required="required" class="form-control" rows="8" placeholder="Tulis pesan disini"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Info kontak</h2>
	    				<address>
	    					<p>UD Purnamajati</p>
							<p>Jl. Bungur No.09, Darwo Timur, Gebang, Patrang </p>
							<p>IKabupaten Jember</p>
							<p>Telp +6282234344953</p>
							<p>Email: Purnamajati@gmail.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Sosial Media</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->