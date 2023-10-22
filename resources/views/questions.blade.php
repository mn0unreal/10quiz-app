<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Task</title>
    <link rel="stylesheet" href="files/css/bootstrap.min.css">
    <link rel="stylesheet" href="files/css/my.css">
</head>
<body>
    <div class="container" style="width: 100%; height: 100%;">
        <h3 style="text-align: center; color: #010101;">Quiz Task</h3>

        <nav>
        <a href="/"><Button class="btn btn-dark">home</Button></a>
        </nav>

        @if ($errors->any())
            <div class="container">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
                {{ Session::forget('errors') }}
            </div>
        @endif

        @if(Session::get('successMessage'))
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{Session::get('successMessage')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Session::forget('successMessage') }}
            </div>
        @endif
    </div>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-1"><h2>Users <b></b></h2></div>
                        <div class="col-sm-7">
                            <!-- <a href="/"><Button class="btn btn-dark">home</Button></a> -->
                            <Button data-toggle="modal" data-target="#Modal_add" class="btn btn-primary">Add</Button>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Question <i class="fa fa-sort"></i></th>
                            <th style="width: 150px; text-align:center;"> action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $q)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{$q['question']}}</td>
                            <td>
                                <a href="#" class="text-warning" data-toggle="modal" data-target="#Modal_update{{$q->id}}">Update</a>
                                <a href="#" class="text-danger"  data-toggle="modal" data-target="#Modal_delete{{$q->id}}">Delete</a>
                            </td>
                        </tr>
                        <!-- Modal-update -->
                        <div class="modal fade" id="Modal_update{{$q->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="/update"> @csrf
                                    <input type="hidden" name="id" value="{{$q->id}}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <h5 >Question : </h5>
                                        </div>
                                        <div class="row" style="padding: 10px;">
                                            <input type="text" name="question" value="{{$q->question}}" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"><span>A:</span></div>
                                            <div class="col-md-6"><span>B:</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"><input type="text" value="{{$q->a}}"  name="opa"></div>
                                            <div class="col-md-6"><input type="text" value="{{$q->b}}"  name="opb"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"><span>C:</span></div>
                                            <div class="col-md-6"><span>D:</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"><input type="text" value="{{$q->c}}"  name="opc"></div>
                                            <div class="col-md-6"><input type="text" value="{{$q->d}}"  name="opd"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label> <span class="text-success">correct answer is :</span></label>
                                                <select name="ans" class="custom-select mr-sm-2" required>
                                                    <option value="{{$q->ans}}">{{$q->ans}}</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">update Question</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal-delete -->
                        <div class="modal fade" id="Modal_delete{{$q->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="/delete"> @csrf
                                    <input type="hidden" name="id" value="{{$q->id}}">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="padding: 10px;">
                                            <input type="hidden" name="id" value="{{$q->id}}">
                                            <h3 >Are you want to Delete? </h3>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Modal-Add -->
    <div class="modal fade" id="Modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="/add"> @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5 >Question : </h5>
                    </div>
                    <div class="row" style="padding: 10px;">
                        <input type="text" name="question" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6"><span>A:</span></div>
                        <div class="col-md-6"><span>B:</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><input type="text" name="opa"></div>
                        <div class="col-md-6"><input type="text" name="opb"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><span>C:</span></div>
                        <div class="col-md-6"><span>D:</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"><input type="text" name="opc"></div>
                        <div class="col-md-6"><input type="text" name="opd"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label> <span class="text-success">correct answer is :</span></label>
                            <select name="ans" class="custom-select mr-sm-2" required>
                                <option value="">Select...</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <script src="files/js/jquery-3.5.1.slim.min.js"></script>
    <script src="files/js/popper.min.js"></script>
    <script src="files/js/bootstrap.min.js"></script>
</body>
</html>
