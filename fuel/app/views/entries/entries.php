<div class="col-md-8">
<? if($entries): ?>
<? foreach($entries as $header=>$rows): ?>
	<div class="row">
		<div class="col-md-12 border-bottom">
			<h4><?= $header; ?></h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-hover margin-top">
			<tr>
				<th class="col-md-2"><?= $date_exercise_name ?></th>
				<th>計算</th>
				<th class="col-md-1 hidden-xs">合計</th>
				<th class="col-md-2 hidden-xs">備考</th>
				<th class="col-md-2">操作</th>
			</tr>
			<? if(count($rows)): ?>
			<? foreach($rows as $row): ?>
			<tr>
				<td><?= $row['date_exercise']; ?></td>
				<td>
					<?= $row['calculation']; ?>
					<span class="visible-xs">
						<b>合計：</b><?= $row['total']; ?><br/>
						<b>備考：</b><?= $row['notes']; ?>
					</span>
				</td>
				<td class="hidden-xs"><?= $row['total']; ?></td>
				<td class="hidden-xs">
				<? if($row['notes']): ?>
					<?= $row['notes']; ?>
				<? else: ?>
					<span class="text-muted font-italic">なし</span>
				<? endif; ?>
				</td>
				<td>
					<button type="button" 
						class="btn btn-primary btn-repeat-entry" 
						data-id="<?= $row['id'] ?>" 
						data-url="<?= Uri::base(false); ?>entries/repeat/">
							<span class="glyphicon glyphicon-repeat"></span>
					</button>
					<button type="button" 
						class="btn btn-danger btn-delete-entry" 
						data-id="<?= $row['id']?>" 
						data-url="<?= Uri::base(false); ?>entries/delete/">
							<span class="glyphicon glyphicon-trash"></span>
					</button>
				</td>
			</tr>
			<? endforeach; ?>
			<? else: ?>
				<tr>
					<td colspan="5" class="text-muted font-italic cell-center">なし</td>
				</tr>
			<? endif; ?>
			</table>
		</div>
	</div>
<? endforeach;?>
<? else: ?>
	<center class="text-muted font-italic">
		なし
	</center>
<? endif; ?>
</div>