<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('page_title')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->page_title), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->page_content)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('page_content')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->page_content);
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