// 确保metric列和百分比列输入的都是数字且大于0
// 全局变量
var xmlhttp;


//

//格式化数字，输入只能是数字和小数点
//
function numberAndPoint(str) {
   return str.replace(/[^(\d|\.)]/g,'');
}

//格式化数字，保留num位小数
//
function formatNum(str,num){
   var s = parseFloat(str);
   if(!num) num=4;
   if(isNaN(s)){
      return;
   }
   s = s.toFixed(num);
   if(s=="" || s<0) s=0;
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


// 取得数组长度
function count(o) {                 
    var t  =  typeof o;                 
    if (t  ==  'string') {                         
        return o.length;                 
    } else 
    if (t  ==  'object') {                         
        var n  =  0;                         
        for (var i  in  o) { 
         n++;                         
        }                         
        return n; 

                        
    }                 
    return false;         
}

// 检查ingre和metric列全部都填上了
//
function checkFill(){
   var _len = $("#tab tr").length;
   console.log("DEBUG -表格行数 "+_len);
   for(var i=1; i<_len;i++){
      if (($("#ingre"+i).val() ==null)||($("#ingre"+i).val() =="")){
         console.log("DEBUG - 检查ingre字段为空时弹出警告");
         alert("inger字段"+i+"不能为空");
      }

      if (($("#metric"+i).val() ==null)||($("#metric"+i).val() =="")){
         console.log("DEBUG - 检查metric字段为空时弹出警告");
         alert("metric字段"+i+"不能为空");
      }
   }

   // 将百分比计算方法插入到每一个百分比框中
   // 
   var allingres = $("#tab tr").length-1;
   console.log("DEBUG -allingres是 "+allingres);
   for (var i=1;i<=allingres;i++){
      console.log("DEBUG -input 行号 "+i);
      $("#percent"+i).bind("change",function(){this.value=numberAndPoint(this.value);exchangePerc(this);});
   }
}

// clearPercentCol
//
function clearPercentCol(){
   // alert("href");
   $("input[id^='percent']").val("");
}
// 正则去除html
function stripHTMLTag(str) {
    str = new String(str);
    // 去除HTML tag
    str = str.replace(/<\/?[^>]*>/g,'');
    // 去除行尾空白
    str = str.replace(/[ | ]*\n/g,'\n');
    // 去除多余空行
    str = str.replace(/\n[\s| | ]*\r/g,'\n');
    // 去掉&nbsp;
    str = str.replace(/&nbsp;/ig,'');
            
    return str;
}

// 多个ajax任务共用的创建 XMLHTTPRequest标准函数o

function loadXMLDoc(url,fun){
   // 建立XMLHttpRequest对象
   if (window.XMLHttpRequest) { // code for IE7+,Firefox, chrome, opera, safari
      xmlhttp= new XMLHttpRequest();
   } else{ // code for IE5, IE6
      xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
   };
   // 设置响应后执行的函数
   xmlhttp.onreadystatechange=fun;
    console.log("DEBUG - URL:"+url);
   xmlhttp.open("GET",url,true);
   xmlhttp.send();
}

// ajax验证配方名是否重名
//
function showHint(str){
   if (str.length==0) {
      $("#mySpan").text("");
      console.log("DEBUG - #mySpan:"+'空');
   return;
   };
   loadXMLDoc("queryDouble.php?q="+str,function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
         console.log("DEBUG - #mySpan:"+xmlhttp.responseText);
         $("#mySpan").html(xmlhttp.responseText);
      }
   });
   // var xmlhttp;
   // if (str.length==0) {
   //    $("#mySpan").text("");
   //    return;
   // };
   // if (window.XMLHttpRequest) { // code for IE7+,Firefox, chrome, opera, safari
   //    xmlhttp= new XMLHttpRequest();
   // } else{ // code for IE5, IE6
   //    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
   // };
   // xmlhttp.onreadystatechange=function(){
   //    if(xmlhttp.readyState==4 && xmlhttp.status==200){
   //       $("#mySpan").html(xmlhttp.responseText);
         
   //          // $("form").submit(function(){
   //             // if(stripHTMLTag(xmlhttp.responseText)=="重名"){
   //             //    console.log("DEBUG - 阻止form");
   //             //    $("form").submit(function(e){e.preventDefault();});
   //             // }else{
   //             //    console.log("DEBUG - mySpan: 非重名");
   //             //    // $("#save").click(function(){
   //             //    //    console.log("DEBUG - mySpan: 进入");
   //             //    //    return true;
   //             //    // }).button("refresh");
   //             // }
   //          // });
         
   //    }
   // }
   // xmlhttp.open("GET","queryDouble.php?q="+str,true);
   // xmlhttp.send();

}

// 查询勺，汤匙,克换算表

function queryG(str){
   if(str.length==0){
      $("#queryG").val("");
      return;
   }

   loadXMLDoc("queryG.php?tsp="+str,function(){
      if(xmlhttp.readyState==4 && xmlhttp.status==200){
          console.log("DEBUG - #mySpan:"+xmlhttp.responseText);
         $("#queryGResult").html(xmlhttp.responseText);
            // 查询tsp到g转换表后
         $(".copy").zclip({
            path: "js/ZeroClipboard.swf",
            copy: function(){
               return $(this).text();
            },
            afterCopy:function(){/*复制成功后的操作*/
               var $copysuc=$("<div class='copy-tips'><div class='copy-tips-wrap'>☺ 复制成功</div></div>");
               $("body").find(".copy-tips").remove().end().append($copysuc);
               $(".copy-tips").fadeOut(2000);
            }
         });
      }
   });
}

// ajax绑定事件到配方名称
//
$(function(){
   // $("#mySpan").text("垃圾");
   // ajax绑定事件到配方名称
   $("#rName").on("change keyup",function(){
      console.log("DEBUG - #rName: 绑定事件到配方名称");
      showHint(this.value);
      // console.log("DEBUG - showHint: "+showHint(this.value));
      // if(!showHint(this.value)){
      //    console.log("DEBUG - 阻止form");
      //    $("form").submit(function(e){e.preventDefault();});
      // }else{
      //     console.log("DEBUG - 提交form");
      //    $("form").submit();
      // }
   });

   $("#queryG").on("change keyup",function(){
      queryG(this.value);
   });

   // 验证表单
   $("form").submit(function(e){
      if ($("#mySpan").text()=="重名") {
         return false;
      } else{
         return true;
      };
   });

});

// 换算单位
$(function(){
   $("#selectUnit").on("click change",function(){
      var otherUnit=$("#otherUnit").val();
      var gUnit=0;
      if(otherUnit!=""){
         // alert();
         console.log("DEBUG - selectValue:"+this.value);
         console.log("DEBUG - otherUnit:"+otherUnit);
         var selectValue=Number(this.value);
         switch(selectValue){
            case 1:
            // 千克
            gUnit=otherUnit*1000;
            console.log("DEBUG - gUnit1:"+gUnit);
            break;
            case 2:
            gUnit=otherUnit*500;
            console.log("DEBUG - gUnit2:"+gUnit);
            break;
            case 3:
            gUnit=otherUnit*50;
            console.log("DEBUG - gUnit3:"+gUnit);
            break;
            case 4:
            gUnit=otherUnit*5;
            console.log("DEBUG - gUnit4:"+gUnit);
            break;
            case 5:
            gUnit=otherUnit*55;
            console.log("DEBUG - gUnit5:"+gUnit);
            break;
         }
         $("#gUnit").val(gUnit);
      }
   });

   // 复制转换单位后的数值
   $("#zCopy").zclip({
      path: "js/ZeroClipboard.swf",
      copy: function(){
         return $(this).parent().find("#gUnit").val();
      },
      afterCopy:function(){/*复制成功后的操作*/
         var $copysuc=$("<div class='copy-tips'><div class='copy-tips-wrap'>☺ 复制成功</div></div>");
         $("body").find(".copy-tips").remove().end().append($copysuc);
         $(".copy-tips").fadeOut(2000);
      }
   });

   // 查询tsp到g转换表后
   $(".copy").zclip({
      path: "js/ZeroClipboard.swf",
      copy: function(){
         return $(this).text();
      },
      afterCopy:function(){/*复制成功后的操作*/
         var $copysuc=$("<div class='copy-tips'><div class='copy-tips-wrap'>☺ 复制成功</div></div>");
         $("body").find(".copy-tips").remove().end().append($copysuc);
         $(".copy-tips").fadeOut(2000);
      }
   });
});

// 计算百分比方法
//
function exchangePerc(){
      // 定义数组
      var percents = new Array();
      // 先验证配料和用量两列
      var i=1;
      $("tbody tr").each(function(){
         if(($("input[id='ingre"+i+"']").val()=="") || ($("input[id='metric"+i+"']").val()=="")){
            alert("请填写第 "+i+" 行上的配料和用量!");
         }

         if(($("input[id='percent"+i+"']").val() != "") && ($("input[id='percent"+i+"']").val() != undefined)){
            percents[i] = $("input[id='percent"+i+"']").val();
            console.log("DEBUG - percents: " + percents[i]);
         }

         i++;
      });

      // 判断数组
      // 调试
      // for(x in percents){
      //    console.log("DEBUG percents[x]" + x +"="+ percents[x]);
      // }
      console.log("DEBUG count(percents): " + count(percents));         // 调试
      var arrlen=count(percents);

      if((arrlen) > 1){
         alert("只能有一个百分比 100%");
         return false;
      } else if((arrlen) == 0){
         alert("请指定一个原料做为 100%");
         return false;
      } else if((arrlen) == 1){
         for (var x in percents){
            if (percents[x] != 100){
               alert("您指定的值只能为 100");
               return false;
            } else{
               // 计算百分比
               // 取得100%行号对应的metric值
               var baseMetric =  $("input[id='metric"+x+"']").val();
                  console.log("DEBUG baseMetric: " + baseMetric);       // 调试
               // 遍历每一行 
               var i=1;
               $("tbody tr").each(function(){
                  console.log("DEBUG x: " + x);       // 调试
                  console.log("DEBUG i: " + i);       // 调试
                  if ( i != x ) {
                     var thisRowMetric = $("input[id='metric"+i+"']").val();
                        console.log("DEBUG thisRowMetric: " + thisRowMetric);       // 调试
                     var thisRowPercent = formatNum((thisRowMetric/baseMetric*100),2);
                        console.log("DEBUG thisRowPercent: " + thisRowPercent);        // 调试
                     $("input[id='percent"+i+"']").val(thisRowPercent);
                  }
                  i++;
               });
               return true;
            }
         }
      }

}

// 计算有种配方
function exchangePercSpon(){
         // 定义数组
      var percents = new Array();
      // 先验证配料和用量两列
      var i=1;
      $("tbody tr").each(function(){
         if(($("input[id='ingre"+i+"']").val()=="") || ($("input[id='metric"+i+"']").val()=="")){
            alert("请填写第 "+i+" 行上的配料和用量!");
         }

         if(($("input[id='percent"+i+"']").val() != "") && ($("input[id='percent"+i+"']").val() != undefined)){
            percents[i] = $("input[id='percent"+i+"']").val();
            console.log("DEBUG - percents: " + percents[i]);
         }

         i++;
      });

      console.log("DEBUG count(percents): " + count(percents));         // 调试
      var arrlen=count(percents);

      if((arrlen) > 2){
         alert("只能有2个百分比项");
         return false;
      } else if((arrlen) == 0){
         alert("请指定第一个面粉百分比");
         return false;
      } else if ((arrlen) == 1){
         alert("请指定另外一个面粉百分比");
         return false;
      }else if((arrlen) == 2){
         var percentSum=0;
         var baseMetric=0;
         for (var x in percents){
            percentSum += Number(percents[x]);
            console.log("DEBUG percentSum: " + percentSum);         // 调试
         }
         if (percentSum != 100){
            alert("您指定的2个值和只能为 100");
            return false;
         } else{
            // 计算百分比
            // 取得100%行号对应的metric值
            for (var x in percents){
               baseMetric +=  Number($("input[id='metric"+x+"']").val());
               console.log("DEBUG baseMetric: " + baseMetric);       // 调试
            }
            // 遍历每一行 
            var i=1;
            $("tbody tr").each(function(){
               console.log("DEBUG x: " + x);       // 调试
               console.log("DEBUG i: " + i);       // 调试
               if ( i != x ) {
                  var thisRowMetric = $("input[id='metric"+i+"']").val();
                     console.log("DEBUG thisRowMetric: " + thisRowMetric);       // 调试
                  var thisRowPercent = formatNum((thisRowMetric/baseMetric*100),2);
                     console.log("DEBUG thisRowPercent: " + thisRowPercent);        // 调试
                  $("input[id='percent"+i+"']").val(thisRowPercent);
               }
               i++;
            });
            return true;
            
         }
      }


}

// 先验证配料和用量两列     v
var checkIngrePerc=function(index){

      if(($("input[id='percent"+index+"']").val()=="") || ($("input[id='ingre"+index+"']").val()=="")){
         alert("请填写第 "+index+" 行上的百分比和配料名称!");
         return false;
      }else{
         return true;
      }

      // if(($("input[id='percent"+i+"']").val() != "") && ($("input[id='percent"+i+"']").val() != undefined)){
      //    percents[i] = $("input[id='percent"+i+"']").val();
      //    console.log("DEBUG - percents: " + percents[i]);
      // }


}       

// 计算百分比列的总百分比
function calculatePercSum(){

      // var i=1;
      // $("tbody tr").each(function(){
      
      //    i++;
      // });
      var sum=0;
      var percentSum=0;
      var l=1;
      var nullFlag=0;
      $("tbody tr").each(function(){
         // sum += Number($("input[id='metric"+l+"']").val());
         if (checkIngrePerc(l)) {
         percentSum += Number($("input[id='percent"+l+"']").val());
         
         }else{
            nullFlag=1;
         }
         l++;
      });

      // 表格最后增加一行显示 sum 和 percentSum
      if (nullFlag==0){
         $("tbody").append("<tr>"
                     +"<td>rowNum: "+(l-1)+"<input type='hidden' name='rowNum' id='rowNum' value='"+(l-1)+"'></td>"
                     +"<td>sum= "+formatNum(sum,2)+"<input type='hidden' name='sum' id='sum' value='"+formatNum(sum,2)+"'></td>"
                     +"<td>sumPerc= "+formatNum(percentSum,2)+"<input type='hidden' name='percentSum' id='percentSum' value='"+formatNum(percentSum,2)+"'></td>"
                     +"<td></td>"
                     +"</tr>");
      }

      $("tbody").trigger("create");
      $("#tab").table("rebuild");
      $("#add").attr("disabled","disabled").button("refresh");
}

// 更新reCalculatePercSum
function updateCalculatePercSum(){
   var sum=0;
      var percentSum=0;
      var l=1;
      var nullFlag=0;
      $("tbody tr").each(function(){
         // sum += Number($("input[id='metric"+l+"']").val());
         if (checkIngrePerc(l)) {
         percentSum += Number($("input[id='percent"+l+"']").val());
         
         }else{
            nullFlag=1;
         }
         l++;
      });

      // 表格最后增加一行显示 sum 和 percentSum
      // if (nullFlag==0){
      //    $("tbody").append("<tr>"
      //                +"<td>rowNum: "+(l-1)+"<input type='hidden' name='rowNum' id='rowNum' value='"+(l-1)+"'></td>"
      //                +"<td>sum= "+formatNum(sum,2)+"<input type='hidden' name='sum' id='sum' value='"+formatNum(sum,2)+"'></td>"
      //                +"<td>sumPerc= "+formatNum(percentSum,2)+"<input type='hidden' name='percentSum' id='percentSum' value='"+formatNum(percentSum,2)+"'></td>"
      //                +"<td></td>"
      //                +"</tr>");
      // }

      $("#percentSum").val(formatNum(percentSum,2));
      $("#rowNum1").attr("value",(l-1)).button("refresh");
      $("#rowNum2").attr("value",(l-1)).hidden("refresh");
}

// 计算总量和总百分比
function addCalSumPerc(){
            // 先验证配料和用量两列
      var i=1;
      $("tbody tr").each(function(){
         if(($("input[id='percent"+i+"']").val()=="") || ($("input[id='metric"+i+"']").val()=="")){
            alert("请填写第 "+i+" 行上的百分比和用量!");
         }

         // if(($("input[id='percent"+i+"']").val() != "") && ($("input[id='percent"+i+"']").val() != undefined)){
         //    percents[i] = $("input[id='percent"+i+"']").val();
         //    console.log("DEBUG - percents: " + percents[i]);
         // }

         i++;
      });

      var sum=0;
      var percentSum=0;
      var l=1;
      $("tbody tr").each(function(){
         sum += Number($("input[id='metric"+l+"']").val());
         percentSum += Number($("input[id='percent"+l+"']").val());
         l++;
      });

      // 表格最后增加一行显示 sum 和 percentSum
      $("tbody").append("<tr>"
                           +"<td>rowNum: "+(l-1)+"<input type='hidden' name='rowNum' id='rowNum' value='"+(l-1)+"'></td>"
                           +"<td>sum= "+formatNum(sum,2)+"<input type='hidden' name='sum' id='sum' value='"+formatNum(sum,2)+"'></td>"
                           +"<td>sumPerc= "+formatNum(percentSum,2)+"<input type='hidden' name='percentSum' id='percentSum' value='"+formatNum(percentSum,2)+"'></td>"
                           +"<td></td>"
                           +"</tr>");
      $("tbody").trigger("create");
      $("#tab").table("rebuild");
      $("#add").attr("disabled","disabled");
}

// showDetail.php页更新总量和百分比
function updateCalSumPerc(){
               // 先验证配料和用量两列
      var i=1;
      $("tbody tr").each(function(){
         if(($("input[id='percent"+i+"']").val()=="") || ($("input[id='metric"+i+"']").val()=="")){
            alert("请填写第 "+i+" 行上的百分比和用量!");
         }

         // if(($("input[id='percent"+i+"']").val() != "") && ($("input[id='percent"+i+"']").val() != undefined)){
         //    percents[i] = $("input[id='percent"+i+"']").val();
         //    console.log("DEBUG - percents: " + percents[i]);
         // }

         i++;
      });

      var sum=0;
      var percentSum=0;
      var l=1;
      $("tbody tr").each(function(){
         sum += Number($("input[id='metric"+l+"']").val());
         percentSum += Number($("input[id='percent"+l+"']").val());
         l++;
      });
      $("#sum").val(formatNum(sum,2));
      $("#percentSum").val(formatNum(percentSum,2));
      $("#rowNum1").attr("value",(l-1)).button("refresh");
      $("#rowNum2").attr("value",(l-1)).hidden("refresh");
}

// 求用量总和与百分比总和
// 
// function showSumCount(){

// }
// 定义recipes数组
// var recipes = new Array();

// 增加一行
function add(){
       console.log("DEBUG - #add click");       // 调试
       var _len = $("tbody tr").length+1;
       console.log("DEBUG - _len: " + _len);       // 调试
         $("tbody").append("<tr id='"+_len+"'>"
            +"<td><div data-role='fieldcontain'><input type='text' name='ingre"+_len+"' id='ingre"+_len+"' data-mini='true'></div></td>"
            +"<td><div data-role='fieldcontain'><input type='number' name='metric"+_len+"' id='metric"+_len+"' data-mini='true'></div></td>"
            +"<td><div data-role='fieldcontain'><input type='number' name='percent"+_len+"' id='percent"+_len+"' data-mini='true'></div></td>"
            +"<td><a href='#' data-role='button' data-mini='true' onclick='deltr("+_len+")'>删</a></td>"
            +"</tr>");
         $("tbody").trigger("create");    // css样式丢失,不能正解渲染
         $("#tab").table("rebuild");         // 重构在reflow模式下,低屏宽显示正常
            // 删除控件
      $("#tab input").textinput({clearBtn:true});
      $("#tab input").textinput("refresh");
      // 增加一行就绑定一次事件
      $("input[type='number']").on("keyup change", function(){this.value=numberAndPoint(this.value);});
      // 设置step验证
      $("input[type='number']").attr("step", "0.01");
          // 增加require属性
        $("#tab input").attr('required', true);

}


// 
$(function(){
// $("[type='submit']").button("disable");
   //增加<tr/>
   // 
   // $("#add").click(add());
   $("#add").on("click",function(){add();});

   // 增加require属性
   $("#tab input").attr('required', true);

   // 删除控件
   $("#tab input").textinput({clearBtn:true});
   $("#tab input").textinput("refresh");  



});


   // 删除一行<tr>
   //
   var deltr = function(index){
         var _len = $("tbody tr").length;
         console.log("DEBUG del - _len: " + _len);       // 调试
         $("tr[id='"+index+"']").remove();      // 删除当前行
         console.log("DEBUG del - index: " + index);       // 调试
         for(var i=index,j=_len;i<=j;i++){
            var nextTxtVal1 = $("#ingre"+i).val();
            var nextTxtVal2 = $("#metric"+i).val();
            var nextTxtVal3 = $("#percent"+i).val();
            $("tr[id='"+i+"']")
               .replaceWith("<tr id='"+(i-1)+"'>"
                  +"<td><div data-role='fieldcontain'><input type='text' name='ingre"+(i-1)+"' id='ingre"+(i-1)+"' value='"+nextTxtVal1+"' data-mini='true'></div></td>"
                  +"<td><div data-role='fieldcontain'><input type='number' name='metric"+(i-1)+"' id='metric"+(i-1)+"' value='"+nextTxtVal2+"' data-mini='true'></div></td>"
                  +"<td><div data-role='fieldcontain'><input type='number' name='percent"+(i-1)+"' id='percent"+(i-1)+"' value='"+nextTxtVal3+"' data-mini='true'></div></td>"
                  +"<td><a href='#' data-role='button' data-mini='true' onclick='deltr("+(i-1)+")'>删</a></td>"
                  +"</tr>");
               console.log("DEBUG del - i: " + i);       // 调试
         }
         $("tbody").trigger("create");
         $("#tab").table("rebuild");

   }

   // 计算烘焙百分比按钮
   $(function(){
         $("#calculate").click(function(){
            // alert(exchangePerc());
               // 计算百分比
               if(exchangePerc()){
                  // 计算metric 和 percent列之和,并添加一行显示
                  addCalSumPerc();
               }
               
         });
   });

      // 计算有种面烘焙百分比按钮
   $(function(){
         $("#calculateSpon").on("click",function(){
            // alert(exchangePerc());
               // 计算百分比
               if(exchangePercSpon()){
                  // 计算metric 和 percent列之和,并添加一行显示
                  addCalSumPerc();
               }
               
         });
   });

      // 重新计算烘焙百分比按钮
   $(function(){
         $("#reCalculate").click(function(){
            // alert(exchangePerc());
               // 计算百分比
               if(exchangePerc()){
                  // 计算metric 和 percent列之和,并添加一行显示
                  updateCalSumPerc();
               }
               
         });
   });

         // 重新计算有种面烘焙百分比按钮
   $(function(){
         $("#reCalculateSpon").click(function(){
            // alert(exchangePerc());
               // 计算百分比
               if(exchangePercSpon()){
                  // 计算metric 和 percent列之和,并添加一行显示
                  updateCalSumPerc();
               }
               
         });
   });

       // 重新计算烘焙百分比总和按钮
   $(function(){
         $("#reCalculateSum").click(function(){
            // alert(exchangePerc());
               // 计算百分比
               // if(exchangePercSpon()){
               //    // 计算metric 和 percent列之和,并添加一行显示
               //    updateCalSumPerc();
               // }
               updateCalculatePercSum();
               
         });
   });

   // showDetail.php 页重新计算烘焙百分比

// 增加 onchange事件 判断为数字
   $(function(){
      console.log("DEBUG :keyup change 事件己绑定!");
      $("input[type='number']").on("keyup change", function(){this.value=numberAndPoint(this.value);});
      // $("input[id^='percent']").on("change", function(){this.value=numberAndPoint(this.value);});
   });

   // 添加 step验证
   $(function(){
      $("input[type='number']").attr("step", "0.01");
   });

   // showDetail.php 生成子配方
   $(function(){
      $("#generateRecipe").click(function(){
         // alert($("input[id='requireSum']").val());
         if(($("input[id='requireSum']").val()=="") || ($("input[id='requireSum']").val()==undefined)){
            alert("请先填写需求总量");
            return false;
         }else{
            // 计算新配方
            var requireSum=$("input[id='requireSum']").val();
            console.log("DEBUG reqireSum: " + requireSum);       // 调试
            var percentSum=$("input[id='percentSum']").val();
            console.log("DEBUG percentSum: " + percentSum);       // 调试
            var newBaseMetric=formatNum(requireSum/percentSum*100);
            console.log("DEBUG newBaseMetric: " + newBaseMetric);       // 调试
            var i=1;
            $("tbody tr").each(function(){
               if($("input[id='percent"+i+"']").val()==100){
                  $("input[id='metric"+i+"']").val(round2(formatNum(newBaseMetric,1)));      // 设置小数位
               }else{
                  var thisPercent=$("input[id='percent"+i+"']").val();
                  console.log("DEBUG thisPercent: " + thisPercent);       // 调试
                  var newMetric=round2(formatNum(newBaseMetric*thisPercent/100,1));
                  console.log("DEBUG newMetric: " + newMetric);       // 调试
                  $("input[id='metric"+i+"']").val(newMetric);
               }
               i++;
            });
            $("#generateRecipe").attr("disabled","disabled").button("refresh");
            $("#saveSonRecipe").attr("disabled",false).button("refresh");

         }
      });
   });
   // 配方详情页增加根据一种配料的量计算其它配料的量
   $(function(){
      $("input[id^='metric']").on("change",function(){
         // alert(this.id);
         if ($("input[id^='percent']").val()!=""){
            var rowNum=this.id.substr(-1,1);
            var thisPercent=$("input[id='percent"+rowNum+"']").val();
            var baseMetric=round2(formatNum(this.value/(thisPercent/100),1));
            var i=1;
            var metricSum=0;
            $("tbody tr").each(function(){
               if($("input[id='percent"+i+"']").val()==100){
                  $("input[id='metric"+i+"']").val(baseMetric);
                  metricSum += Number(baseMetric);
               }else{
                  // if(i!=rowNum){
                     var thisRowPercent=$("input[id='percent"+i+"']").val();
                     var thisMetric=round2(formatNum(baseMetric*(thisRowPercent/100),1));
                     $("input[id='metric"+i+"']").val(thisMetric);
                     metricSum += Number(thisMetric);
                  // }
               }
               i++;
            });
         }
         $("#sum").val(metricSum);
         
      });
   });

   // 登录页面验证
   $(function(){
      $("input[type='submit']").on("click",function(){
         if($("input[id='username']").val()==""){
            alert("请填写用户名!");
            $("input[id='username']").focus();
            return false;
         }else if($("input[id='password']").val()==""){
            alert("请填写密码!");
            $("input[id='password']").focus();
            return false;
         }
         return true;
      })
   });

// 另存为新配方按钮验证
$(function(){
   var oldName=$("input[id='rName']").val();
   $("input[id='saveAsNewRecipe']").click(function(){
      if($("input[id='rName']").val()==oldName){
         alert("请重命名配方名称!");
         return false;
      }
   });
});

// TOP 浮动
$(function() {
    //首先将#back-to-top隐藏
    $("#back-to-top").hide();
    //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
    $(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() > 100) {
                $("#back-to-top").fadeIn(1500);
            } else {
                $("#back-to-top").fadeOut(1500);
            }
        });
        //当点击跳转链接后，回到页面顶部位置
        $("#back-to-top").click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
            return false;
        });
    });
});

// 根据录入方式改变计算方式
$(function(){
   $("input[type='radio']").on("click",function(){
      // alert();
      //刷新
      // $("input[type='radio']").checkboxradio("refresh");
      // $( "input[type='radio']" ).checkboxradio( "refresh" );
      $("input[type='radio']").each(function(){
         if($(this).is(":checked")){
            // alert(this.id+"这个被选中");
            if(this.id=="inputType2"){
               // alert(this.id+"这个被选中");
               // alert($("input[id='calculate']").val());
               // $("#calculate]").remove();
               // $("input[id='calculate']").attr("value","calculateSpon").attr("id","calculateSpon").attr("name","calculateSpon").attr("data-ajax","false").button("refresh");
               // ,"id":"calculateSpon","value":"计算种百分比").button("refresh");
               // $("#calculateSpon").attr("data-ajax","false").button("refresh");
               // $("#control1").controlgroup("create");
               // $("#calculate").button("refresh");
               // $("#calculateSpon").button();

               $("div[id^='control']").replaceWith("<div data-role=\"controlgroup\" data-type=\"horizontal\" id='control2'>"
                  +"<input type=\"button\" name=\"add\" id=\"add\" value=\"增加一行\" data-inline=\"true\" data-mini=\"true\">"
                  +"<input type=\"button\" name=\"calculateSpon\" id=\"calculateSpon\" value=\"计算有种面百分比\" data-mini=\"true\" data-inline=\"true\" >"
                  +"<a href=\"#\" data-role=\"button\" id='clearP' onclick=\"clearPercentCol()\" data-mini=\"true\">clearP</a>"
                  +"<input type='hidden' name='recipeType' id='recipeType' value='2'>"
                  +"</div>");
               // $("#clearP").button();
               $("#control2").trigger("create");   // 显示样式更新
               $("#control2").controlgroup();      // 重构

               $("#add").on("click",function(){add();});

               $("#calculateSpon").on("click",function(){
               // alert(exchangePerc());
               // 计算百分比
                  if(exchangePercSpon()){
                     // 计算metric 和 percent列之和,并添加一行显示
                     addCalSumPerc();
                  }
               
               });
               // $("input[type='button']").trigger("create");
               // $("#control1").trigger("create");

               // $("#control2").controlgroup();

            }else if(this.id=="inputType3"){
               // alert(this.id+"这个被选中");
               $("input[id^='metric']").attr("disabled","disabled").textinput("refresh");
               $("div[id^='control']").replaceWith("<div data-role=\"controlgroup\" data-type=\"horizontal\" id='control3'>"
                  +"<input type=\"button\" name=\"add\" id=\"add\" value=\"增加一行\" data-inline=\"true\" data-mini=\"true\">"
                  +"<input type=\"button\" name=\"calculateSum\" id=\"calculateSum\" value=\"计算总百分比\" data-mini=\"true\" data-inline=\"true\" >"
                  +"<a href=\"#\" data-role=\"button\" id='clearP' onclick=\"clearPercentCol()\" data-mini=\"true\">clearP</a>"
                  +"<input type='hidden' name='recipeType' id='recipeType' value='3'>"
                  +"</div>");
               // $("#clearP").button();
               $("#control3").trigger("create");   // 显示样式更新
               $("#control3").controlgroup();      // 重构

               $("#add").on("click",function(){
                  add();
                  $("input[id^='metric']").attr("disabled","disabled").textinput("refresh");
               });

               $("#calculateSum").on("click",function(){
               // alert(exchangePerc());
               // 计算百分比总和
                  calculatePercSum();
               
               });
            }else if(this.id=="inputType1"){
                              // alert(this.id+"这个被选中");
               $("div[id^='control']").replaceWith("<div data-role=\"controlgroup\" data-type=\"horizontal\" id='control1'>"
                  +"<input type=\"button\" name=\"add\" id=\"add\" value=\"增加一行\" data-inline=\"true\" data-mini=\"true\">"
                  +"<input type=\"button\" name=\"calculate\" id=\"calculate\" value=\"计算百分比\" data-mini=\"true\" data-inline=\"true\" >"
                  +"<a href=\"#\" data-role=\"button\" id='clearP' onclick=\"clearPercentCol()\" data-mini=\"true\">clearP</a>"
                  +"<input type='hidden' name='recipeType' id='recipeType' value='1'>"
                  +"</div>");
               // $("#clearP").button();
               $("#control1").trigger("create");   // 显示样式更新
               $("#control1").controlgroup();      // 重构

               $("#add").on("click",function(){
                  add();
               });

               $("#calculate").on("click",function(){
               // alert(exchangePerc());s
                  // 计算百分比
                  if(exchangePerc()){
                     // 计算metric 和 percent列之和,并添加一行显示
                     addCalSumPerc();
                  }

               });
            }
         }
      });
   });

});