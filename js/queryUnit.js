function checkForm () {
	try{
		if($.trim($("#name").val())==""||
			$.trim($("#otherUnit").val())==""||
			$.trim($("#quantity").val())==""||
			$.trim($("#gQuantity").val())==""||
			$.trim($("#gPerOU").val())==""){

			alert("Please enter all fields!");
		return false;
		}
	}catch(e){
		alert(e);
		return false;
	}
	return true;
}

$(function(){
	$("#calcul").click(function() {
		// alert(111);
		var gVal=$("#gQuantity").val();
		var otherVal=$("#quantity").val();
		if(otherVal.indexOf("/")!="-1"){
			var otherArr=otherVal.split("/");
			otherVal = otherArr[0]/otherArr[1];
		}
		console.log("DEBUG:"+otherVal);
		var gPerOU=gVal/otherVal;
		$("#gPerOU").val(gPerOU);

	});
});

function deleteEntry(id){
	try{
		var confirmString = "Delete this entry. Are you sure?\n" + $.trim($("#name").val()) + "\n" + $.trim($("#otherUnit").val()) + "\n" 
							+ $.trim($("#quantity").val()) + "\n" + $.trim($("#gQuantity").val()) + "\n" + $.trim($("#gPerOU").val());

		if(window.confirm(confirmString)){
			window.location="queryUnit.php?action=del&id="+ id;
		}
	}catch(e){
		alert(e);
		return false;
	}
	return true;
}
// 格式化数字
function formatNum(str,num){
	var s = parseFloat(str);
	if(!num) num=4;
	if(isNaN(num)){
		return;
	}
	s = s.toFixed(num);
	if(s==""|| s<0)s=0;
	return s;
}

// function小数点后一位四舍五入
//
function round2(str){
   var s = parseFloat(str.substr(-1,1));
   if (s<5){
      return str.replace(/[1-9]$/,"0");      /// [1-9]$/
   }else {
      return str.replace(/[1-9]$/,"5");      //
   }

}

// 计算新变化量
$(function(){
	$("#calculBH").click(function() {
		var newQuantity = $.trim($("#quantity").val());
		if(newQuantity.indexOf("/")!="-1"){
			var otherArr=newQuantity.split("/");
			newQuantity = otherArr[0]/otherArr[1];
		}
		var gPerOU = $.trim($("#gPerOU").val());
		var newGQuantity = newQuantity*gPerOU;
		$("#gQuantity").val(round2(formatNum(newGQuantity,1)));
	});
	
});