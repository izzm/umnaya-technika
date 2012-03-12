<table class="sales" border="0">
  <tr>
  	<th>ДАТА РЕГИСТРАЦИИ ПРОДАЖИ</th>
    <th>КАТЕГОРИЯ ТЕХНИКИ</th>
    <th>МОДЕЛЬ ТЕХНИКИ</th>
    <th>ДАТА ПРОДАЖИ ТЕХНИКИ</th>
    <th>СТОИМОСТЬ</th>
    <th>БАЛЛЫ</th>
    <th style="width:160px">КОММЕНТАРИЙ</th>
  </tr>
  {{each sales}}
  <tr>
    <td>${$value.dt_reg}</td> 
    <td>${$value.category}</td>
    <td>${$value.model}</td>
    <td>${$value.dt_sale}</td>
    <td>${$value.price}</td>
    <td>${$value.points}</td>
    <td>${statuses[$value.status]}</td>
  </tr>
  {{/each}}
</table>
