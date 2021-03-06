<?php
/**
 * Created by PhpStorm.
 * User: Florian Moser
 * Date: 24.05.2015
 * Time: 11:20
 */
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/Framework/Templates/_parts/header_crud.php"; ?>
    <form action="milestones/<?php echo $this->link ?>/<?php echo GetValue($this->_['obj'], "Id") ?>/" method="post">

        <input type="hidden" name="<?php echo $this->link ?>" value="true"/>

        <div class="clearfix">
            <div class="col-md-12">
                <?php echo GetInput($this->_["obj"], "ProjectId", "project", "select", $this->_["projects"]); ?>
            </div>
        </div>
        <hr/>

        <div class="clearfix">
            <div class="col-md-8">
                <?php echo GetInput($this->_["obj"], "Name", "name"); ?>
            </div>

            <div class="col-md-2">
                <?php echo GetInput($this->_["obj"], "PercentageComplete", "percentage", "number"); ?>
            </div>

            <div class="col-md-2">
                <?php echo GetInput($this->_["obj"], "IsCompletedBool", "completed", "checkbox"); ?>
            </div>
        </div>

        <div class="clearfix">
            <div class="col-md-12">
                <?php echo GetInput($this->_["obj"], "Description", "description", "textarea"); ?>
            </div>
        </div>

        <hr/>
        <div class="clearfix">
            <div class="col-md-6">
                <?php echo GetInput($this->_["obj"], "StartDate", "start", "date"); ?>
            </div>

            <div class="col-md-6">
                <?php echo GetInput($this->_["obj"], "EndDate", "end", "date"); ?>
            </div>

        </div>
        <div class="clearfix">

            <div class="col-md-3">
                <?php echo GetInput($this->_["obj"], "PaymentPerHour", "payment per hour", "number"); ?>
            </div>

            <div class="col-md-3">
                <?php echo GetInput($this->_["obj"], "CostCeiling", "cost ceiling", "number"); ?>
            </div>

            <div class="col-md-6">
                <?php echo GetInput($this->_["obj"], "DeadlineDate", "deadline", "date"); ?>
            </div>

        </div>

        <div class="clearfix">
            <div class="col-md-12">
                <?php echo GetSubmit() ?>
            </div>
        </div>
    </form>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/Framework/Templates/_parts/footer_crud.php"; ?>