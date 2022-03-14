var dtable_resultentry;

$(document).ready(function() {
	var ref_this = $("ul.nav.nav-pills li.nav-item a.nav-link.active");
	var actv_tab = ref_this.data('id');

	dtable_resultentry = $('#table_resultentry').DataTable({
		"bDestroy": true,
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
                },
                orientation: 'landscape'
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7]
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
            url : base_url+'testresult/testresult_list',
		    type: "POST",
		    data: { a_tab : actv_tab }
        },
        "columnDefs": [
        { 
            "targets": [0],
            "orderable": false,
        },{ 
            "targets": [8],
            "orderable": false,
        }
        ],
        "fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
		}
    });

    $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
    	var target = $(e.target).data('id') // activated tab
    	
        // For Positive Result Tab
    	if (target == "positvrslt") {
    		var dtable_positive = $('#table_positiverslt').DataTable({
    			"bDestroy": true,
		        "dom": 'Bfrtip',
		        "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        },
                        orientation: 'landscape'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
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
		            url : base_url+'testresult/testresult_list',
		            type: "POST",
		            data: { a_tab : target }
		        },
		        "columnDefs": [
		        { 
                    "targets": [0],
                    "orderable": false,
                },
                { 
		            "targets": [10],
		            "orderable": false,
		        }
		        ],
		        "fnDrawCallback": function(settings){
					$('[data-toggle="tooltip"]').tooltip();          
				}
		    });
    	}
        // For Negative Result Tab
    	else if (target == "negatvrslt") {
    		var dtable_negative = $('#table_negativerslt').DataTable({
    			"bDestroy": true,
		        "dom": 'Bfrtip',
		        "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        },
                        orientation: 'landscape'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
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
		            url : base_url+'testresult/testresult_list',
		            type: "POST",
		            data: { a_tab : target }
		        },
		        "columnDefs": [
		        { 
                    "targets": [0],
                    "orderable": false,
                },
                { 
		            "targets": [10],
		            "orderable": false,
		        },
		        ],
		        "fnDrawCallback": function(settings){
					$('[data-toggle="tooltip"]').tooltip();          
				}
		    });
    	}
        // For Samples Rejected Tab
        else if (target == "samplerejct") {
            var dtable_samplereject = $('#table_samplereject').DataTable({
                "bDestroy": true,
                "dom": 'Bfrtip',
                "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        },
                        orientation: 'landscape'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
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
                    url : base_url+'testresult/testresult_list',
                    type: "POST",
                    data: { a_tab : target }
                },
                "columnDefs": [
                { 
                    "targets": [0],
                    "orderable": false,
                },
                { 
                    "targets": [10],
                    "orderable": false,
                },
                ],
                "fnDrawCallback": function(settings){
                    $('[data-toggle="tooltip"]').tooltip();          
                }
            });
        }
        // For All Results Tab
        else if (target == "allreslts") {
            var dtable_allresult = $('#table_allresults').DataTable({
                "bDestroy": true,
                "dom": 'Bfrtip',
                "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
                        },
                        orientation: 'landscape'
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9]
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
                    url : base_url+'testresult/testresult_list',
                    type: "POST",
                    data: { a_tab : target }
                },
                "columnDefs": [
                { 
                    "targets": [0],
                    "orderable": false,
                }
                ],
                "fnDrawCallback": function(settings){
                    $('[data-toggle="tooltip"]').tooltip();          
                }
            });
        }
        // For Detailed Report Tab
        else if (target == "detail_report") {
            var dtable_allresult = $('#table_detailreport').DataTable({
                "bDestroy": true,
                "dom": 'Bfrtip',
                "buttons": [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        },
                        pageSize: 'A3',
                        orientation: 'landscape',
                        customize : function(doc) {
                            doc.pageMargins = [50,50,50,50];
                            doc.content[1].table.widths = [ '3%',  '8%', '12%', '4%', '6%', 
                              '8%', '8%', '12%', '12%', '11%', '11%', '4%'];
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        }
                    }
                ],

                "pagingType": 'full_numbers',
                "iDisplayLength": 10,
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "scrollX": true,
                "order": [],

                "ajax": {
                    url : base_url+'testresult/detailreport_List',
                    type: "POST",
                    data: {  }
                },
                "columnDefs": [
                { 
                    "targets": [0],
                    "orderable": false,
                }
                ],
                "fnDrawCallback": function(settings){
                    $('[data-toggle="tooltip"]').tooltip();          
                }
            });
        }
    });

    /***************************************
    * Detail : PCR Result Update           *
    * Date   : 25-06-2021                  *
    ***************************************/
    $("#resultentry_submit").click(function(e){
        e.preventDefault();
        var id     = $('#id').val();
        var result = $('#rsltentry_result').val();

        if (result=="") {
            $('#rsltentry_result').addClass('is-invalid');
            return false;
        } 
        else{
            $('#rsltentry_result').removeClass('is-invalid');
        }

        $.ajax({
            type: "POST",
            url : base_url+'testresult/pcrresult_update',
            dataType: 'text',
            data: { id:id, rsltentry_result : result },
            success: function(data) {
                var dwnld_id = data;
                // Download Pop-up
                Swal.fire({
                    title: 'Download Result PDF!',
                    icon: 'info',
                    html:
                        'Click on Download Button to View and Download Result PDF.',
                    // showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: '<i class="fa fa-download"></i> Download',
                    preConfirm: () => {
                        window.open(''+base_url+'assets/uploads/'+dwnld_id+'', '_blank');
                    },
                }).then((result) => {
                    
                    if (result.isConfirmed) {
                        // If Download
                        window.location.href = base_url+'testresult';
                    } 
                    else if (result.isDismissed) {
                        Swal.fire('Cancelled!', '', 'error').then((result1) => {
                    
                            if (result1.isConfirmed) {
                                window.location.href = base_url+'testresult';
                            } 
                            else if (result1.isDismissed) {
                                window.location.href = base_url+'testresult';
                            }
                            
                        })
                    }
                })
            }
        }); // End ajax
    });


}); // DOM End

/******************************************
* Detail : Loading Update PCR Result Modal*
* Date   : 25-06-2021                     *
******************************************/
function pcrreslt_editFun(id)
{
    $.ajax({
        type: "POST",
        url : base_url+'pcrtest/PcrUpdate_Modal',
        data: {id:id},
        success: function(data){
            $("input[name ='id']").val('');
            $(".error").text('');
            var object = JSON.parse(data);

            $.each(object.view, function(key, edit_data) {
                var collectn_time = ctm_formatDate(edit_data.collection_time);

                $("input[name ='id']").val(edit_data.id);
                
                $("input[name ='rsltentry_pname']").val(edit_data.patient_name);
                $("input[name ='rsltentry_idno']").val(edit_data.id_no);
                $("input[name ='rsltentry_hesn']").val(edit_data.hesn_id);
                $("input[name ='rsltentry_sampleid']").val(edit_data.sample_id);
                $("input[name ='rsltentry_collectntime']").val(collectn_time);
            });

            $("#updaterslt_Modal").modal({backdrop: 'static'});
            $("#updaterslt_Modal").modal('show');
       }
    });
}

/*********************************************
* Detail : Convert to dd-mm-yyyy H:i:s format*
* Date   : 25-06-2021                        *
*********************************************/
function ctm_formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear(),
        hour = d.getHours(),
        minutes = d.getMinutes(),
        seconds = d.getSeconds();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [day, month, year].join('-')+ ' '+[hour, minutes, seconds].join(':');
}