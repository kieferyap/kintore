<div class="container">

<?= Form::open('/auth/login'); ?>
	<?= $form->field('fuel_csrf_token'); ?>
	<div class="row">
		<div class="col-md-offset-1 col-md-10 form-group">
			<h3>ログイン</h3>
			<hr/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-md-10 form-group">
			<h4><?= Form::label('ユーザー名*', 'username'); ?></h4>
			<?= Form::input(
				'username', '', array(
					'placeholder' => '4 ～ 32文字',
					'type' => 'text',
					'class' => 'form-control',
					'aria-describedby' => 'form-username',
					'required' => 'required',
			)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-md-10 form-group">
			<h4><?= Form::label('パスワード*', 'password'); ?></h4>
			<?= Form::input(
				'password', '', array(
					'placeholder' => '4 ～ 32文字',
					'type' => 'password',
					'class' => 'form-control',
					'aria-describedby' => 'form-password',
					'required' => 'required',
			)); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-md-10 form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">ログインしたままにする</label>
		</div>
	</div>
	
	<div class="row margin-top">
		<div class="input-div col-md-offset-10 col-md-1">
			<button type="submit"
				name="submit" 
				id="btn-post-submit"
				class="btn btn-kintore">
					<span class="glyphicon glyphicon-user"></span> ログイン
			</button>
		</div>
	</div>
	
<?= Form::close(); ?>


