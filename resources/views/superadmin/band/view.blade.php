@extends('superadmin.layout.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          <div class="card">
            <div class="card-body">
              <h4>View All Band Band</h4>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Band Id</th>
                    <th scope="col">Band Name</th>
                    <th scope="col">Scope</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = 1;
                  @endphp
                  @foreach($data as $d)
                  <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$d->band_id}}</td>
                    <td>{{$d->band_name}}</td>
                    <td>{{$d->band_scope}}</td>
                    <td>{{$d->email}}</td>
                  </tr>
                  @php
                  $i++;
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
