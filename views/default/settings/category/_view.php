<div class="view">

    <h2><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->parent_category)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('parent_category')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->parent_category);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->description)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->description);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->image)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
            </div>
<div class="field_value">
<img alt="<?php echo $data->name ?>" title="<?php echo $data->name ?>" src="<?php echo $data->image ?>" /></div></div>
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
</div>