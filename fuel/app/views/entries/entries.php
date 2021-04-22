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
				<th class="col-md-1">計算</th>
				<th class="col-md-1">合計</th>
				<th class="col-md-2">メモ</th>
				<th class="col-md-2">修正</th>
			</tr>
			<? if(count($rows)): ?>
			<? foreach($rows as $row): ?>
			<tr>
				<td><?= $row['date_exercise']; ?></td>
				<td><?= $row['calculation']; ?></td>
				<td><?= $row['total']; ?></td>
				<td>
				<? if($row['notes']): ?>
					<?= $row['notes']; ?>
				<? else: ?>
					<span class="text-muted font-italic">なし</span>
				<? endif; ?>
				</td>
				<td>
					<button type="button" 
						class="btn btn-danger btn-delete-entry" 
						data-id="<?= $row['id']?>" 
						data-url="https://kintore.kieferyap.com/entries/delete/">
							<span class="glyphicon glyphicon-trash"></span> 削除
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