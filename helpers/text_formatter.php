<?php 

	/**
	 * Get formated column as an array
	 */
	function getFormattedColumn($columnName, $results) {
			$var = "";
			while ($row = $results->fetch_assoc()) {
  				$var.=$row[$columnName].", ";
			}
			return $var;
	}
?>