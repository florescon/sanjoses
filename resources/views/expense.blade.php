<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>#{{ $subscription->id }} - @lang('labels.backend.access.expense.expense')</title>

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
      <td align="left"><strong>Fecha generado:</strong> {{ $subscription->created_at }}</td>
    </tr>
  </table>

  <table width="100%">
    <tr>
     <td><strong>Folio: </strong> #{{ $subscription->id }}</td>
    </tr>
  </table>


  <table width="100%">
    <tr>
        @if(!empty($subscription->user_id))
          <td><strong>A:</strong> {{ optional($subscription->user)->name }}</td>
        @endif
        @if(!empty($subscription->audi_id))
          <td><strong>Expedido por:</strong> {{ $subscription->generated_by->name }}</td>
        @endif
    </tr>
  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr align="center">
        <th>Concepto</th>
        <th>Monto</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td align="center">{{ $subscription->name }}</td>
        <td align="right">${{ $subscription->price }}</td>
        <td align="right">${{ $subscription->price }}</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">${{ $subscription->price }}</td>
        </tr>
    </tfoot>
  </table>

  <table width="100%">
    <tr>
        <td>{{ $subscription->ticket_text }}</td>
    </tr>
  </table>

</body>
</html>