@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Category <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('jurusan.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ route('jurusan.update', ['jurusan' => $jurusan->id]) }}" method="POST" enctype="multipart/form-data">
                          @method('patch')
                           @csrf
                           <div class="form-group">
                <select name="fakultas_id" class="form-control" required="">
                  @foreach($data2 as $fakultas)
                  <option value="{{ $fakultas->id }}" {{ ($jurusan->fakultas_id == $fakultas->id) ? 'selected' : ''}}>{{ $fakultas->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $jurusan->nama_jurusan }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()