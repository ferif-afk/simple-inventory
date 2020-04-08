@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Ruangan";
  document.getElementById('ruangan').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Ruangan</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Ruangan" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
          </div>
         <div class="card-header">
            <a href="{{ route('ruangan.create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" width="100px"><center>#</center></th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Nama Ruangan</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                @forelse($ruangan as $key => $r)
                <tr>
                  <td align="center">{{ $ruangan->firstItem() + $key }}</td>
                  <td>{{ $r->jurusan->nama_jurusan }}</td>
                  <td>{{ $r->nama_ruangan }}</td>
                  <td align="center"><a href="{{url('ruangan/'.$r->id. '/edit')}}">Edit</a> | <a href="{{url('ruangan/'.$r->id. '/delete')}}">Hapus</a></td>
                </tr>
                @empty
                <tr>
                  <td colspan="4"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{ $ruangan->links() }}</div>
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