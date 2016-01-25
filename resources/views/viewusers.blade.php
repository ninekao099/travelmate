@extends('backoffice')


@section('content')


<div class="container">
          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>ชื่อ-นามสกุล</th>
        <th>อีเมล</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $c)
      <tr>
        <td>{{$c->id}}</td>
        <td>{{$c->name}}</td>
        <td>{{$c->email}}</td>
        <td><a href="/backoffice/users/delete/{{$c->id}}" <span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>

    
@endsection
