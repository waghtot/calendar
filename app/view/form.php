<form action="./" method="POST">
  <!-- I chose POST method to keep address bar clear but more important is security - do not trust anyone - and hide path to the script which is dealing with request. It can be easly tracked with developer tools but that require some knowledge how to do it :) -->
    <label for="year">Rok</label>
    <input type="number" name="year" min="1900" value=<?=$data->year;?>> <!-- year has been set to default value take from the $data object -->
    <label for="month">Miesiąc</label>
    <select name='month'>
    <?php
      $monthList = Calendar::getMonthList(); //calling Calendar method getMonthList to avoid code duplication - if that method already exists why do not use it? :)
      for($a=1; $a<count($monthList); $a++) //looping through list to generate option values for select field
      {
        echo '<option value="'.$a.'"';
        if($a == intval($data->month)) // selecting month if matching what is in $data object for month property
        {
            echo ' selected ';
        }
        echo '>'.$monthList[$a].'</option>';
      }
    ?>
    </select>
    <input type="submit" value="Submit">
  </form>