<div class="notofication_wrapper">
    <?php
    if ($this->session->flashdata('error_msg')) {
        echo '<div class="big_error"><span>' . $this->session->flashdata('error_msg') . '</span></div>';
    }
    if ($this->session->flashdata('info_msg')) {
        echo '<div class="big_info"><span>' . $this->session->flashdata('info_msg') . '</span></div>';
    }
    if ($this->session->flashdata('success_msg')) {
        echo '<div class="big_success"><span>' . $this->session->flashdata('success_msg') . '</span></div>';
    }
    ?>
</div>