<html>
<?php include('inc/header.php'); ?>
<body>
<h3>Weather application Admin panel</h3>
<p> <a href="<?= base_url(); ?>admin/logout">Logout.</a></p>
<form name="form1" method="post" action="<?= base_url(); ?>admin/delete">

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <thead>
        <tr>
            <th></th>
            <th class="mdl-data-table__cell--non-numeric">ID</th>
            <th class="mdl-data-table__cell--non-numeric">City</th>
            <th class="mdl-data-table__cell--non-numeric">Date</th>
            <th class="mdl-data-table__cell--non-numeric">Time</th>
            <th class="mdl-data-table__cell--non-numeric">Temperature</th>
            <th class="mdl-data-table__cell--non-numeric">Humidity</th>
            <th class="mdl-data-table__cell--non-numeric">Wind</th>
        </tr>
        </thead>

        <?php
        foreach ($list AS $key => $value) {
            ?>
            <tr>
                <td>
     <input name="checkbox[]" type="checkbox" value="<?= $value->id; ?>"/>
                </td>
                <td class="mdl-data-table__cell--non-numeric"><?= $value->id; ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?= $value->city; ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?= $value->date; ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?= $value->time; ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?= $value->city_temperature; ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?= $value->city_humidity; ?></td>
                <td class="mdl-data-table__cell--non-numeric"><?= $value->city_wind; ?></td>
            </tr>
        <?php } ?>
    </table>
    <div class="clear"></div>
    <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored adminbutton" type="submit"
           value="Remove"/>
    <div class="clear"></div>

</form>
</body>



        
    























   