<div class="page">
	<div class="grid dashboard">
		<div class="row">
			<div class="span6">
			<span class="classvibe_title_large fg-color-black">
			ClassVibe<small>BookStores</small>
			</span>
			</div>

			<div class="span6" style="text-align:right;">
			<a class="button bg-color-lighten fg-color-blue" href="#">Account management</a>
			<a class="button bg-color-blue fg-color-white" href="<?php echo base_url('index.php/auth/logout/');?>">Logout</a>
			</div>
		</div> <!-- row -->
		<br><br>
		<div class="row">
		
			<div class="span4 upload_new">
			<h2 class="med">upload new</h2>
			<br>	
			<form action="#" method="post">
				
				<div class="input-control file">
					<input type="file" name="image" placeholder="Book cover" value="Book cover">	    			</div>

				<div class="input-control text">
					<input type="text" placeholder="Title" tabindex="1" name="title">
					<button class="helper" onclick="return false"></button>
				</div>

				<div class="input-control text">
					<input type="text" placeholder="Author" tabindex="2" name="author">
					<button class="helper" onclick="return false"></button>
				</div>
				
				<div class="input-control text">
					<input type="text" placeholder="Course #" tabindex="3" name="course_num">
					<button class="helper" onclick="return false"></button>
				</div>
			</form>
			</div>

		</div>

	</div>

</div>
