<?php
//连接数据库
include 'conn.php';

// 获取修改后的信息
$id = $_POST['id'];
$name = $_POST['name'];
//$sex = $_POST['sex'];
$age = $_POST['age'];
//$edu = $_POST['edu'];
$salary = $_POST['salary'];
$bonus = $_POST['bonus'];
$city = $_POST['city'];


	//编写预处理sql语句
	$sql = "UPDATE `part` 
			SET 
				`name`= ?,  
				`age`= ?,  
				`salary`= ?, 
				`bonus`= ?, 
				`city`= ? 
			WHERE `id`= ?";

	//预处理SQL模板
	$stmt = mysqli_prepare($link, $sql);
	// 参数绑定，并为已经绑定的变量赋值
	mysqli_stmt_bind_param($stmt, 'ssssss', $name,  $age,  $salary, $bonus, $city, $id);
	

	if ($name) {
		// 执行预处理（第1次执行）
		$result = mysqli_stmt_execute($stmt);
		//关闭连接
		mysqli_close($link);

		if ($result) {
    		//修改学生成功
			//跳转到首页
			header("Location:part.php");
		}else{
			exit('修改零件信息sql语句执行失败。错误信息：' . mysqli_error($link));
		}
	}else{
		//修改学生失败
		//输出提示，跳转到首页
		echo "修改零件失败！<br><br>";
		header('Refresh: 3; url=part.php');  //3s后跳转

    	
	}

  

