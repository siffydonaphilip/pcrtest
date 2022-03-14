<style>
table.odd, table.odd td, table.odd th {
  border: 1px solid #9c9d9e;
  font-family: arial;
}

table.odd {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  padding: 6px 8px;
}
.red td
{
	background-color: red;
	color: white;
	font-weight: bold;
}
.green td
{
	background-color: green;
	color: white;
	font-weight: bold;
}
.blue td
{
	background-color: blue;
	color: white;
	font-weight: bold;
}
.orange td
{
	background-color: orange;
	color: white;
	font-weight: bold;
}
.center
{
	text-align: center;
}
.right
{
	text-align: right;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>

<?php
    $pcrresult = '';

	if (isset($view[0]->result_status)) {
		if ($view[0]->result_status == 1) {
			$pcrresult  = "Positive";
			$rslt_class = "red";
		}
		elseif ($view[0]->result_status == 2) {
			$pcrresult  = "Negative";
			$rslt_class = "green";
		}
		elseif ($view[0]->result_status == 3) {
			$pcrresult  = "Sample Rejected";
			$rslt_class = "orange";
		}
	}
?>

<div style="padding-top: 55px; padding-right: 40px; padding-left: 40px;  font-family: arial;">
	<table class="odd">
		<tr>
			<td style="width: 33%;">Full Name</td>
			<td class="center" style="width: 34%;"><?php echo isset($view[0]->patient_name) ? $view[0]->patient_name : ''; ?></td>
			<td class="right" style="width: 33%;">الاسم بالكامل</td>
		</tr>
		<tr>
			<td>National ID / Iqama</td>
			<td class="center"><?php echo isset($view[0]->id_no) ? $view[0]->id_no : ''; ?></td>
			<td class="right">رقم الهوية / الإقامة</td>
		</tr>
		<tr>
			<td>Passport Number</td>
			<td class="center"><?php echo isset($view[0]->passport_number) ? $view[0]->passport_number : ''; ?></td>
			<td class="right">رقم الجواز</td>
		</tr>
		<tr>
			<td>Gender</td>
			<td class="center"><?php echo isset($view[0]->gender) ? $view[0]->gender : ''; ?></td>
			<td class="right">  الجنس </td>
		</tr>
		<tr>
			<td>Phone Number</td>
			<td class="center"><?php echo isset($view[0]->phone_no) ? $view[0]->phone_no : ''; ?></td>
			<td class="right">رقم الهاتف</td>
		</tr>
		<tr>
			<td>Sample ID</td>
			<td class="center"><?php echo isset($view[0]->sample_id) ? $view[0]->sample_id : ''; ?></td>
			<td class="right">رقم التقرير التسلسلي</td>
		</tr>
		<tr>
			<td>HESN ID</td>
			<td class="center"><?php echo isset($view[0]->hesn_id) ? $view[0]->hesn_id : ''; ?></td>
			<td class="right">رقم التسجيل بحصن</td>
		</tr>
		<tr>
			<td>Collection Date</td>
			<td class="center"><?php echo isset($view[0]->collection_time) ? date('d-m-Y H:i:s', strtotime($view[0]->collection_time)) : ''; ?></td>
			<td class="right">  تاريخ اخذ العينة</td>
		</tr>
		<tr>
			<td>Result Date</td>
			<td class="center"><?php echo isset($view[0]->reporting_time) ? date('d-m-Y H:i:s', strtotime($view[0]->reporting_time)) : ''; ?></td>
			<td class="right">تاريخ نتيجة الفحص</td>
		</tr>
		<tr class="<?php echo $rslt_class;?>">
			<td>Test Result</td>
			<td class="center"><?php echo $pcrresult; ?></td>
			<td class="right">نتيجة الفحص</td>
		</tr>
	</table>
	<div style="padding-right: 40px; padding-left: 40px;  font-family: arial;">
		<table style="width: 100%;">
			<tr>
				<td style="width: 33%;">
					<?php echo '<img src="'. base_url() . 'skin/img/1.jpg"  style="width: 35%;"/>'; ?>
				</td>
				<td style="padding: 60px; width: 33%;">
					<img src="<?php echo isset($view[0]->file) ? $view[0]->file : ''; ?>"  style="width:10%;"/>
				</td>
				<td style="width: 34%;">
					<?php echo '<img src="'. base_url() . 'skin/img/2.jpg"  style="width: 35%;"/>'; ?>
				</td>
			</tr>
		</table>

	</div>

</div>