<!-- priority given date.php>archive.php>index.php -->
<h1>this is date.php page</h1>
<?php
if(is_date()){
	echo "this is date arhive";
}
elseif(is_month()){
	echo "this is month arhive";
}
elseif(is_year()){
	echo "this is year archive";
}
?>