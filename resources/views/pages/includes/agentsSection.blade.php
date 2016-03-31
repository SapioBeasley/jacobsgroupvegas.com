<!-- col-md-4 -->
<div class="col-md-4">
	<div class="agent-list-box">
		<!-- <div class="agent-list-image-box">
			<img src="images/agent-listing/agent-listing2.jpg" alt="Agent" />
		</div> -->
		<div class="agent-listing-detail row-border">
			<h4><a href="{{route('agents.show', $agent->name)}}" title="Agent Name">{{$agent->name}}</a>
			<span>{{$agent->title}}</span></h4>
			<p>{{strlen($agent['description']) > 80 ? substr($agent['description'],0,80)."..." : $agent['description']}}</p>
			<p><i class="fa fa-envelope-o"></i> <a title="mail" href="mailto:{{$agent->email}}">{{$agent->email}}</a></p>
			<a href="{{route('agents.show', $agent->name)}}" title="View Profile" class="btn btn-primary">View Profile</a>
		</div>
	</div>
</div><!-- col-md-4 /- -->
