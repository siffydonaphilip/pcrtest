$(document).ready(function() {
	var ref_this = $("ul.nav.nav-pills li.nav-item a.nav-link.active");
	var actv_tab = ref_this.data('id');

	var dtable_ipcpendng = $('#table_ipcpendng').DataTable({
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
            url : base_url+'ipc/ipc_list',
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
    	
    	if (target == "ipc_complt") {
    		var dtable_ipccomplt = $('#table_ipccomplt').DataTable({
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
                    url : base_url+'ipc/ipc_list',
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

    /***************************************
    * Detail : IPC Update                  *
    * Date   : 25-06-2021                  *
    ***************************************/
    $("#ipc_update").click(function(e){
        e.preventDefault();
        var hesnid   = $('#ipc_hesnid').val();
        var sampleid = $('#ipc_sampleid').val();

        if (hesnid == "") {
            $('#ipc_hesnid').addClass('isinvalid');
            $('#ipc_hesnid').focus();
            return false;
        } 
        else{
            $('#ipc_hesnid').removeClass('isinvalid');
        }

        if (sampleid == "") {
            $('#ipc_sampleid').addClass('isinvalid');
            $('#ipc_sampleid').focus();
            return false;
        } 
        else{
            $('#ipc_sampleid').removeClass('isinvalid');
        }

        $("#ipcupdateForm").attr("action",base_url+"ipc/ipcupdate");
        $("#ipcupdateForm").submit();
    });
}); // DOM End

/************************************
* Detail : Loading Update IPC Modal *
* Date   : 25-06-2021               *
************************************/
function ipc_editFun(id)
{
    $("input[name ='id']").val(id);

    $("#ipcupdate_Modal").modal({backdrop: 'static'});
    $("#ipcupdate_Modal").modal('show');
}