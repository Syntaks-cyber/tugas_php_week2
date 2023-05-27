@extends('app')

@section('title')
    Buku | Show
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h4><i class="fa fa-book"></i> {{ strtoupper($buku->judul) }}</h4><hr>
            <div class="row">

                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active"><i class="fa fa-cogs"></i> MENU BUKU</a>
				        <a href="/buku" class="list-group-item"><i class="fa fa-refresh"></i> Tampilkan Semua</a>
				        <a href="/" class="list-group-item"><i class="fa fa-home"></i> Home</a>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed">
                            <thead align="center">
                                <tr>
				 			        <td colspan="2"><strong>DETAIL INFORMASI</strong></td>
				 		        </tr>
					        </thead>
                            <tbody>
                                <tr>
                                    <td><b>ISBN</b></td>
                                    <td>{{ $buku->isbn }}</td>
                                </tr>
                                <tr>
                                    <td><b>Judul</b></td>
                                    <td>{{ $buku->judul }}</td>
                                </tr>
                                <tr>
                                    <td><b>Pengarang</b></td>
                                    <td>{{ $buku->pengarang }}</td>
                                </tr>
                                <tr>
                                    <td><b>Penerbit</b></td>
                                    <td>{{ $buku->penerbit }}</td>
                                </tr>
                                <tr>
                                    <td><b>Halaman</b></td>
                                    <td>{{ $buku->halaman }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
