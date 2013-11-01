<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('sticker_name')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->sticker_name), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->sticker_image)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('sticker_image')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->sticker_image);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->agency)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('agency')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->agency);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->user_global_id)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('user_global_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->user_global_id);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->theme_id)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('theme_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->theme_id);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->app_local_id)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('app_local_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->app_local_id);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>