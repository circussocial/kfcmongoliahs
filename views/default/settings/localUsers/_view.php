<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('full_name')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->full_name), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->user_fb_id)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('user_fb_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->user_fb_id);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
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
    if (!empty($data->age)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->age);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->gender)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->gender);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->city)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->city);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->country)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->country);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->nric)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nric')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->nric);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->mobile_number)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('mobile_number')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->mobile_number);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->landline_number)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('landline_number')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->landline_number);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->contact_number)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('contact_number')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->contact_number);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->timezone)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('timezone')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->timezone);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->url)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo Awecms::formatUrl($data->url,true);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->visits)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('visits')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->visits);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->last_login)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
            </div>
<div class="field_value">
                <?php
                echo date('D, d M y H:i:s', strtotime($data->last_login));
                ?>

        </div>
        </div>

        <?php
    }
    ?>
    <?php
    if (!empty($data->is_active)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->is_active);
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
    if (!empty($data->fb_tab_id)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fb_tab_id')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->fb_tab_id);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
</div>