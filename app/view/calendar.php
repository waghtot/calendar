  <table class="table">
    <thead>
      <tr>
        <th colspan='4' class='month'>
          <?=$data->monthName; ?>
        </th>
        <th colspan='3' class='year'>
          <?=$data->year; ?>
        </th>
      </tr>      
      <tr>
        <th class="black">
          Pn
        </th>
        <th class="black">
          Wt
        </th>
        <th class="black">
          Śr
        </th>
        <th class="black">
          Cz
        </th>
        <th class="black">
          Pt
        </th>
        <th class="black">
          So
        </th>
        <th class="red">
          N
        </th>
      </tr>

    </thead>
    <tbody>
      <?php
      foreach($data->monthMap as $row)
      {
        echo '<tr>';
        foreach($row as $key => $day)
        {
          ($key == 6) ? $class='red' : $class = 'black';
          echo '<td class="'.$class.'">';
            echo $day;
          echo '</td>';
        }
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>