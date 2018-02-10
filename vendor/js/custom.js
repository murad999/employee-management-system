

$(".exact_input").keyup(function(){
var abc=$(this).attr("data_acccurate");
var id="#percent_"+abc;

var basic=parseInt($(id).attr("basic_payment"));
var exact=parseInt($(this).val());


var  percent= exact*100/basic;
	//console.log(percent);
     percent = Math.round(percent * 100) / 100;

$(id).val(percent);

var total=0;

$(".exact_input").each(function () {

  total+=parseInt($(this).val());
  console.log(total);
});
$("#total_ammount").text(total);
});


 function sharifcal(abc)
  {
  calculator.txt1.value=calculator.txt1.value+abc;
  }  


//number input

 function xyz(x){
      if (isNaN(x)== true) {
        alert("please enter number");
        }
        else{
           var subtotal = document.getElementById('subtotal').value;
           var grandtotal=(parseInt(subtotal)-parseInt(x));
          document.getElementById('grand').value = grandtotal;
        }
}