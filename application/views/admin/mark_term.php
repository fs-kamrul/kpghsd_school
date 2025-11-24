
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Term Select</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form action="<?php echo base_url(); ?>mark_panel/mark_show.html" enctype="multipart/form-data" method="post" class="form-horizontal">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="select01"><?php echo $this->lang->line('term');?></label>
                            <div class="controls">
                                <input name="assigned_id" type="hidden" value="<?php echo $assigned_id;?>" class="span6" id="typeahead" >
                                <select  name="term" id="select01" class="chzn-select">
                                    <?php
                                    foreach ($option as $v_option) {
                                        $a = $v_option->opt_a;
                                        if ($a == 'term') {
                                            ?>
                                            <option value="<?php echo $v_option->data_a; ?>"><?php echo $v_option->data_a; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('submit');?></button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>
