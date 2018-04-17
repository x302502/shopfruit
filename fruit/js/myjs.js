
$(".menu1").next('ul').toggle();

$(".menu1").click(function(event) {
	$(this).next("ul").toggle(500);
});
$(document).ready(function() {
	$("#buttonSum").click(function(event) {
		var x=$("#quantity").val();
		 x=parseInt(x)+1;
		console.log(x);
		$("#quantity").val(x);
	});
	$("#buttonSub").click(function(event) {
		var x=$("#quantity").val();
		y=parseInt(x);
		if (y>0) {
			y--	;
			console.log(y);
			$("#quantity").val(y);
		}

	});

});
function addCart(id,countProduct){
	showSpinner();
   	if (countProduct > 0) {
		$("#myModal").modal('show');
	     $.ajax({
			type: "GET",
			url: "./addCart/" + id +"/"+countProduct,
			success: function (data) {
				$("#fruitName").html(data.product.productname);
				$("#fruitPrice").html(data.product.price * 1000);
				$("#fruitTotalQty").html(data.cart.totalQty);
				$("#fruitTotalPrice").html(data.cart.totalPrice * 1000);
				$("#number").html(data.cart.totalQty);
				$("#img-modal").attr('src', 'img/'+data.product.picture);
			}
			});
	} else {
		alert("Bạn chưa chọn số lượng sản phẩm");
	}
	hideSpinner();
}
function addMultipleProduct(id) {
  let countProduct = $("#quantity").val();
  addCart(id,countProduct);
}
// activityIndicator
function showSpinner() {
	$("#loading").css("visibility", "visible");

  }

  function hideSpinner() {
	$("#loading").css("visibility", "hidden");
	}
	//
async	function subCart(id){
		let idTag = "#quantityCart"+id;
		var x = $(idTag).val();
		y=parseInt(x)-1;
		await $.ajax({
			type: "GET",
			url: "./subCart/" + id +"/"+1,
			success: function (data) {
				if (y<=0) {
					window.location.reload();
				} else {
					$(idTag).val(y);
					$("#totalQtyCartShop").html(data.cart.totalQty);
					$("#totalPriceCartShop").html(data.cart.totalPrice * 1000);
				}
				}
			});

	}
async	function sumCart(id){
	let idTag = "#quantityCart"+id;
	var x = $(idTag).val();
		y=parseInt(x)+1;
		await $.ajax({
			type: "GET",
			url: "./addCart/" + id +"/"+1,
			success: function (data) {
				$(idTag).val(y);
				$("#totalQtyCartShop").html(data.cart.totalQty);
				$("#totalPriceCartShop").html(data.cart.totalPrice * 1000);
				}
			});
	}
