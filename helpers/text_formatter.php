<?php 

	/**
	 * Get formated column as an array
	 */
	function getFormattedColumn($columnName, $results) {
			$var = "";
			foreach ($results as $row) {
  				$var.=$row[$columnName].", ";
			}
			return $var;
	}
?>