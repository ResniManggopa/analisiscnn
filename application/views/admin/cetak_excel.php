<?php
header('Content-Type: application/vnd.ms-excel');
// header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=datamochass.xls");
header('Cache-Control: max-age=0');
// header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="collapse" cellspacing="1" width="100%">
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
  
        <?php $no=1; foreach ($total->result() as $key) {?>
        <tr>
            <th><?php echo $key->no;?></th>
            <th><?php echo $key->equipment;?></th>
            <th><?php echo $key->desk;?></th>
            <th><?php echo $key->del;?></th>
            <th><?php echo $key->fis;?></th>
            <th><?php echo $key->ordern;?></th>
            <th><?php echo $key->tgl_release_order;?></th>
            <th><?php echo $key->tgl_change_order;?></th>
            <th><?php echo $key->item_no;?></th>
            <th><?php echo $key->material;?></th>
            <th><?php echo $key->material_deskripsi;?></th>
            <th><?php echo $key->po_text;?></th>
            <th><?php echo $key->manufacture;?></th>
            <th><?php echo $key->qty;?></th>
            <th><?php echo $key->bun;?></th>
            <th><?php echo $key->diff;?></th>
            <th><?php echo $key->revision;?></th>
            <th><?php echo $key->pg;?></th>
            <th><?php echo $key->kategori_material ;?></th>
            <th><?php echo $key->analis;?></th>
            <th><?php echo $key->ass_analis;?></th>
            <th><?php echo $key->progress;?></th>
            <th><?php echo $key->sap_mb52;?></th>
            <th><?php echo $key->status_progress;?></th>
            <th><?php echo $key->wo_to_pr;?></th>
            <th><?php echo $key->tgl_update_status_progress;?></th>
            <th><?php echo $key->rencana_dicadangkan;?></th>
            <th><?php echo $key->realisasi_pencadangan ;?></th>
            <th><?php echo $key->lokasi;?></th>
            <th><?php echo $key->ket_wh;?></th>                   
            <td><?php echo $key->pr;?></td>           
            <td><?php echo $key->item_pr;?></td>
            <td><?php echo $key->qpr;?></td>
            <td><?php echo $key->tgl_pr;?></td>
            <td><?php echo $key->tkdn;?></td>
            <td><?php echo $key->tgl_tkdn;?></td>
            <td><?php echo $key->tgl_terima_pr;?></td>
            <td><?php echo $key->pic_buyer;?></td>
            <td><?php echo $key->ass_buyer;?></td>
            <td><?php echo $key->coll_no;?></td>
            <td><?php echo $key->jenis_rapat;?></td>
            <td><?php echo $key->status_pengadaan;?></td>
            <td><?php echo $key->keterangan;?></td>
            <td><?php echo $key->tgl_penunjukan?></td>
            <td><?php echo $key->po;?></td>
            <td><?php echo $key->tgl_po;?></td>
            <!-- purchase saja -->
            <td><?php echo $key->nilai_po;?></td>
            <!-- - -->
            <td><?php echo $key->tgl_delv;?></td>
            <td><?php echo $key->perusahaan;?></td>
            <td><?php echo $key->tender_ulang;?></td>
            <td><?php echo $key->approval_drawing;?></td>
            <td><?php echo $key->no_lc;?></td>
            <td><?php echo $key->tgl_lc;?></td>
            <td><?php echo $key->exp_date_lc;?></td>
            <td><?php echo $key->jaminan_pelaksanaan;?></td>
            
            <!-- purchase saja -->
            <td><?php echo $key->no_jaminan_pelaksanaan;?></td>
            <td><?php echo $key->nilai_jaminan;?></td>
            <td><?php echo $key->exp_date_jaminan;?></td>
            <td><?php echo $key->cost_saving;?></td>
            <td><?php echo $key->sla;?></td>
            <!-- - -->
            <!-- <td><?php echo $key->nama;?></td> -->
            <td><?php echo $key->created_date;?></td>
            <td><?php echo $key->update_date;?></td>
        <tr>
        <?php }?>
    
</table>