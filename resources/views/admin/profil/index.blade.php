@extends('layout.admin')

@section('content')
    <div class="container card shadow mt-3 mb-3 p-3">
        @if (session()->has('geo_edited'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('geo_edited')}}
          </div>            
        @endif
        @if (session()->has('ekonomi_edited'))
          <div class="alert alert-success" role="alert">
            <i class="bi bi-check me-2"></i>{{session('ekonomi_edited')}}
          </div>            
        @endif
      <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
          <li class="nav-item" role="presentation">
            <a
              class="nav-link active"
              id="ex2-tab-1"
              data-bs-toggle="tab"
              href="#ex2-tabs-1"
              role="tab"
              aria-controls="ex2-tabs-1"
              aria-selected="true"
              >Kondisi Geografis</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="ex2-tab-2"
              data-bs-toggle="tab"
              href="#ex2-tabs-2"
              role="tab"
              aria-controls="ex2-tabs-2"
              aria-selected="false"
              >Kondisi Ekonomi</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link"
              id="ex2-tab-3"
              data-bs-toggle="tab"
              href="#ex2-tabs-3"
              role="tab"
              aria-controls="ex2-tabs-3"
              aria-selected="false"
              >Sarana & Prasarana</a
            >
          </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex2-content">
          <div
            class="tab-pane fade show active"
            id="ex2-tabs-1"
            role="tabpanel"
            aria-labelledby="ex2-tab-1"
          >
            <div class="container">
              <div class="card">
                <div class="card-header">
                  Profil Desa
                </div>
                <div class="card-body">
                  <h5 class="card-title">Kondisi Geografis</h5>
                  <p class="card-text">{!!$data[0]->geografis!!}</p>
                  <button data-bs-target="#ubahGeoModal" data-bs-toggle="modal" class="btn text-light" style="background-color: #a47148"><i class="bi bi-pen me-2"></i>Ubah</button>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="ex2-tabs-2"
            role="tabpanel"
            aria-labelledby="ex2-tab-2"
          >
          <div class="container">
            <div class="card">
              <div class="card-header">
                Profil Desa
              </div>
              <div class="card-body">
                <h5 class="card-title">Kondisi Ekonomi</h5>
                <p class="card-text">{!!$data[0]->ekonomi!!}</p>
                <button data-bs-target="#ubahEkoModal" data-bs-toggle="modal" class="btn text-light" style="background-color: #a47148"><i class="bi bi-pen me-2"></i>Ubah</button>
              </div>
            </div>
          </div>
          </div>
          <div
            class="tab-pane fade"
            id="ex2-tabs-3"
            role="tabpanel"
            aria-labelledby="ex2-tab-3"
          >
          <div class="container">
            <div class="row mb-2">
              <div class="col-lg-6">
                <h4 class="text-uppercase">sarana dan prasarana desa</h4>
              </div>
              <div class="col-lg-6 text-end">
                <a href="/admin/infrastruktur/create" class="btn text-light shadow" style="background-color: #a47148"><i class="bi bi-plus me-2"></i>Tambah</a>
              </div>
            </div>
            <div class="row mb-3 justify-content-center">
              <div class="col-lg-12">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Gambar</th>
                      <th>Sarana</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  @foreach ($infrastruktur as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>
                        @if ($item->gambar)
                          <img src="{{asset('storage/'.$item->gambar)}}" alt="" width="50" height="50" class="rounded-circle me-2">
                        @endif
                      </td>
                      <td>{{$item->sarana}}</td>
                      <td>{{$item->jumlah}}</td>
                      <td>{{$item->satuan}}</td>
                      <td>
                        <a href="/admin/infrastruktur/{{$item->uri}}/edit" class="btn btn-sm btn-warning shadow"><i class="bi bi-pen me-1"></i>ubah</a>
                        <form action="/admin/infrastruktur/{{$item->uri}}" method="POST" class="d-inline">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('Anda yakin akan menghapus pegawai ini?')"><i class="bi bi-trash me-1"></i>hapus</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>
        <!-- Tabs content -->
    </div>
    @include('modals.edit_geografi')
    @include('modals.edit_ekonomi')
@endsection