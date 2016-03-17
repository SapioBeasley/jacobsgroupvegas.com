
<div class="container">

	<!-- <div class="col-md-3 col-sm-6">
		<aside class="widget widget_about">
			<h3 class="widget-title">About Us</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
		</aside>
	</div> --><!-- col-md-3 -->

	<div class="col-md-9 col-sm-6">
		<aside class="widget widget_quick_links">
			<h3 class="widget-title">Communities</h3>
			<ul class="p_l_z">

				@foreach ($communities as $community)
					<li><a title="Quick Links" href="{{route('communities.show', $community['community'])}}">{{$community['community']}}</a></li>
				@endforeach

			</ul>
		</aside>
	</div>

	<div class="col-md-3 col-sm-6">
		<aside class="widget widget_address">
			<h3 class="widget-title">Address</h3>
			<p>3042 S Durango Dr, Las Vegas, NV 89117</p>
			<span>(702) 442-0055</span>
			<a title="mailto" href="mailto:jonathan@jacobsgroupvegas.com">jonathan@jacobsgroupvegas.com</a>
		</aside>
	</div>

	<!-- col-md-3 -->
	<!-- <div class="col-md-3 col-sm-6">
		<aside class="widget widget_newsletter">
			<h3 class="widget-title">NewsLetter</h3>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Enter Your ID">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Go</button>
				</span>
			</div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>
		</aside>
	</div> -->

</div>

<div id="footer-bottom" class="footer-bottom">
	<div class="container">
		<p class="col-md-4 col-sm-6 col-xs-12">&copy; {{date('Y')}} JacobsGroupVegas.com | Powered by <a href="https://sapioweb.com/">Sapioweb.com</a></p>
		<div class="col-md-4 col-sm-6 col-xs-12 pull-right social">
			<ul class="footer_social m_b_z">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="#"><i class="fa fa-rss"></i></a></li>
			</ul>
			<a href="#" title="back-to-top" id="back-to-top" class="back-to-top"><i class="fa fa-long-arrow-up"></i> Top</a>
		</div>
	</div><!-- container /- -->
</div><!-- Footer Bottom /- -->
