<?php
//连接数据库
include 'conn.php';

//获取id
$id = $_GET['id'];
//编写查询sql语句
$sql = "SELECT * FROM `product` WHERE `id`=$id";
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
		<title>产品信息修改</title>
		<style type="text/css">
			body {
				background-image: url(student.jpg);
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
			<h2>修改产品信息</h2>
			<div class="add">
				<form action="action_editproduct.php" method="post" enctype="multipart/form-data">
					<table border="1">
						<tr>
							<th>编　　号：</th>
							<td><input type="text" name="id" size="5" value="<?php echo $arr["id"] ?>" readonly="readonly"></td>
						</tr>
						<tr>
							<th>名   称：</th>
							<td><input type="text" name="name" size="25" value="<?php echo $arr["name"] ?>"></td>
						</tr>
						<tr>
							<th>退换服务：</th>
							<td>
								<label><input <?php if ($arr["sex"]=="有" ) { echo "checked" ; } ?> type="radio" name="sex" value="有">有</label>
								<label><input <?php if ($arr["sex"]=="无" ) { echo "checked" ; } ?> type="radio" name="sex" value="无">无</label>
							</td>
						</tr>
						<tr>
							<th>库   存：</th>
							<td><input type="text" name="age" size="25" value="<?php echo $arr["age"] ?>"></td>
						</tr>
						<tr>
							<th>内存容量：</th>
							<td>
								<select name="edu">
									<option <?php if (!$arr["edu"]) { echo "selected" ; } ?> value="">--请选择--</option>
									<option <?php if ($arr["edu"]=="16G" ) { echo "selected" ; } ?> value="16G">16G</option>
									<option <?php if ($arr["edu"]=="32G" ) { echo "selected" ; } ?> value="32G">32G</option>
									<option <?php if ($arr["edu"]=="64G" ) { echo "selected" ; } ?> value="64G">64G</option>
									<option <?php if ($arr["edu"]=="128G" ) { echo "selected" ; } ?> value="128G">128G</option>
									<option <?php if ($arr["edu"]=="256G" ) { echo "selected" ; } ?> value="256G">256G</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>整体重量/g：</th>
							<td><input type="text" name="salary" size="25" value="<?php echo $arr["salary"] ?>"></td>
						</tr>
						<tr>
							<th>价    格/元：</th>
							<td><input type="text" name="bonus" size="25" value="<?php echo $arr["bonus"] ?>"></td>
						</tr>
						<tr>
							<th>续航时间：</th>
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







