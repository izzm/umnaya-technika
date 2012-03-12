<div>
	<div class="modalScrollItem">
		<table id="archiveNewsTable">
			<tr>
	      <td>
	        {{if news[0]}}
	        <h3>${news[0]['dt_news']}</h3>
		      <p>${news[0]['short_news']}</p>
		      <a href="#" class="formlink" rel="showNews" data-id-news="${news[0]['id_news']}">Подробнее</a>
		      <img src="images/forms/separator_h1.png" width="280" height="15" style="margin:10px 0 0 0;" />
		      {{/if}}
	      </td>
	      <td>
	        {{if news[1]}}
	        <h3>${news[1]['dt_news']}</h3>
		      <p>${news[1]['short_news']}</p>
		      <a href="#" class="formlink" rel="showNews" data-id-news="${news[1]['id_news']}" data-show-before="true">Подробнее</a>
		      <img src="images/forms/separator_h1.png" width="280" height="15" style="margin:10px 0 0 0;" />
		      {{/if}}
	      </td>
      </tr>
      <tr>
	      <td>
	        {{if news[2]}}
	        <h3>${news[2]['dt_news']}</h3>
		      <p>${news[2]['short_news']}</p>
		      <a href="#" class="formlink" rel="showNews" data-id-news="${news[2]['id_news']}">Подробнее</a>
		      <img src="images/forms/separator_h1.png" width="280" height="15" style="margin:10px 0 0 0;" />
		      {{/if}}
	      </td>
	      <td>
	        {{if news[3]}}
	        <h3>${news[3]['dt_news']}</h3>
		      <p>${news[3]['short_news']}</p>
		      <a href="#" class="formlink" rel="showNews" data-id-news="${news[3]['id_news']}">Подробнее</a>
		      <img src="images/forms/separator_h1.png" width="280" height="15" style="margin:10px 0 0 0;" />
		      {{/if}}
	      </td>
      </tr>
		</table>
	</div>
</div>
