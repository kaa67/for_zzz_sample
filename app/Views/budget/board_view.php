<?php foreach($accounts as $account): ?>
  <div class="alert alert-primary" role="alert">
    <?=$account->name?>
  </div>
<?php endforeach; ?>

<div class="table-responsive">
  <table class="table table-bordered table-striped">
    <tr class="table-secondary">
      <th rowspan="2">Д</th>
      <th colspan="3">
        Источники
        <a
          href="#"
          class="btn btn-primary btn-sm"
          role="button"
          aria-disabled="true"
        >+</a>
      </th>
      <th colspan="4">
        Счета
        <a
          href="#"
          class="btn btn-primary btn-sm"
          role="button"
          aria-disabled="true"
        >+</a>
      </th>
      <th colspan="7">
        Расходы
        <a
          href="#"
          class="btn btn-primary btn-sm"
          role="button"
          aria-disabled="true"
        >+</a>
      </th>
    </tr>

    <tr class="table-light">
      <th>Ост</th>
      <th>ЗП Ю</th>
      <th>ЗП А</th>

      <th>Сб Ю</th>
      <th>Сб А</th>
      <th>ВТБ Ю</th>
      <th>Аль Ф</th>

      <th>Комм</th>
      <th>Ипо</th>
      <th>Хён</th>
      <th>Кр500</th>
      <th>Кр100</th>
      <th>Хард</th>
      <th>Утюг</th>
    </tr>

    <?php foreach([3, 10, 10, 18, 23, 25, 25] as $d): ?>
      <tr>
        <td class="table-secondary"><?=$d?></td>

        <?php for($a = 1; $a < 15; $a++): ?>
          <td><?=$a?></td>
        <?php endfor; ?>
      </tr>

    <?php endforeach; ?>

  </table>
</div>