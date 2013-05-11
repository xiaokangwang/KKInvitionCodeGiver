将密钥放于keys.txt中一行一个（测试于linux换行符）
当密钥组更改要重置计数器时，将KKDEV_OBTING_COUNT.reset复制到KKDEV_OBTING_COUNT
迁移（也可以参见index.php）：
id：	getbtn 像服务器请求数据 
	result 显示数据

导入必要的
	<script type="text/javascript"  src="jquery.js"></script>
	<script type="text/javascript"  src="js/bootstrap.js"></script>
	<script type="text/javascript"  src="keygetruntime.js"  ></script>


在最后一定要执行
	<script type="text/javascript">
		kkgetkey_init();
		sessionStorage.userchallenge="9KBe6MjXudW5EC4vsp364141yn03mC51";
	</script>

+++++++++++++++++++++++++++IMPORTANT+++++++++++++++++++++++++++++++++++++++
sessionStorage.userchallenge="9KBe6MjXudW5EC4vsp364141yn03mC51"; 
是用于帮助防止未授权的计算机得到我们的key，请仅在用户登录后执行。
==========================================================================
