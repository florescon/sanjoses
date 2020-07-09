<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{ optional($sale->user)->name }}</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: medium;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: medium;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
  <tr>
    <td style="text-align: center;">
      <img src="{{ public_path('pro/img/logo22.png') }}" alt="" width="100"/>
    </td>
  </tr>
    <tr>
        <td align="center">
            <h3>San Jose Uniformes</h3>
            <h4 style=" background: #eee; "> @lang('labels.backend.access.order.order') | {{ $status->name }}</h4>
{{--             <pre>
sanjoseuniformes.com
Margarito Gonzalez Rubio #857
Col. El Refugio, Lagos de Moreno Jal.
Lagos de Moreno, Jal
ventas@sj-uniformes.com
47 47 42 30 00
            </pre>
 --}}        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
      <td align="left"><strong>Fecha generado:</strong> {{ $sale->created_at }}</td>
    </tr>
  </table>

  <table width="100%">
    <tr>
        <td><strong>Folio | {{ $status->name }}:</strong> #{{ $folio }}</td>
        <td><strong>Folio orden:</strong> #{{ $sale->id }}</td>
    </tr>
  </table>

  <table width="100%">
    <tr>
        <td><strong>A:</strong> {{ $user->name }}</td>
        <td><strong>Expedido por:</strong> {{ $sale->generated_by->name }}</td>
    </tr>
  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: gray;">
      <tr align="center">
        <th>Producto</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
      @php($total=0)
      @foreach($sale_product_by_staff->product_sale_staff as $product)
      <tr>
        <td scope="row">
            <strong>{{ $product->product_stock->product_detail->name }} </strong>
            {{ ' Color:'.$product->product_stock->product_detail_color->name. ' Talla:'.$product->product_stock->product_detail_size->name }} 
        </td>
        <td align="center">{{ $product->quantity }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>