<section class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Santri</h1>
			</div>
		</div>
	</div>
</section>

<section class="content ">
	<div class="container">
		<div class="card">
			<div class="card-body p-3">
				<table id="example1" class="table">
					<thead>
						<tr>
							<th>
								NO
							</th>
							<th>
								NIUP
							</th>
							<th>
								NAMA
							</th>
							<th>
								ALAMAT
							</th>
							<!--<th>-->
							<!--	QR CODE-->
							<!--</th>-->
							<th>
								AKSI
							</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<script>
	var table;
	$(document).ready(function() {
		table = $('#example1').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
			"ordering":false,
			"info":false,
			"lengthChange": false,
            
            "ajax": {
                "url": "<?php echo site_url('Cmembers/data_person')?>",
                "type": "POST"
            },

            
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],

        });

		table = $('#example1').on("click", "#bt-detail", function () {
            var id = $(this).attr("data");
			$.post('<?= site_url('Cmembers/halaman_detail') ?>', {
			idperson: id
			}, function(Res) {
				$('#ini_isinya').html(Res);
			});
		})

	})
</script>