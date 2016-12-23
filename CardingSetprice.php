<?php
    $cardID = $_GET['cardID'];
    //echo $cardID;
?>

<form method="post" action='cardingPriceset.php' >
    <input type="hidden" name="act" value="update112">
    <input type="hidden" name="cardID" value=<?php echo $cardID?>>
    價錢: <input name="highestprice" type="text" id="highestprice" /> <br>
    <input type="submit" name="Submit" value="送出" />
</form>