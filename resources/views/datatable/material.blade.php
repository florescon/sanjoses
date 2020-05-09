<!DOCTYPE html>
<html lang="en">
    <head>
        <title> {{ app_name() }}  | @lang('labels.backend.access.material.raw_material')</title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <style>
            body {margin: 20px}
        </style>
    </head>
    <body>


    <div class="card">
        <div class="col-xs-6" class="text-left">
          <h4>@lang('labels.backend.access.material.raw_material')</h4>
          <h4><small>{{ Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</small></h4>
        </div>
        <div class="col-xs-6" align="right" class="text-right">
        
          <h4> {{ app_name() }}  </h4>
        </div>
        <table class="table table-condensed table-striped">
            @foreach($data as $row)
                @if ($row == reset($data)) 
                    <tr>
                        @foreach($row as $key => $value)
                            <th>{!! $key !!}</th>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    @foreach($row as $key => $value)
                        @if(is_string($value) || is_numeric($value))
                            <td>{!! $value !!}</td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
    </body>
</html>
