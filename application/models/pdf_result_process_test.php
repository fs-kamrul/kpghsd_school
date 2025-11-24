<?php

class pdf_result_process_test extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->library('grade');
    }
    public function all_select_result($data) {
        $datap = array();
        $datar = array();
        $datapass = array();
        $datapla = array();
        $dataplass = array();
        $datafa = array();
        $datafall = array();
        
        $data['main_data']=array();
        $datar['position']=  array();
        $datapla['position']=  array();
        $datafa['position']=  array();
        $grade = new Grade();
        foreach ($data['all_reg'] as $key => $value) {
            $data['main_data'][$value->id]['id'] = $value->id;
            $data['main_data'][$value->id]['name'] = $value->name;
            $data['main_data'][$value->id]['roll'] = $value->roll;
            $data['main_data'][$value->id]['all_reg_id']=$value->all_reg_id;
            $data['main_data'][$value->id]['mobile_number'] = $value->mobile_number;
//                $data['main_data'][$value->id]['sub_name'] = $value->sub_name;
            $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['mark_number'] = $value->mark_number;
            $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['total'] = $value->mark;
            $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['add_f'] = $value->add_f;
            $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['pass_mark'] = $value->pass_mark;
            $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['sub_mark'] = $value->sub_mark;
            $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['mark_pf'] = $value->mark_pf;
            $data['main_data'][$value->id]['mark'][$value->sub_name . '_mark'][$value->mark_id]['add_group'] = $value->add_group;

//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['add_f']=$value->add_f;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['sub_code']=$value->sub_code;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['sub_name']=$vvt = $value->sub_name;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['pass_mark']=$value->pass_mark;
//            $data['main_data'][$value->id]['sub_info'][$value->sub_name]['sub_mark']=$value->sub_mark;
//            $data['sub_info'][$value->sub_name]['add_f']=$value->add_f;
            $data['sub_info'][$value->sub_name]['sub_code'] = $value->sub_code;
            $data['sub_info'][$value->sub_name]['sub_name'] = $vvt = $value->sub_name;
            $data['sub_info'][$value->sub_name]['pass_mark']=$value->pass_mark;
            $data['sub_info'][$value->sub_name]['sub_mark'] = $value->sub_mark;
            $data['sub_info'][$value->sub_name]['add_group']=$value->add_group;
            $data['sub_info'][$value->sub_name]['high_mark']=0;
        }
//        echo '<pre>';
//        print_r($data['main_data']);
//        exit();
        $vn = $vn1 = $gpa = $gpa_one = $total_sub = $opsonl_sub =$addcg = $addg = $addvn = 0;
        $pf = $pfp = "";
        foreach ($data['main_data'] as $key => $value) {
            $datap[$value['id']]['id'] = $value['id'];
            $datap[$value['id']]['roll'] = $value['roll'];
            $datap[$value['id']]['name'] = $value['name'];
            $datap[$value['id']]['sub_total_f'] = "n_o";
            $datap[$value['id']]['sub_total_f_four'] = "n_o";
            $datap[$value['id']]['sub_total_p'] = "n_o";
            $datap[$value['id']]['sub_total_p_four'] = "n_o";
            $datap[$value['id']]['gpa_f'] = "n_o";
            $datap[$value['id']]['cgpa'] = "";
            $datap[$value['id']]['gpa'] = "";
            $datap[$value['id']]['addg'] = 0;
            $datap[$value['id']]['addcg'] = 0;
            $datap[$value['id']]['addto'] = 0;
            foreach ($value['mark'] as $key1 => $value1) {
                foreach ($value['mark'][$key1] as $key2 => $value2) {
                    $pas=$value2['sub_mark'];
                    $pas1=100/$pas;
                    $pas2=$pas1*$value2['total'];

                    $vn +=$pas2;

                    $vn1 +=$pas2;
//                    $vn +=$value2['total'];
//                    $vn1 +=$value2['total'];
                    if ($value2['mark_pf'] == 'f') {
                        $pf = "f";
                    } elseif ($value2['mark_pf'] == 'p') {
                        $pfp = "p";
                    }
                }
                if ($vn<($value2['pass_mark']*$value2['sub_mark'])) {
                    $pf = "f";
                }
                if ($value2['add_f'] == 2 && $pf == "" && $pfp == "p") {
                    $datap[$value['id']]['sub_total_p'] = 0;
                    $datap[$value['id']]['cgpa'] = $grade->getNumberPoint($vn);
                    $datap[$value['id']]['gpa'] = $grade->getNumberPoint($vn);

//                    echo '<td>' . $vn . '</td>';
                } elseif ($value2['add_f'] == 1 && $pf == "" && $pfp == "p") {
                    $opsonl_sub++;
                    $datap[$value['id']]['sub_total_p_four'] = $vn;
                    $datap[$value['id']]['gpa'] = 0;
                    $op_gpa = $grade->getNumberPoint($vn);
                    if ($op_gpa>2) {
                        $datap[$value['id']]['cgpa'] = ($op_gpa-2);
                    }else{
                        $datap[$value['id']]['cgpa'] = 0;
                    }
                    
//                    echo '<td>' . $vn . '*</td>';
                }
                if ($value2['add_f'] == 2 && $pf == "f") {
                    $datap[$value['id']]['sub_total_f'] = 1;
                    $datap[$value['id']]['gpa_f'] = 0;
//                    echo '<td style="background: red;">' . $vn . '</td>';
                } elseif ($value2['add_f'] == 1 && $pf == "f") {
                    $opsonl_sub++;
                    $datap[$value['id']]['sub_total_f_four'] = $vn;
                    $datap[$value['id']]['cgpa'] = 0;
                    $datap[$value['id']]['gpa'] = 0;
//                    echo '<td style="background: red;">' . $vn . '*</td>';
                } 
                if ($value2['add_f'] == 3) {
                    $opsonl_sub++;
                    $datap[$value['id']]['sub_total_f_four'] = $vn;
                    $datap[$value['id']]['cgpa'] = 0;
                    $datap[$value['id']]['gpa'] = 0;
//                    echo '<td style="background: red;">' . $vn . '*</td>';
                }
                $sut_f=$datap[$value['id']]['gpa_f'];
//                $gpa += $datap[$value['id']]['cgpa'];
//                $datap[$value['id']]['cgpa'] = $gpa;
                if ($sut_f === "n_o") {
                    $gpa += $datap[$value['id']]['cgpa'];
                    $datap[$value['id']]['cgpa'] = $gpa;
                    
                    $gpa_one += $datap[$value['id']]['gpa'];
                    $datap[$value['id']]['gpa'] = $gpa_one;
                }elseif ($sut_f === 0) {
                    $datap[$value['id']]['cgpa'] = 0;
                    $datap[$value['id']]['gpa'] = 0;
                }

                if($value2['add_group']==0){
                    //no
                }elseif($value2['add_group']==1){
                    $datap[$value['id']]['addg'] +=$vn;
                    $datap[$value['id']]['addto'] +=$grade->getNumberPoint($vn);

//                    echo  $datap[$value['id']]['addg'].">";
                }elseif($value2['add_group']==2){
                    if($pf == "f"){
                        $datap[$value['id']]['addg'] =0;
                        $datap[$value['id']]['addto'] =0;
                        $datap[$value['id']]['addcg']=0;
                    }else{
                        $datap[$value['id']]['addg'] +=$vn;
                        $datap[$value['id']]['addto'] +=$grade->getNumberPoint($vn);

//                    echo  $datap[$value['id']]['addg']."-";
                        $addcg=$datap[$value['id']]['addg'];
                        $addg=$addcg/2;
//                    $datap[$value['id']]['addto']+=$addg;
                        $datap[$value['id']]['addg']=$grade->getNumberPoint($addg);
//                    echo  $datap[$value['id']]['addg']."-";
                        $datap[$value['id']]['addcg']+=$datap[$value['id']]['addg'];

                        $datap[$value['id']]['addg']=0;
                    }

                }
//                $datap[$value['id']]['addg']=$datap[$value['id']]['addg']/2;
                if($value2['add_group']==1){
                    //no
                }else{
                    $total_sub++;
                }
                //$total_sub++;
                $vn = 0;
                $pf = $pfp = "";
//                $addcg=0;
            }
//        echo '<pre>';
//        print_r($datap);
//        exit();
            $aa_cgpa= ($datap[$value['id']]['cgpa']-($datap[$value['id']]['addto']-$datap[$value['id']]['addcg']))/($total_sub-$opsonl_sub);
            $aa_gpa= ($datap[$value['id']]['gpa']-($datap[$value['id']]['addto']-$datap[$value['id']]['addcg']))/($total_sub-$opsonl_sub);
            if ($aa_cgpa>5) {
                $aa_cgpa=5;
            }
//            $datar['position'][$value['id']] = $vn1;
            $datap[$value['id']]['total'] = $vn1;
            $datap[$value['id']]['cgpa'] = $grade->num_point($aa_cgpa);
            $datap[$value['id']]['gpa'] = $grade->num_point($aa_gpa);
            $datap[$value['id']]['total_cgp'] = $grade->num_point($aa_cgpa);
//            echo '<td>' . $vn1 . '</td>';
            $vn1 = $gpa = $gpa_one = $total_sub = $opsonl_sub = 0;
        }
        $paa_arr=1;$plass=1;
        foreach ($datap as $key5 => $value5) {
            $sut_f=$value5['gpa_f'];
                if ($sut_f === "n_o") {
                    if ($value5['cgpa']==5) {
                        $datapla['position'][$value5['id']] = $value5['total'];
                        $dataplass[$value5['id']]['id'] = $value5['id'];
                        $dataplass[$value5['id']]['total'] = $value5['total'];
                        $plass++;
                    }  else {
                        $datar['position'][$value5['id']] = $value5['cgpa'];
                        $datapass[$value5['id']]['id'] = $value5['id'];
                        $datapass[$value5['id']]['total'] = $value5['cgpa'];
                        $paa_arr++;
                    }
                    
                }elseif ($sut_f === 0) {
                    $datafa['position'][$value5['id']] = $value5['total'];
                    $datafall[$value5['id']]['id'] = $value5['id'];
                    $datafall[$value5['id']]['total'] = $value5['total'];
                }
        }
//        echo '<pre>';
//        print_r($datapla);
        array_multisort($datapla['position'], SORT_DESC);
        array_multisort($datar['position'], SORT_DESC);
        array_multisort($datafa['position'], SORT_DESC);
        foreach ($dataplass as $key3 => $value3) {
            $k = $datap[$value3['id']]['position'] = array_search($datap[$value3['id']]['total'], $datapla['position'], true);
            $datap[$value3['id']]['position'] = $datap[$value3['id']]['position'] + 1;
            $datapla['position'][$k] = "A";
        }
        foreach ($datapass as $key13 => $value13) {
            $k = $datap[$value13['id']]['position'] = array_search($datap[$value13['id']]['total_cgp'], $datar['position'], true);
            $datap[$value13['id']]['position'] = $datap[$value13['id']]['position'] + $plass;
//            $datar['position'][$k] = "A";
        }
        foreach ($datafall as $key33 => $value33) {
            $k = $datap[$value33['id']]['position'] = array_search($datap[$value33['id']]['total'], $datafa['position'], true);
            $datap[$value33['id']]['position'] = $datap[$value33['id']]['position'] + $plass + $paa_arr-1;
            $datafa['position'][$k] = "A";
        }
//        echo '<pre>';
//        print_r($datar);
//        exit();
//        array_multisort($datar['position'], SORT_DESC);
//        echo '<pre>';
//        print_r($datar);
//        print_r($datapass);
//        print_r($datap);
//        exit();
//        foreach ($datap as $key3 => $value3) {
////            $j=0;
////            echo $value3['id']." ";
//            $k = $datap[$value3['id']]['position'] = array_search($datap[$value3['id']]['total'], $datar['position'], true);
//            $datap[$value3['id']]['position'] = $datap[$value3['id']]['position'] + 1;
//            $datar['position'][$k] = "A";
////            print_r($value3);
////            echo "=>".$k."; ";
////            $j=0;
//        }
//        echo '<pre>';
//        print_r($datar['position']);
//        print_r($datap);
//        print_r($data['main_data']);
//        print_r($data['sub_info']);
//        exit();
        return $datap;
    }

}
