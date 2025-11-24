<!--<div class="row-fluid">
    <a data-rel="tooltip" title="36 New Registration." class="span3 f_ram" href="#">
        <span class="f_ram12 icon32 icon-user"></span>
        <div>Student Registration</div>
        <div>507</div>
        <span class="notification_ut">36</span>
    </a>
    <a data-rel="tooltip" title="3 Report." class="span3 f_ram" href="#">
        <span class="f_ram12 icon32 icon-folder"></span>
        <div>Report</div>
        <div>507</div>
        <span class="notification_ut">3</span>
    </a>
</div>-->
<div class="row-fluid">
    <div class="span6">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><?php echo $this->lang->line('subject_mark_input');?></div>
                <div class="pull-right"><span class="badge badge-info">5</span>

                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name:-<?php echo $name->admin_name; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($name_all as $v_sub) { ?>
                            <tr>
                                <td><b><a href="<?php base_url(); ?>mark_panel/mark_term/<?php echo $v_sub->assigned_id; ?>"> <?php echo $v_sub->sub_code; ?> Subject: <?php echo $v_sub->sub_name; ?> (<?php echo $this->lang->line('year');?>:<?php echo $v_sub->year; ?> <?php echo $this->lang->line('class');?>:<?php echo $v_sub->class; ?> <?php echo $this->lang->line('section'); ?>:<?php echo $v_sub->section; ?>,<?php echo $this->lang->line('group');?>:<?php echo $v_sub->group_r; ?>)</a></b></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /block -->
    </div>
    <div class="span6">
        <!-- block -->
        <div class="block">
            <?php $ph=$name->photo; if ($ph) { ?>
            <img style="width: 340px;float: right;" src="<?php if($name->photo!=""){ echo base_url() . $name->photo; } ?>">
                <?php  }else{ ?>
                <i class="icon-user"></i>
            <?php  } ?>
<!--            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Transfer</div>
                <div class="pull-right"><span class="badge badge-info">752</span>

                </div>
            </div>-->
<!--            <div class="block-content collapse in">
                <form target="_blank" action="<?php // echo base_url(); ?>pdf/report_transfer.php"  method="POST">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>na</th>
                                <th>Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $this->lang->line('class');?>:</td>
                                <td>
                                    <select  name="class" id="select01" class="chzn-select">
                                        <?php
                                        foreach ($option_all as $v_option) {
                                            $a = $v_option->opt_a;
                                            if ($a == 'class') {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('print');?>:</td>
                                <td>
                                    <select  name="year" id="select01" class="chzn-select">
                                        <?php
                                        foreach ($option_all as $v_option) {
                                            $a = $v_option->opt_a;
                                            if ($a == 'year') {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Section:</td>
                                <td>
                                    <select  name="section" id="select01" class="chzn-select">
                                        <?php
                                        foreach ($option_all as $v_option) {
                                            $a = $v_option->opt_a;
                                            if ($a == 'section') {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('group');?>:</td>
                                <td>
                                    <select  name="group_r" id="select01" class="chzn-select">
                                        <?php
                                        foreach ($option_all as $v_option) {
                                            $a = $v_option->opt_a;
                                            if ($a == 'group') {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button name="btr_trn" type="submit" class="btn btn-primary">Generate PDF file</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>-->
        </div>
        <!-- /block -->
    </div>
</div>
<div class="row-fluid">
<!--    <div class="span6">
         block 
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Result</div>
                <div class="pull-right"><span class="badge badge-info">752</span>

                </div>
            </div>
            <div class="block-content collapse in">
                <form target="_blank" action="<?php echo base_url(); ?>result_pdf/result_print.html"  method="POST">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>na</th>
                                <th>Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $this->lang->line('class');?>:</td>
                                <td>
                                    <select  name="class" id="select01" class="chzn-select">
                                        <?php
                                        foreach ($option_all as $v_option) {
                                            $a = $v_option->opt_a;
                                            if ($a == 'class') {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('print');?>:</td>
                                <td>
                                    <select  name="year" id="select01" class="chzn-select">
                                        <?php
                                        foreach ($option_all as $v_option) {
                                            $a = $v_option->opt_a;
                                            if ($a == 'year') {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Section:</td>
                                <td>
                                    <select  name="section" id="select01" class="chzn-select">
                                        <?php
                                        foreach ($option_all as $v_option) {
                                            $a = $v_option->opt_a;
                                            if ($a == 'section') {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('group');?>:</td>
                                <td>
                                    <select  name="group_r" id="select01" class="chzn-select">
                                        <option value="">None</option>
                                        <?php
                                        foreach ($option_all as $v_option) {
                                            $a = $v_option->opt_a;
                                            if ($a == 'group') {
                                                ?>
                                                <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('term');?>:</td>
                                <td>
                                    <select  name="term" id="select01" class="chzn-select">
                                        <?php
//                                        foreach ($option_all as $v_option) {
//                                            $a = $v_option->opt_a;
//                                            if ($a == 'term') {
//                                                ?>
                                                <option value="//<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                                //<?php
//                                            }
//                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button name="btr_Result" type="submit" class="btn btn-primary">Generate PDF file</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
         /block 
    </div>-->
    <div class="span12">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><?php echo $this->lang->line('notice');?></div>
                <div class="pull-right"><span class="badge badge-info"></span>

                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <!--<th>#</th>-->
                            <th><?php echo $this->lang->line('date');?></th>
                            <th><?php echo $this->lang->line('detail');?></th>
                            <td><?php echo $this->lang->line('download');?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($notice_all as $key => $value) { ?>
                        <tr>
                            <!--<td>1</td>-->
                            <td><?php echo substr($value->n_date,0,10);?></td>
                            <td><?php echo $value->n_contain;?></td>
                            <td><a href="<?php echo base_url().$value->n_file;?>"><?php echo $this->lang->line('download');?></a></td>
                        </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>