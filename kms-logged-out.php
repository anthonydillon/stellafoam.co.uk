<div class="row stripe-grey">
	<div class="product-picker">
		<div class="eight-col append-four">
			<h2>
				Price and order your kitchen
			</h2>
		</div>
		<div class="three-col">
			<h3 class="step"><span>1</span> Component</h3>
			<div class="select-unit">
				<select class="select-unit__input">
					<?php echo get_KMS_components(); ?>
					<?php echo get_KMS_product(218, 'handle'); ?>
					<?php echo get_KMS_product(219, 'worktop'); ?>
					<?php echo get_KMS_product(220, 'carcass'); ?>
					<?php echo get_KMS_product(221, 'wirework'); ?>
					<option value="KMS-CP" data-image="corner-posts/corner-posts" data-type="corner-post">Corner Posts</option>
					<option value="KMS-TEPM" data-image="tall-end-panel-matt" data-type="tall-end-panel-matt">Tall End Panel Matt</option>
					<option value="KMS-TEPG" data-image="tall-end-panel-gloss" data-type="tall-end-panel-gloss">Tall End Panel Gloss</option>
					<option value="KMS-WE" data-image="wall-end-panel" data-type="wall-end-panel">Wall End Panel</option>
					<option value="KMS-BE" data-image="base-end-panel" data-type="base-end-panel">Base End Panel</option>
					<option value="KMS-PL" data-image="plinth" data-type="plinth">Plinth</option>
					<option value="KMS-PR" data-image="profiles" data-type="profiles">Profiles</option>
				</select>
				<img src="" alt="" class="select-unit__image" />
			</div>
		</div>

		<div class="three-col">
			<h3 class="step"><span>2</span> Design</h3>
			<div class="select-design">
				<select class="select-design__input">
					<?php echo get_KMS_designs(); ?>
					<?php echo get_KMS_product(222, 'corner-post'); ?>
					<?php echo get_KMS_product(224, 'tall-end-panel-matt'); ?>
					<?php echo get_KMS_product(225, 'tall-end-panel-gloss'); ?>
					<?php echo get_KMS_product(227, 'wall-end-panel'); ?>
					<?php echo get_KMS_product(228, 'base-end-panel'); ?>
					<?php echo get_KMS_product(229, 'plinth'); ?>
					<?php echo get_KMS_product(230, 'profiles'); ?>
				</select>
				<img src="" alt="" class="select-design__image" />
			</div>
		</div>

		<div class="three-col">
			<h3 class="step"><span>3</span> Quantity</h3>
			<select class="select-quantity__input">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				<option value="32">32</option>
				<option value="33">33</option>
				<option value="34">34</option>
				<option value="35">35</option>
				<option value="36">36</option>
				<option value="37">37</option>
				<option value="38">38</option>
				<option value="39">39</option>
				<option value="40">40</option>
				<option value="41">41</option>
				<option value="42">42</option>
				<option value="43">43</option>
				<option value="44">44</option>
				<option value="45">45</option>
				<option value="46">46</option>
				<option value="47">47</option>
				<option value="48">48</option>
				<option value="49">49</option>
				<option value="50">50</option>
				<option value="51">51</option>
				<option value="52">52</option>
				<option value="53">53</option>
				<option value="54">54</option>
				<option value="55">55</option>
				<option value="56">56</option>
				<option value="57">57</option>
				<option value="58">58</option>
				<option value="59">59</option>
				<option value="60">60</option>
				<option value="61">61</option>
				<option value="62">62</option>
				<option value="63">63</option>
				<option value="64">64</option>
				<option value="65">65</option>
				<option value="66">66</option>
				<option value="67">67</option>
				<option value="68">68</option>
				<option value="69">69</option>
				<option value="70">70</option>
				<option value="71">71</option>
				<option value="72">72</option>
				<option value="73">73</option>
				<option value="74">74</option>
				<option value="75">75</option>
				<option value="76">76</option>
				<option value="77">77</option>
				<option value="78">78</option>
				<option value="79">79</option>
				<option value="80">80</option>
				<option value="81">81</option>
				<option value="82">82</option>
				<option value="83">83</option>
				<option value="84">84</option>
				<option value="85">85</option>
				<option value="86">86</option>
				<option value="87">87</option>
				<option value="88">88</option>
				<option value="89">89</option>
				<option value="90">90</option>
				<option value="91">91</option>
				<option value="92">92</option>
				<option value="93">93</option>
				<option value="94">94</option>
				<option value="95">95</option>
				<option value="96">96</option>
				<option value="97">97</option>
				<option value="98">98</option>
				<option value="99">99</option>
				<option value="100">100</option>
			</select>
		</div>

		<div class="three-col last-col">
			<h3 class="step"><span>4</span> Summary</h3>
			<ul class="summary-list">
				<li class="summary-list__unit"><strong>Unit:</strong> <span></span></li>
				<li class="summary-list__design"><strong>Design:</strong> <span></span></li>
				<li class="summary-list__qty"><strong>Quantity:</strong> <span></span></li>
			</ul>

			<div class="add-button">
				<a href="" class="primary-button">Add to design list</a>
			</div>
		</div>
	</div>

	<div style="clear:both"></div>

	<div class="twelve-col box design-list-container">
		<h2>Design list</h2>
		<table class="design-list" cellpadding="20" cellspacing="10">
			<thead>
				<tr>
					<th>Component</th>
					<th>Design</th>
					<th>Quantity</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
		<div class="button-group">
			<div class="print-button">
				<a href="" class="secondary-button"><img src="print_icon.gif" alt=""></a>
			</div>
			<div class="clear-button">
				<a href="" class="secondary-button">Clear all</a>
			</div>

			<div style="clear:both"></div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
		var unitInput = $('.select-unit__input'),
			designInput = $('.select-design__input'),
			quantityInput = $('.select-quantity__input'),
			unitImage = $('.select-unit__image'),
			designImage = $('.select-design__image'),
			summaryUnit = $('.summary-list__unit span'),
			summaryUnitPrice = $('.summary-list__unit-price span'),
			summaryDesignList = $('.summary-list__design'),
			summaryDesign = $('.summary-list__design span'),
			summaryQty = $('.summary-list__qty span'),
			summaryPrice = $('.summary-list__price span'),
			addToCartBtn = $('.add-button a'),
			clearAllBtn = $('.clear-button a'),
			designList = $('.design-list tbody'),
			listContainer = $('.design-list-container'),
			submitToCart = $('.submit-button .primary-button'),
			cartArray = new Array(),
			imagePath = 'images/kms/',
			imageExtension = '.png',
			initFinished = false,
			storedItems = new Array(),
			unitPrice = 0,
			designName = '',
			component = '',
			design = '',
			price = 0,
			cart = '',
			qty = '',
			type = 'component';

		unitInput.change(function() {
			var imageName = unitInput.find(':selected').data('image');
			var selected = unitInput.find(':selected').text();
			unitImage.attr("src", imagePath + imageName + imageExtension);
			summaryUnit.text(selected);

			type = unitInput.find(':selected').data('type');
			if (type == 'handle' || type == 'worktop' || type == 'carcass' || type == 'wirework') {
				designInput.hide();
				designImage.hide();
				summaryDesignList.hide();
			} else {
				designInput.show()
				designImage.show();
				summaryDesignList.show();
				toggleLists();
			}

			updatePrice();
		});

		designInput.change(function() {
			var imageName = designInput.find(':selected').data('image');
			var selected = designInput.find(':selected').text();
			var selectedType = designInput.find(':selected').data('type');
			if (selectedType == 'corner-post' || selectedType == 'tall-end-panel-matt' || selectedType == 'tall-end-panel-gloss' || selectedType == 'wall-end-panel' || selectedType == 'base-end-panel' || selectedType == 'plinth' || selectedType == 'profiles') {
				designImage.attr("src", 'images/' + imageName);
			} else {
				designImage.attr("src", imagePath + 'doors/' + imageName + imageExtension);
			}
			summaryDesign.text(selected);
			updatePrice();
		});

		quantityInput.change(function() {
			var selected = quantityInput.find(':selected').text();
			summaryQty.text(selected);
			updatePrice();
		});

		function toggleLists() {
			designInput.find('option').hide();
			designInput.find('option[data-type="'+type+'"]').show();
			designInput.val(designInput.find('option[data-type="'+type+'"]').first().val()).trigger('change');
		}

		function updatePrice() {
			qty = quantityInput.find(':selected').val();
			design = designInput.find(':selected').val();
			component = unitInput.find(':selected').val();
			designName = designInput.find(':selected').text();

			if (type == 'component') {
				var code = component + '-' + design;
				input = code.substring(0, code.length - 1);
			} else if (type == 'corner-post' || type == 'tall-end-panel-matt' || type == 'tall-end-panel-gloss' || type == 'wall-end-panel' || type == 'base-end-panel' || type == 'plinth' || type == 'profiles') {
				input = design;
			} else {
				input = component;
				design = '';
				designName = '';
			}
			$.getJSON( "/get-item.php?q="+input, function( data ) {
				price = data.Price;
				summaryUnitPrice.html('&pound;' + price);
				summaryPrice.html('&pound;' + (price * qty).toFixed(2));
			});
		}

		addToCartBtn.click(function(e) {
			e.preventDefault();
			var item = component + '-' + design;
			cart += item + '>' + qty + '|';
			displayInCart(unitInput.find(':selected').text(), design, qty, price);
		});

		clearAllBtn.click(function(e) {
			e.preventDefault();
			cartArray = [];
			updateCart();
		});

		submitToCart.click(function(e) {
			e.preventDefault();
			var cookie = Cookies.get('kms-cart'),
				current = Cookies.get('stellafoamorder'),
				order = '';

			if (cookie !== undefined) {
				if (current !== undefined) {
					order += current + '|';
				}
				order += cookie;
				if (order.substring(order.length-1) == "|") {
        		order = order.substring(0, order.length-1);
    		}
				Cookies.set('stellafoamorder', order);
				Cookies.remove('kms-cart');
				window.location.href = "/cart.php";
			}
		});

		function getItemData(item, design, qty) {
			var code = item.substring(0, item.length - 1);
			$.getJSON( "/get-item.php?q="+code, function( data ) {
				getDesignData(data, design, qty);
			});
		}

		function getDesignData(component, design, qty) {
			$.getJSON( "/get-item.php?q="+design, function( data ) {
				var price = component.Price * qty;
				displayInCart(component.Stock_Name, data.Stock_Name, qty, price);
			});
		}

		function displayInCart(name, design, qty, price) {
			var dupIndex = -1;
			for(var i = 0; i < cartArray.length; i++) {
				if ((cartArray[i].code + '-' + cartArray[i].design) == component + '-' + design) {
					dupIndex = i;
				}
			}

			if (dupIndex !== -1) {
				cartArray[dupIndex].qty = (parseInt(cartArray[dupIndex].qty) + parseInt(qty));
			} else {
				cartArray.push({
					'code': component,
					'name': name,
					'design': design,
					'designName': designName,
					'qty': qty,
					'price': price
				});
			}
			updateCart();
		}

		function updateCart() {
			designList.empty();
			if (cartArray.length > 0) {
				listContainer.addClass('show');
				for(var i = 0; i < cartArray.length; i++) {
					var name = cartArray[i].name;
					if ( name.indexOf('#') != -1) {
						name = name.substring(name.indexOf('#') + 1);
					}
					designList.append(
						'<tr>' +
							'<td>'+name+'</td>' +
							'<td>'+cartArray[i].designName+'</td>' +
							'<td>'+cartArray[i].qty+'</td>' +
							'<td><a href="" class="delete-icon" data-index="'+ i +'">x</a></td>' +
						'</tr>'
					);
				}
				$('.delete-icon').click(deleteItem);
			} else {
				listContainer.removeClass('show');
			}
			updateTotalPrice();
		}

		function deleteItem(e) {
			e.preventDefault();
			var index = $(this).data('index');
			if (index > -1) {
			    cartArray.splice(index, 1);
			}
			updateCart();
		};

		function updateTotalPrice() {
			var grandTotal = 0;
			var cookieValue = '';
			for(var i = 0; i < cartArray.length; i++) {
				if (cartArray[i].design.indexOf('KMS-') != -1) {
					cookieValue += cartArray[i].design.replace('KMS-','KMS') + '~-' + cartArray[i].qty + '|';
				} else {
					cookieValue += cartArray[i].code.replace('-','') + '~' + cartArray[i].design.replace('KMS-','KMS') + '-' + cartArray[i].qty + '|';
				}
				grandTotal += parseInt(cartArray[i].price * cartArray[i].qty);
			}
			var vat = grandTotal * 0.2;
			if (initFinished) {
				console.log(cookieValue);
				Cookies.set('kms-cart', cookieValue);
			}
		}

		function init() {
			toggleLists();
			var cookie = Cookies.get('kms-cart');
			if (cookie !== undefined) {
				storedItems = cookie.split('|');
				displayStoredItem(0);
			} else {
				initFinished = true;
			}
		}

		function displayStoredItem(q) {
			if (storedItems[q]) {
				var itemFull = storedItems[q].split('-');
				var storedItem = itemFull[0].split('~');
				var itemID = storedItem[0].replace('KMS', 'KMS-');
				if( storedItem[1] != '' ) {
					// itemID += '-' + storedItem[1].substring(0, 1);
					itemID += '-' + storedItem[1];
				}
				if (storedItem[1] === '') {
					$.getJSON( "/get-item.php?q="+itemID, function( data ) {
						var code = data.Stock_Code.split('-');
						code = code[0] + '-' + code[1];
						var colour = data.Stock_Name;
						if ( colour.indexOf('#') != -1) {
							colour = colour.substring(colour.indexOf('#') + 1);
						}
						cartArray.push({
							'code': code,
							'name': data.Product_Title,
							'design': data.Stock_Code,
							'designName': colour,
							'qty': itemFull[1],
							'price': data.Price
						});
						q++;
						displayStoredItem(q);
					});
				} else {
					$.getJSON( "/get-item.php?q="+itemID+"&design=1", function( data ) {
						var component = data[0];
						var design = data[1];
						var code = component.Stock_Code.split('-');
						code = code[0] + '-' + code[1];
						cartArray.push({
							'code': code,
							'name': component.Stock_Name,
							'design': design.Stock_Code,
							'designName': design.Stock_Name,
							'qty': itemFull[1],
							'price': component.Price
						});
						q++;
						displayStoredItem(q);
					});
				}
			} else {
				updateCart();
				initFinished = true;
			}
		}

		unitInput.change();
		designInput.change();
		quantityInput.change();
		init();
	});
</script>
