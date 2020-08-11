@component('mail::message')
# Hello Admin

<table>       
    <tbody>
      <tr>
        <th style="width: 20%;" align="left">Product Id :</th>
        <td>{{$product['id']}}</td>        
      </tr>
      <tr>
        <th style="width: 20%;" align="left">Product Id :</th>
        <td>{{$product['name']}}</td>        
      </tr>
    </tbody>
</table>

<br>
Regards,<br>
{{ config('app.name') }}
@endcomponent
