<html>
<?php
include('inc/header.php');
?>
<body>
<h3 id="title">Weather Forecast</h3>

<div class="input_form">

    <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="cityname"/>
        <label class="mdl-textfield__label" for="cityname">Enter the City name</label>
    </div>

    <div class="clear"></div>

    <div class="clear"></div>
    <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="button" value="Search"
           onClick="getAPI()"/>
    <div class="clear"></div>

    <label class="mdl-checkbox mdl-js-checkbox" for="checkbox">
        <input class="mdl-checkbox__input" type="checkbox" id='checkbox' onClick="checkCheck()">
        <span class="mdl-checkbox__label">Current location <i class="material-icons md-18">gps_fixed</i></span>
    </label>

    <div id="resultation">
    </div>
    <div id="bylocation">
    </div>
</div>

</body>
</html>