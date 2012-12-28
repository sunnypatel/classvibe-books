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
			<form action="<?php echo base_url('index.php/dashboard/create_newBook'); ?>" method="post" enctype="multipart/form-data">
<!-- *** form validation needs to be done, as well as handling error msg from server-side validation *** -->
			<h1>upload new</h1>
		
			<div class="clearfix"></div>			
			<div class="fileupload fileupload-new" data-provides="fileupload">
			  <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="http://www.placehold.it/150x150/EFEFEF/AAAAAA" /></div>
			  <div class="fileupload-preview fileupload-exists thumbnail" style="width: 150px; height: 150px;"></div>
			  <span class="btn btn-file"><span class="fileupload-new">Select bookcover </span><span class="fileupload-exists">Change</span><input type="file" name="bookcover" /></span>
			  <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
			</div>


			<div class="control-group">
				<div class="controls">
					<input type="text" class="span12" placeholder='Book title' tabindex="1" name="title" id="title">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<input type="text" class="span12" placeholder='Author' tabindex="2" name="author">
				</div>
			</div>
				
			<div class="control-group">
				<div class="controls">
					<input type="text" class="span12" placeholder='Course #' tabindex="3" name="course_num">
				</div>
			</div>
			
			<div class="control-group">
				<div class="controls">
					<input type="text" class="span12" placeholder="ISBN" tabindex="4" name="isbn" data-mask="999-99-999-9999-9">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="span4 btn put-right">Upload</button>
				</div>
			</div>
			</form>
			

		</div>
		<!-- Analytics -->
		<div class="span8 analytics_box">
		<h1>analytics</h1>
		</div>

	</div> <!-- /row-fluid -->
	
	<div class="row-fluid">
		<div class="span12 bookshelf">
			
		</div>
	</div>
</div>
