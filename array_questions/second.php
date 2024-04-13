<?php
$color = array('white', 'green', 'red');
foreach($color as $col){
    echo $col.', ';
}
?>
<ul>
<?php
foreach($color as $col){
    echo '<li>'.$col.'</li>';
}
?>
</ul>