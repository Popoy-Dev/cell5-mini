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
              <h4 class="mb-4 text-primary">Delete Details</h4>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $c = 1;
                  @endphp
                  @foreach($data as $d)
                  <tr>
                    <th scope="row">{{$c}}</th>
                    <td>{{$d->band_song}}</td>
                    <td>{{$d->band_desc}}</td>
                    <td>{{$d->band_genre}}</td>
                    <td>{{$d->band_release}}</td>
                    <td>
                      @if($d->is_hidden == 0)
                      <label class="switch">
                        <input type="checkbox" class="register" data-ids= "{{$d->id}}"  checked="checked">
                        <span class="slider round"></span>
                      </label>
                      @else
                      <label class="switch">
                        <input type="checkbox" class="register" data-ids= "{{$d->id}}" >
                        <span class="slider round"></span>
                      </label>

                      @endif
                    </td>
                  </tr>
                  <!-- Modal -->
                  @php
                  $c++
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
