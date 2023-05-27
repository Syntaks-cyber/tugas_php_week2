@if($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @foreach($errors->all() as $err)
            <li><span>{{ $err }}</span></li>
        @endforeach
    </div>
@endif

<!-- Flash Message -->
@if(Session::has('err_msg'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="fa fa-info-circle"></i> {{ Session::get('err_msg') }}
    </div>
@endif
