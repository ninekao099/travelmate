@extends('backoffice')


@section('content')

<div class="container">

	<div class="form-group" style="float: right;">
    <a href="travel/add" class="btn btn-default">
      <span class="glyphicon glyphicon-plus-sign"></span> เพิ่มกิจกรรม 
    </a>
    </div>

  <hr>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>ชื่อกิจกรรม</th>
        <th>วันที่จัดกิจกรรม</th>
        <th>หมวดหมู่</th>
        <th>เหมาะกับเด็กอายุ</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($travel as $c)
      <tr>
        <td>{{$c->id}}</td>
        <td>{{$c->name}}</td>
        <td>{{$c->daystart}} ถึง {{$c->dayend}}</td>
        <td>{{$c->categoryItem->name}}</td>
        <td>{{$c->kidsage}} ขวบขึ้นไป</td>
        <td><a href="/backoffice/travel/edit/{{$c->id}}" <span class="glyphicon glyphicon-file"></span></a></td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>

    
@endsection
