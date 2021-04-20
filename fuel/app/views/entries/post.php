<div class="container">
	<div id="input-vue-app">
	<?= Form::open('/entries/add'); ?>
	<div class="row">
		<div class="col-md-3 col-md-offset-1 input-div exercise-input-div">
			<div class="form-group">
				<select name="exercise" 
					class="form-control"
					id="id-exercise"
					v-on:change="resetFields()">
					<? foreach($exercises as $key=>$exercise): ?>
						<option 
							value="<?= $key; ?>"
							data-unit="<?= $exercise['unit']; ?>"
							data-name="<?= $exercise['name']; ?>">
							<?= $exercise['name']; ?>
						</option>
					<? endforeach; ?>
				</select>
			</div>
		</div>
		<div class="col-md-2 input-div">
		<div class="input-group">
			<?= Form::input('weight', '0', array(
				'type' => 'number',
				'v-model' => 'weight',
				'class' => 'form-control',
				'placeholder' => '35',
				'aria-describedby' => 'basic-addon-weight',
			)); ?>
			<span class="input-group-addon" id="basic-addon-weight">
				kg
			</span>
		</div>
		</div>
		<div class="col-md-2 input-div">
		<div class="input-group">
			<?= Form::input('frequency', '0', array(
				'type' => 'number',
				'v-model' => 'frequency',
				'class' => 'form-control',
				'placeholder' => '50',
				'aria-describedby' => 'basic-addon-frequency',
			)); ?>
			<span class="input-group-addon" id="basic-addon-frequency">
				回
			</span>
		</div>
		</div>
		<div class="col-md-3 input-div">
		<div class="input-group">
			<span class="input-group-addon">
				会計
			</span>
			<?= Form::input('total', '0', array(
				'type' => 'number',
				'class' => 'form-control',
				'placeholder' => '0',
				':value' => 'weight*frequency',
				'readonly' => 'true',
				'aria-describedby' => 'basic-addon-total',
			)); ?>
			<span class="input-group-addon" id="basic-addon-total">
				kg
			</span>
		</div>
		</div>
	</div>
	<div class="row margin-top">
		<div class="col-md-10 col-md-offset-1">
		<div class="input-group">
			<span class="input-group-addon">
				メモ
			</span>
			<?= Form::input('notes', '', array(
				'type' => 'text',
				'class' => 'form-control',
				'placeholder' => '',
			)); ?>
		</div>
		</div>
	</div>
	<div class="row margin-top">
		<div class="input-div col-md-offset-10 col-md-1">
			<button type="submit"
				name="submit" 
				id="btn-post-submit"
				class="btn btn-kintore">
					<span class="glyphicon glyphicon-plus"></span> 追加
			</button>
		</div>
	</div>
	<?= Form::close(); ?>
	</div>
</div>