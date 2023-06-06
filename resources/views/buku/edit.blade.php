@extends('app')

@section('title')
    Buku | Edit
@endsection

@section('content')


<div class="panel panel-default">
    <div class="panel-body">
	    <h4><i class="fa fa-check-square"></i> EDIT BUKU : {{ $buku->judul }}</h4>
	    <hr>
        <div class="row">
	    	<div class="col-md-3">
				<div class="list-group">
				  <a href="#" class="list-group-item active">
				    <i class="fa fa-cogs"></i> MENU BUKU
				  </a>
				  <a href="/buku" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
				  <a href="/" class="list-group-item"><i class="fa fa-home"></i> Home</a>
				</div>
	        </div>

            <div class="col-md-6">
		    	<div class="panel panel-default">
	  				<div class="panel-body">

                        @include('errors.listerr')

						{!! Form::model($buku,['method'=>'PATCH','action'=>['BukuController@update',$buku->isbn]]) !!}
						<div class="form-group">
							{!! Form::label('isbn', 'ISBN') !!}
							{!! Form::text('isbn',null, array('class' => 'form-control','placeholder'=>'ISBN Buku','readonly')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('judul', 'Judul') !!}
							{!! Form::text('judul', null, array('class' => 'form-control','placeholder'=>'Judul Buku')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('pengarang', 'Pengarang') !!}
							{!! Form::text('pengarang', null, array('class' => 'form-control','placeholder'=>'Pengarang Buku')) !!}
						</div>
                        <div class="form-group">
							{!! Form::label('penerbit', 'Penerbit') !!}
							{!! Form::text('penerbit', null, array('class' => 'form-control','placeholder'=>'Penerbit Buku')) !!}
						</div>
						<div class="form-group">
							{!! Form::label('halaman', 'Halaman') !!}
							{!! Form::text('halaman', null, array('class' => 'form-control','placeholder'=>'Halaman Buku')) !!}
						</div>

						{!! Form::button('<i class="fa fa-check-square"></i>'. ' Update', array('type' => 'submit', 'class' => 'btn btn-primary'))!!}

						{!! Form::close()!!}
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection
