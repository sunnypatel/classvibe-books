 <script>
        $(document).ready(function(){
            $("#login").validate();
        }); 
         $(document).ready(function(){
            $("#signup").validate();
        });
</script>
<div class="container-fluid">
	<div class="row-fluid top">
		<div class="span4 classvibe_title">
			<h2 class="small">ClassVibe<small>BookStores</small></h2>
		</div>
		<div class="span8 right" >
			<form class="search_all_top" action="google.com" method="post">
				<div class="input-append">
				<input class="" style="width:86%;" type="text" placeholder="Search by course, title, auther, ISBN, or keywords">
				<button type="submit" class="btn">Search</button>
				</div>
			</form>
		</div>
	</div>
	<div class="row-fluid">&nbsp;</div>
	<div class="row-fluid">

		<div class="span8">
		
			<div id="myCarousel" class="carousel slide homepage_carousel">
			<!-- Carousel items -->
			<div class="carousel-inner">
				<div class="active item"><img src="<?php echo base_url('assets/img/homepage/slide-01.jpg');?>"></div>
				<div class="item"><img src="<?php echo base_url('assets/img/homepage/slide-02.jpg');?>"></div>
				<div class="item"><img src="<?php echo base_url('assets/img/homepage/slide-03.jpg');?>"></div>
			</div>
			<!-- Carousel nav -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="<?php echo base_url('assets/img/prev.png')?>"></a>	
			<a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="<?php echo base_url('assets/img/next.png')?>"></a>
			</div>
		</div>

		<!-- login box -->
		<div class="span4 login_box">
			
			<form id="login" class="homepage" action="<?php echo base_url('index.php/auth/login');?>" method="post">
				<h1>login</h1>	<br>
				<div class="control-group">
					<div class="controls">
						<input type="text" class="span12 required email" minlength="5" placeholder="Email" name="identity" tabindex="1">
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<input type="password" class="span12 required" minlength="5" placeholder="Password" name="password" tabindex="2">
					</div>
				</div>
<br>
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn right" tabindex="3">Sign in</button>
					</div>
				</div>
<br>
			</form>	
		</div>
	</div>

	<div class="row-fluid box">
		<div class="span12">
	
			<div class="row-fluid green">
				<div class="span5" style="padding:15px">
                    <form id="signup" class="signup_form" method="post" action="#">
                        <div class="control-group">
                            <div class="controls">
                                <input type="text" class="span12 required email" minlength="5" placeholder="Email" name="email" >
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input type="password" class="span12 required" minlength="5" placeholder="Password" name="password">
                            </div>
                        </div>  
                        
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="span4 btn btn-primary">Sign up</button>
                            </div>  
                        </div>
                    </form>

				</div>
		
				<div class="span7" style="padding:15px;">	
					<h1>sign up here</h1>
					<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras consequat laoreet sodales. Duis vel tortor ante, a vehicula nunc. Mauris eleifend felis ac tellus semper quis interdum nisl facilisis.</p>
				</div>

			</div>

		</div>
	</div>
</div>
