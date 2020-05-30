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
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
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
            <pre>
sanjoseuniformes.com
Margarito Gonzalez Rubio #857
Col. El Refugio, Lagos de Moreno Jal.
Lagos de Moreno, Jal
ventas@sj-uniformes.com
47 47 42 30 00
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
      <td align="left"><strong>Fecha generado:</strong> {{ $sale->created_at }}</td>
    </tr>
  </table>

  <table width="100%">
    <tr>
        @if($sale->payment)
        <td><strong>Método pago:</strong> {{ optional($sale->payment)->name }}</td>
        @endif
        <td><strong>Folio:</strong> #{{ $sale->id }}</td>
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

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr align="center">
        <th>Concepto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @php($total=0)
      @foreach($sale->products as $sales)
      <tr>
        <td scope="row">{!! '<strong>'.$sales->product_detail->product_detail->name.'</strong> '.$sales->product_detail->code.' '.$sales->product_detail->product_detail_color->name. ' Talla: '.$sales->product_detail->product_detail_size->name !!}</tf>
        <td align="center">{{ $sales->quantity }}</td>
        <td align="right">${{ number_format($sales->product_detail->price, 2, ".", ",") }}</td>
        <td align="right">${{ number_format($sales->quantity*$sales->product_detail->price, 2, ".", ",") }}</td>
      </tr>
      @php($total+=$sales->quantity*$sales->product_detail->price)
      @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="2"></td>
            <td align="right">Total </td>
            <td align="right" class="gray">${{ number_format($total, 2, ".", ",") }}</td>
        </tr>
    </tfoot>
  </table>

  <table width="100%">
    <tr>
        <td>{{ $sale->ticket_text }}</td>
    </tr>
  </table>

</body>
</html>