<?php

class Position_result extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('grade');
        $this->load->model('result_model', 'sr_model', TRUE);
    }

    public function position_r($data) {
        $datar = array();
        $grade = new Grade();
        $all_reg = $this->sr_model->stu_view_result_p($data);
        $n = 0;
        foreach ($all_reg as $v_reg) {
            $datar[$v_reg->all_reg_id]['all_reg_id'] = $v_reg->all_reg_id;
            $sub = $this->sr_model->sub_name_result($data['term'], $v_reg->all_reg_id);

            $total_num = $gp = $cgp = 0;
            $i = 0;
            $igpf = 0;
//            $pf_all= array();
            foreach ($sub as $v_sub) {
                $total_mark = $this->sr_model->sub_mark_result($data['term'], $v_reg->all_reg_id, $v_sub->sub_id);
                $sum = 0;
                if ($v_sub->add_f == 1 || $v_sub->add_f == 2) {
                    foreach ($total_mark as $v_total_mark) {
                        $sum = $sum + $v_total_mark->mark;
                    }
                    $sum = (100 / $v_sub->sub_mark) * $sum;
                    $total_num = $total_num + $sum;
                    $numpoint = $grade->getNumberPoint($sum);
                    if ($v_sub->add_f == 2) {
                        $cgp = $cgp + $numpoint;
                        if ($numpoint == 0) {
                            $igpf = 1;
                        }
                        $i++;
                        $gp = $gp + $numpoint;
                    }else{
                        if($numpoint >= 3){
                            $gp = $gp + $numpoint-2;
                        }
                    }
                    
                }
            }
            $n++;
            $gp = $grade->getgpaav($gp, $i, $igpf);
            $cgp = $grade->getgpaav($cgp, $i, $igpf);
            $datar[$v_reg->all_reg_id]['cgp'] = $grade->num_point($cgp);
            $datar[$v_reg->all_reg_id]['gp'] = $grade->num_point($gp);
            $datar[$v_reg->all_reg_id]['total_num'] = $total_num;
            $datar['position'][$v_reg->all_reg_id] = $total_num;
            $datar[$v_reg->all_reg_id]['roll'] = $v_reg->roll;
        }
        if ($n != 0) {
            
            array_multisort($datar['position'], SORT_DESC);
//            echo '<pre>';
//        print_r($datar['position']);
//        exit();
        }
//        echo '<pre>';
//        print_r($datar);
//        exit();
        foreach ($all_reg as $v_reg) {
//            echo $v_reg->all_reg_id." ";
            $k = $datar[$v_reg->all_reg_id]['position'] = array_search($datar[$v_reg->all_reg_id]['total_num'], $datar['position'], true);
            $datar[$v_reg->all_reg_id]['position'] = $datar[$v_reg->all_reg_id]['position'] + 1;
            $datar['position'][$k] = "A";
//            echo "=>".$k."; ";
        }
//        exit();
//        exit();
        return $datar;
    }

}
