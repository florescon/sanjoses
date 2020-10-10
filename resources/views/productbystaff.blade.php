<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ optional($sale->user)->name }}</title>

    <style type="text/css">
    </style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="margin-left:10px; margin-right:10px">
  
  <table class="table table-sm table-borderless">
    <tr> 
      <td style="text-align: center; border: none;">
        <img src="{{ public_path('pro/img/logo22.png') }}" alt="" width="100"/>
      </td>
    </tr>
    <tr>
      <td align="center" style="border: none;">
        <h5><strong>San Jose Uniformes</strong></h5>
        <h6 style=" background: #eee; "> @lang('labels.backend.access.order.order') | {{ $status->name }}</h6>
     </td>
    </tr>
  </table>

  <table class="table table-sm" style="font-size: 0.95rem;">
    <thead>
      <tr>
        <td colspan="2"><strong>Fecha generado:</strong>  {{ $sale->created_at }} </td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><strong>Folio | {{ $status->name }}:</strong> #{{ $folio }}</td>
        <td><strong>Folio orden:</strong> #{{ $sale->id }}</td>
      </tr>
      <tr>
        <td><strong>A:</strong> {{ ucwords(strtolower($user->name))  }}</td>
        <td><strong>Expedido por:</strong> {{ ucwords(strtolower($sale->generated_by->name)) }}</td>
      </tr>
    </tbody>
  </table>

  <br>

  <table class="table table-sm">
    <thead class="thead-dark">
      <tr align="left">
        <th>Consumo</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
      @php($total=0)
      @foreach($sale_product_by_staff->product_sale_staff_main_ as $product)
  
       @foreach($product->product_ as $producto)

        <tr>
          <td scope="row">
              <strong>{{ $producto->product_stock->product_detail->name }} </strong>
              {{ ' Color:'.$producto->product_stock->product_detail_color->name. ' Talla:'.$producto->product_stock->product_detail_size->name }} 
          </td>
          <td align="center">
            {{ $producto->quantity }}
          </td>
        </tr>
        @endforeach
      @endforeach
    </tbody>
  </table>


  <table class="table table-sm">
    <thead class="thead-light">
      <tr align="left">
        <th>Materia prima</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
      @php($total=0)
      @foreach($sale_product_by_staff->product_sale_staff_main_ as $product)
  
       @foreach($product->material_ as $material)

        <tr>
          <td scope="row">
              {{ $material->material->part_number }}</strong> {!! ($material->material->color_id ? $material->material->color_name : '').' | '.$material->material->name !!}  
          </td>
          <td align="center">
            {{ $material->quantity }}
          </td>
        </tr>
        @endforeach
      @endforeach
    </tbody>
  </table>

<div>
  <p> <small><strong>Firma</strong></small> </p>
</div>
  <div class="card border-dark mb-3">
    <div class="card-body">
      <br><br>
       <hr>
       <p class="card-text text-center">
        <small>
          {{ ucwords(strtolower($user->name)) }}
        </small>
      </p>
    </div>
  </div>

  <br>

  <div class="card border-dark mb-3">
    <div class="card-body">
      <br><br>
       <hr>
       <p class="card-text text-center">
        <small>
          Firma entrega
        </small>
      </p>
    </div>
  </div>

</body>
</html>