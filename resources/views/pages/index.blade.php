@extends('app')

@section('title')
    Index
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h4><i class="fa fa-info-circle"></i> Laravel 5.2 CRUD</h4>
            <hr>
            <p align="justify">
        	    Aplikasi ini merupakan demo CRUD (create, read, update, delete) dengan Laravel 5.2. selain perintah CRUD,
        	    juga memakai request validation untuk form inputnya. tambahan juga flash message untuk feedback ke user pada saat melakukan CRUD.
        	    untuk designnya sendiri memakai bootstrap.
            </p>
            <p align="right">
              	<a href="/buku"><button type="button" class="btn btn-primary btn-lg">START&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button></a>
            </p>
        </div>
    </div>
@endsection
