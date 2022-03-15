<style>
table.odd, table.odd td, table.odd th {
  border: 1px solid #9c9d9e;
  font-family: arial;
}

table.odd {
  width: 100%;
  border-collapse: collapse;
}
/*th, td {
  padding: 6px 8px;
}*/
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

/*tr:nth-child(even) {background-color: #f2f2f2;}*/
</style>

<?php
    $pcrresult = '';

	if (isset($view[0]->result_status)) {
		if ($view[0]->result_status == 1) {
			$pcrresult  = "Infected (Positive)";
			$rslt_class = "red";
		}
		elseif ($view[0]->result_status == 2) {
			$pcrresult  = "Not Infected (Negative)";
			$rslt_class = "green";
		}
		elseif ($view[0]->result_status == 3) {
			$pcrresult  = "Sample Rejected";
			$rslt_class = "orange";
		}
	}
?>

<!-- <div style="padding-top: 55px; padding-right: 40px; padding-left: 40px;  font-family: arial;">
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
	

</div> -->
<hr style="height: 2px; color:black;  background-color: black; margin-top: 1px;     margin-bottom: 1px;"/>
<div style="padding-top: 30px; padding-right: 40px; padding-left: 40px;  font-family: 'Century Gothic', CenturyGothic, AppleGothic, sans-serif !important;">
	<table style="width:100%;">
		<!-- <tr>
			<td colspan="2">
				
			</td>
		</tr> -->
		<tr>
			<td style="width:50%;">
				<table style="width:95%;">
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Name	
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Robin	
						</td>
					</tr>
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						ID Number	
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						123456
						</td>
					</tr>
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Date Of Birth
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						dd/mm/yyyy	
						</td>
					</tr>
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Nationality	
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Indian
						</td>
					</tr>
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Phone Number	
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						000000000
						</td>
					</tr>
				</table>
			</td>
			<td style="width:50%;">
				<table style="width:95%; margin-left: 5%;">
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Organization	
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Qzolve IT	
						</td>
					</tr>
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Collection Date
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						dd/mm/yyyy	
						</td>
					</tr>
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Result Date	
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						dd/mm/yyyy	
						</td>
					</tr>
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						Report Number
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						123456789
						</td>
					</tr>
					<tr>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						HESN Number	
						</td>
						<td style="width:50%; color:#0088cc; font-size: 15px;">	
						123456789
						</td>
					</tr>
				</table>
				<br>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<hr style="height: 2px; color:black;  background-color: black; margin-top: 1px;     margin-bottom: 1px;"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<h4>RESULT</h4>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<hr style="height: 2px; color:black;  background-color: black; margin-top: 1px;     margin-bottom: 1px;"/>
			</td>
		</tr>	
		<tr>
			<td colspan="2" style="padding-bottom: 10px;">
				<table style="width:100%; background-color:<?php echo $rslt_class; ?>;">
					<tr>
						<td style="width:50%; color:white; font-weight: bold; padding: 5px;">
							<?php echo $pcrresult; ?>
						</td>
						<td style="width:50%; color:white; text-align: right; font-weight: bold; padding: 5px;">
							<?php echo $pcrresult; ?>
						</td>
					</tr>
				</table>
			</td>
		</tr>	
		<tr>
			<td colspan="2">
				<hr style="height: 2px; color:black;  background-color: black; margin-top: 1px;     margin-bottom: 1px;"/>
			</td>
		</tr>
		<tr>
			<td>
				Test Description
			</td>
			<td style="text-align: right;">
				Test Description
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<hr style="height: 2px; color:black;  background-color: black; margin-top: 1px;     margin-bottom: 1px;"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<br>
				<h3 style="font-weight: normal;">COVID-19 PCR Swab On Viral Transport Medium</h3><br>
				<h5>Comments</h5>
				<p style="font-size: 10px; text-align: justify;">The 2019 Novel Coronavirus named as COVID-19, was fist identifed in Wuhan City, Hube!Province, Chinain December of 12019, causes respiratory ness in people. On 30 January 2020, World Health Orgarization (WHO) declared the outbreak of COVID-19 as a global health emergency. Since the reporting of ful genome of COVID-19 by Chinese Center for Disease Control and Prevention through the GSAID Iniiative, several target genes have been announced to screen and identify the COVID-19 infected cases.</p>
				<br>

				<h5>METHODS</h5>
				<p style="font-size: 10px; text-align: justify;">The Xpert Xpress SARS-COV-2 tests a realtime RT-PCR test intended for the quaitative detection of nucleic acid from the SARS-CoV-2in nasopharyngeal swab, nasal swab, or nasal wash/aspirate specimen.</p>
				<br>

				<h5>UMITATION</h5>
				<p style="font-size: 10px; text-align: justify;">The claimed LoD for the assay s 0.0100 PFU/ML postive result are indicative of the presence of SARS-CoV-2RNA; cinical correlation with patient history and other diagnostic information is necessary to determine patient infection status. Positive results do not rule out bacterial infection or ‘corinfection with other viruses. Negative resus do not preclude SARS-CoV.2 infection and should not be used as the sole bass for treatment or other patient management decisions. Negative results must be combined with clinical observations, patient history, and epidemiological information A false negative result may occur a specimen improperly collected, iransported or handled. False negative resulis may also occur inadequate numbers of organisms are present in the specimen. As with any molecular test, mutations within the target regions of Xpert Xpress SSARS-CoV-2 could affect primer and/or probe binding resulting in failure fo detect the presence of virus. This test cannot rule out diseases ‘caused by other bacterial or vial pathogens.</p>
				<br>
			</td>
		</tr>
	</table>
</div>
<div style="padding-right: 40px; padding-left: 40px;  font-family: arial;">
		<table style="width: 100%;">
			<tr>
				<td style="width: 33%;">
					<?php echo '<img src="'. base_url() . 'skin/img/1.jpg"  style="width: 35%;"/>'; ?>
				</td>
				<td style="padding-top: 30px; padding-left: 5%; width: 34%;">
					<img src="<?php echo isset($view[0]->file) ? $view[0]->file : ''; ?>"  style="width:30%;"/>
				</td>
				<td style="width: 33%;">
					<?php echo '<img src="'. base_url() . 'skin/img/2.jpg"  style="width: 35%;"/>'; ?>
				</td>
			</tr>
		</table>

	</div>