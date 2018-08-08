<?php include('includes/header.php'); ?>
<!-- We have to have the enctype=multipart/form-data because we are going to have the file upload(avatar)-->
						<form action="create.php" method="post" role="form">
							<div class="form-group">
								<label>Topic Title</label>
								<input type="text" name="title" class="form-control" placeholder="Enter Post Title">
							</div>
							<div class="form-group">
								<label>Category</label>
								<select class="form-control" name="category">
								<?php foreach (getCategories() as $category) : ?>
									<option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
								<?php endforeach; ?>
									
								</select>
							</div>
							<div class="form-group">
								<label>Topic Body</label>
								<textarea name="body" id="body" class="form-control" cols="80" rows="10"></textarea>
								<script>CKEDITOR.replace('body');</script>
							</div>
							<button type="submit" class="btn btn-default" name="do_create">Submit</button>
						</form>
<?php include('includes/footer.php'); ?>