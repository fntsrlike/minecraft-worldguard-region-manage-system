@extends('master')

@section('content')
  <table class="ui sortable table segment">
    <thead>
      <tr>
        <th>Area</th>
        <th>Name</th>
        <th>Type</th>
        <th>Pos</th>
        <th>Priority</th>
        <th>Owners</th>
        <th>Members</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($regions as $region)
      <tr>
        <td>{{$region->area}}</td>
        <td>{{$region->name}}</td>
        <td>{{$region->type}}</td>
        <td>
          Min: {{$region->min}} <br/>
          Max: {{$region->max}}
        </td>
        <td>{{$region->priority}}</td>
        <td>{{$region->owner}} ...</td>
        <td>{{$region->member}} ...</td>
        <td>Edit</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr><th colspan="3">
        <div class="ui blue labeled icon button"><i class="user icon"></i> Add User</div>
      </th>
    </tr></tfoot>
  </table>
@stop

@section('footer_scripts')
  @parent
  <script type="text/javascript">
    $(function(){
      $('.sortable').tablesort();
    });
  </script>
@stop
