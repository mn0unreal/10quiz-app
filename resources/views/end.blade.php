<link rel="stylesheet" href="files/css/bootstrap.min.css">
<link rel="stylesheet" href="files/css/my.css">

<div style="width: 100%; height: 100%; background-color: #e0f1f1;">

    <div class="container-fluid">
    <br><br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-md-5"></div>

            <div class="col-md-4">
                <label>Correct: <small style="color: green;">{{Session::get('correctans')}}</small></label>
                <br>
                <label>Incorrect: <small style="color: red;">{{Session::get('wrongans')}}</small></label>
                <br>
                <label>Result: <small style="color: green;">{{Session::get('correctans')}} </small> / <small>{{Session::get('wrongans') + Session::get('correctans')}}</small></label>
                <br>
                <a href="/">
                    <button class="btn btn-primary" style="margin-top:2%;">Finish quiz </button>
                </a>
            </div>

            <div class="col-md-3"></div>
        </div>
    </div>

</div>

<script src="files/js/jquery-3.5.1.slim.min.js"></script>
<script src="files/js/popper.min.js"></script>
<script src="files/js/bootstrap.min.js"></script>
