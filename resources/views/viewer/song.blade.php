@extends('dashboardTemplate.main')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <div class="card">
            <div class="card-body">
              <!-- Search form -->
              <h4 class="mb-4 text-primary">Registration Details</h4>
              <input class="form-control" type="text" id="searchSong" placeholder="Search">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $c = 1;
                  @endphp
                  @foreach($song as $d)
                  <tr>
                    <th scope="row">{{$c}}</th>
                    <td>{{$d->band_song}}</td>
                    <td>{{$d->band_desc}}</td>
                    <td>{{$d->band_genre}}</td>
                    <td>{{$d->band_release}}</td>
                    <td>@if($d->is_hidden == 0) <p style="color:green">Active</p>@else<p style="color:red">Non Active</p>  @endif</td>
                  </tr>
                  @php
                  $c++
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="text-center"  id="header">
              <div class="text-danger  pop font-weight-bold" id="append"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
