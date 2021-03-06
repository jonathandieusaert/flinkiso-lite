<div  id="main">
    <?php echo $this->Session->flash(); ?>
    <div class="notifications ">
        <?php echo $this->element('nav-header-lists', array('postData' => array('pluralHumanName' => 'Notifications', 'modelClass' => 'Notification', 'options' => array("sr_no" => "Sr No", "title" => "Title", "message" => "Message", "start_date" => "Start Date", "end_date" => "End Date", "prepared_by" => "Prepared By", "approved_by" => "Approved By"), 'pluralVar' => 'notifications'))); ?>
        <div class="nav">
            <div id="tabs">
                <ul>
                    <li><?php echo $this->Html->link(__('New Notification'), array('action' => 'add_ajax')); ?></li>
                    <li><?php echo $this->Html->image('indicator.gif', array('id' => 'busy-indicator', 'class' => 'pull-right')); ?></li>
                </ul>
            </div>
        </div>
        <div id="notifications_tab_ajax"></div>
    </div>

<script>
    $(function() {
        $("#tabs").tabs({
            beforeLoad: function(event, ui) {
                ui.jqXHR.error(function() {
                    ui.panel.html(
                            "Error Loading ... " +
                            "Please contact administrator.");
                });
            }
        });
    });
</script>

    <?php echo $this->element('export'); ?>
    <?php echo $this->element('advanced-search', array('postData' => array("sr_no" => "Sr No", "title" => "Title", "message" => "Message", "start_date" => "Start Date", "end_date" => "End Date", "prepared_by" => "Prepared By", "approved_by" => "Approved By"), 'PublishedBranchList' => array($PublishedBranchList))); ?>
    <?php echo $this->element('import', array('postData' => array("sr_no" => "Sr No", "title" => "Title", "message" => "Message", "start_date" => "Start Date", "end_date" => "End Date", "prepared_by" => "Prepared By", "approved_by" => "Approved By"))); ?>
</div>

<script>
    $.ajaxSetup({beforeSend: function() {
            $("#busy-indicator").show();
        }, complete: function() {
            $("#busy-indicator").hide();
        }
    });
</script>