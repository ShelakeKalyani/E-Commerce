<?php
function dis($price,$total_price)
{
		return (int)(100-($price*100)/$total_price);
}
?>