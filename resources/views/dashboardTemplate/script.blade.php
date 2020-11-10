<script src="/dashboard_asset/js/app.js"></script>
<script src="/dashboard_asset/assets/plugins/feather-icons/feather.min.js"></script>
<script src="/dashboard_asset/assets/js/template.js"></script>
<script src="/dashboard_asset/assets/js/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

  if (('.buy-now-wrapper').length) {
    $('div').remove('.buy-now-wrapper');
  }

  $(".alert-success").delay(5000).slideUp(700);
  $(".alert-danger").delay(5000).slideUp(700);
  // switch button popoy
  $(".register").click(function(){
    var id = $(this).data('ids');

    if ($(this).is(":checked")) {

      $(this).attr("");

      $.ajax({
        url:'api/register-hide/'+id,
        type:'get',
        dataType: "json",
        success:function(res){

        }
      });
    }else{
      var id = $(this).data('ids');
      $.ajax({
        url:'api/register-unhide/'+id,
        type:'get',
        dataType: "json",

        success:function(res){
          console.log("Successfully Changed")
        }

      });

    }
  });




  $('#search').on('keyup', function(){

    var value=$('#search').val();

    $.ajax({
      url : '/register-search/'+value,
      type:'get',
      dataType: "json",

      success:function(data){
        console.log(data);
        var res='';
        var count = 1;
        $.each (data, function (key, value) {
          var status = (value.is_hidden == 0) ? "<p style='color:green'>Active</p>" : "<p class='text-danger'>Non Active</p>";
          res +=
          '<tr>'+
          '<td>'+count+'</td>'+
          '<td>'+value.band_song+'</td>'+
          '<td>'+value.band_desc+'</td>'+
          '<td>'+value.band_genre+'</td>'+
          '<td>'+value.band_release+'</td>'+
          '<td>'+status+'</td>'+
          '</tr>';
          count++;
        });
        $('tbody').html(res);

        console.log("Successfully Changed")
      }

    });


  });


  $('#searchSong').on('keyup', function(){
    var value=$('#searchSong').val();

    $.ajax({
      url : '/viewer/song-search/'+value,
      type:'get',
      dataType: "json",

      success:function(data){
        console.log(data);
        var res='';
        var count = 1;
        $.each (data, function (key, value) {
          var status = (value.is_hidden == 0) ? "<p style='color:green'>Active</p>" : "<p class='text-danger'>Non Active</p>";
          res +=
          '<tr>'+
          '<td>'+count+'</td>'+
          '<td>'+value.band_song+'</td>'+
          '<td>'+value.band_desc+'</td>'+
          '<td>'+value.band_genre+'</td>'+
          '<td>'+value.band_release+'</td>'+
          '<td>'+status+'</td>'+
          '</tr>';
          count++;
        });
        $('tbody').html(res);

        console.log("Successfully Changed")
      }

    });


  });

});
</script>
