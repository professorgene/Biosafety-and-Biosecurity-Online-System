<?php echo form_open('applicationpage/save_edit') ?>
<?php echo form_hidden('announcement_id',$list_product['announcement_id']) ?>
<table>
	<tr>
		<td>NAME</td>
		<td><?php echo form_input('announcement_id',$list_product['announcement_id'],array('placeholder'=>'Name')) ?></td>
	</tr>
	<tr>
		<td>NOTE</td>
		<td><?php echo form_textarea('announcement_description',$list_product['announcement_description'],array('placeholder'=>'Note')) ?></td>
	</tr>		
	<tr>
		<td>PRICE</td>
		<td><?php echo form_input('announcement_date',$list_product['announcement_date'],array('placeholder'=>'Price')) ?></td>
	</tr>
</table>
<?php echo form_submit('submit', 'Update Item!'); ?> <?php echo anchor('product','Back') ?>
<a href="<?php echo base_url(); ?>index.php/applicationpage/save_edit" class="col-md-3"><button class="btn btn-primary button_right">Edit</button></a>
<?php echo form_close(); ?>