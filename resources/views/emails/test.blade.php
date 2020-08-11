@component('mail::message')
# Hello 

This is the mail for give the order information, please check the below details: 

<table>       
    <tbody>
      <tr>
        <th style="width: 20%;" align="left">Product Name :</th>
        <td>{{$product['name']}}</td>        
      </tr>
      <tr>
        <th align="left">Product Qty :</th>
        <td>{{$quantity}}</td>        
      </tr>
		<tr>
        <th align="left">Product Image :</th>
        <td><img src="{{$product['photo']}}"></td>        
      </tr>

    </tbody>
</table>

<br>
Regards,<br>
{{ config('app.name') }}
@endcomponent
