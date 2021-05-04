<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventsmanagement extends CI_Controller {

	public function _construct()
	{
		parent::_construct();
		
	}

	public function index()
	{
		$this->load->view('ems/list');
	}

	public function addevent()
	{
		$this->load->view('ems/add');
	}

	public function save()
	{
		$this->load->model('ems');
		$title = $this->input->post('title');
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$RepeatGroup = $this->input->post('RepeatGroup');
		$lstRepeatType = $this->input->post('lstRepeatType');
		$lstEvery = $this->input->post('lstEvery');
		$lstRepeatOn = $this->input->post('lstRepeatOn');
		$lstRepeatWeek = $this->input->post('lstRepeatWeek');
		$lstRepeatMonth = $this->input->post('lstRepeatMonth');

		$data['title'] = $title;
		$data['start_date'] = date('Y-m-d',strtotime($startdate));
		$data['end_date'] = date('Y-m-d',strtotime($enddate));
		$data['recurrence_type'] = $RepeatGroup;
		$duration = '';
		if($RepeatGroup == 1) {
			$lstRepeatTypeAr = array("1" => "Every","2" => "Every Other","3" => "Every Third","4" => "Every Fourth");
			$lstEveryAr = array("1" => "Day","2" => "Week","3" => "Month","4" => "Year");
			$duration = $lstRepeatTypeAr[$lstRepeatType]." ".$lstEveryAr[$lstEvery];
		} else if($RepeatGroup == 2) {
			$lstRepeatOnAr = array("1" => "First","2" => "Second","3" => "Third","4" => "Fourth");
			$lstRepeatWeekAr = array("0" => "Sunday","1" => "Monday","2" => "Tuesday","3" => "Wednesday","4" => "Thursday","5" => "Friday","6" => "Saturday");
			$lstRepeatMonthAr = array("1" => "Month","3" => "3 Months","4" => "4 Months","6" => "6 Months","12" => "Year");
			$duration = $lstRepeatOnAr[$lstRepeatOn]." ".$lstRepeatWeekAr[$lstRepeatWeek]." of the ".$lstRepeatMonthAr[$lstRepeatMonth];
		}
		$data['recurrence_duration'] = $duration;

		$eventId = $this->ems->insert($data);
		if($eventId) {
			$dates = $this->getDurationDates($RepeatGroup, $data['start_date'], $data['end_date'], $lstRepeatType, $lstEvery);
			$datesArr = array();
			foreach ($dates as $dKey => $dValue) {
				$temp = array();
				$temp['e_id'] = $eventId;
				$temp['date'] = $dValue;
				$datesArr[] = $temp;
			}
			$this->ems->insertDates($datesArr);

			$status = 'success';
			$msg = 'Event added successfully.';
		} else {
			$status = 'error';
			$msg = 'Some error occured. Please try after some time.';
		}

		$response['status'] = $status;
		$response['msg'] = $msg;

		echo json_encode($response);
	}

	public function getDurationDates($type = 1, $startDate = '', $endDate = '', $repeattype = '', $every = '', $repeaton = '', $week = '', $month = '')
	{
		$datesAr = array();
		if($startDate != '' && $endDate != '')
		{
			if($type == 1)
			{
				$lstEveryAr = array("1" => "Day","2" => "Week","3" => "Month","4" => "Year");
				$datesAr[] = $startDate;
				$newDate = $startDate;
				while (strtotime($newDate) <= strtotime($endDate)) {
					$newDate = date('Y-m-d',strtotime($newDate.' +'.$repeattype.' '.$lstEveryAr[$every]));
					if(strtotime($newDate) <= strtotime($endDate)) {
						$datesAr[] = $newDate;
					}
				}
			} else if($type == 2)
			{}
		}
		return $datesAr;
	}

	public function list()
	{
		$this->load->model('ems');
		$data = $this->ems->getData();
		$no = 1;
		$dataAr = array();
		foreach ($data as $key => $value) {
			$row = array();
			$row["DT_RowId"] = $value->id;
			$row["id"] = $value->id;
			$row["title"] = $value->title;
			$row["dates"] = $value->start_date." to ".$value->end_date;
			$row["recurrence_duration"] = $value->recurrence_duration;
			$row["action"] = "<a href='javascript:void(0);' class='btn btn-default viewdetails'>View</a>";
			$row["action"] .= "<a href='javascript:void(0);' class='btn btn-default editbtn'>Edit</a>";
			$row["action"] .= "<a href='javascript:void(0);' class='btn btn-default deletebtn'>Delete</a>";
			$dataAr[] = $row;
		}

		$response = array(
			"recordsTotal" => count($data),
			"recordsFiltered" => count($data),
			"data" => $dataAr,
		);

		echo json_encode($response);
	}

	public function deleteevent()
	{
		$this->load->model('ems');
		$id = $this->input->post('id');
		if($this->ems->softDelete($id))
		{
			$status = 'success';
			$msg = 'Event deleted successfully.';
		} else {
			$status = 'error';
			$msg = 'Some error occured. Please try after some time.';
		}
		$response['status'] = $status;
		$response['msg'] = $msg;

		echo json_encode($response);
	}

	public function viewdetails()
	{
		$this->load->model('ems');
		$id = $this->input->post('id');
		$detailsAr = $this->ems->getDetails($id);
		$html = '<table>
                <tr>
                    <td>'.reset($detailsAr)->title.'</td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <table border=1>';
                        foreach ($detailsAr as $key => $value) {
                        	$datetime = DateTime::createFromFormat('Y-m-d', $value->date);
                        	$dayName = $datetime->format('l');
                            $html .= '<tr>
                                <td>'.$value->date.'</td>
                                <td style="width: 100px">'.$dayName.'</td>
                            </tr>';
                        }
                        $html .= '</table>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>Total Recurrence Event: '.count($detailsAr).'</td>
                </tr>
            </table>';

        $response['status'] = 'success';
		$response['data'] = $html;

		echo json_encode($response);
	}
}
