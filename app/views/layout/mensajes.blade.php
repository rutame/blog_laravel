@if($errors->all())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            &times;
        </button>
        @foreach($errors->all() as $error)
            <li class="list-unstyled">{{ $error }}</li>
        @endforeach
    </div>
@endif

@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            &times;
        </button>
        {{ Session::get('mensaje')}}
    </div>
@endif