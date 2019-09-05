@extends('layouts.frontend')
@section('title')
	My Images
@endsection
@section('extraStyle')
		.overlay{
			background-color: rgb(6,6,6);
			display:flex;
			opacity:0;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			transition:all 1.5s ease 0s;
			align-items: center;
			justify-content:center
		}
		.image:hover .overlay{
			opacity:.7
		}
		.overlay div{
		color:#fff;
		font-size:30px
	}
	.overlay div a{
	color:#fff
}
@endsection
@section('content')
	<div class="container">
		<a href="#" class="btn btn-primary" onclick="document.getElementById('file').click();"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Image</a>
		<form method="post" action="{{url('upload/image')}}" id="form" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="file" name="image" id="file" hidden>
		</form>
		<hr>
		@foreach($images as $image)
		<div style="width: 49%;height: 300px; margin-left:1%;float: left;position: relative;" class="image">
			<img src="{{url('/getImage/'.$image->id)}}" style="width: 100%;height: 100%">
			<div class="overlay">
				<div style="text-align: center">
					<a href="{{url('download/image/'.$image->id)}}">Download</a> | <a href="{{url('delete/image/'.$image->id)}}" onclick="return confirm('Are You Sure To Delete?')">Delete</a>
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