<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('user_name')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->user_name), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->email_address)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::mailto($data->email_address);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->phone_number)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->phone_number);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->user_photo)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('user_photo')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->user_photo);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->user_uploaded_photo)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('user_uploaded_photo')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->user_uploaded_photo);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>