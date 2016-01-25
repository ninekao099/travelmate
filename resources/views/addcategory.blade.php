@extends('backoffice')


@section('content')



<div class="container">
<form action="/backoffice/category/add" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>หมวดหมู่</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">เพิ่มหมวดหมู่</button>
                </div>
            </div>
</form>
<br>
<hr>

 <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>หมวดหมู่</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($category as $b)
      <tr>
        <td>{{$b->id}}</td>
        <td>{{$b->name}}</td>
        <td><a href="/backoffice/category/edit/{{$b->id}}" <span class="glyphicon glyphicon-file"></span></a></td>
      </tr>
     @endforeach
    </tbody>
  </table>

</div>

@endsection
