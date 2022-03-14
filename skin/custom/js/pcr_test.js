var table;

$(document).ready(function() {
    
    // Natinality Dropdown in PCR Test
    $('.ctm-select2').select2();


	/**********************************
	* Detail : PCR Test List          *
	* Date   : 24-06-2021             *
	**********************************/
	table = $('#table_pcrtest').DataTable({
		"bDestroy": true,
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [0,1,2,3,4,5,6]
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
            url : base_url+'pcrtest/pcrtest_list',
            type: "POST",
            data: { }
        },
        "columnDefs": [
        { 
            "targets": [0],
            "orderable": false,
        },
        { 
            "targets": [7],
            "orderable": false,
        }
        ],
        "fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
		}
    });

    /***************************************
    * Detail : PCR Test Submit             *
    * Date   : 24-06-2021                  *
    ***************************************/
    $("#pcr_submit").click(function(e){
        e.preventDefault();
        var patientname = $('#pcr_ptname').val();
        var idno        = $('#pcr_idno').val();
        var dob         = $('#pcr_dob').val();
        var phno        = $('#pcr_phoneno').val();
        var nationality = $('#pcr_nationality').val();

        if (patientname == "") {
            $('#pcr_ptname').addClass('isinvalid');
            $('#pcr_ptname').focus();
            return false;
        } 
        else{
            $('#pcr_ptname').removeClass('isinvalid');
        }

        if (idno == "") {
            $('#pcr_idno').addClass('isinvalid');
            $('#pcr_idno').focus();
            return false;
        } 
        else{
            $('#pcr_idno').removeClass('isinvalid');
        }

        if (dob == "") {
            $('#pcr_dob').addClass('isinvalid');
            $('#pcr_dob').focus();
            return false;
        } 
        else{
            $('#pcr_dob').removeClass('isinvalid');
        }

        if(document.getElementById('pcrg_male').checked == false && document.getElementById('pcrg_female').checked == false) { 
            toastr.error("Please Select Gender.");
            return false;
        }

        if (phno == "") {
            $('#pcr_phoneno').addClass('isinvalid');
            $('#pcr_phoneno').focus();
            return false;
        } 
        else{
            $('#pcr_phoneno').removeClass('isinvalid');
        }

        if (nationality == "") 
        {
            $("#pcr_nationality").next().find('.select2-selection').addClass('select-dropdown-error');
            return false;
        } 
        else
        {
            $("#pcr_nationality").next().find('.select2-selection').removeClass('select-dropdown-error');
        }

        $("#newpcrForm").attr("action",base_url+"pcrtest/newpcrtest_submit");
        $("#newpcrForm").submit();
    });

    /***************************************
    * Detail : PCR Test Update             *
    * Date   : 24-06-2021                  *
    ***************************************/
    $("#pcr_update").click(function(e){
        e.preventDefault();
        var patientname = $('#epcr_ptname').val();
        var idno        = $('#epcr_idno').val();
        var dob         = $('#epcr_dob').val();
        var phno        = $('#epcr_phoneno').val();
        var nationality = $('#epcr_nationality').val();

        if (patientname == "") {
            $('#epcr_ptname').addClass('isinvalid');
            $('#epcr_ptname').focus();
            return false;
        } 
        else{
            $('#epcr_ptname').removeClass('isinvalid');
        }

        if (idno == "") {
            $('#epcr_idno').addClass('isinvalid');
            $('#epcr_idno').focus();
            return false;
        } 
        else{
            $('#epcr_idno').removeClass('isinvalid');
        }

        if (dob == "") {
            $('#epcr_dob').addClass('isinvalid');
            $('#epcr_dob').focus();
            return false;
        } 
        else{
            $('#epcr_dob').removeClass('isinvalid');
        }

        if(document.getElementById('epcrg_male').checked == false && document.getElementById('epcrg_female').checked == false) { 
            toastr.error("Please Select Gender.");
            return false;
        }

        if (phno == "") {
            $('#epcr_phoneno').addClass('isinvalid');
            $('#epcr_phoneno').focus();
            return false;
        } 
        else{
            $('#epcr_phoneno').removeClass('isinvalid');
        }

        if (nationality == "") 
        {
            $("#epcr_nationality").next().find('.select2-selection').addClass('select-dropdown-error');
            return false;
        } 
        else
        {
            $("#epcr_nationality").next().find('.select2-selection').removeClass('select-dropdown-error');
        }

        $("#updatepcrForm").attr("action",base_url+"pcrtest/pcrtest_update");
        $("#updatepcrForm").submit();
    });

}); // End DOM

/****************************************
* Detail : Loading Update PCR Test Modal*
* Date   : 24-06-2021                   *
****************************************/
function pcrtest_editFun(id)
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
                $("input[name ='id']").val(edit_data.id);
                
                $("input[name ='epcr_ptname']").val(edit_data.patient_name);
                $("input[name ='epcr_idno']").val(edit_data.id_no);
                
                if (edit_data.dob != "0000-00-00" && edit_data.dob != null) {
                    var dateofbirth = ctm_formatDate(edit_data.dob);
                    $("#epcr_dob").datepicker('setDate', dateofbirth);
                }
                else {
                    $("#epcr_dob").val('');
                }

                $('input[name=epcr_gender][value='+edit_data.gender+']').attr('checked', true); // or 'checked'
                $("input[name ='epcr_phoneno']").val(edit_data.phone_no);
                $("#epcr_nationality").val(edit_data.nationality_id).trigger('change'); // Added on 01-07-2021
                $("input[name ='epcr_passportno']").val(edit_data.passport_number); // Added on 01-07-2021
                $("#epcr_remarks").val(edit_data.remarks);
            });

            $("#updatepcr_Modal").modal({backdrop: 'static'});
            $("#updatepcr_Modal").modal('show');
       }
    });
}

/***************************************
* Detail : Convert to dd-mm-yyyy format*
* Date   : 24-06-2021                  *
***************************************/
function ctm_formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [day, month, year].join('-');
}