<?php
						$coloursList = getColours();
						$productsList = getProducts();
						$itemsList = getItems($prods, $cols);
					?>		
					
					<div id="admin_menu">
						
						<a href="/admin/products.php">Product</a> <a href="/admin/colours.php">Colour</a>
					</div>	
					<div id="items">
						<div id="items_menu"><a href="/admin/items.php">Add Item</a></div>
						<form method="post">
						Product: <select name="prods">
						<option value="-1">All</option>
						<?php
							for($i = 0; $i < count($productsList); $i++){
								if($prods != $productsList[$i][0]){
									echo '<option value="'.$productsList[$i][0].'">'.$productsList[$i][1].'</option>';
								}else{
									echo '<option value="'.$productsList[$i][0].'" selected="selected">'.$productsList[$i][1].'</option>';
								}
							}
						?>
						</select>
						Colour: <select name="cols">
						<option value="-1">All</option>
						<?php
							for($i = 0; $i < count($coloursList); $i++){
								if($cols != $coloursList[$i][0]){
									echo '<option value="'.$coloursList[$i][0].'">'.$coloursList[$i][1].'</option>';
								}else{
									echo '<option value="'.$coloursList[$i][0].'" selected="selected">'.$coloursList[$i][1].'</option>';
								}
							}
						?>
						</select>
						<input type="submit" value="Filter" />
						</form>
						<table width="750px;" border="1">
						<tr><th width="20%">Item Name</th><th width="20%">Product</th><th width="20%">Colour</th><th width="10%">Edit</th><th width="10%">Delete</th></tr>
						<?php
							for($i = 0; $i < count($itemsList); $i++){
								echo '<tr><td>'.$itemsList[$i]["Item_Title"].'</td><td>'.getProductsName($productsList,$itemsList[$i]["Product_ID"]).'</td><td>'.getColourName($coloursList,$itemsList[$i]["Colour_ID"]).'</td><td align="center"><a href="/admin/items.php?todo=display&id='.$itemsList[$i]["Item_ID"].'" title="Edit"><img src="edit.png" border="0" alt="Edit"/></a></td><td align="center"><a href="/admin/items.php?todo=delete&id='.$itemsList[$i]["Item_ID"].'" title="Delete"><img src="delete.png" border="0" alt="Delete"/></a></td></tr>';
							}
						?>
						</table>
					</div>