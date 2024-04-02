<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Hasil Shorting Data</h6>
				</div>
				<div class="card-body">
					Ditemukan hasil <b><?= $shorting_count ?></b> data dari <b><?= $total_count ?></b> total data MO-Chass.
					<br>
					<button class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#collapseShorting" aria-expanded="false" aria-controls="collapseShorting">
						Lihat Query Shorting
					</button>
					<div class="collapse" id="collapseShorting">
						<br>
						<div class="card card-body">
							<table class="table table-bordered" width="100%" cellspacing="0">
								<?php if ($search_query['tag_no'] != NULL) { ?>
									<tr>
										<td width="50%">Tag No</td>
										<td><?= $search_query['tag_no'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['desc'] != NULL) { ?>
									<tr>
										<td width="50%">Desc</td>
										<td><?= $search_query['desc'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['ordern'] != NULL) { ?>
									<tr>
										<td width="50%">Order</td>
										<td><?= $search_query['ordern'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['pr'] != NULL) { ?>
									<tr>
										<td width="50%">PR</td>
										<td><?= $search_query['pr'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['coll_no'] != NULL) { ?>
									<tr>
										<td width="50%">Coll No</td>
										<td><?= $search_query['coll_no'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['material'] != NULL) { ?>
									<tr>
										<td width="50%">Material</td>
										<td><?= $search_query['material'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['revision'] != NULL) { ?>
									<tr>
										<td width="50%">Revision</td>
										<td><?= $search_query['revision'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['pic_buyer'] != NULL) { ?>
									<tr>
										<td width="50%">Pic Buyer</td>
										<td><?= $search_query['pic_buyer'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['dari_tgl_release_order'] != NULL) { ?>
									<tr>
										<td width="50%">Dari Tanggal Release Order</td>
										<td><?= $search_query['dari_tgl_release_order'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['sampai_tgl_release_order'] != NULL) { ?>
									<tr>
										<td width="50%">Sampai Tanggal Release Order</td>
										<td><?= $search_query['sampai_tgl_release_order'] ?></td>
									</tr>
								<?php } ?>
								<?php if ($search_query['status_pengadaan'] != NULL) { ?>
									<tr>
										<td width="50%">Status Pengadaan</td>
										<td><?= $search_query['status_pengadaan'] ?></td>
									</tr>
								<?php } ?>
							</table>
						</div>
					</div>
					<br>
					<h6 class="mt-3 font-weight-bold">Berdasarkan Status Pengadaan</h6>
					<div class="table-responsive">
						<table class="table table-bordered" width="100%">
							<thead>
								<th class="text-center">No</th>
								<th>Status</th>
								<th>Jumlah</th>
								<th>%</th>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($shorting_total as $key) {
								?>
									<tr>
										<td class="text-center"><?= $no++ ?></td>
										<td><?= $key->status_pengadaan ?></td>
										<td class="text-center"><?= $key->total ?></td>
										<td class="text-center"><?= number_format(($key->total / $total_count) * 100, 2) ?>%</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<h6 class="mt-3 font-weight-bold">Data</h6>
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>NO</th>
									<th>EQUIPMENT</th>
									<th>DESC</th>
									<th>DEL</th>
									<th>FIS</th>
									<th>ORDER</th>
									<th>TGL RELEASE ORD</th>
									<th>TGL CHANGE ORD</th>
									<th>ITEM NO</th>
									<th>MATERIAL</th>
									<th>MATERIAL DESC</th>
									<th>PO TEXT</th>
									<th>MANUFACTURE</th>
									<th>QTY</th>
									<th>BUN</th>
									<th>DIFF</th>
									<th>REVISION</th>
									<th>PG</th>
									<th>KTG MATERIAL</th>
									<th>ANALIS</th>
									<th>AST ANALIS</th>
									<th>PROGRESS</th>
									<th>SAP MB52</th>
									<th>STATUS PROGRESS</th>
									<th>KET STATUS WO TO PR</th>
									<th>TGL UPDATE STATUS PROGRESS</th>
									<th>RENCANA DICADANGKAN</th>
									<th>REAL PENCADANGAN</th>
									<th>LOKASI</th>
									<th>KET WH</th>
									<th>PR</th>
									<th>ITEM PR</th>
									<th>QPR</th>
									<th>TGL PR</th>
									<th>TKDN</th>
									<th>TGL TKDN</th>

									<th>TGL TERIMA PR</th>
									<th>PIC BUYER</th>
									<th>ASS BUYER</th>
									<th>COLL NO</th>
									<th>JENIS RAPAT</th>
									<th>STATUS PENGADAAN</th>
									<th>KETERANGAN</th>
									<th>TGL PENUNJUKAN</th>
									<th>PO</th>
									<th>TGL PO</th>
									<!-- purchase saja -->
									<th>NILAI PO</th>
									<!-- - -->
									<th>TGL DELV</th>
									<th>PERUSAHAAN</th>
									<th>TENDER ULANG</th>
									<th>APPROVAL DRAWING</th>
									<th>NO LC</th>
									<th>TGL LC</th>
									<th>EXP DATE LC</th>
									<th>JAMINAN PELAKSANAAN</th>
									<!-- purchase saja -->
									<th>NO JAMINAN PELAKSANAAN</th>
									<th>NILAI JAMINAN</th>
									<th>EXP DATE JAMINAN</th>
									<th>COST SAVING</th>
									<th>SLA</th>
									<!-- - -->
									<!-- <th>PEMBUAT</th> -->
									<th>TGL BUAT</th>
									<th>TGL UPDATE</th>
								</tr>
							</thead>

							<tbody>
								<?php $no = 1;
								foreach ($shorting_result as $key) {
								?>
									<tr>
										<th><?= $no++; ?></th>
										<th><?= $key->equipment; ?></th>
										<th><?= $key->desk; ?></th>
										<th><?= $key->del; ?></th>
										<th><?= $key->fis; ?></th>
										<th><?= $key->ordern; ?></th>
										<th><?= date('d-m-Y', strtotime($key->tgl_release_order)); ?></th>
										<th><?= date('d-m-Y', strtotime($key->tgl_change_order)); ?></th>
										<th><?= $key->item_no; ?></th>
										<th><?= $key->material; ?></th>
										<th><?= $key->material_deskripsi; ?></th>
										<th><?= $key->po_text; ?></th>
										<th><?= $key->manufacture; ?></th>
										<th><?= $key->qty; ?></th>
										<th><?= $key->bun; ?></th>
										<th><?= $key->diff; ?></th>
										<th><?= $key->revision; ?></th>
										<th><?= $key->pg; ?></th>
										<th><?= $key->kategori_material; ?></th>
										<th><?= $key->analis; ?></th>
										<th><?= $key->ass_analis; ?></th>
										<th><?= $key->progress; ?></th>
										<th><?= $key->sap_mb52; ?></th>
										<th><?= $key->status_progress; ?></th>
										<th><?= $key->wo_to_pr; ?></th>
										<th><?= date('d-m-Y', strtotime($key->tgl_update_status_progress)); ?></th>
										<th><?= $key->rencana_dicadangkan; ?></th>
										<th><?= $key->realisasi_pencadangan; ?></th>
										<th><?= $key->lokasi; ?></th>
										<th><?= $key->ket_wh; ?></th>
										<td><?= $key->pr; ?></td>
										<td><?= $key->item_pr; ?></td>
										<td><?= $key->qpr; ?></td>
										<td><?= date('d-m-Y', strtotime($key->tgl_pr)); ?></td>
										<td><?= $key->tkdn; ?></td>
										<td><?= date('d-m-Y', strtotime($key->tgl_tkdn)); ?></td>
										<td><?= date('d-m-Y', strtotime($key->tgl_terima_pr)); ?></td>
										<td><?= $key->pic_buyer; ?></td>
										<td><?= $key->ass_buyer; ?></td>
										<td><?= $key->coll_no; ?></td>
										<td><?= $key->jenis_rapat; ?></td>
										<td><?= $key->status_pengadaan; ?></td>
										<td><?= $key->keterangan; ?></td>
										<td><?= date('d-m-Y', strtotime($key->tgl_penunjukan)) ?></td>
										<td><?= $key->po; ?></td>
										<td><?= date('d-m-Y', strtotime($key->tgl_po)); ?></td>
										<!-- purchase saja -->
										<td><?= $key->nilai_po; ?></td>
										<!-- - -->
										<td><?= date('d-m-Y', strtotime($key->tgl_delv)); ?></td>
										<td><?= $key->perusahaan; ?></td>
										<td><?= $key->tender_ulang; ?></td>
										<td><?= $key->approval_drawing; ?></td>
										<td><?= $key->no_lc; ?></td>
										<td><?= date('d-m-Y', strtotime($key->tgl_lc)); ?></td>
										<td><?= date('d-m-Y', strtotime($key->exp_date_lc)); ?></td>
										<td><?= $key->jaminan_pelaksanaan; ?></td>

										<!-- purchase saja -->
										<td><?= $key->no_jaminan_pelaksanaan; ?></td>
										<td><?= $key->nilai_jaminan; ?></td>
										<td><?= date('d-m-Y', strtotime($key->exp_date_jaminan)); ?></td>
										<td><?= $key->cost_saving; ?></td>
										<td><?= $key->sla; ?></td>
										<!-- - -->
										<!-- <td><?= $key->nama; ?></td> -->
										<td><?= $key->created_date; ?></td>
										<td><?= $key->update_date; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer">
					<a href="<?= site_url('admin') ?>" class="btn btn-sm btn-danger">Kembali</a>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Chart</h6>
				</div>
				<div class="card-body">
					<?php
					foreach ($shorting_total as $data) {
						$chart_status[] = $data->status_pengadaan;
						$chart_persen[] = (float) number_format(($data->total / $total_count) * 100, 2);
					}
					?>
					<canvas id="myChart"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>

<script>
	const ctx = document.getElementById('myChart');

	new Chart(ctx, {
		type: 'pie',
		data: {
			labels: <?php echo json_encode($chart_status); ?>,
			datasets: [{
				label: 'Persentase',
				data: <?php echo json_encode($chart_persen); ?>,
				borderWidth: 1
			}]
		},
		options: {
			responsive: true,
			maintainAspectRatio: true,
			plugins: {
				labels: {
					render: 'percentage',
					fontSize: 16,
					fontColor: ['black'],
					precision: 2
				}
			},
		}
	});
</script>
