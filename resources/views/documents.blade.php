@extends('layouts.frontend')
@section('title')
	My Documents
@endsection
@section('content')
	<div class="container">
		<a href="#" class="btn btn-primary" onclick="document.getElementById('file').click();"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Document</a>
		<form method="post" action="{{url('upload/document')}}" id="form" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="file" name="document" id="file" hidden>
		</form>
		<hr>
		<table>
            <thead>
                <tr>
					<th>Name</th>
                    <th>Upload Date</th>
                    <th>Upload Time</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $document)
                	@php
	            		$array=explode('/',$document->path);
	                    $dt=new DateTime($document->created_at);
	                    $date=$dt->format('d/m/Y');
	                    $time=$dt->format('H:i:s');
				 	@endphp
                    <tr>
                        <td>{{$array[count($array)-1]}}</td>
                        <td>{{$date}}</td>
                        <td>{{$time}}</td>
                        <td>
                        	<a href="{{url('/download/document/'.$document->id)}}" class="btn btn-primary"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download</a>
                            <a href="{{url('/delete/document/'.$document->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This User')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>

	<script type="text/javascript">
		document.getElementById('file').onchange=function(){
			document.getElementById('form').submit();
		};
	</script>
@endsection