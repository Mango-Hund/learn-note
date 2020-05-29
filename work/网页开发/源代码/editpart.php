<?php
//连接数据库
include 'conn.php';

//获取id
$id = $_GET['id'];
//编写查询sql语句
$sql = "SELECT * FROM `part` WHERE `id`=$id";
//执行查询操作、处理结果集
$result = mysqli_query($link, $sql);
if (!$result) {
    exit('查询sql语句执行失败。错误信息：'.mysqli_error($link));  // 获取错误信息
}
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//将二维数数组转化为一维数组
foreach ($data as $key => $value) {
  foreach ($value as $k => $v) {
    $arr[$k]=$v;
  }
}

// echo "<pre>";
// var_dump($arr);
// echo "</pre>";

?>

<html>
	<head>
		<meta charset="UTF-8">
		<title>编辑零件信息</title>
		<style type="text/css">
			body {
				background-image: url(student1.jpg);
				background-size: 100%;
			}

			.box {
				display: table;
				margin: 0 auto;
			}

			h2 {
				text-align: center;
			}

			.add {
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<!--输出定制表单-->
		<div class="box">
			<h2>修改零件信息</h2>
			<div class="add">
				<form action="action_editpart.php" method="post" enctype="multipart/form-data">
					<table border="1">
						<tr>
							<th>编号：</th>
							<td><input type="text" name="id" size="5" value="<?php echo $arr["id"] ?>" readonly="readonly"></td>
						</tr>
						<tr>
							<th>零件名称：</th>
							<td><input type="text" name="name" size="25" value="<?php echo $arr["name"] ?>"></td>
						</tr>
						
						<tr>
							<th>型   号：</th>
							<td><input type="text" name="age" size="25" value="<?php echo $arr["age"] ?>"></td>
						</tr>
						<tr>
							<th>单价/元：</th>
							<td><input type="text" name="salary" size="25" value="<?php echo $arr["salary"] ?>"></td>
						</tr>
						<tr>
							<th>所属编号：</th>
							<td><input type="text" name="bonus" size="25" value="<?php echo $arr["bonus"] ?>"></td>
						</tr>
						<tr>
							<th>产   地：</th>
							<td><input type="text" name="city" size="25" value="<?php echo $arr["city"] ?>"></td>
						</tr>
						<tr>
							<th></th>
							<td>
								<input type="button" onClick="javascript :history.back(-1);" value="返回">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="submit" value="提交">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>







