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
              @if(session('delete'))
              <div class="alert alert-danger text-center" role="alert">
                {{session('delete')}}
              </div>
              @endif()
              <h4>Delete Band Barangay</h4>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Band Id</th>
                    <th scope="col">Band Name</th>
                    <th scope="col">Scope</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
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
                    <td>
                      @if($d->is_deleted == 0)
                      <label class="switch">
                        <input type="checkbox" class="s2" data-ids= "{{$d->id}}"  checked="checked">
                        <span class="slider round"></span>
                      </label>
                      @else
                      <label class="switch">
                        <input type="checkbox" class="s2"  data-ids= "{{$d->id}}">
                        <span class="slider round"></span>
                      </label>
                      @endif
                    </td>
                  </tr>
                  @php
                  $i++;
                  @endphp
                  @endforeach
                </tbody>
              </table>
              {{ $data->links() }}

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function(){


// switch button popoy
  $(".s2").click(function(){
    var id = $(this).data('ids');

    if ($(this).is(":checked")) {

      $(this).attr("");

      $.ajax({
        url:'/superadmin/band-hide/'+id,
        type:'get',
        success:function(res){
          console.log(res.msg);
          if (res) {
            setInterval(function(){
              window.location.reload();
            },2000);
          }
        }
      });
    }else{
      var id = $(this).data('ids');
      $.ajax({
        url:'/superadmin/band-unhide/'+id,
        type:'get',
        success:function(res){
          console.log(res.msg);
          if (res) {
            setInterval(function(){
              window.location.reload();
            },2000);
          }
        }

      });

    }
  });
});
//end of switch poy

</script>
@endsection
