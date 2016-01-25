@extends('backoffice')


@section('content')

<script src="/js/dropzone.js"></script>
<link rel="stylesheet" href="/css/dropzone.css">



<script type="text/javascript">
    function confirmDelete( id ){
        var r = confirm("Delete This Item? "+id);
        if (r == true) {
            document.location.href = "/backoffice/travel/delete/"+id;
        }
    }



    $(document).ready(function () {
    
         $("#uploadForm").dropzone({ 
            url: "/backoffice/uploadimage" ,
            success: function (file, response) {

                $("#upload-label").hide();
                var  v = $("#form input[name=images]").val();

                var newVal = "";
                if( v == ""){
                    newVal = response;
                }else{
                    newVal = v +"," + response;
                }
                
                $("#form input[name=images]").val( newVal );
                       
            },
            error: function (file, response) {
                
                 //$("#error").html( response );
            },
            previewTemplate:document.getElementById('preview-template').innerHTML
        }); 
    });


</script>
<style type="text/css">
    #uploadForm{
        width:auto;
        height:200px;
        border: 1px solid #CCCCCC;
    }
</style>

@include('dropzonetemplate')




<form action="/backoffice/travel/edit/{{$travel->id}}" id="form" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6">

                <?php
                    $images = $travel->images;
                    $formValue = '';

                    foreach ( $images as $key => $image){
                        if( $formValue == '' ){
                            $formValue = $image->name;
                        }else{
                             $formValue .= ','.$image->name;
                        }
                       
                    }
                ?>


                <div class="form-group">
                    <input type="hidden" name="images" value="{{$formValue}}" >
                </div>


                    <div class="form-group">
                        <label>ชื่อกิจกรรม</label>
                        <input type="text" name="name" value="{{$travel->name}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>รายละเอียด</label>
                        <textarea name="detail" class="form-control" rows="4">{{$travel->detail}}</textarea>
                    </div>

                    <label>รูปภาพ</label>
                    <div  class="form-group" id="uploadForm">
                        <div id="upload-label">คลิกเพื่อเลือกไฟล์ หรือลากไลฟ์ลงมา</div>
                    </div>


                    <label>วันที่จัดกิจกรรม</label>
                    <div class="form-group">
                        <div class="form-group col-md-5 padding-0">
                            <input type="date" name="daystart" value="{{$travel->daystart}}" class="form-control" required>
                        </div>

                        <div class="form-group col-md-2">
                            <p>ถึงวันที่</p>
                        </div>

                        <div class="form-group col-md-5 padding-0">
                            <input type="date" name="dayend" value="{{$travel->dayend}}" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>หมวดหมู่</label>
                        <select name="category" class="form-control">
                            
                        @foreach ($category as $c)

                            @if( $travel->categoryItem->id ==  $c->id )
                                 <option value="{{$c->id}}" selected >{{$c->name}}</option>
                            @else
                                 <option value="{{$c->id}}" >{{$c->name}}</option>
                            @endif


                        @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label>เหมาะกับเด็กอายุ</label>
                        <select name="kidsage" class="form-control">
                           
                             @for ($i = 3; $i <= 13; $i++)
                                @if( $travel->kidsage == $i )
                                     <option value="{{$i}}" selected >{{$i}} ขวบขึ้นไป</option>
                                 @else
                                     <option value="{{$i}}" >{{$i}} ขวบขึ้นไป</option>
                                 @endif
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label>ค่าใช้จ่าย</label>
                        <input type="text" name="price" value="{{$travel->price}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>ที่อยู่</label>
                        <textarea name="address" class="form-control" rows="3">{{$travel->address}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>พิกัด (ละติจูด ลองจิจูด)</label>
                        <input type="text" name="location" value="{{$travel->location}}" class="form-control">

                        <div class="margin-5">
                        <a href="https://maps.google.co.th/" <span class="glyphicon glyphicon-map-marker" target="_blank" style="float: right;">แผนที่</span></a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="text" name="phone" value="{{$travel->phone}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>เว็บไซต์ (ลิงค์)</label>
                        <input type="text" name="link" value="{{$travel->link}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>สิ่งอำนวยความสะดวก คำแนะนำ อื่นๆ</label>
                        <textarea name="other" class="form-control" rows="3">{{$travel->other}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">แก้ไขกิจกรรม</button>
                    <button type="button" onclick="confirmDelete({{$travel->id}})" class="btn btn-default">ลบกิจกรรม </a>
                </div>
            </div>
            <br><br>

</form>
@endsection
