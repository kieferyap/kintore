
<?php if(Session::get_flash('success')):?>
	<div class="alert alert-success">
		<?php echo Session::get_flash('success'); ?>
	</div>
<?php endif; ?>
<?php if(Session::get_flash('error')):?>
	<div class="alert alert-danger">
		<?php echo Session::get_flash('error'); ?>
	</div>
<?php endif; ?>

<div class="container">
	<form class="form" action="/entries/add" method="POST">
	<div class="row" id="input-vue-app">
		<div class="col-md-3 col-md-offset-1 input-div exercise-input-div">
			<div class="form-group">
				<select name="exercise" 
					class="form-control" 
					title="" 
					id="id-exercise">
					<?php foreach($exercises as $key=>$exercise): ?>
						<option 
							value="<?php echo $key; ?>"
							data-unit="<?php echo $exercise['unit']; ?>"
							data-name="<?php echo $exercise['name']; ?>">
							<?php echo $exercise['name']; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="col-md-2 input-div">
			<div class="input-group">
				<input type="number" 
					v-model="weight"
					name="weight"
					class="form-control" 
					placeholder="35" 
					aria-describedby="basic-addon2">
				<span class="input-group-addon" id="basic-addon2">
					kg
				</span>
			</div>
		</div>
		<div class="col-md-2 input-div">
			<div class="input-group">
				<input type="number" 
					v-model="frequency"
					name="frequency"
					class="form-control" 
					placeholder="50" 
					aria-describedby="basic-addon2">
				<span class="input-group-addon" id="basic-addon2">回</span>
			</div>
		</div>
		<div class="col-md-2 input-div">
			<div class="input-group">
				<span class="input-group-addon">
					会計
				</span>
				<input type="text"
						class="form-control" 
						placeholder="0"
						:value="weight*frequency"
						readonly>
				<span class="input-group-addon" id="basic-addon3">
					kg
				</span>
			</div>
		</div>
		<div class="col-md-1 input-div">
			<button type="submit" class="btn btn-default btn-kintore">
				<span class="glyphicon glyphicon-plus"></span> 追加
			</button>
		</div>
	</div>
	</form>
</div>
<hr/>

<?php foreach($entries as $date=>$rows): ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 border-bottom">
				<h4><?php echo $date; ?></h4>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<table class="table table-striped margin-top">
			<tr>
				<th class="col-md-4">運動名</th>
				<th>計算</th>
				<th>合計</th>
				<th class="col-md-3">修正</th>
			</tr>
			<?php foreach($rows as $row): ?>
			<tr>
				<td><?php echo $row['exercise_name']; ?></td>
				<td><?php echo $row['calculation']; ?></td>
				<td><?php echo $row['total']; ?></td>
				<td>
					<a href="/entries/delete/<?php echo $row['id']?>">
					<button type="button" class="btn btn-danger">
						<span class="glyphicon glyphicon-trash"></span> 削除
					</button>
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
			</table>
		</div>
	</div>
<?php endforeach;?>
