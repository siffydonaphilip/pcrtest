var dtable_labpendng;
var dtable_labcomplt;

$(document).ready(function() {
	var ref_this = $("ul.nav.nav-pills li.nav-item a.nav-link.active");
	var actv_tab = ref_this.data('id');

	dtable_labpendng = $('#table_labpendng').DataTable({
		"bDestroy": true,
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                },
                orientation: 'landscape'
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8]
                }
            }
        ],

    	"pagingType": 'full_numbers',
        "iDisplayLength": 10,
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "order": [],

        "ajax": {
            url : base_url+'lab/lab_list',
		    type: "POST",
		    data: { a_tab : actv_tab }
        },
        "columnDefs": [
        { 
            "targets": [0],
            "orderable": false,
        },
        { 
            "targets": [8],
            "orderable": false,
        },
        ],
        "fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
		}
    });

    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
    	var target = $(e.target).data('id') // activated tab
    	
    	if (target == "lab_complt") {
    		dtable_labcomplt = $('#table_labcomplt').DataTable({
    			"bDestroy": true,
		        "dom": 'Bfrtip',
		        "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8]
                        },
                        orientation: 'landscape'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8]
                        }
                    }
                ],

		    	"pagingType": 'full_numbers',
		        "iDisplayLength": 10,
		        "processing": true,
		        "serverSide": true,
		        "responsive": true,
		        "order": [],

		        "ajax": {
                    url : base_url+'lab/lab_list',
                    type: "POST",
                    data: { a_tab : target }
                },
                "columnDefs": [
                { 
                    "targets": [0],
                    "orderable": false,
                },
		        ],
		        "fnDrawCallback": function(settings){
					$('[data-toggle="tooltip"]').tooltip();          
				}
		    });
    	}
    	
    });

}); // DOM End

/****************************************
* Detail : On Click Lab Acknowledgement * 
* Date   : 25-06-2021                   *
****************************************/
$(document).on('click', '#lab_acknowldg', function () {
    var id = $(this).data('id');

    Swal.fire({
        title: 'Acknowledgement',
        icon: 'info',
        html:
            'Do you want to <b>Acknowledge</b> ?',
        // showCloseButton: true,
        showDenyButton: true,
        focusConfirm: false,
        confirmButtonText: 'Yes',
        denyButtonText: 'No'
    }).then((result) => {
        if (result.isConfirmed) {
            // If Yes
            $.ajax({
                type: "POST",
                url : base_url+'lab/acknowledgement',
                dataType: 'text',
                data: { id:id },
                success: function(data) {
                    dtable_labpendng.ajax.reload();
                    if (data > 0) {
                        Swal.fire('Acknowledged!', '', 'success')
                    }
                    else {
                        Swal.fire('Cancelled', '', "error")
                    }
                }
            });
            
        } 
        else if (result.isDenied) {
            Swal.fire('Acknowledgement Denied!', '', 'error')
        }
        else {
            Swal.fire('Cancelled', '', "error")
        }
    })
});