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
            <h4 style=" background: #eee; ">@lang('labels.backend.access.bom.bom')</h4>

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
        <td><strong>Folio orden:</strong> #{{ $sale->id }}</td>
    </tr>
  </table>

  <table width="100%">
    <tr>
        @if($sale->user)
        <td><strong>A:</strong> {{ optional($sale->user)->name }}</td>
        @endif
        <td><strong>Expedido por:</strong> {{ $sale->generated_by->name }}</td>
    </tr>
  </table>

  @if($sale->comment)
  <table width="100%">
    <tr>
        <td><strong>Comentario:</strong> {{ $sale->comment }}</td>
    </tr>
  </table>
  @endif

  <br/>

  <table width="100%">
    <thead style="background-color: gray;">
      <tr align="center">
        <th>Concepto</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
      @foreach($sale->products as $sales)
      <tr>
        <td scope="row">{!! '<strong>'.$sales->product_detail->product_detail->name.'</strong> '.$sales->product_detail->code.' '.$sales->product_detail->product_detail_color->name. ' Talla: '.$sales->product_detail->product_detail_size->name !!}</tf>
        <td align="center">{{ $sales->quantity }}</td>
      </tr>
      @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td align="right"> </td>
            <td align="center" class="gray"><strong>{{ $sale->getTotalProducts() }}</strong></td>
        </tr>
    </tfoot>

  </table>

  <br>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr align="center">
        <th>Consumo</th>
        <th>Unidad</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
      @php($total=0)
      @foreach($sale_material->material_product_sale as $material)
      <tr>
        <td scope="row">
            <strong>{{ $material->material->part_number }}</strong> {!! ($material->material->color_id ? $material->material->color_name : '').' | '.$material->material->name !!}
        </td>
        <td align="center">{{ $material->material->unit->name }}</td>
        <td align="right">{{ $material->sum }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>