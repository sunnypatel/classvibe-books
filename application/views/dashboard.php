<div class="container-fluid">
	<div class="row-fluid top">
			<div class="span4 classvibe_title">
				<h2 class="small">ClassVibe<small>BookStores</small></h2>
			</div>

			<div class="span8 right">
			<a class="btn" href="#">Account management</a>
			<a class="btn" href="<?php echo base_url('index.php/auth/logout/');?>">Logout</a>
			</div>
	</div> <!-- row -->
	
	<div class="row-fluid">&nbsp;</div>
	
	<div class="row-fluid">
		<div class="span4 upload_new_box">
			<form action="#" method="post">
			<h1>upload new</h1>
			
			<div class="control-group">
				<div class="controls">
					<input type="file" name="image" placeholder="Book cover" value="Book cover">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<input type="text" class="span12" placeholder="Title" tabindex="1" name="title">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<input type="text" class="span12" placeholder="Author" tabindex="2" name="author">
				</div>
			</div>
				
			<div class="control-group">
				<div class="controls">
					<input type="text" class="span12" placeholder="Course #" tabindex="3" name="course_num">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<input type="submit" class="span6">
				</div>
			</div>
			</form>
			

		</div>
		<!-- Analytics -->
		<div class="span8 analytics_box">
		<h1>analytics</h1>
		</div>

	</div>

</div>
