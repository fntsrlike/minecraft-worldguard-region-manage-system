<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>阿爾法領地管理系統</title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="./assets/semantic/packaged/css/semantic.min.css">
</head>
<body>
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

  <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script src="./assets/semantic/packaged/javascript/semantic.min.js"></script>
  <script src="./assets/js/jquery.tablesort.min.js"></script>

  <script type="text/javascript">
    $(function(){
      $('.sortable').tablesort();
    });
  </script>
</body>
</html>
