<div class="notofication_wrapper reset_alert ">
    <?php
    if ($this->session->flashdata('error_msg')) {
        echo '<div class="alert_error"><span>' . $this->session->flashdata('error_msg') . '</span></div>';
    }
    if ($this->session->flashdata('info_msg')) {
        echo '<div class="alert_info"><span>' . $this->session->flashdata('info_msg') . '</span></div>';
    }
    if ($this->session->flashdata('success_msg')) {
        echo '<div class="alert_success"><span>' . $this->session->flashdata('success_msg') . '</span></div>';
    }
    ?>
    <?php
    if (isset($error_msg) && !empty($error_msg)) {
        echo '<div class="big_error"><span>' . $error_msg . '</span></div>';
    }
    if (isset($info_msg) && !empty($info_msg)) {
        echo '<div class="big_info"><span>' . $info_msg . '</span></div>';
    }
    if (isset($success_msg) && !empty($success_msg)) {
        echo '<div class="big_success"><span>' . $success_msg . '</span></div>';
    }
    ?>
</div>