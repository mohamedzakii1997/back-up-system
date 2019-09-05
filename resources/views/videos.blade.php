@extends('layouts.frontend')
@section('title')
	My Videos
@endsection
@section('content')
	<div class="container">
		<a href="#" class="btn btn-primary" onclick="document.getElementById('file').click();"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Video</a>
		<form method="post" action="{{url('upload/video')}}" id="form" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="file" name="video" id="file" hidden>
		</form>
		<hr>
		@foreach($videos as $video)
			@php
				$array=explode('/',$video->path);
				$dt=new DateTime($video->created_at);
				$date=$dt->format('d/m/Y');
				$time=$dt->format('H:i:s');
			@endphp
			<div>
				<div class="card" style="float:left;width: 49%; margin-left: 1%;margin-bottom: 13px">
	                <div class="card-header align-items-center">
	                	<h3 class="h4" style="overflow: hidden">{{$array[count($array)-1]}}</h3>
	                	<small>Upload Date: {{$date}}</small><br>
	                	<small>Upload Time: {{$time}}</small><br>
	                	<div>
	                		<a href="{{url('delete/video/'.$video->id)}}" class="btn btn-danger" style="float: right;" onclick="return confirm('Are You Sure To Delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
	                		<a href="{{url('download/video/'.$video->id)}}" class="btn btn-primary" style="float:right;margin-right: 10px"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download</a>
	                	</div>
	                </div>
	                 <div class="card-body">
	                    <video height="200" style="width: 100%" controls src="{{url('getVideo/'.$video->id)}}">
	                    	You Browser Does Not Support Your Video's Type
	                    </video>
	                </div>
	            </div>
			</div>
		@endforeach
	</div>

	<script type="text/javascript">
		document.getElementById('file').onchange=function(){
			document.getElementById('form').submit();
		};
	</script>
@endsection