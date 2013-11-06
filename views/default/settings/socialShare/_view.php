<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->fb_msg_caption)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fb_msg_caption')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->fb_msg_caption);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->fb_msg_title)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fb_msg_title')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->fb_msg_title);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->fb_msg_detail)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fb_msg_detail')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->fb_msg_detail);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->fb_msg_image)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fb_msg_image')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->fb_msg_image);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->twitter_share_url)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('twitter_share_url')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->twitter_share_url);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->twitter_share_detail)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('twitter_share_detail')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->twitter_share_detail);
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
</div>