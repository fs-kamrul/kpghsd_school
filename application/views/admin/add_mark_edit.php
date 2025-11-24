<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Option Form</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form action="<?php echo base_url(); ?>mark_panel/update_add_mark.html" method="post" class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="select01"><?php echo $this->lang->line('mark_title');?></label>
                        <div class="controls">
                            <!--<input name="mark_title" type="text" class="span6" id="typeahead" value="<?php // echo $add_mark->mark_title;  ?>">-->
                            <input name="add_mark_id" type="hidden" class="span6" id="typeahead" value="<?php echo $add_mark->add_mark_id; ?>">
                            <select  name="mark_title" id="class_id" >
                                <?php
                                $su = $add_mark->mark_title;
                                foreach ($option as $v_option) {
                                    $a = $v_option->opt_a;
                                    if ($a == 'add_mark') {
                                        $su1 = $v_option->data_a;
                                        if ($su == $su1) {
                                            ?>
                                            <option value="<?php echo $v_option->data_a; ?>" selected=""><?php echo $v_option->data_a; ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                        <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('mark_number');?></label>
                        <div class="controls">
                            <input name="mark_number" type="text" class="span6" id="mark" value="<?php echo $add_mark->mark_number; ?>" onkeyup="checkmark()">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"><?php echo $this->lang->line('pass_mark');?></label>
                        <div class="controls">
                            <input name="mark_pass" type="radio" class="span1" id="radio1" <?php if ($add_mark->mark_pass == 1) { ?>checked="" <?php } ?>value="1"><label for="radio1" style="display: inline">Yes</label>
                            <input name="mark_pass" type="radio" class="span1" id="radio2" <?php if ($add_mark->mark_pass == 0) { ?>checked="" <?php } ?> value="0"><label for="radio2" style="display: inline">No</label>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="<?php echo base_url(); ?>mark_panel/mark_show" class="btn btn-warning">return</a>
                        <button type="submit" class="btn btn-inverse"><i class="icon-refresh icon-white"></i> Update</button>
                        <a href="#myAlert" data-toggle="modal" class="btn btn-danger"><i class="icon-remove icon-white"></i><?php echo $this->lang->line('delete');?></a>
                    </div>
                </fieldset>
            </form>

        </div>
        <div id="myAlert" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">&times;</button>
                <h3>Are You Sure!</h3>
            </div>
            <div class="modal-body">
                <p>Delete Add Mark</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="<?php echo base_url(); ?>mark_panel/delete_add_mark/<?php echo $add_mark->add_mark_id; ?>"><?php echo $this->lang->line('confirm');?></a>
                <a data-dismiss="modal" class="btn" href="#"><?php echo $this->lang->line('cancel');?></a>
            </div>
        </div>
    </div>
</div>

<script>
    function checkmark(){
        var x = document.getElementById("mark").value;
        var total = <?php echo $sub_mark-($totalmark-$this_id_mark); ?>;
        var c=parseFloat(x);
        if(total<=c){
            document.getElementById("mark").value=total;
        }else if(total>=c){
            document.getElementById("mark").value=c;
        }else{
            document.getElementById("mark").value='';
        }
            
    }
</script>