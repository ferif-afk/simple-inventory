@extends('layouts.adminmain')

@section('content')
<script type="text/javascript">
  document.title="Barang";
  document.getElementById('barang').classList.add('active');
</script>
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" action="{{url('/barang')}}" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Barang" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Cari</button>
              </div>
            </form>
          </div>
          @if(auth()->user()->role == 'admin')
          <div class="card-header">
            <a href="{{url('/barang/tambahBarang')}}"> 
            <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang</button>
            </a>
          </div>
          @endif
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col" width="100px"><center>#</center></th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Total Barang</th>
                  <th scope="col">Barang Rusak</th>
                  <th scope="col">Dibuat</th>
                  <th scope="col">Diupdate</th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                @forelse($barang as $key => $b)
                <tr>
                  <td align="center">{{ $barang->firstItem() + $key }}</td>
                  <td>{{ $b->ruangan->nama_ruangan }}</td>
                  <td>{{ $b->nama_barang }}</td>
                  <td>{{ $b->total }}</td>
                  <td>{{ $b->broken }}</td>
                  <td>@foreach($user as $u)
                        @if($u->id == $b->created_by)
                          {{ $u->nama }}
                        @endif
                      @endforeach</td>
                  <td>@foreach($user as $u)
                        @if($u->id == $b->updated_by)
                          {{ $u->nama }}
                        @endif
                      @endforeach</td>
                  <td align="center"> 
                    <a href="{{url('barang/'.$b->id. '/edit')}}">Edit</a>
                  @if(auth()->user()->role == 'admin') | <a href="{{url('barang/'.$b->id. '/delete')}}">Hapus</a> @endif </td>
                </tr>
                @empty
                <tr>
                  <td colspan="8"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            <div class="pull-right">{{ $barang->links() }}</div>
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