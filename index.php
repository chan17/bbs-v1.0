<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>陈一七的BBS</title>

<style type="text/css">
<!--
body {
  font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background: #42413C;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ 元素/标签选择器 ~~ */
ul, ol, dl { /* 由于浏览器之间的差异，最佳做法是在列表中将填充和边距都设置为零。为了保持一致，您可以在此处指定需要的数值，也可以在列表所包含的列表项（LI、DT 和 DD）中指定需要的数值。请注意，除非编写一个更为具体的选择器，否则您在此处进行的设置将会层叠到 .nav 列表。 */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* 删除上边距可以解决边距会超出其包含的 div 的问题。剩余的下边距可以使 div 与后面的任何元素保持一定距离。 */
	padding-right: 15px;
	padding-left: 15px; /* 向 div 内的元素侧边（而不是 div 自身）添加填充可避免使用任何方框模型数学。此外，也可将具有侧边填充的嵌套 div 用作替代方法。 */
}
a img { /* 此选择器将删除某些浏览器中显示在图像周围的默认蓝色边框（当该图像包含在链接中时） */
	border: none;
}
/* ~~ 站点链接的样式必须保持此顺序，包括用于创建悬停效果的选择器组在内。 ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* 除非将链接设置成极为独特的外观样式，否则最好提供下划线，以便可从视觉上快速识别 */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* 此组选择器将为键盘导航者提供与鼠标使用者相同的悬停体验。 */
	text-decoration: none;
}

/* ~~ 此固定宽度容器包含其它 div ~~ */
.container {
	width: 960px;
	background: #FFF;
	margin: 0 auto; /* 侧边的自动值与宽度结合使用，可以将布局居中对齐 */
}

/* ~~ 标题未指定宽度。它将扩展到布局的完整宽度。标题包含一个图像占位符，该占位符应替换为您自己的链接徽标 ~~ */
.header {
	font-size: 18%;
	background-color: #09F;
}

/* ~~ 这是布局信息。 ~~ 

1) 填充只会放置于 div 的顶部和/或底部。此 div 中的元素侧边会有填充。这样，您可以避免使用任何“方框模型数学”。请注意，如果向 div 自身添加任何侧边填充或边框，这些侧边填充或边框将与您定义的宽度相加，得出 *总计* 宽度。您也可以选择删除 div 中的元素的填充，并在该元素中另外放置一个没有任何宽度但具有设计所需填充的 div。

*/

.content {

	padding: 10px 0;
}

/* ~~ 脚注 ~~ */
.footer {
	padding: 10px 0;
	background: #CCC49F;
	font-family: "黑体";
	font-size: 19px;
}

/* ~~ 其它浮动/清除类 ~~ */
.fltrt {  /* 此类可用于在页面中使元素向右浮动。浮动元素必须位于其在页面上的相邻元素之前。 */
	float: right;
	margin-left: 8px;
}
.fltlft { /* 此类可用于在页面中使元素向左浮动。浮动元素必须位于其在页面上的相邻元素之前。 */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* 如果从 #container 中删除或移出了 #footer，则可以将此类放置在 <br /> 或空 div 中，作为 #container 内最后一个浮动 div 之后的最终元素 */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
.container .header {
	font-size: 24px;
	font-family: "幼圆";
	text-align: center;
}
.container .header {
	font-weight: bold;
}
#top_user {
	font-family: "黑体";
	font-size: 14px;
	color: #333;
}
-->
</style></head>

<body>

<div class="container">
  <div class="header"><!-- end .header -->陈一七 的 BBS
		 <div id="top_user">
		  <?php
		  include("top_user.php"); 
		  ?>
          </div>
  </div>
  <div class="content">
    <blockquote>
      <ul>
      	<?php
      	include("conn.php");
	  	$title_db = mysql_query("SELECT * FROM bbs_word");
	  	    
	  	    while ($title = mysql_fetch_array($title_db)) {
      		echo'
      		<li>
      		<a href="post_word.php?id='.$title['id'].'" title="aaaa" target="_blank">'.$title['title'].'</a> '.'<span style="float:right">by: '.$title['user'].'</span>'.
      		'</li>';
      	}
        ?> 
        
      </ul>
    </blockquote>
  </div>
      <div class="footer">
        <p>发文章<hr></p>
        
<?php
//session_start();
        if (!isset($_SESSION['user_name'])){
	echo "你还没登陆，请先登录！   <a href='login.html'>点击登陆</a>";

	exit;
}
?>
        <form id="form1" name="form1" method="post" action="tiezi_add.php">
          <p>
            <label for="ttitlet"></label>
            <input name="ttitlet" type="text" id="ttitlet" size="70" maxlength="50" />
          </p>
          <p>
            <label for="tcontent"></label>
            <textarea name="tcontent" id="tcontent" cols="80" rows="15"></textarea>
          </p>
          <p>
            <input type="submit" name="tsub" id="tsub" value="提交" />
            </p>
        </form>
      </div>
 </div>
</body>
</html>
