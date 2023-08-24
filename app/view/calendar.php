  <table class="table">
    <thead>
      <tr>
        <th colspan='4' class='month'>
          <?=$data->monthName;
          // displaying supplied month name im $data object
          ?> 
        </th>
        <th colspan='3' class='year'>
          <?=$data->year; 
          // displaying supplied year in $data object
          ?>
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
      foreach($data->monthMap as $row) //looping through month map stored in a first array groups each one contains data for one week (one row)
      {
        echo '<tr>';
        foreach($row as $key => $day) //looping through each week (row) displaying each day for current week (row)
        {
          ($key == 6) ? $class='red' : $class = 'black'; //replacing class (colour change) if loop reach last day in this case set as Sunday
          echo '<td class="'.$class.'">';
            echo $day;
          echo '</td>';
        }
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>