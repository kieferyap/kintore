<div class="container">

<?= Form::open('/auth/register'); ?>
	<?= $form->field('fuel_csrf_token'); ?>
	<div class="row">
		<div class="col-md-offset-1 col-md-10 form-group">
			<h3>アカウント作成</h3>
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
		<div class="col-md-offset-1 col-md-10 form-group">
			<?= Form::input(
				'confirm', '', array(
					'placeholder' => '確認*',
					'type' => 'password',
					'class' => 'form-control',
					'aria-describedby' => 'form-confirm',
					'required' => 'required',
			)); ?>
		</div>
	</div>
	
	<div class="row margin-top">
		<div class="input-div col-md-offset-10 col-md-1">
			<button type="submit"
				name="submit" 
				id="btn-post-submit"
				class="btn btn-kintore">
					<span class="glyphicon glyphicon-user"></span> 作成
			</button>
		</div>
	</div>
	
<?= Form::close(); ?>


