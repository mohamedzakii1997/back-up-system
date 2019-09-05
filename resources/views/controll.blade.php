@extends('layouts.frontend')
@section('title')
Controll Panel
@endsection

@section('content')
    <div class="container" style="margin-top: 30px">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @php
                            $dt=new DateTime($user->created_at);
                            $date=$dt->format('d/m/Y');
                        @endphp
                        <td>{{$date}}</td>
                        <td>
                            @if($user->block)
                                <a href="{{url('/free/'.$user->id)}}" class=" btn btn-success"> <i class="fa fa-unlock" aria-hidden="true"></i> Free</a>
                            @else
                                <a href="{{url('/block/'.$user->id)}}" class="btn btn-primary"><i class="fa fa-lock" aria-hidden="true"></i> Block</a>
                            @endif
                            <a href="{{url('/delete/user/'.$user->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This User')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
