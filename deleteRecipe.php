<?php
function deleteR($recipeId){
	require_once("recipe.php");
	if ($recipeId=="") {
		echo "请选择要删除的配方！<br />";
	}
	else{
		$r=new recipe;
		$r->__set("id",$recipeId);
		$r->delete();
		// echo "配方表删除成功!<br />";
		$r=null;
		// 删除配方内容
		$ingre=new ingre;
		$ingre->__set("recipeId",$recipeId);
		$ingre->delete();
		$ingre=null;
		// 删除相关图片
		require_once("class_recimg.php");
		$img= new recimg;
		$img->__set("recipeId",$recipeId);
		$img->delete();
		$img=null;
		
		echo "<script>alert('删除成功！');location.href='index.php'</script>";
	}
}

function dummyDelR($recipeId){
	require_once("recipe.php");
	if ($recipeId=="") {
		echo "请选择要删除的配方！<br />";
	}
	else{
		$r=new recipe;
		$r->__set("id",$recipeId);
		$r->switchDel("deleted=1");
		// echo "配方表删除成功!<br />";
		$r=null;
		echo "<script>alert('删除成功！');location.href='index.php'</script>";
	}
}
?>