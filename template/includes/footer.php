</div>
				</div>
			</div>
			<div class="col-md-4">
				<div id="sidebar">
					<div class="block">
						<h3>Login</h3>
						<?php if(isLoggedIn()) : ?>
							<div class="userdata">
								Welcome, <strong><?php echo getUser()['username']; ?></strong>
							</div>
							<br>
							<form action="logout.php" method="post" role="form">
								<input type="submit" name="do_logout" class="btn btn-danger" value="Logout">
							</form>

						<?php else : ?>
						<form role="form" method="post" action="login.php" >
							<div class="form-group">
								<label>Username</label>
								<input name="username" type="text" class="form-control"  placeholder="Enter Username" />
							</div>
							<div class="form-group">
								<label>Password</label>
								<input name="password" type="password" class="form-control" placeholder="Enter Password" />
							</div>
							<button name="do_login" class="btn btn-primary" type="submit">Login</button>
							<a class="btn btn-default" href="register.php">Create Account</a>
						</form>
					</div>
				<?php endif; ?>

					<div class="block">
						<h3>Categories</h3>
						<div class="list-group">
							<a href="topics.php" class="list-group-item <?php echo is_active(null); ?>">All Topics</a>
							<?php foreach(getCategories() as $category) : ?>
								<a href="topics.php?category=<?php echo $category->id; ?>" class="list-group-item <?php echo is_active($category->id); ?>"><?php echo $category->name; ?> <span class="badge pull-right"><!--<?php echo $category->topic_count; ?>--></span></a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<footer class="col-md-12">
      <div id="footer-inner">
        <p >Made with <span style="font-size:100%; color:red;">&hearts;</span> by Detola</p>
      </div>
    </footer>
</body>
</html>