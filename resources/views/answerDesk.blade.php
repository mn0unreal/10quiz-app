
<link rel="stylesheet" href="files/css/bootstrap.min.css">
<link rel="stylesheet" href="files/css/my.css">

<div style="width: 100%; height: 100%; background-color: #010101;">

<!-- <div style="width: 100%; height: 100%; background-color: #eab273;"> -->
<!-- <div style="width: 100%; height: 100%;"> -->
    <div class="container-fluid">
        <form action="/submitans" method="post">@csrf
            <div class="row" style="padding-top:30vh; color:white">
                <br><br><br><br>

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h4>#{{Session::get("nextq")}} : {{$question->question}}</h4> <br>
                    <input value="A" type="radio" name="ans" checked="true"> : (A) <small>{{$question->a}}</small><br>
                    <input value="B" type="radio" name="ans"> : (B) <small>{{$question->b}}</small><br>
                    <input value="C" type="radio" name="ans"> : (C) <small>{{$question->c}}</small><br>
                    <input value="D" type="radio" name="ans"> : (D) <small>{{$question->d}}</small>
                    <input value="{{$question->ans}}" style="visibility:hidden;" name="dbans">
                </div>
                <div class="col-md-5"></div>
            </div>
            <div class="row" style="padding-top:5vh; color:white">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <button type="submit"  class="btn btn-primary">Next</button>
                </div>
                <div class="col-md-5"></div>
            </div>
        </form>
    </div>
</div>

<script src="files/js/jquery-3.5.1.slim.min.js"></script>
<script src="files/js/popper.min.js"></script>
<script src="files/js/bootstrap.min.js"></script>
