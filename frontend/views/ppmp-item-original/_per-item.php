<?php // print_r($model) ?>

<style>

	.table-per-item th {
		text-align: center !important;
		vertical-align: middle !important;
	}

	.table-per-item thead > tr > th {
		background: #ffb37c;
	}

	.table-per-item th,
	.table-per-item td {
		border: 1px solid #967a7a !important;
	}

	.table-per-item tbody > tr > td {
		background: #ffdec6;
	}

	.table-per-item td.col-1 {
		width: 8%;
		text-align: center;
		vertical-align: middle;
	}

	.table-per-item td.col-3 {
		width: 8%;
		text-align: right;
		vertical-align: middle;
	}

	.table-per-item td.col-4,
	.table-per-item td.col-5,
	.table-per-item td.col-6,
	.table-per-item td.col-7,
	.table-per-item td.col-8,
	.table-per-item td.col-9,
	.table-per-item td.col-10,
	.table-per-item td.col-11,
	.table-per-item td.col-12,
	.table-per-item td.col-13,
	.table-per-item td.col-14,
	.table-per-item td.col-15 {
		width: 3%;
		text-align: center;
		vertical-align: middle;
	}

	.table-per-item td.col-16 {
		width: 5%;
		text-align: center;
		vertical-align: middle;
	}


</style>

<div class="per-item">
	<table class="table table-per-item">
		<thead>
			<tr>
				<th>Unit of Measurement</th>
				<th>Item Description</th>
				<th>Item Price</th>
				<th>Jan</th>
				<th>Feb</th>
				<th>Mar</th>
				<th>Apr</th>
				<th>May</th>
				<th>Jun</th>
				<th>Jul</th>
				<th>Aug</th>
				<th>Sep</th>
				<th>Oct</th>
				<th>Nov</th>
				<th>Dec</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<tr class="row-item">
				<td class="col-1"><?= $model->itemUnit['name'] ?></td>
				<td class="col-2"><?= $model['item_description'] ?></td>
				<td class="col-3"><?= number_format($model['item_price'], 2) ?></td>
				<td class="col-4"><?= $model['january'] ?></td>
				<td class="col-5"><?= $model['february'] ?></td>
				<td class="col-6"><?= $model['march'] ?></td>
				<td class="col-7"><?= $model['april'] ?></td>
				<td class="col-8"><?= $model['may'] ?></td>
				<td class="col-9"><?= $model['june'] ?></td>
				<td class="col-10"><?= $model['july'] ?></td>
				<td class="col-11"><?= $model['august'] ?></td>
				<td class="col-12"><?= $model['september'] ?></td>
				<td class="col-13"><?= $model['october'] ?></td>
				<td class="col-14"><?= $model['november'] ?></td>
				<td class="col-15"><?= $model['december'] ?></td>
				<td class="col-16"><?= $model['total_count'] ?></td>
			</tr>
		</tbody>
	</table>
</div>