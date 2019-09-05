@extends('layouts.frontend')
@section('title')
	My Audios
@endsection
@section('content')
	<div class="container">
		<a href="#" class="btn btn-primary" onclick="document.getElementById('file').click();"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Audio</a>
		<form method="post" action="{{url('upload/audio')}}" id="form" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="file" name="audio" id="file" hidden>
		</form>
		<hr>
		@foreach($audios as $audio)
			@php
				$array=explode('/',$audio->path);
				$dt=new DateTime($audio->created_at);
				$date=$dt->format('d/m/Y');
				$time=$dt->format('H:i:s');
			@endphp
			<div>
				<div class="card" style="width: 100%;margin-bottom: 13px">
	                <div class="card-header align-items-center">
	                	<h3 class="h4" style="overflow: hidden">{{$array[count($array)-1]}}</h3>
	                	<div>
	                		<small style="float: left;margin-right: 20px">Upload Date: {{$date}}</small>
	                		<small style="float: left">Upload Time: {{$time}}</small>
	                		<a href="{{url('delete/audio/'.$audio->id)}}" class="btn btn-danger" style="float: right;" onclick="return confirm('Are You Sure To Delete?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
	                		<a href="{{url('download/audio/'.$audio->id)}}" class="btn btn-primary" style="float:right;margin-right: 10px"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download</a>
	                	</div>
	                </div>
	                 <div class="card-body">
	                    <audio controls src="{{url('getAudio/'.$audio->id)}}" style="width: 100%">
	                    	You Browser Does Not Support Your Audio's Type
	                    </audio>
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