<?php
$list = array( "Nepal"=>"Kathmandu", "India"=>"New Delhi", "Australia"=> "Sydney",
"Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris",
"Slovakia"=>"Bratislava", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon",
"Spain"=>"Madrid") ;

asort($list);

foreach($list as $key => $value){
    echo 'The capital of '.$key.' is '.$value.'<br>';
}
?>