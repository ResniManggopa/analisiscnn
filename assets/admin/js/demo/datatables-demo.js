// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
		dom: 'Bfrtip',
    buttons: [
      {
				extend: 'excel',
				title: 'Data MO-Chass'
			},
    ]
	});
});
