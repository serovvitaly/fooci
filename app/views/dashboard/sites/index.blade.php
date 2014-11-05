<button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-primary">Primary</button>

<table class="table table-condensed table-bordered table-hover table-striped">
  <thead>
    <tr>
      <th>Домен (Регистратор)<div>Free date / May be released / Created in</div></th>
      <th>ТИЦ</th>
      <th>PR</th>
      <th style="width: 48px"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($sites as $site)
      <tr>
        <td>
          <a href="http://{{ $site->domain }}" target="_blank">{{ $site->domain }}</a>
          <div style="font-size: 11px; font-weight: bold">{{ $site->free_date }} / {{ $site->may_be_released }} / {{ $site->created_in }} <span class="label label-primary" style="font-size: 86%;">{{ $site->registrar }}</span></div>
        </td>
        <td></td>
        <td></td>
        <td>
          <div class="dropdown">
            <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
              <span class="glyphicon glyphicon-tasks"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
              <li role="presentation" class="dropdown-header">Статистика Yandex</li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Проверить ТИЦ</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Проверить индексацию</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Проверить зеркала</a></li>
              <li class="divider"></li>
              <li role="presentation" class="dropdown-header">Статистика Google</li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Проверить PR</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Проверить индексацию</a></li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Проверить зеркала</a></li>
              <li class="divider"></li>
              <li role="presentation" class="dropdown-header">Общие операции</li>
              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Проверить Whois</a></li>
            </ul>
          </div>
        </td>
      </tr>
  @endforeach
  </tbody>
</table>

{{ $sites->links() }}