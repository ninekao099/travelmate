@extends('backoffice')


@section('content')
<script type="text/javascript">
    function confirmDelete( id ){
        var r = confirm("Delete This Item? "+id);
        if (r == true) {
            document.location.href = "/backoffice/category/delete/"+id;
        }
    }

</script>


<form action="/backoffice/category/edit/{{$category->id}}" id="form" method="post" enctype="multipart/form-data">
    <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>หมวดหมู่</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">แก้ไขหมวดหมู่</button>
                    <button type="button" onclick="confirmDelete({{$category->id}})" class="btn btn-default">ลบหมวดหมู่</a>
                </div>
            </div>    
</form>
@endsection
