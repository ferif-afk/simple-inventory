@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ route('jurusan.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ route('jurusan.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Fakultas</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $jurusan =>$hasil)
                <tr>
                  <td>{{$data->firstItem() +$jurusan}}</td>
                  <td>
              @foreach($data3 as $fs)
                      @if($fs->id == $hasil->fakultas_id)
                      {{ $fs->name }}
                      @endif
              @endforeach
                  </td>
                  <td>{{ $hasil->nama_jurusan }}</td>
                  <td>
                    <a href="{{ route('jurusan.edit', ['id' => $hasil->id]) }}">
                      <button type="button" class="btn btn-sm btn-info">Edit</button>
                    </a>

                    <a href="{{ route('jurusan.delete', ['id' => $hasil->id]) }}"
                      onclick="return confirm('Delete data?');" 
                      >
                      <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                    
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            pagenumber
            <br>
            {{$data->links()}}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()