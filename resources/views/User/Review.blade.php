<head>
    <link rel="stylesheet" href="{{ asset('User/css/review.css') }}">

</head>



@section('content')

<script src="https://use.fontawesome.com/a6f0361695.js"></script>

<h2 id="fh2">“The customer's perception is your reality.”</h2>
<h6 id="fh6">Kate Zabriskie</h6>


<form id="feedback" action="{{route('addrev',$resid)}}" method="post">
@csrf


    <div class="pinfo">Rate our overall services.</div>


    <div class="form-group">
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-heart"></i></span>
                <select name="rating" class="form-control" id="rate">
                    <option  name="rating" value="1">1</option>
                    <option name="rating" value="2">2</option>
                    <option name="rating"  value="3">3</option>
                    <option name="rating" value="4">4</option>
                    <option  name="rating" value="5">5</option>
                </select>
            </div>
        </div>
    </div>

    <div class="pinfo">Write your feedback.</div>


    <div class="form-group">
        <div class="col-md-4 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                <textarea name="comment" class="form-control" id="review" rows="3"></textarea>

            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>


</form>




