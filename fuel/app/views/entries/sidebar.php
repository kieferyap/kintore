<div class="modal fade" 
	id="add-exercise-modal"
	tabindex="-1"
	role="dialog"
	aria-labelledby="add-exercise-modal">
<div class="modal-dialog" role="document">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<h3 class="modal-title">運動追加</h3>
	</div>
	<?= Form::open('http://kintore.kieferyap.com/entries/exercise'); ?>
	<div class="modal-body">
		<h4><?= Form::label('運動名', 'name'); ?></h4>
		<?= Form::input('name', '', array(
			'type' => 'text',
			'class' => 'form-control',
			'placeholder' => 'ベンチプレス',
			'aria-describedby' => 'basic-modal-name',
		)); ?>
		<br/>
		<h4><?= Form::label('測量単位', 'unit'); ?></h4>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="unit" 
				value="kg" id="unit-kg" checked/>
			<label class="form-check-label" for="unit-kg">kg</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="unit" 
				value="秒" id="unit-seconds"/>
			<label class="form-check-label" for="unit-seconds">秒</label>
		</div>
		<div class="form-check">
			<input class="form-check-input" type="radio" name="unit" 
				value="" id="unit-none"/>
			<label class="form-check-label" for="unit-none">なし</label>
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit"
			name="submit" 
			id="btn-exercise-submit"
			class="btn btn-default btn-kintore">
				<span class="glyphicon glyphicon-plus"></span> 追加
		</button>
	</div>
	<?= Form::close(); ?>
</div>
</div>
</div>

<div class="col-md-2 col-md-offset-1">
	<div class="list-group list-group-root">
		<a href="/" class="list-group-item">全部</a>
		<? foreach($exercises as $key=>$exercise): ?>
			<a href="/entries/view/<?= $key ?>" class="list-group-item">
				<span class="glyphicon glyphicon-fire"></span>
				<?= $exercise['name'] ?>
			</a>
		<? endforeach; ?>
		<span class="list-group-item cursor-pointer hover-gray"
			data-toggle="modal"
			data-target="#add-exercise-modal">
			<span class="glyphicon glyphicon-plus"></span> 追加
		</span>
	</div>
</div>