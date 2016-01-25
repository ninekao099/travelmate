@extends('backoffice')

@section('content')


<script src="/js/dropzone.js"></script>
<link rel="stylesheet" href="/css/dropzone.css">

<script type="text/javascript">
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



<form action="/backoffice/travel/add" id="form" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-6">

                <div class="form-group">
                    <input type="hidden" name="images" >
                </div>

                    <div class="form-group">
                        <label>ชื่อกิจกรรม</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>รายละเอียด</label>
                        <textarea name="detail" class="form-control" rows="4" required></textarea>
                    </div>

                    <label>รูปภาพ</label>
                    <div class="form-group" id="uploadForm">
                        <div id="upload-label">คลิกเพื่อเลือกไฟล์ หรือลากไลฟ์ลงมา</div>
                    </div>

                    <label>รูปภาพ</label>
                    <div class="form-group dropzone" action="/file-upload" id="my-awesome-dropzone">
                        
                    </div>

                    <label>วันที่จัดกิจกรรม</label>
                    <div class="form-group">
                        <div class="form-group col-md-5 padding-0">
                            <input type="date" name="daystart" class="form-control" required>
                        </div>

                        <div class="form-group col-md-2">
                            <p>ถึงวันที่</p>
                        </div>

                        <div class="form-group col-md-5 padding-0">
                            <input type="date" name="dayend" class="form-control" required>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label>หมวดหมู่</label>
                        <select name="category" class="form-control">

                        @foreach ($category as $c)
                            <option value="{{$c->id}}" >{{$c->name}}</option>
                        @endforeach
                        

                        </select>
                    </div>

                    <div class="form-group">
                        <label>เหมาะกับเด็กอายุ</label>
                        <select name="kidsage" class="form-control">
                          <option value="3 ขวบขึ้นไป" >3 ขวบขึ้นไป</option>
                          <option value="4 ขวบขึ้นไป" >4 ขวบขึ้นไป</option>
                          <option value="5 ขวบขึ้นไป" >5 ขวบขึ้นไป</option>
                          <option value="6 ขวบขึ้นไป" >6 ขวบขึ้นไป</option>
                          <option value="7 ขวบขึ้นไป" >7 ขวบขึ้นไป</option>
                          <option value="8 ขวบขึ้นไป" >8 ขวบขึ้นไป</option>
                          <option value="9 ขวบขึ้นไป" >9 ขวบขึ้นไป</option>
                          <option value="10 ขวบขึ้นไป" >10 ขวบขึ้นไป</option>
                          <option value="11 ขวบขึ้นไป" >11 ขวบขึ้นไป</option>
                          <option value="12 ขวบขึ้นไป" >12 ขวบขึ้นไป</option>
                          <option value="13 ขวบขึ้นไป" >13 ขวบขึ้นไป</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>ค่าใช้จ่าย</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>ที่อยู่</label>
                        <textarea name="address" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>พิกัด (ละติจูด ลองจิจูด)</label>
                        <input type="text" name="location" class="form-control" required>
                        
                        <div class="margin-5">
                        <a href="https://maps.google.co.th/" <span class="glyphicon glyphicon-map-marker" target="_blank" style="float: right;">แผนที่</span></a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>เบอร์โทร</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>เว็บไซต์ (ลิงค์)</label>
                        <input type="text" name="link" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>สิ่งอำนวยความสะดวก คำแนะนำ อื่นๆ</label>
                        <textarea name="other" class="form-control" rows="3" required></textarea>
                    </div>


                    <button type="submit" class="btn btn-primary">เพิ่มกิจกรรม</button>
                </div>
            </div>
            <br><br>

</form>
@endsection
