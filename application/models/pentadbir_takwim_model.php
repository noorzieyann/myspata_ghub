<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pentadbir_takwim_model extends CI_Model {
    
    function Pentadbir_takwim_model () 

    {

     parent::__construct();
		
		$this->conf = array(
			'start_day' => 'monday',
			'show_next_prev' => true,
			'next_prev_url' => base_url() . 'index.php/pentadbir/pengurusan_takwim',
			'month_type'     => 'long',
			'day_type'       => 'short',
		);

           if($this->uri->segment(3) != NULL){



                $this->conf['template'] = '
			{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
			
			{heading_row_start}<tr>{/heading_row_start}
			
			{heading_previous_cell}<th ><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
			
			{heading_row_end}</tr>{/heading_row_end}
			
			{week_row_start}<tr class="fc-first fc-last">{/week_row_start}
			{week_day_cell}<td class="ui-widget-header">{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}
			
			{cal_row_start}<tr class="days">{/cal_row_start}
			{cal_cell_start}<td class="day">{/cal_cell_start}
			
			{cal_cell_content}
			<a href="'.site_url('pentadbir/pengurusan_takwim').'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/{day}/edit">
				<div class="day_num">{day}</div>
				<div class="content">{content}</div>
				</a>
			{/cal_cell_content}
			{cal_cell_content_today}
			<a href="'.site_url('pentadbir/pengurusan_takwim').'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/{day}/edit">
				<div class="day_num highlight">{day}</div>
				<div class="content">{content}</div>
				</a>
			{/cal_cell_content_today}
			
			{cal_cell_no_content}
			<a href="'.site_url('pentadbir/pengurusan_takwim').'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/{day}/edit">
			<div class="day_num">{day}</div>
			</a>
			{/cal_cell_no_content}
			{cal_cell_no_content_today}
			<a href="'.site_url('pentadbir/pengurusan_takwim').'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/{day}/edit">
			<div class="day_num highlight">{day}</div>
			</a>
			{/cal_cell_no_content_today}
			
			{cal_cell_blank}&nbsp;{/cal_cell_blank}
			
			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}
			
			{table_close}</table>{/table_close}
		';



           }else{



                $this->conf['template'] = '
			{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
			
			{heading_row_start}<tr>{/heading_row_start}
			
			{heading_previous_cell}<th ><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
			{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
			
			{heading_row_end}</tr>{/heading_row_end}
			
			{week_row_start}<tr class="fc-first fc-last">{/week_row_start}
			{week_day_cell}<td class="ui-widget-header">{week_day}</td>{/week_day_cell}
			{week_row_end}</tr>{/week_row_end}
			
			{cal_row_start}<tr class="days">{/cal_row_start}
			{cal_cell_start}<td class="day">{/cal_cell_start}
			
			{cal_cell_content}
			<a href="'.site_url('pentadbir/pengurusan_takwim').'/'.date('Y').'/'.date('m').'/{day}/edit">
				<div class="day_num">{day}</div>
				<div class="content">{content}</div>
				</a>
			{/cal_cell_content}
			{cal_cell_content_today}
			<a href="'.site_url('pentadbir/pengurusan_takwim').'/'.date('Y').'/'.date('m').'/{day}/edit">
				<div class="day_num highlight">{day}</div>
				<div class="content">{content}</div>
				</a>
			{/cal_cell_content_today}
			
			{cal_cell_no_content}
			<a href="'.site_url('pentadbir/pengurusan_takwim').'/'.date('Y').'/'.date('m').'/{day}/edit">
			<div class="day_num">{day}</div>
			</a>
			{/cal_cell_no_content}
			{cal_cell_no_content_today}
			<a href="'.site_url('pentadbir/pengurusan_takwim').'/'.date('Y').'/'.date('m').'/{day}/edit">
			<div class="day_num highlight">{day}</div>
			</a>
			{/cal_cell_no_content_today}
			
			{cal_cell_blank}&nbsp;{/cal_cell_blank}
			
			{cal_cell_end}</td>{/cal_cell_end}
			{cal_row_end}</tr>{/cal_row_end}
			
			{table_close}</table>{/table_close}
		';


           }


               
   }


 function get_calendar_data($year, $month) 


  {

                $query = $this->db->query("SELECT DISTINCT DATE_FORMAT(takwim_tarikh, '%Y-%m-%e') AS date
                                            FROM tbl_takwim_aktvt
                                            WHERE takwim_tarikh LIKE '$year-$month%' "); //date format eliminates zeros make
                                                                           //days look 05 to 5
  
                $cal_data = array();
               
                foreach ($query->result() as $row) { //for every date fetch data

                    $a = array();
                    $i = 0;
                    $query2 = $this->db->query("SELECT takwim_aktvt
                                                FROM tbl_takwim_aktvt
                                                WHERE takwim_tarikh LIKE DATE_FORMAT('$row->date', '%Y-%m-%d') ");
                                                            //date format change back the date format
                                                            //that fetched earlier
                     foreach ($query2->result() as $r) {
                         $a[$i] = $r->takwim_aktvt;     //make data array to put to specific date
                         $i++;                         
                     }
                        $cal_data[substr($row->date,8,2)] = $a;
                    
                }

                return $cal_data;
                
   }


   /*function get_calendar_data($year, $month) {
		
		$query = $this->db->from('tbl_takwim_aktvt')
			->like('takwim_tarikh', "$year-$month", 'after')->get();
			
		$cal_data = array();
		
		foreach ($query->result() as $row) {
			//$cal_data[substr($row->takwim_tarikh,8,2)] = $row->takwim_aktvt;
		    $index = ltrim(substr($row->takwim_tarikh,8,2), '0');
		       // this is the magic !!
          // $index2 = 
            $cal_data[$index] = $row->takwim_aktvt;
            //$cal_data[$index2] = $row->takwim_aktvt_id;

		}
		
		//print_r($cal_data);

		return $cal_data;
		
	}
*/
	
   
   function generate ($year, $month) 

   {
		
		$this->load->library('calendar', $this->conf);
		
		//echo "bulan=".$month;
		
		$cal_data = $this->get_calendar_data($year, $month);
		//print_r($cal_data);
		
		return $this->calendar->generate($year, $month, $cal_data);
		
	}

	function add_calendar_data() 

	{
		
			$this->db->insert('tbl_takwim_aktvt', array(
				'takwim_tarikh' => $this->input->post('tarikh'),
				'takwim_aktvt'  => $this->input->post('aktiviti_takwim'),
				'takwim_hari'   => date("d", strtotime($this->input->post('tarikh'))),
				'takwim_bulan'  => date("m", strtotime($this->input->post('tarikh'))),
				'takwim_tahun'	=> date("Y", strtotime($this->input->post('tarikh'))),
				'repeat_bulan'  => $this->input->post('repeat_bulan'),
				'repeat_tahun'  => $this->input->post('repeat_tahun'),
				'takwim_alert_hari'  => $this->input->post('takwim_alert'),
				'alert_takwim'  => $this->input->post('hantar_notif'),
				'flag_pspao_awal' => $this->input->post('flag_pspao')
				
			));
		
		
   }


   function get_takwim_aktivti($tarikh){

       $this->db->select('*');
       $this->db->where('takwim_tarikh',$tarikh);
       $this->db->from('tbl_takwim_aktvt');
       $query = $this->db->get();

       $takwimdata = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $takwimdata[] = $row;
       }

       return $takwimdata;




   }

   function delete_takwim_aktivti($aktivtiID){

    $this->db->where('takwim_aktvt_id', $aktivtiID);
    $this->db->delete('tbl_takwim_aktvt'); 

   }



   function update_calendar_data($takwimID){

  $this->db->where('takwim_aktvt_id', $takwimID);

  $this->db->update('tbl_takwim_aktvt', array(
				'takwim_tarikh' => $this->input->post('tarikh'),
				'takwim_aktvt'  => $this->input->post('aktiviti_takwim'),
				'takwim_hari'   => date("d", strtotime($this->input->post('tarikh'))),
				'takwim_bulan'  => date("m", strtotime($this->input->post('tarikh'))),
				'takwim_tahun'	=> date("Y", strtotime($this->input->post('tarikh'))),
				'repeat_bulan'  => $this->input->post('repeat_bulan'),
				'repeat_tahun'  => $this->input->post('repeat_tahun'),
				'takwim_alert_hari'  => $this->input->post('takwim_alert'),
				'alert_takwim'  => $this->input->post('hantar_notif'),
				'flag_pspao_awal' => $this->input->post('flag_pspao')
			));

   }

   function get_aktiviti_title($id){

   	$this->db->select('takwim_aktvt');
    $this->db->from('tbl_takwim_aktvt');
    $this->db->where('takwim_aktvt_id',$id);
    $query = $this->db->get();
  
     $row = $query->row();
  
     return $row->takwim_aktvt;


   }


    function get_r_bulan($id){

   	$this->db->select('repeat_bulan');
    $this->db->from('tbl_takwim_aktvt');
    $this->db->where('takwim_aktvt_id',$id);
    $query = $this->db->get();
  
     $row = $query->row();
  
     return $row->repeat_bulan;


   }

   function get_r_tahun($id){

   	$this->db->select('repeat_tahun');
    $this->db->from('tbl_takwim_aktvt');
    $this->db->where('takwim_aktvt_id',$id);
    $query = $this->db->get();
  
     $row = $query->row();
     return $row->repeat_tahun;


   }


   function get_alert_day($id){

	$this->db->select('takwim_alert_hari');
    $this->db->from('tbl_takwim_aktvt');
    $this->db->where('takwim_aktvt_id',$id);
    $query = $this->db->get();
  
     $row = $query->row();
     return $row->takwim_alert_hari;

   }

  function  get_hantar_notifi($id){

  	$this->db->select('alert_takwim');
    $this->db->from('tbl_takwim_aktvt');
    $this->db->where('takwim_aktvt_id',$id);
    $query = $this->db->get();
  
     $row = $query->row();
     return $row->alert_takwim;

  }

  function get_flag_pspao($id){

	$this->db->select('flag_pspao_awal');
    $this->db->from('tbl_takwim_aktvt');
    $this->db->where('takwim_aktvt_id',$id);
    $query = $this->db->get();
  
    $row = $query->row();
    return $row->flag_pspao_awal;

  }
	
}
?>
