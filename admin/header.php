<?php
// echo $logged_welcome;
// echo "<p>This is header, u can add contents in here!</p>";
?>
<?php
require_once("html.php");
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">中德DMS</a>
		</div>

		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
<!-- 
				<li <?php if (php_self() == 'display.php') { echo 'class="active" '; } ?>><a href="display.php">显示 </a></li>
				<li <?php if (php_self() == 'add.php') { echo 'class="active" '; } ?>><a href="add.php">添加</a></li>
				<li <?php if (php_self() == 'update.php') { echo 'class="active" '; } ?>><a href="update.php">更新</a></li>
				<li <?php if (php_self() == 'log.php') { echo 'class="active" '; } ?>><a href="log.php">日志</a></li>
 -->
				<li><a href="user.php"><?php echo $_SESSION['user_name']; ?></a></li>
				<li><a href="index.php?logout">退出</a></li>
			</ul>

          <!-- <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
        </form> -->
    </div>
</div>
</nav>


<!--  <a href="./display.php">display</a>
<a href="./add.php">add</a>
<a href="./update.php">update</a>
<a href="./import_dorm.php">import_dorm</a>
<a href="./import_stu.php">import_stu</a>
<a href="./import_routine.php">import_routine</a>  -->



<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked nav-sidebar">
			
			
				<li <?php if (php_self() == 'display.php') { echo 'class="active" '; } ?>><a href="display.php">显示 </a></li>
				<li <?php if (php_self() == 'add.php') { echo 'class="active" '; } ?>><a href="add.php">添加</a></li>
				<!-- <li <?php if (php_self() == 'update.php') { echo 'class="active" '; } ?>><a href="update.php">更新</a></li> -->
				<?php role_siderbar($_SESSION['user_role']); ?>
				<li <?php if (php_self() == 'log.php') { echo 'class="active" '; } ?>><a href="log.php">日志</a></li>
				<?php role_siderbar_develop($_SESSION['user_role']); ?>
				<li <?php if (php_self() == 'view_display.php') { echo 'class="active" '; } ?>><a href="view_display.php">view display </a></li>
				<li <?php if (php_self() == 'view_add.php') { echo 'class="active" '; } ?>><a href="view_add.php">view add</a></li>
				<li <?php if (php_self() == 'view_del.php') { echo 'class="active" '; } ?>><a href="view_del.php">view del</a></li>

			</ul>

		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


