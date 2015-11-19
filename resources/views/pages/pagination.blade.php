<?php print_r($paginationData); ?>

<?php
// if($paginationData['totalPages'] > 10) {

// }

/*Array(
    [currFirst] => 5
    [totalResults] => 7
    [totalPages] => 4
    [currPage] => 2
)*/
$url = $paginationData['url'];
for($i = 0; $i < $paginationData['totalPages']; $i++) { 
	$appendArr = array('page' => $i);
?>
	<a href="<?php echo Common::appendParamToUrlNew($appendArr, $url); ?>"><?php echo ($i+1); ?></a> 
<?php } ?>