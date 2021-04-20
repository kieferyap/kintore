<? include 'post.php'; ?>

<div class="container">
<div class="row">
	<div class="col-md-2 col-md-offset-1">
		<div class="list-group list-group-root">
			<? foreach($exercises as $key=>$exercise): ?>
			<a href="/entries/view/<?= $key ?>" class="list-group-item"><?= $exercise['name'] ?></a>
			<? endforeach; ?>
			<a href="/entries/add_exercise/" class="list-group-item">
				<span class="glyphicon glyphicon-plus"></span> 追加
			</a>
		</div>
	</div>
	<div class="col-md-8">
		<? foreach($entries as $exercise=>$rows): ?>
			<div class="container">
				<div class="row">
					<div class="col-md-8 border-bottom">
						<h4><?= $exercise; ?></h4>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped margin-top">
					<tr>
						<th class="col-md-2">日付</th>
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
							<!-- <a href="/entries/delete/<?= $row['id']?>"> -->
							<button type="button" class="btn btn-danger btn-delete-entry">
								<span class="glyphicon glyphicon-trash"></span> 削除
							</button>
							<!-- </a> -->
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
	
	</div>
</div>
</div>


