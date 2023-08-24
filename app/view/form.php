<form action="./" method="POST">
    <label for="year">Rok</label>
    <input type="number" name="year" min="1900" value=<?=$data->year;?>>
    <label for="month">Miesiąc</label>
    <select name='month'>
    <?php
      $monthList = Calendar::getMonthList();
      for($a=1; $a<count($monthList); $a++)
      {
        echo '<option value="'.$a.'"';
        if($a == intval($data->month))
        {
            echo ' selected ';
        }
        echo '>'.$monthList[$a].'</option>';
      }
    ?>
    </select>
    <input type="submit" value="Submit">
  </form>