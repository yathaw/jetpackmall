$(document).ready(function(){

	cartNoti();
	showTable();
	

	$('.addtocartBtn').on('click', function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var codeno = $(this).data('codeno');
		var photo = $(this).data('photo');
		var unitiprice = $(this).data('unitiprice');
		var discount = $(this).data('discount');
		var qty = 1;

		var mylist = {id:id, codeno:codeno,
					name:name, photo:photo,
					unitiprice:unitiprice, discount:discount,
					qty:qty};

		console.log(mylist);

		var cart = localStorage.getItem('cart');
		var cartArray;

		if (cart==null) {
			cartArray = Array();
		}
		else{
			cartArray = JSON.parse(cart);
		}

		var status=false;

		$.each(cartArray, function(i,v){
			if (id == v.id) {
				v.qty++;
				status = true;
			}
		});

		if (!status) {
			cartArray.push(mylist);
		}

		var cartData = JSON.stringify(cartArray);
		localStorage.setItem("cart",cartData);

		cartNoti();
	});

	function cartNoti(){
		var cart = localStorage.getItem('cart');
		if (cart) {
			var cartArray = JSON.parse(cart);
			var total =0;
			var noti = 0;
			$.each(cartArray, function(i,v){

				var unitprice = v.price;
				var discount = v.discount;
				var qty = v.qty;
				if (discount) {
					var price = discount;
				}
				else{
					var price = unitprice;
				}
				var subtotal = price * qty;

				noti += qty ++;
				total += subtotal ++;
			})
			$('.shoppingcartNoti').html(noti);
			$('.shoppingcartTotal').html(CommaFormatted(total.toString())+' Ks');
		}
		else{
			$('.shoppingcartNoti').html(0);
			$('.shoppingcartTotal').html(0+' Ks');
		}
	}

	function showTable(){
		var cart = localStorage.getItem('cart');

		if (cart) {
			$('.shoppingcart_div').show();
			$('.noneshoppingcart_div').hide();

			var cartArray = JSON.parse(cart);
			var shoppingcartData='';


			if (cartArray.length > 0) {
				var total = 0;
				$.each(cartArray, function(i,v){
					var id = v.id;
					var codeno = v.codeno;
					var name = v.name;
					var unitprice = v.unitiprice;
					var discount = v.discount;
					var photo = v.photo;
					var qty = v.qty;
					
					var str_unitprice = CommaFormatted(unitprice.toString());
                    var str_discount = CommaFormatted(discount.toString());


					if (discount) {
						var price = discount;
					}
					else{
						var price = unitprice;
					}
					var subtotal = price * qty;
                    var str_subtotal = CommaFormatted(subtotal.toString());


					shoppingcartData += `<tr> 
											<td class="shoping__cart__item">
		                                        <img src="${photo}" alt="" class="img-fluid" style="width:120px; height:100px; object-fit:cover">
		                                        <h5> ${name} </h5>
		                                    </td>`;
					if (discount > 0) {
						shoppingcartData += `<td class="shoping__cart__price">
		                                        ${str_discount} Ks
		                                        <small> <del class="text-muted"> ${str_unitprice} Ks </del> </small>
		                                    </td>`;

		            }else{
						shoppingcartData += `<td class="shoping__cart__price">
		                                        ${str_unitprice} Ks
		                                    </td>`;
					}
						shoppingcartData += `<td class="shoping__cart__quantity">
		                                        <div class="quantity">
		                                            <div class="pro-qty">
		                                            	<span class="dec qtybtn" data-id="${i}"> - </span>
		                                                <input type="text" value="${qty}">
		                                                <span class="inc qtybtn" data-id="${i}"> + </span>
		                                            </div>
		                                        </div>
		                                    </td>
											<td class="shoping__cart__total">
		                                        ${str_subtotal} Ks
		                                    </td>
											
		                                    <td class="shoping__cart__item__close">
		                                        <span class="icon_close remove_btn" data-id="${i}"></span>
		                                    </td>
		                                </tr>`;
					total += subtotal ++;
				});
				var totality = parseInt(total) + parseInt(deliveryprice);
				// console.log(total);
				console.log(totality);

				$('tbody').html(shoppingcartData);
				$('.totality').html(CommaFormatted(totality.toString())+' Ks');


			}
			else{
				$('.shoppingcart_div').hide();
				$('.noneshoppingcart_div').show();
			}
		}
		else{
			$('.shoppingcart_div').hide();
			$('.noneshoppingcart_div').show();
		}
	}

	// Remove Item
	$('tbody').on('click','.remove_btn', function()
	{
		var id = $(this).data('id');

		console.log(id);

		var cart=localStorage.getItem("cart");
		var cartArray = JSON.parse(cart);

		$.each(cartArray,function (i,v) 
		{
			if (i == id) 
			{
				cartArray.splice(id,1);
			}
		})

		var cartData=JSON.stringify(cartArray);

		localStorage.setItem("cart",cartData);
		
		showTable();
		cartNoti();

	});

	// Add Quantity
	$('tbody').on('click','.inc', function()
	{
		var id = $(this).data('id');

		var cart=localStorage.getItem("cart");
		var cartArray = JSON.parse(cart);
		
		$.each(cartArray,function (i,v) 
		{
			console.log(i);
			if (i == id) 
			{
				v.qty++;
			}
		})
		
		var cartData = JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);
		showTable();
		cartNoti();

	});

	// Sub Quantity
	$('tbody').on('click','.dec', function()
	{
		var id = $(this).data('id');

		var cart=localStorage.getItem("cart");
		var cartArray = JSON.parse(cart);
		
		$.each(cartArray,function (i,v) 
		{
			if (i == id) 
			{
				v.qty--;
				if (v.qty == 0) 
				{
					cartArray.splice(id,1);
				}
			}
		})
		
		var cartData = JSON.stringify(cartArray);
		localStorage.setItem('cart',cartData);
		showTable();
		cartNoti();

	});

	$('.checkoutBtn').click(function () {
	    var cart=localStorage.getItem("cart"); //string
	    var note = $('#notes').val();  //get note from input

	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    $.post('/order',{
			data:cart,note:note 
		},function(response){
			localStorage.clear();
			location.href="ordersuccess";
		});
	});

	function CommaFormatted(amount) 
    {
        var delimiter = ","; // replace comma if desired
        var a = amount.split('.',2)
        var i = parseInt(a[0]);
        
        if(isNaN(i)) 
        {
            return ''; 
        }
        
        var minus = '';
        
        if(i < 0) 
        {
            minus = '-'; 
        }
        
        i = Math.abs(i);
        var n = new String(i);

        var a = [];
        
        while(n.length > 3) {
            var nn = n.substr(n.length-3);
            a.unshift(nn);
            n = n.substr(0,n.length-3);
        }

        if(n.length > 0) 
        { 
            a.unshift(n); 
        }
        n = a.join(delimiter);

        amount = minus + amount;

        // console.log(n);

        return n;

    }

});