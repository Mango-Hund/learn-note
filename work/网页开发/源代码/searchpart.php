<?php
	//连接数据库
	include 'conn.php';

	//获取id
	$bonus = $_GET['bonus'];


	//编写查询sql语句
	$sql = "SELECT * FROM `part` WHERE `bonus`='$bonus'";
	//执行查询操作、处理结果集
	$result = mysqli_query($link, $sql);
	if (!$result) {
	    exit('查询sql语句执行失败。错误信息：'.mysqli_error($link));  // 获取错误信息
	}
	$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
	if (!$data) {
		//输出提示，跳转到首页
		echo "没有这个零件！<br><br>";
		header('Refresh: 3; url=index.php');  //3s后跳转
		exit();
	}
	//将二维数数组转化为一维数组
	foreach ($data as $key => $value) {
	  foreach ($value as $k => $v) {
	    $arr[$k]=$v;
	  }
	}




?>

<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<style type="text/css">
		body {
			background-image: url(student1.jpg);
			background-size: 100%;
		}

		.wrapper {
			width: 1000px;
			margin: 20px auto;
		}

		h1 {
			text-align: center;
		}

		.add {
			margin-bottom: 20px;
		}

		.add a {
			text-decoration: none;
			color: #fff;
			background-color: #00CCFF;
			padding: 6px;
			border-radius: 5px;
		}

		td {
			text-align: center;
		}
	</style>
	<body>
		<div class="wrapper">
			<h1>产品ＢＯＭ表</h1>
		<div class="add">
				<a href="addpart.html">添加零件 </a>&nbsp;&nbsp;&nbsp;
				<a href="part.php">BACK</a>
				
			</div>	
			<table width="960" border="1">
				<tr>
					<th>编号</th>
					<th>零件名称</th>
					<th>型号</th>
					<th>单价/元</th>
					<th>所属编号</th>
					<th>产地</th>
					<th>操作</th>
				</tr>
				<?php
				
	
				foreach ($data as $key => $value) {
  					foreach ($value as $k => $v) {
    					$arr[$k] = $v;
  					}
  				echo "<tr>";
				echo "<td>{$arr['id']}</td>";
				echo "<td>{$arr['name']}</td>";
				//echo "<td>{$arr['sex']}</td>";
				echo "<td>{$arr['age']}</td>";
				//echo "<td>{$arr['edu']}</td>";
				echo "<td>{$arr['salary']}</td>";
				echo "<td>{$arr['bonus']}</td>";
				echo "<td>{$arr['city']}</td>";
				echo "<td>
							<a href='javascript:del({$arr['id']})'>删除</a>
							<a href='editproduct.php?id={$arr['id']}'>修改</a>
					  </td>";
				echo "</tr>";
  				// echo "<pre>";
 				// print_r($arr);
  				// echo "</pre>";
  				//echo"<a href=searchStudent.html>1</a>";
  				
				}
				// 关闭连接
				mysqli_close($link);
			

				
				
			?>

			</table>
		</div>

		<script type="text/javascript">
			function del(id) {
				if (confirm("确定删除这个零件吗？")) {
					window.location = "action_del.php?id=" + id;
				}
			}
		</script>



	</body>
</html>



